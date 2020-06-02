<?php
?>

<div class="categories-menu mrg-xs hidden-xs hidden-sm ">
<div class="category-heading">
<h3> All Department</h3>
</div>
<div class="category-menu-list">
<ul>
<?php 		foreach($_SESSION['website']['dpt'] as $index=>$dpt){ ?>
<li>
<!-- Medical Equipment -->

<a href="<?=PATH?>ui/departments/<?=$dpt->slug?>" target="_blank"> <?=$dpt->nameEN?><i
class="zmdi zmdi-chevron-right"></i></a>
<div class="category-menu-dropdown" style="display: flex;flex-wrap: wrap;align-content: space-between;">
<?php
$catClass = 1;
$cat = null;
$cat = $_SESSION['website']['cat'][$dpt->id];
$mb = "mb--30";
foreach($cat as $index=>$cat ){
if($catClass>1) {
$mb = null;
};
$subcat = $_SESSION['website']['sub'][$cat->id];


?>
<div class="col category-common2">
<h4 class="categories-subtitle"><a href="<?=PATH?>ui/catagory/<?=$cat->slug?>"><?=$cat->nameEN?></a></h4>
<ul>
<?php
foreach($subcat as $index=>$sub){
?>
<li><a href="<?=PATH."ui/catagory/".$cat->slug."/".$sub->slug?>"><?=$sub->nameEN?></a></li>
<?php } ?>
</ul>
</div>
<?php
$catClass++;
}
?>
</div>
</li>
<?php } ?>
<!-- First Dpt section end -->
</ul>
<!-- Main ul end -->
</div>
</div>
