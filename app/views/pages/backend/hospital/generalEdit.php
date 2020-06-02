<?php
//print_r($data['products']);
//exit;
$user = $_SESSION['user'];
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

          <h5 style="text-align:center;"><strong id="user-name"><?= $user['author'] ?></strong></h5>

          <p style="text-align:center;font-size: smaller;" id="user-frid">ID: <?= $user['user_id'] ?> </p>
          <p style="text-align:center;font-size: smaller;" id="user-frid">Mobile: <?= $user['phone'] ?> </p>

          <p style="text-align:center;font-size: smaller;overflow-wrap: break-word;" id="user-email"><?= $user['email'] ?></p>

          <p style="text-align:center;font-size: smaller;overflow-wrap: break-word;" id="user-email"><?= $user['address'] ?></p>

          <p style="text-align:center;font-size: smaller;"><strong>A/C status: </strong><span class="tags" id="user-status">Active</span></p>

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
          <p style="text-align:center;font-size: smaller;"><strong>Hospital Name</strong></p>
          <p style="text-align:center;font-size: smaller;" id="user-role"><?= $user['name'] ?></p>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
          <br>
          <br>
          <br>
        </div>


      </div>
      <div class="col-md-9">
        <!-- Your Profile Over View -->
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg text-center">

            <h3 class="panel-title" style="font-size: 25px;color: #66cc00">Your Profile Overview</h3>
          </div>
          <form action="/hospital/updateProfile" method="POST">
            <div class="panel-body">
              <div class="col-md-4">
                <p style="font-size:20px;">
                  <span class="tags" id="user-status">Your Information </span>
                  <br>

                  <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Author Name</h4>
                  <input class="form-control" type="text" name="author" value="<?= $user['author']?>">

                  <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Hospital Name</h4>
                  <input class="form-control" type="text" name="name" value="<?= $user['name'] ?>">


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
                  <input class="form-control" type="text" name="phone" value="<?= $user['phone'] ?>">


                  <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Your Email</h4>
                  <input class="form-control" type="text" name="email" value="<?= $user['email'] ?>">

                  <h4 style="padding-top: 10px; color: #006687;font-size:16px"> Address</h4>
                  <input class="form-control" type="text" name="address" value="<?= $user['address'] ?>">
                </p>
                <br>

              </div>
              <div class="col-md-4">
                <p style="font-size:20px;">
                  <br>
                  <h4 style="padding-top: 10px; color: #006687;font-size:16px">Job Title</h4>
                  <input class="form-control" type="text" name="job_title" value="<?= $user['job_title'] ?>">
                  <h4 style="padding-top: 10px; color: #006687;font-size:16px">Gender</h4>
                  <input class="form-control" type="text" name="gender" value="<?= $user['gender'] ?>">
                  <h4 style="padding-top: 10px; color: #006687;font-size:16px">Date Of Birthy</h4>
                  <input class="form-control" type="text" name="dob" value="<?= $user['dob'] ?>">
                </p>
                <br>

                <button class="form-control" type="submit" class="btn btn-success">Save</button>

              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>



<?php
include_once "../app/views/partial/footer.php";
?>