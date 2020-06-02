<?php
include '../app/views/partial/header.php';
include '../app/views/partial/navBodyOverlay.php';

//echo($product);exit;

?>


<!-- ########################################
#################
	################################ -->

	<!-- Start Product Details -->
	<section class="htc__product__details pt--120 pb--100 bg__white">
		<div style="display:none" id="lastProductId"><?=$product->id?></div>

		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
					<div class="product__details__container">
						<!-- Start Small images -->
						<ul class="product__small__images" role="tablist">
							<?php

							if($product->img1){
							?>
							<li role="presentation" class="pot-small-img active">
								<a href="#img-tab-1" role="tab" data-toggle="tab">
									<!-- Image -->
									<img src="<?=PATH.$product->img1?>"></img>
								</a>
							</li>
						<?php } 

							if($product->img2){
							?>
							<li role="presentation" class="pot-small-img">
								<a href="#img-tab-2" role="tab" data-toggle="tab">
									<!-- Image -->
									<img src="<?=PATH.$product->img2?>"></img>
								</a>
							</li>

							<?php
						}
							if($product->img3){
							?>
							<li role="presentation" class="pot-small-img">
								<a href="#img-tab-3" role="tab" data-toggle="tab">
									<!-- Image -->
									<img src="<?=PATH.$product->img3?>"></img>
								</a>
							</li>
							<?php
						}
													if($product->img4){
							?>
							<li role="presentation" class="pot-small-img">
								<a href="#img-tab-4" role="tab" data-toggle="tab">

									<!-- Image -->
									<img src="<?=PATH.$product->img4?>"></img>

								</a>
							</li>
							<?php
						}
													if($product->img5){
							?>
							<li role="presentation" class="pot-small-img">
								<a href="#img-tab-5" role="tab" data-toggle="tab">

									<!-- Image -->
									<img src="<?=PATH.$product->img5?>"></img>

								</a>
							</li>
						<?php } ?>
						</ul>
						<!-- End Small images -->
						<div class="product__big__images">
							<div class="portfolio-full-image tab-content">
								<div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-tab-1">

									<!-- Image -->
									<img src="<?=PATH.$product->img1?>"></img>

									<div class="product-video">
										<a class="video-popup" href="http://bit.ly/32jdxYo">
											<i class="zmdi zmdi-videocam"></i> View Video
										</a>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade product-video-position" id="img-tab-2">
									<!-- Image -->
									<img src="<?=PATH.$product->img2?>"></img>
									<div class="product-video">
										<a class="video-popup" href="http://bit.ly/32jdxYo">
											<i class="zmdi zmdi-videocam"></i> View Video
										</a>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade product-video-position" id="img-tab-3">

									<!-- Image -->
									<img src="<?=PATH.$product->img3?>"></img>
									<div class="product-video">
										<a class="video-popup" href="https://youtu.be/VBHxJMCdoIY">
											<i class="zmdi zmdi-videocam"></i> View Video
										</a>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade product-video-position" id="img-tab-4">

									<!-- Image -->
									<img src="<?=PATH.$product->img4?>"></img>
									<div class="product-video">
										<a class="video-popup" href="https://youtu.be/VBHxJMCdoIY">
											<i class="zmdi zmdi-videocam"></i> View Video
										</a>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade product-video-position" id="img-tab-5">
									<!-- Image -->
									<img src="<?=PATH.$product->img5?>"></img>
									<div class="product-video">
										<a class="video-popup" href="https://youtu.be/VBHxJMCdoIY">
											<i class="zmdi zmdi-videocam"></i> View Video
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
					<div class="htc__product__details__inner">
						<div class="pro__detl__title">
							<h2><?=$product->name?></h2>
						</div>
						<div class="pro__dtl__rating">
							<ul class="pro__rating">
								<?php
								for($i=0; $i<$product->rating; $i++){
									?>
									<li><span class="ti-star"></span></li>
									<?php
								}


								?>
							</ul>
							<span class="rat__qun">(Out Of Five)</span>
						</div>
						<div class="pro__detl__title">
							<h2>Model: <?=$product->model?></h2>
						</div>

						<div class="pro__details">
							<p><?=$product->psd?></p>
						</div>
						<ul class="pro__dtl__prize">
							<!-- <li class="old__prize">$<?php echo ((int)$product->psd-2);?></li> -->
							<li>Tk. <?=$product->price?></li>
						</ul>


					<ul class="pro__dtl__btn">
						<li class="buy__now__btn"><a id="cart" href='#'>Add to Cart</a></li>
						<input id="productID" type="hidden" name="productID" value="<?=$product->id?>"/>


						<!-- <li><a href="#"><span class="ti-heart"></span></a></li> -->
						<!-- <li><a href="#"><span class="ti-email"></span></a></li> -->
					</ul>
<!-- 					<div class="pro__social__share">
						<h2>Share :</h2>
						<ul class="pro__soaial__link">
							<li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
							<li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
							<li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
							<li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
						</ul>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Product Details -->



