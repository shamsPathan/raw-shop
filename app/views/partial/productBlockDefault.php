
<div class="product-style-tab">
	

	<div style="display:none" id="lastProductId">
	<?= $product->id ?></div>
	
	<div class="tab-content another-product-style ">
		<div class="tab-pane active" >
			<div class="row">
					<?php

					foreach ($allProducts as $product){

						?>
						

					<div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-6">
						<div class="col-item" >
							<div class="photo">

							<a href="<?= PATH ?>ui/product/<?= $product->slug ?>">
										<img src="<?= PATH . $product->thumb ?>" alt="product images">
									</a>

							</div>
							<div class="info">
								<div class="row">
									<div class="col-md-12">
									<h6>
									<a href="<?= PATH ?>ui/product/<?= $product->slug ?>">
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
	</div>
</div>
