<?php

define("PATH", "https://" . $_SERVER['HTTP_HOST'] . "/");
// $model is database OBJ
if (isset($_SESSION['method'])) {
  $title = "- " . strtoupper($_SESSION['method']);
} else
  $title = '';
$department = $_SESSION['website']['dpt'];
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title>Medical Shop Bangladesh <?= $title ?></title>
  <link rel="icon" href="<?= PATH ?>images/favicon.png" sizes="16x16" type="image/png">
  <meta name="description" content="Medical Shop Bangladesh is leading platform for all kinds of medical products, where all goes to shop for better care with lower cost.
We offer full service from our strong service teem that meets highest quality standard and we focus on delivering trans formative invasion that bring smarter, more personalized care to all of us. We want our customer to be able to rely on our excellent quality">

				<meta property="og:title" content="Find quality Medical Equipment,
Lab & Pathology Equipment,
Dental Equipment,
Medical Consumable,
Surgical Instrument,
ENT Equipment,
Eye Equipment,
Physiotherapy Care,
Fitness & Beauty Product,
Doctor Product,
Home Medical Product,
Hospital Furniture,
Hospital IT System,
Medical Gas Supplies,
Medicine,
Medical Books,
Veterinary Care,
Refurbished Machine, &amp;amp; Export on medicalshopbd.com"/>
			

				
		<meta property="og:type" content="site" />
		<meta property="og:url" content="https://www.medicalshopbd.com" />
		<meta property="og:site_name" content="Medical Shop Bangladesh"/>
		<meta property="fb:admins" content="100026392787259,421332711673269" />
		<meta property="fb:page_id" content="207121216563431" />
		<meta property="fb:app_id" content="421332711673269" />
		
				<meta name="yandex-verification" content="4e95cc451dec267c" />
		<meta name="p:domain_verify" content="9S5L9cwp-KSgl7AA0ijaY4zDjNIAQp3AQTS9sChfBd4"/>
			
		<meta name="aplus-channel" content="WS" />
		
	    <link rel="canonical"  href="https://www.medicalshopbd.com"> 
        
				<meta name="HandheldFriendly" content="True">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
		
  
  
  <meta name="google-site-verification" content="9S5L9cwp-KSgl7AA0ijaY4zDjNIAQp3AQTS9sChfBd4" />
  
                  <meta name="msvalidate.01" content="49959D7C18721867B2F9145627D85BFA" />
  
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--Start of Novocall App Script-->
  <script type='text/javascript'> (function(){var d=document,h=d.getElementsByTagName('head')[0],s= d.createElement('script');s.type='text/javascript';s.async=!0; s.src='https://call.novocall.co/v1/widgets?id=tezykRBmjf0'; h.appendChild(s)}()) </script> 
  <!--End of Novocall App Script-->

  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="stylesheet" href="<?= PATH ?>css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= PATH ?>css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= PATH ?>css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= PATH ?>css/default.css">
  <link rel="stylesheet" href="<?= PATH ?>css/core.css">
  <link rel="stylesheet" href="<?= PATH ?>css/shortcode/shortcodes.css">
  <link rel="stylesheet" href="<?= PATH ?>css/style.css">
  <link rel="stylesheet" href="<?= PATH ?>css/responsive.css">
  <link rel="stylesheet" href="<?= PATH ?>css/partner.css">
  <link rel="stylesheet" href="<?= PATH ?>css/service.css">
  <link rel="stylesheet" href="<?= PATH ?>css/ourteam.css">
  <link rel="stylesheet" href="<?= PATH ?>css/contact.css">
  <link rel="stylesheet" href="<?= PATH ?>css/finalorder.css">
  <link rel="stylesheet" href="<?= PATH ?>css/orderemail.css">
  <link rel="stylesheet" href="<?= PATH ?>css/user.css">
  <link rel="stylesheet" href="<?= PATH ?>css/bmelearning.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {

      font-smooth: always;

      /* <length> value */
      font-size: 1em;
    }
  </style>
  <!-- <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&lang=en" /> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="<?= PATH ?>js/plugins.js"></script>
  <script src="<?= PATH ?>js/slick.min.js"></script>
  <script src="<?= PATH ?>js/owl.carousel.min.js"></script>

