<!-- Department Header -->
<?php
$imagePath = PATH."images/products/";
?>


<div class="only-banner ptb--40 bg__white">
<div class="container">
<div class="only-banner-img">
<a href="<?=PATH."ui/departments/".$dpt->slug?>"><img src="<?=PATH?>images/<?=$dpt->image?>" alt="new product"></a>
</div>
</div>
</div>



<section class="htc__product__area bg__white">
<div class="container">
<div class="row">

<div class="col-md-3  col-lg-3 col-sm-12">

<div class="product-categories-all">
<div id="dptHead" class="picColor">
<h3><a href="<?=PATH."ui/departments/".$dpt->slug?>"><?=$dpt->nameEN?></a></h3>
</div>
<div class="category-menu-list">
<ul>
<?php
foreach($cats as $index=>$catData){
$subcatID = null;
if(isset($_SESSION['website']['sub'][$catData->id])){
foreach($_SESSION['website']['sub'][$catData->id] as $subIndex=>$subData){
$subcatID = $subData->id;break;
}}
?>
<li><a href="<?=PATH."ui/catagory/".$catData->slug."/".$subData->slug?>"><?=$catData->nameEN?></a></li><?="\n"?>
<?php	} ?>
</ul>
</div>
</div>
</div>

<div class="col-md-9  col-lg-9 col-sm-6">
    <div style="display:none" id="lastProductId">
	<?= $product->id??null ?></div>

<?php
foreach($products as $product){
//print_r($product);exit;
?>

<div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-6">
						<div class="col-item" >
							<div class="photo" style="width:200px;height:200px">

							<a href="<?= PATH ?>ui/product/<?= $product->slug ?>">
										<img width="200" height="200" src="<?= PATH . $product->thumb ?>" alt="product images">
									</a>

							</div>
							<div class="info">
								<div class="row">
									<div class="col-md-12">
									<h6>
									<a style="size:10px;" href="<?= PATH ?>ui/product/<?= $product->slug ?>">
									<?= $product->name . " " 
								 . "" ?>
								</a>

								</h6>

									</div>

									<div class="col-md-12">
										<div class="row">
											<div class="price  col-md-6">
												<h5 class="price-text-color">
												<a href="<?= PATH ?>ui/product/<?= $product->slug ?>">৳.<b><?= $product->price ?></b></a>

													 </h5>
											</div>
											<div class="rating col-md-6">

												<i class="price-text-color fa fa-star"></i>
												<i class="fa fa-taka">
												</i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
												</i><i class="fa fa-star"></i>
											</div>
										</div>

									</div>
								</div>
								<div class="separator clear-left">
									<p class="btn-add">
									    
									    
										<i class="fa fa-shopping-cart"></i>
										<a id="cart" href="#" class="hidden-xs">Add to cart</a>
										<input id="productID" type="hidden" name="productID" value="<?= $product->id ?>" />
										
										</p>
										
										
									<p class="btn-details">
										<i class="fa fa-list"></i><a href="<?= PATH ?>ui/product/<?= $product->slug ?>" class="hidden-xs">More details</a></p>
								</div>

								<div class="clearfix">
								</div>
							</div>
						</div>
					</div>







<?php } ?>




</div>

</div>
<script type="text/javascript" src="<?= PATH ?>js/singleProduct.js"></script>

</section>

