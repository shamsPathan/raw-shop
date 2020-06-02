			<div class="row">


				<div class="col-md-12">

					<div class="product-style-tab">

						
						<div class="tab-content another-product-style ">
							<div class="tab-pane active" >
								<div class="row">

									<div class="product-slider-active owl-carousel owl-loaded ">
										<?php

										$productLimit = 3;
										for($count=0; $count<$productLimit; $count++){

											?>
											<div class="product">
												<div class="product__inner">
													<div class="pro__thumb">
														<a href="<?=PATH?>ui/product/<?=$products[$count]->id?>">
															<?php
															if($products[$count]->image){
																$image = '<img src="data:image/gif;base64,'.base64_encode($products[$count]->image).'"/>';
																echo $image;
															}
															else { ?>
																<img src="images/product/sm-img/1.jpg" alt="product images">
																<?php
															}

															?>

														</a>
													</div>
													<div class="product__hover__info">
														<ul class="product__action">
															<li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="<?=PATH?>ui/product/<?=$products[$count]->id?>"><span class="ti-plus"></span></a></li>
															<li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
															<li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
														</ul>
													</div>
												</div>

												<div class="product__details">
													<h2><a href="<?=PATH?>ui/product/<?=$products[$count]->id?>"><?=$products[$count]->name?></a></h2>
													<ul class="product__price">
														<li class="old__price">tk<?=$products[$count]->price?></li>
														<li class="new__price">Tk.<?=$products[$count]->price?></li>
													</ul>
												</div>
											</div>
										<?php } ?>

									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>