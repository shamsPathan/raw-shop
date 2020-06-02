<?php
// core header
include_once '../app/views/partial/header.php';
// second segment
include '../app/views/partial/departmentAndSLider.php';
?>
<div style="position: relative;">
<?php
$count =1;
$products = [];

foreach($_SESSION['website']['dpt'] as $index=>$dpt){

$cats  = $_SESSION['website']['cat'][$dpt->id];
//print_r($_SESSION['website']);exit;
//print_r($cat);
//if(++$count>2) break;
$limit = 0;
foreach($cats as $index=>$cat){
$subcat = $_SESSION['website']['sub'][$cat->id];
//	print_r($subcat);exit;
if($subcat){
    $products[$limit] = new Product();

    $products[$limit]->load($subcat[0]->slug);
    
}

//$products[$limit]->loadImage($products[$limit]->id);
if(++$limit > 2) break;
}
//print_r($products);exit;
//Products block segments {Same as the size of departments}
include '../app/views/partial/catagoryAndProducts.php';
} ?>
</div>
<?php
//Foote
?>

<script src="<?=PATH?>js/slider.js"></script>
<?php
include_once '../app/views/partial/footer.php';
