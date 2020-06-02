
$(document).ready(function(){


cartTable();

});


// ####################  Function that waiting for clicks to remove from cart list
function removeThisItem(item){

	let $item = item.parentNode.parentNode;
	//console.log(item.parentNode.parentNode);
	let $id = $item.getAttribute('id');
	// // call to server to remove this id
	$.get( window.location.protocol+"//"+window.location.hostname+"/myCart/remove/"+$id, function( data ) {
		if(data){
			let got = JSON.parse(data);
			
			//$("#cartCount").text(products.length);
		}
	});
	//if removed then delete item
	$removedPrice = $item.querySelectorAll("#productSubTotal")[0].innerText;
	$total = document.getElementById("total").innerText;
	document.getElementById("total").innerText = $total - $removedPrice;
	$item.remove();

	//update cart
	updateCart();

//	console.log($item);
//console.log($(".prices"));

}

function updateQt(item){

	let qt = item.value;
	let id = item.parentNode.parentNode.getAttribute('id');

	$.get( window.location.protocol+"//"+window.location.hostname+"/myCart/updateQt/"+id+"/"+qt, function( data ) {
		if(data){
			
			let got = JSON.parse(data);
			if(got) {
				$price = item.parentNode.parentNode.querySelectorAll("#productPrice")[0].innerText;
				$oldSub = $subTotal = item.parentNode.parentNode.querySelectorAll("#productSubTotal")[0].innerText;
				$newSub = item.parentNode.parentNode.querySelectorAll("#productSubTotal")[0].innerText = $price * got['qt'];
				//console.log(item.parentNode.parentNode.querySelectorAll("#productSubTotal")[0].innerText);	
				$total = parseInt($("#total").html()) + ($newSub - $oldSub);
				$("#total")[0].innerText = $total;
				
			} else console.log("Not valid product");

			//$("#cartCount").text(products.length);
		}
	});

}

//console.log($(".prices"));
// Create cart table with carted Products infomation
function cartTable() {

	//copy row
	let $cartTable = $("#cartTable");

	//clone row
	let $cartRow = $("#cartRow").clone();

	//remove demo Rows
	$("#cartTable").find("#cartRow").remove();


	//getting cart items
	$data =  $.get( window.location.protocol+"//"+window.location.hostname+"/myCart/get", function( data ) {
		if(data!=404){

			var $products = JSON.parse(data).products;
			var price = 0;
			var $index=0
			//console.log($products[0].id);
			$products.forEach(function($product){
				//foreach cart item
				//get products details

				$.get( window.location.protocol+"//"+window.location.hostname+"/ajax/getInfo/"+$product.id, function( data ) {
					if(data){
						$item = JSON.parse(data);
						

						//change data of item row
						$cartRow.find("tr").attr("id",$item.id);
						$cartRow.find("#productPrice").text($item.price);
						$cartRow.find("#productQuantity").attr("value", $product.qt);
						let $subTotal = $cartRow.find("#productQuantity").attr("value")*$cartRow.find("#productPrice").html();
						$cartRow.find("#productSubTotal").text($subTotal);
						$cartRow.find("#productName").text($item.name);
						$cartRow.find(".product-thumb").find("img").attr("src", window.location.protocol+"//"+window.location.hostname+"/"+$item.thumb);
						$cartTable.append($cartRow.html());
						//append loaded row to cart




						//fix total price
						let total = parseInt($("#total").html()) + parseInt($cartRow.find("#productSubTotal").html());
						
						$("#total").html(total);
					}

				});

			});
			//console.log($(".prices"));
		}

	});

	//$cartRow.find("#productPrice").text("400");
	//$("#cartTable").append($cartRow.html());

}

// update Cart Icon indicator

function updateCart(){
	$.get( window.location.protocol+"//"+window.location.hostname+"/myCart/get", function( data ) {

		if(typeof JSON.parse(data).products!== 'undefined'){
			console.log(typeof JSON.parse(data).products!== 'undefined');
			let products = JSON.parse(data).products;;
			//console.log(products.length);
			$("#cartCount").text(products.length);
		}
		else {
			console.log(document.getElementById("cartTable"));
			document.getElementById("cartTable").style.display = "none";

		}
	});
}








