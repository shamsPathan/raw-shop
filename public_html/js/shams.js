
$(document).ready(function(){

	//console.log(window.location.hostname)

// Reg and Login form
$("#regButton").on("click", function(){
	document.getElementById("regForm").submit();
});

$("#loginButton").on("click", function(){
	document.getElementById("loginForm").submit();
});




// catagory page, Onclick, fetch subcat related Products

$(".subcatItem").on("click", getProducts() );

function getProducts(){

	let subcatID = $(this).attr("id");
	let offset = 3;

	let newsBlock = $("#catagoryPagePBlock");
	newsBlock.empty();
	newsBlock.html("Loading....");
		// show something like "LOADING...."
		$.get( window.location.protocol+"//"+window.location.hostname+"/ajax/getProduct/"+subcatID+"/"+offset, function( data ) {
			//console.log(data);
			newsBlock.empty();
			newsBlock.append( data );
			//alert( "Load was performed." );
		})
		// make request to server to get some news for THIS id

		// get data and re arrange newsBlock;

		// newsBlock.show();

	};

//change all homepage product images with real product
//changeImage();


});







