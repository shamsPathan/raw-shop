<?php

include_once '../app/views/partial/header.php';
// include '../app/views/partial/departmentAndSLider.php';

//var_dump($data['cat']->id);exit;
$products = ["asdsd","asdsds","asds"];
?>
<!-- Department Header -->
<!--
<div class="only-banner ptb--40 bg__white">
	<div class="container">
		<div class="only-banner-img">
			<a href="shop-sidebar.html"><img src="<?=PATH?>images/new-product/medicalequipment.jpg" alt="new product"></a>
		</div>
	</div>
</div>
 -->
<section class="htc__product__area bg__white" style="margin-top:40px">
	<div class="container">

		<div class="row">

			<div class="col-md-3"  style="z-index: 0;">
<?php

//print_r($data);exit;

 ?>
				<div class="product-categories-all">
					<div id="dptHead" class="picColor">
						<h3><a href="<?=PATH."ui/catagory/".$data['cat']->slug?>"><?=$data['cat']->nameEN?>
						</a></h3>
					</div>
					<div class="category-menu-list">
						<ul>
							<?php
							$sub = $_SESSION['website']['sub'][$data['cat']->id];



							foreach($sub as $index=>$subData){
								?>
								<li class="subcatItem" ><a href="<?=PATH."ui/catagory/".$data['cat']->slug."/".$subData->slug?>"><?=$subData->nameEN?></a></li>
							<?php	} ?>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-8 col-md-offset-1" id="catagoryPageProductBlock">
				<?php
				$allProducts = array();
				$product = new Product;
					$products = $product->getAll($data['subcatSlug']);
					if($products){
						foreach($products as $product){
							array_push($allProducts, $product);
						}	
					}

				include_once('../app/views/partial/productBlockDefault.php');
				?>
			</div>




		</div>
	</section>



	<?php
	include_once '../app/views/partial/footer.php';
