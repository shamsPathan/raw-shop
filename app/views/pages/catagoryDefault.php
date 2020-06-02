<?php

include_once '../app/views/partial/header.php';
// include '../app/views/partial/departmentAndSLider.php';

//var_dump($data['cat']->id);exit;
$products = ["asdsd","asdsds","asds"];
?>

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
							foreach($data['sub'] as $index=>$subData){
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

				foreach($data['sub'] as $sub){
					$product = new Product;
					$products = $product->getAll($sub->slug);
					//print_r(count($products)." sub:".$sub->nameEN."<br/>");
					
					if($products){
						foreach($products as $product){
							array_push($allProducts, $product);
						}	
					}
				}

				//print_r(count($allProducts));exit;
				include_once('../app/views/partial/productBlockD.php');
				?>
			</div>




		</div>
	</section>



	<?php
	include_once '../app/views/partial/footer.php';
