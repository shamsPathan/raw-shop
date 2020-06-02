<?php
include_once "../app/views/partial/header.php";
?>




<!-- End Offset Wrapper -->
<!-- Start Bradcaump area -->
<div class="" style="background: rgba(0, 0, 0, 0) url(<?=PATH?>images/bg/2.jpg) no-repeat scroll center center ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Cart</h2>
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="<?=PATH?>">Home</a>
                          <span class="brd-separetor">/</span>
                          <span class="breadcrumb-item active">Cart</span>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->

<?php
if($_SESSION['cart']??null){
    
    include_once('../app/views/partial/cartTable.php');

} else {
    echo "<center style='margin-bottom:20px'><span  class='alert alert-info'>No Items In Cart</span></center>";
}
?>


<!-- cart-main-area end -->
<script src="<?=PATH?>js/cart.js"></script>
<?php
include_once "../app/views/partial/footer.php";
?>