<script type="application/ld+json">
 { "@context": "http://schema.org",
 "@type": "Organization",
 "name": "Medical Shop Bangladesh",
 "legalName" : "medicalshopbd.com",
 "description": "Medical Shop Bangladesh is leading platform for all kinds of medical products, where all goes to shop for better care with lower cost.
We offer full service from our strong service teem that meets highest quality standard and we focus on delivering trans formative invasion that bring smarter, more personalized care to all of us. We want our customer to be able to rely on our excellent qualit",
 "url": "https://medicalshopbd.com",
 "logo": "https://medicalshopbd.com/images/logo/logo.png",
 "address": {
 "@type": "PostalAddress",
 "streetAddress": "1/A, Alauddin Bhaban, D.I.T Extension, 4th Floor,Fakirapool,Dhaka-1000",
 "addressLocality": "Bangladesh",
 "addressRegion": "Dhaka",
 "postalCode": "1000",
 "addressCountry": "Bangladesh"
 },
 "contactPoint": {
 "@type": "ContactPoint",
 "contactType": "customer support",
 "telephone": "+88017437620014",
 "email": "info@medicalshopbd.com"
 },
 "sameAs": [ 
 "https://www.facebook.com/medicalshopbangladesh",
 "https://twitter.com/medicalshopbd",
 "https://www.linkedin.com/company/medical-shop-bangladesh",
 ]}
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129274489-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-129274489-1', { 'optimize_id': 'GTM-NCN8FMT'});
</script>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2944627559981874",
    enable_page_level_ads: true
  });
</script>


 <link rel="stylesheet" href="<?= PATH ?>css/hc-offcanvas-nav.css">
  <script src="<?= PATH ?>js/jquery.js"></script>
  <script src="<?= PATH ?>js/hc-offcanvas-nav.js"></script>

  <script>
    jQuery(document).ready(function($) {
      $('#main-nav').hcOffcanvasNav({
        maxWidth: 980
      });
    });
  </script>




</head>

