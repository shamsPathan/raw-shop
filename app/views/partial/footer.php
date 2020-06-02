


<!-- Start Footer Area -->
<footer class="htc__foooter__area gray-bg " style="z-index: 0; position: relative;">


<div class="container">
<div class="row ">
<div class="footer__container clearfix ">
<!-- Start Single Footer Widget -->
<div class="col-md-3 col-lg-3 col-sm-6">



<div class="ft__widget">
<div class="ft__logo">
<a href="index.html">
<img src="<?=PATH?>images/logo/logofooter.png" width="70%" alt="footer logo">
</a>
</div>
<div class="footer-address">
<ul>
<li>
<div class="address-icon">
<i class="zmdi zmdi-pin"></i>
</div>

<div class="address-text">
<p>1/A, Alauddin Bhaban, <br>D.I.T Extension, 4th Floor, <br>Dhaka 1000,Bangladesh</p>
</div>
</li>
<li>
<div class="address-icon">
<i class="zmdi zmdi-email"></i>
</div>
<div class="address-text">
<a href="mail">info@medicalshopbd.com</a>
</div>
</li>
<li>
<div class="address-icon">
<i class="zmdi zmdi-phone-in-talk"></i>
</div>
<div class="address-text">
<p>+8801734762004 </p>
</div>
</li>
</ul>
</div>
<ul class="social__icon">
<li><a href="https://twitter.com/medicalshopbd"><i class="zmdi zmdi-twitter" target="_blank"></i></a></li>
<li><a href="https://www.facebook.com/medicalshopbangladesh" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
<li><a href="https://www.facebook.com/medicalshopbangladesh" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
<li><a href="https://medicalshopbangladesh.business.site/" target="_blank"><i class="zmdi zmdi-google-plus"></i></a></li>
</ul>
</div>
</div>
<!-- End Single Footer Widget -->
<!-- Start Single Footer Widget -->
<div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
<div class="ft__widget">
<h2 class="ft__title">My Page</h2>
<ul class="footer-categories">
<li><a href="<?= PATH ?>ui/user">My Account</a></li>
<li><a href="<?= PATH ?>">Order & Checkout</a></li>
<li><a href="<?= PATH?>ui/cart">All Cart</a></li>
<li><a href="<?= PATH ?>">Best Offer</a></li>
<li><a href="<?= PATH ?>">Order History</a></li>
<li><a href="<?= PATH ?>">Track Order</a></li>
</ul>
</div>
</div>

<div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
<div class="ft__widget">
<h2 class="ft__title">Customer Info</h2>
<ul class="footer-categories">
<li><a href="<?= PATH ?>">Track Order</a></li>
<li><a href="<?= PATH ?>ui/return">Returns & Exchanges</a></li>
<li><a href="<?= PATH ?>">How To Buy</a></li>
<li><a href="<?= PATH ?>">Shipping & Delivery</a></li>
<li><a href="<?= PATH ?>ui/partners">Sell On MSB</a></li>
<li><a href="<?= PATH ?>ui/partners">Become Affilitie</a></li>
</ul>
</div>
</div>
<!-- Start Single Footer Widget -->
<div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
<div class="ft__widget">
<h2 class="ft__title">Company Info</h2>
<ul class="footer-categories">
<li><a href="<?= PATH ?>">About Us</a></li>
<li><a href="<?= PATH ?>">Contact Us</a></li>
<li><a href="<?= PATH ?>">Terms & Conditions</a></li>
<li><a href="<?= PATH ?>ui/return">Returns & Exchanges</a></li>
<li><a href="<?= PATH ?>">Shipping & Delivery</a></li>
<li><a href="<?= PATH ?>">Privacy Policy</a></li>
</ul>
</div>
</div>
<div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
<div class="ft__widget">
<h2 class="ft__title">Follow US</h2>
<ul class="footer-categories">
<li>
<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmedicalshopbangladesh%2F&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=421332711673269" width="305" height="220" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
</li>
</ul>
</div>



</div>
</div>



</div>
<!-- Start Copyright Area -->
<div class="htc__copyright__area">
<div class="row">
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
<div class="copyright__inner">
<div class="copyright">
<p>© 2019 <a href="<?= PATH ?>">Medical Shop Bangladesh</a>
All Right Reserved.</p>
</div>


</div>
</div>
</div>
</div>



</div>


<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v4.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="207121216563431"
  theme_color="#006687">
      </div>


</footer>





<script src="<?=PATH?>js/main.js"></script>
<script src="<?=PATH?>js/shams.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js'></script>
<script  src="<?=PATH?>js/script.js"></script>







</body>

</html>
