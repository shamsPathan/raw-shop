$("#cart").on("click", function(event){
	event.preventDefault();
	$cart = $("#productID");
	$productId = $("#productID").attr("value");
	//console.log($productId);
	//console.log("cart added");

	$.get( window.location.protocol+"//"+window.location.hostname+"/myCart/add/"+$productId, function( data ) {
		if(data){
			//console.log(data);
				//alert("Product Added");
			}

		}).then(updateCart());

});

function updateCart(){
	$.get( window.location.protocol+"//"+window.location.hostname+"/myCart/get", function( data ) {

		if(typeof JSON.parse(data).products!== 'undefined'){

			let products = JSON.parse(data).products;;
			//console.log(products.length);
			$("#cartCount").text(products.length);
		}
		else {

			document.getElementById("cartTable").style.display = "none";

		}
	});
}

let $productContainer = document.getElementById("productContainer");
	  		
	  		//Clone a row of product
	  		let $sampleProductRow = document.getElementById("productRow");
	  		let $productRow = $sampleProductRow.cloneNode(true);
	  		$productRow.removeAttribute("id");
	  		$productRow.style.position = "relative";
	  		//$productRow.style.display = "block";

	  		let $productList = $productRow.querySelector("#productList");
	  		$productList.removeAttribute("id");

	  		let $sampleProductBlock = $productRow.querySelector("#productBlock");
	  		
	  		let $productBlock = $sampleProductBlock.cloneNode(true);
	  		$productBlock.removeAttribute("id");
	  		$productList.removeChild($sampleProductBlock);

	  		// $productList.removeChild($productBlock);
	  		//remove id from it
			$productBlock.removeAttribute("id");



	function showMore() {
		
	// $lastImage = document.getElementsByClassName("imageBlock")[document.getElementsByClassName("imageBlock").length -1].querySelectorAll(".productBlock");

	// $lastImage= $lastImage[$lastImage.length-1].querySelectorAll("a");
	// console.log($lastImage.length-1);
	$id = document.getElementById("lastProductId");
	//console.log($id);



	fetch('/api/getNextFourProduct/'+$id.innerText)
	   .then(function(response) {
	    return response.json();
	  })
	  .then(function(myJson) {
	  	$products = (myJson);
	  	
	  	if($products!='false' && $products.length > 3 ){
	  
	 		loadRelatedProduct();
   		//console.log($productContainer);
   		$productRow.appendChild($productList);
		$productRow.style.display = "block";
		$productContainer.appendChild($productRow);
  	}
	else {
		// remove "show more button"
		document.getElementById("showMoreButton").style.display = "none";
		document.getElementById("noProductMessage").style.display = "block";
	}
  });

	}



document.getElementById("showMoreButton").addEventListener("click", function(event){
			event.preventDefault();
		  	showMore();
		});

showMore();

async function loadRelatedProduct(files) {

			      for(var i=0; i<$products.length;i++) {
			      	//console.log($product);
			        await add($products, i);
			      }
		    };

		function add($products, i) {
		$product = $products[i];

  	 		//change name
  	 	//link
	  	$name = $productBlock.querySelectorAll("a h2")[0];
	  	$name.innerText = $product.name+" ("+$product.model+")";
	 	//change price
		$price = $productBlock.querySelectorAll("a p")[0];
		$price.innerText = "Tk "+$product.price;	
			
	  		
			// //change image
	    	$image = $productBlock.querySelectorAll("a img")[0];
			$image.src = window.location.protocol+"//"+window.location.hostname+"/"+$product.thumb;
			
			// //change link

			$link = $productBlock.querySelectorAll("a")[0];
			$link.href = "/ui/product/"+$product.slug;
			$link.id = $product.id;

			$link2 = $productBlock.querySelectorAll("a")[1];
			$link2.href = "/ui/product/"+$product.slug;
			$link2.id = $product.id;

			$link3 = $productBlock.querySelectorAll("a")[2];
			$link3.href = "/ui/product/"+$product.slug;
			$link3.id = $product.id;



			//console.log($productChild);
			if(i==($products.length-1)){

				$lastProductId = document.getElementById("lastProductId");
				$newLastProductId = $id.cloneNode(true);
				$newLastProductId.innerText = $product.id;
				$lastProductId.parentNode.removeChild($id);
				$productRow.appendChild($newLastProductId);

			}
			  		
			// //add child
			$productList.appendChild($productBlock.cloneNode(true));
			//$productBlock = null;
			 return true;

		}