<!-- Start Product tab -->
<section class="htc__product__details__tab bg__white pb--120">
    
    
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<ul class="product__deatils__tab mb--60" role="tablist">
					<li role="presentation" class="active">
						<a href="#description" role="tab" data-toggle="tab">Description</a>
					</li>
					<li role="presentation">
						<a href="#technical" role="tab" data-toggle="tab">Technical Specification</a>
					</li>
					<li role="presentation">
						<a href="#sheet" role="tab" data-toggle="tab">Data sheet</a>
					</li>
					<li role="presentation">
						<a href="#reviews" role="tab" data-toggle="tab">Reviews</a>
					</li>
				</ul>
			</div>
			
			
		</div>
		
		
		<div class="row">
			<div class="col-md-12">
				<div class="product__details__tab__content">
					<!-- Start Single Content -->
					<div role="tabpanel" id="description" class="product__tab__content fade in active">
						<div>
							<?=$product->pfd?>
						</div>
					</div>
					<!-- End Single Content -->

					<!-- Start Single Content -->
					<div role="tabpanel" id="technical" class="product__tab__content fade">
						<div class="product__description__wrap">
							<div>
								<?=$product->pfs?>
							</div>
						</div>
					</div>
					<!-- End Single Content -->

					<!-- Start Single Content -->
					<div role="tabpanel" id="sheet" class="product__tab__content fade">
						<div class="pro__feature">
							<h2 class="title__6">Data sheet</h2>
							<ul class="feature__list">
								<li><a target="_blank" href='<?=PATH.$product->pc?>'><i class="zmdi zmdi-play-circle"></i>Manual</a></li>
								<li><a target="_blank" href='<?=PATH.$product->pc?>'><i class="zmdi zmdi-play-circle"></i>Catalog</a></li>
							</ul>
						</div>
					</div>
					<!-- End Single Content -->
					<!-- Start Single Content -->
					<div role="tabpanel" id="reviews" class="product__tab__content fade">
						
								<?php
								//print_r($reviews);exit;
								if(!empty($reviews)){
									foreach ($reviews as $review) {
										?>
							<div class="review__address__inner" style="margin-top: 5px">
							<!-- Start Single Review -->
							<div class="pro__review">
								<div class="review__thumb">
									<img src="<?=PATH?>images/review/1.jpg" alt="review images" width="50px">
								</div>
								<div class="review__details">
									<div class="review__info">
										<h4><a href="#"><?=$review->name?></a></h4>
										<ul class="rating">
											<li><i class="zmdi zmdi-star"></i></li>
											<li><i class="zmdi zmdi-star"></i></li>
											<li><i class="zmdi zmdi-star"></i></li>
											<li><i class="zmdi zmdi-star"></i></li>
											<li><i class="zmdi zmdi-star-half"></i></li>
										</ul>

									</div>
									<div class="review__date">
										<span><?=$review->created_at?></span>
									</div>
									<p><?=$review->text?></p>
								</div>
							</div>
							</div>
										<?php
									}
								}
								?>

							<!-- End Single Review -->
						

						<div class="review__box">
						    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0&appId=501731180229764&autoLogAppEvents=1"></script>
<div class="fb-comments" data-href="https://medicalshopbd.com/ui/product" data-width="auto" data-numposts="10"></div>
							
						</div>
						
						
						
						
						
					</div>
					<!-- End Single Content -->
				</div>
			</div>
		</div>
	</div>
	<!-- Start Our Product Area -->
	
	
	
	
	<div class="line">

	</div>
	<div class="row text-center">
		<h2>Related More Products</h2>
		<div class="line">
		</div>
	</div>

	<div class="container">
		<div class="htc__product__container" id="productContainer" blockType="productContainer">
		    
		    

			<div id="productRow" blockType="productRow" class="row" style="display:none; margin-top:5px;position: absolute;">
					<!-- Start Single Product -->
							<!-- ^^^^^^^^^^^ Image Block %%%%%%%%% -->
							
								<ul class="imageBlock thumbnails col-md-12" id="productList" blockType="productList">

									<li class="col-md-3 single__pro col-lg-3 cat--1 col-sm-3 col-xs-9" blockType="productBlock" id="productBlock">
										<div style="margin-top:15px;" class="product product__inner">
											<a href=""><img class="card-img-top" src="" style="height:250px"></a>
										</div>

										<div class="product__details text-center">
												<a href="dad"><h2 class="card-title mb-0"></h2></a>
												<a href="sf"><p class="card-text text-black-50"></p></a>
										</div>
									</li>

								</ul>
			</div>

			<!-- Start Load More BTn -->
			
			
			<!-- End Load More BTn -->
		</div>
	</div>
	<!-- End Our Product Area -->

	<div id="noProductMessage" class="container text-center" style="display:none">
				<h2 class="text-info">There are no more related products</h2>
	</div>

	<div id="showMoreButton" class="row mt--60" style="display:block">
				<div class="col-md-12">
					<div class="htc__loadmore__btn">
						<a id="showMoreLink" href="#">load more</a>
					</div>
				</div>
	</div>

	

</section>
<!-- End Product tab -->
<!-- Related Products-->

<script type="text/javascript" src="<?=PATH?>js/singleProduct.js"></script>

<?php
include_once '../app/views/partial/footer.php';
?>