<body>
  <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
  <!-- Body main wrapper start -->


  <div class="top_header">
    <div class="row">
      <div class="col-sm-12 col-md-8">
        <a href="<?= PATH ?>" class="hidden-xs hidden-sm">Welcome To MSB</a>
        <a href="mobile">Call:- +8801734762004</a>
        <a href="email" class="hidden-xs hidden-sm">Email: info@medicalshopbd.com</a>

      </div>


      <div class="col-sm-12 col-md-4" style="text-align: center">
        <?php
        if (!($_SESSION['user']['id'] ?? null)) { ?>
          <a href="<?= PATH ?>users/register" style="float:right">Register</a>
          <a href="<?= PATH ?>users/login" style="float:right">Login</a>
          <?php
          } else {
            if ($_SESSION['user']['fname'] ?? null) { ?>
            <a href="<?= PATH ?>users/logout" style="float:right">(Log Out)</a>
            <a href="<?= PATH ?>ui/user" style="float:right">Hello <?= $_SESSION['user']['fname'] ?></a>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>


  <!-- Start Header Style -->
  <header id="header" class="htc-header header--3 bg__white">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-lg-2 col-sm-6 col-xs-6">
            <div class="logo">
              <a href="<?= PATH ?>">
                <img src="<?= PATH ?>images/logo/logo.png" width="100%" alt="logo">
              </a>
            </div>
          </div>
          <!-- Start MAinmenu Ares -->
          <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
            <nav class="mainmenu__nav hidden-xs hidden-sm">
              <ul class="main__menu row">
                <li class="drop"><a href="<?= PATH ?>ui/home">Home</a>
                </li>
                <li class="drop"><a href="<?= PATH ?>ui/allProducts">A-Z Products</a>
                  <ul class="dropdown">

                    <?php
                    foreach ($_SESSION['website']['dpt'] as $index => $dpt) {
                      ?>
                      <li><a href="<?= PATH ?>ui/departments/<?= $dpt->slug ?>"><?= $dpt->nameEN ?></a></li>
                    <?php } ?>


                  </ul>
                </li>
                <li class="drop"><a href="<?= PATH ?>ui/partners">Our Partners</a></li>
                <li><a href="<?= PATH ?>ui/service">Service</a></li>
                <li class="drop"><a href="<?= PATH ?>ui/about">About</a>
                  <ul class="dropdown">
                    <li><a href="<?= PATH ?>ui/about">About US</a></li>
                    <li><a href="<?= PATH ?>ui/ourteam">Our Team</a></li>
                    <li><a href="<?= PATH ?>ui/jobsearch">Job Search</a></li>
                  </ul>
                </li>
                <li><a href="<?= PATH ?>ui/contact">Contact</a></li>
                <li class="drop"><a href="">Training</a>
                  <ul class="dropdown">
                    <li><a href="<?= PATH ?>ui/health">E-Health Solution</a></li>

                    <li><a href="<?= PATH ?>ui/emt">Electro-Medical Training</a></li>
                    <li><a href="<?= PATH ?>ui/et">Electronics Training</a></li>
                    <li><a href="<?= PATH ?>ui/ct">Comnputer Training</a></li>
                    <li><a href="<?= PATH ?>ui/mtt">Medical Technologist Training</a></li>
                    <li><a href="<?= PATH ?>ui/psm">Products Service Manual</a></li>
                    <li><a href="<?= PATH ?>ui/biomedicalequipmentlearning">Biomedical Equipment Learning</a></li>


                  </ul>
                </li>
              </ul>
            </nav>

            <!-- Mobile Menu -->
          </div>





          <!-- End MAinmenu Ares -->
          <div class="col-md-2 col-sm-4 col-xs-3">
            <ul class="menu-extra">
              <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
              <li><a href="<?= PATH ?>users/register"><span class="ti-user"></span></a></li>

              <li class=""><a href="<?= PATH ?>ui/cart"><span class="ti-shopping-cart">(<span id="cartCount" style="color:green;font-size:30px"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>)</span></a></li>

            </ul>
          </div>
          
          
          <div class="mobile-menu clearfix visible-xs visible-sm">

            <nav id="main-nav">
              <ul>
                <li>
                  <a href="<?= PATH ?>">Home</a>
                </li>
                <li>
                  <a href="<?= PATH ?>">A-Z Products</a>
                  
                    <?php
                    foreach ($_SESSION['website']['dpt'] as $index => $dpt) {
                      ?>

                      <li>
                        <a href="<?= PATH ?>ui/departments/<?= $dpt->slug ?>"><?= $dpt->nameEN ?></a>

                        <ul>
                          <?php
                            $catClass = 1;
                            $cat = null;
                            $cat = $_SESSION['website']['cat'][$dpt->id];
                            $mb = "mb--30";
                            foreach ($cat as $index => $cat) {
                              if ($catClass > 1) {
                                $mb = null;
                              };

                              ?>

                            <li>
                              <a href="<?= PATH ?>ui/catagory/<?= $cat->slug ?>"><?= $cat->nameEN ?></a>

                            </li>

                          <?php
                              $catClass++;
                            }
                            ?>
                        </ul>

                      </li>

                    <?php }

                    ?>
                </li>
                
                
              <li><a href="<?= PATH ?>ui/partners">Our Partners</a></li>
                <li><a href="<?= PATH ?>ui/service">Service</a></li>
                <li><a href="<?= PATH ?>ui/about">About</a>
                  <ul>
                    <li><a href="<?= PATH ?>ui/about">About US</a></li>
                    <li><a href="<?= PATH ?>ui/ourteam">Our Team</a></li>
                    <li><a href="<?= PATH ?>ui/jobsearch">Job Search</a></li>
                  </ul>
                </li>
                <li><a href="<?= PATH ?>ui/contact">Contact</a></li>
                
                <li><a href="<?= PATH ?>">Training</a>
                  <ul>
                    <li><a href="<?= PATH ?>ui/health">E-Health Solution</a></li>

                    <li><a href="<?= PATH ?>ui/emt">Electro-Medical Training</a></li>
                    <li><a href="<?= PATH ?>ui/et">Electronics Training</a></li>
                    <li><a href="<?= PATH ?>ui/ct">Comnputer Training</a></li>
                    <li><a href="<?= PATH ?>ui/mtt">Medical Technologist Training</a></li>
                    <li><a href="<?= PATH ?>ui/psm">Products Service Manual</a></li>
                    <li><a href="<?= PATH ?>ui/biomedicalequipmentlearning">Biomedical Equipment Learning</a></li>


                  </ul>
                </li>

              </ul>
              
              

            </nav>

          </div>
          <!-- mobile end -->


        </div>









      </div>
    </div>
    <!-- End Mainmenu Area -->
  </header>

  <!-- End Header Style -->
  <!-- Start Feature Product -->