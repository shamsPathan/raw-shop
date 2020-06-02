<?php
//print_r($data['products']);
//exit;
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

          <h5 style="text-align:center;"><strong id="user-name"><?= $user['fname']?> <?= $user['lname']?></strong></h5>

          <p style="text-align:center;font-size: smaller;" id="user-frid">ID: <?= $user['id'] ?> </p>
          <p style="text-align:center;font-size: smaller;" id="user-frid">Mobile: <?= $user['phone']?> </p>

          <p style="text-align:center;font-size: smaller;overflow-wrap: break-word;" id="user-email"><?= $user['personal_email'] ?></p>

          <p style="text-align:center;font-size: smaller;overflow-wrap: break-word;" id="user-email"><?= $user['address'] ?>, <?= $user['zip'] ?>,<?= $user['city'] ?>,<?= $user['state'] ?>,<?= $user['country'] ?></p>

          <p style="text-align:center;font-size: smaller;"><strong>A/C status: </strong><span class="tags" id="user-status">Active</span></p>

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
          <p style="text-align:center;font-size: smaller;"><strong>Hospital Name</strong></p>
          <p style="text-align:center;font-size: smaller;" id="user-role"><?= $user['hospital'] ?></p>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
          <br>
          <br>
          <br>

          <a href="<?= PATH ?>ui/dashboard" class="list-group-item">
            Your Profile</a>
          <a href="<?= PATH ?>ui/dashboardEdit" class="list-group-item">
            Your Profile Edit</a>
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

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> First Name</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['fname'] ?></h4>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Last Name</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['lname']?></h4>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Hospital Name</h4>
                <h4 style="padding-top: 5px;color: #66cc00"><?= $user['hospital']?></h4>

                <!-- <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Position</h4>
                <h4 style="padding-top: 5px;color: #66cc00">managing Director</h4> -->
              </p>
              <br>

            </div>
            <div class="col-md-4">
              <p style="font-size:20px;">
                <span class="tags" id="user-status">Your Contact Info </span>
                <br>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Mobile</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['phone']?></h4>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Your Email</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['personal_email']?></h4>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Home Address</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['address']?>, <?= $user['zip']?>,<?= $user['city']?>,<?= $user['state']?>,<?= $user['country'] ?></h4>
              </p>
              <br>

            </div>
            <div class="col-md-4">
              <p style="font-size:20px;">
                <span class="tags" id="user-status">Your Shipping Address </span>
                <br>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Your Hospital Address:-</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['address'] ?>, <?= $user['zip']?>,<?= $user['city']?>,<?= $user['state']?>,<?= $user['country'] ?></h4>

                <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Shipping Address:-</h4>
                <h4 style="padding-top: 5px;color: #66cc00"> <?= $user['address']?>, <?= $user['zip']?>,<?= $user['city']?>,<?= $user['state'] ?>,<?= $user['country'] ?></h4>

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

                foreach ($data['products'] as $key=>$products) {
                  foreach($products as $product){
              ?>
                  <tr>
                    <td><?= $product->order_token ?></td>
                    <td><?= $product->name ?> ( Qty:<?= $product->qty ?> )</td>
                    <td>Tk. <?= $product->price * $product->qty ?></td>
                    <td><?= $user['orders'][$key]['date'] ?></td>
                  </tr>


              <?php
                }
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
              <!--                       <tr>
                        <td>2103256</td>
                        <td>ECG Machine</td>
                        <td>Dec 12, 2016</td>
                        <td><button type="button" class="btn btn-success">Success</button></td>
                      </tr>
 -->
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