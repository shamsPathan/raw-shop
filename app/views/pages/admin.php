<?php

$user = $data;
include_once "../app/views/partial/header.php";
?>

<section id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="<?= PATH ?>ui/user" class="list-group-item active main-color-bg">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> User Dashboard
          </a>

          <br>

          <center>
            <figure>
              <img src="<?= PATH ?>images/review/1.jpg" alt="" class="img-circle" style="width:100px;" id="user-img">
            </figure>
          </center>
          <br>

          <h5 style="text-align:center;"><strong id="user-name"><?= $user['personalInfo']->first_name ?> <?= $user['personalInfo']->last_name ?></strong></h5>

          <p style="text-align:center;font-size: smaller;" id="user-frid">ID: <?= $user['info']->id ?> </p>
          <p style="text-align:center;font-size: smaller;" id="user-frid">Mobile: <?= $user['personalInfo']->phone ?> </p>

          <p style="text-align:center;font-size: smaller;overflow-wrap: break-word;" id="user-email"><?= $user['personalInfo']->personal_email ?></p>

          <p style="text-align:center;font-size: smaller;overflow-wrap: break-word;" id="user-email"><?= $user['personalInfo']->address ?>, <?= $user['personalInfo']->zip ?>,<?= $user['personalInfo']->city ?>,<?= $user['personalInfo']->state ?>,<?= $user['personalInfo']->country ?></p>

          <p style="text-align:center;font-size: smaller;"><strong>A/C status: </strong><span class="tags" id="user-status">Active</span></p>

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
          <p style="text-align:center;font-size: smaller;"><strong>Hospital Name</strong></p>
          <p style="text-align:center;font-size: smaller;" id="user-role"><?= $user['personalInfo']->hospital ?></p>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
          <div class="col-lg-6 left" style="text-align:center;overflow-wrap: break-word;">
            <h4>
              <p style="text-align: center;"><strong id="user-globe-rank">245 </strong></p>
            </h4>
            <p><small class="label label-success">Your Profile Ranking</small></p>
            <!--<button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button>-->
          </div>
          <div class=" col-lg-6 left" style="text-align:center;overflow-wrap: break-word;">
            <h4>
              <p style="text-align: center;"><strong id="user-college-rank">245 </strong></p>
            </h4>
            <p> <small class="label label-warning">Your Profile Viwe</small></p>
            <!-- <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>-->
          </div>
          <br>
          <br>
          <br>




          <a href="<?= PATH ?>ui/user" class="list-group-item">
            Your Profile</a>
          <a href="<?= PATH ?>ui/contact" class="list-group-item">
            Your Profile Edit</a>
          <a href="<?= PATH ?>ui/user" class="list-group-item">
            Your Order History</a>
          <a href="<?= PATH ?>ui/user" class="list-group-item">
            Latest Offer</a>

        </div>


      </div>
      <div class="col-md-9">
        <!-- Your Profile Over View -->
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg text-center">

            <h3 class="panel-title" style="font-size: 25px;color: #66cc00">Your Profile Overview</h3>
          </div>
          <div class="panel-body">
            <div class="col-md-4">
              <p style="font-size:20px;">
                <span class="tags" id="user-status">Your Information </span>
                <br>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> First Name:-</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['personalInfo']->first_name ?></h4>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Last Name:-</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['personalInfo']->last_name ?></h4>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Hospital Name:-</h4>
                <h4 style="padding-top: 5px;color: #66cc00"><?= $user['personalInfo']->hospital ?></h4>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Position:-</h4>
                <h4 style="padding-top: 5px;color: #66cc00">managing Director</h4>
              </p>
              <br>

            </div>
            <div class="col-md-4">
              <p style="font-size:20px;">
                <span class="tags" id="user-status">Your Contact Info </span>
                <br>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Mobile:-</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['personalInfo']->phone ?></h4>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Your Email:-</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['info']->email ?></h4>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Home Address:-</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['personalInfo']->address ?>, <?= $user['personalInfo']->zip ?>,<?= $user['personalInfo']->city ?>,<?= $user['personalInfo']->state ?>,<?= $user['personalInfo']->country ?></h4>
              </p>
              <br>

            </div>
            <div class="col-md-4">
              <p style="font-size:20px;">
                <span class="tags" id="user-status">Your Shapping Address </span>
                <br>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Your Hospital Address:-</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['personalInfo']->address ?>, <?= $user['personalInfo']->zip ?>,<?= $user['personalInfo']->city ?>,<?= $user['personalInfo']->state ?>,<?= $user['personalInfo']->country ?></h4>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Shapping Address:-</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['personalInfo']->address ?>, <?= $user['personalInfo']->zip ?>,<?= $user['personalInfo']->city ?>,<?= $user['personalInfo']->state ?>,<?= $user['personalInfo']->country ?></h4>

              </p>
              <br>

            </div>

          </div>
        </div>


        <!-- Order History -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text-center" style="font-size: 25px;color: #66cc00">Your Order History</h3>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-hover">
              <tr style="color: #006687;">
                <th>Token Number</th>
                <th>Products Discription</th>
                <th>Total Amount</th>
                <th>Order Date</th>
              </tr>

              <?php
              if (isset($data['products'])) {

                foreach ($data['products'] as $product) {
              ?>
                  <tr>
                    <td><?= $product->order_token ?></td>
                    <td><?= $product->name ?> ( Qty:<?= $product->qty ?> )</td>
                    <td>Tk. <?= $product->price * $product->qty ?></td>
                    <td><?= $user['orders']->date ?></td>
                  </tr>


              <?php
                }
              }
              ?>

            </table>
          </div>
        </div>

        <!-- Latest News -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text-center" style="font-size: 25px;color: #66cc00"> Your Latest News</h3>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-hover">
              <tr style="color: #006687;">
                <th>News Number</th>
                <th>News Discription</th>
                <th>News Date</th>
                <th>Full View</th>
              </tr>

              </tr>
            </table>
          </div>
        </div>


      </div>
    </div>
  </div>
</section>



<?php
include_once "../app/views/partial/footer.php";
?>