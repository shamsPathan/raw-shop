<?php
include_once '../app/views/partial/header.php';
define("DPT_IMG_PATH","images/");

?>

<!-- Start Bradcaump area -->

<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(<?=PATH.DPT_IMG_PATH?><?=$data['dpt']->image?>) no-repeat scroll center center / cover;">
</div>

<div class="line">

</div>
<!-- End Bradcaump area -->
<div class="portfolio-grid-area bg__white pt--130 pb--100">
    <div class="container">
        <div class="portfolio-style">
            <div class="row grid">

                <?php
                    foreach($data['cat'] as $index=>$catData){
                                      ?>

                <div class="col-md-4 col-sm-6 col-xs-12 grid-item cat1 cat3">
                    <div class="single-portfolio mb--10">
                        <div class="portfolio-img-title">
                            <a href="<?=PATH?>ui/catagory/<?=$catData->slug?>">
                                <img src="<?=PATH."images/".$catData->image?>" alt="" />
                            </a>
                            <div class="portfolio-title-popup hover-title">
                                <div class="portfolio-title portfolio-title-2">
                                  <h3><a href="<?=PATH?>ui/catagory/<?=$catData->slug?>"><center><?=$catData->nameEN?></center></a></h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <?php } ?>




            </div>
        </div>
    </div>
</div>

<?php
include_once '../app/views/partial/footer.php';
?>
