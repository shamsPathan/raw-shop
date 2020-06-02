<?php
include_once "../app/views/partial/header.php";
?>


<div class="topimage">
  <img src="<?=PATH?>images/contact/contactus.jpg" width="100%">
</div>
<!---Include the above in your HEAD tag ---------->
<section id="form">

  <div class="container">


<div class="row">
  <div class="col-lg-3 col-12 col-md-3">
      <h1 style="font-size: 2.5em;">CONTACT US</h1>
  </div>
<div class="col-lg-3 col-12 col-md-3">
<center> <p id="rcorners2">
  <b style="color:#066887;">Sales Department</b>
  <br>
  Email: Sales@medicalshopbd.com<br>
  Monile: +8801734762004
</p> </center>
</div>
<div class="col-lg-3 col-12 col-md-3">
<center> <p id="rcorners2">
<b style="color:#066887;">Service Department</b>
<br>
Email: Service@medicalshopbd.com<br>
Monile: +8801734762004
</p>
</center>
</div>
<div class="col-lg-3 col-12 col-md-3">
<center> <p id="rcorners2">
  <b style="color:#066887;">Refurbished Machine</b>
  <br>
  Email: Ref@medicalshopbd.com<br>
  Monile: +8801734762004
</p>
</center>
</div>

</div>

  <br>
<!--   <div class="form-messege">
    
  </div> -->
  <form  action="<?=PATH?>ui/sendMessage" method="POST">
  <div class="container form-box">
    <div class="row">
      <div class="col-lg-6">
      <div class="form-ara">
        <div class="row">
      <div class="col-lg-6">
        <div class="form-group name">
            <input type="text " class="form-control name-text" id="usr" placeholder="First-name" name="first_name">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group name">
              <input type="text" class="form-control" id="usr" placeholder="last-name" name="last_name">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="form-group phone">
                <input type="email" class="form-control" id="usr" placeholder="Mail" name="email">
              </div>
        </div>
    <div class="row">
        <div class="form-group phone">
            <input type="number" class="form-control .numberInput" id="usr" placeholder="Phone-Number" name="phone">
          </div>
    </div>
    <div class="row">
        <div class="form-group phone">
            <input type="text" class="form-control" id="usr" placeholder="Hospital Name" name="hospital_name">
          </div>
    </div>
    <div class="row">
          <div class="form-group massge">
              <textarea class="form-control" rows="5" placeholder="Message" id="comment" name="message"></textarea>
            </div>
          </div>
      <div class="row">
          
        <div class="col-md-2 col-md-offset-10 ">
          <input class="btn btn-success" type="submit" name="submit" value="Submit">
       </div>
  </div>

<?php

$type = null;

if(isset($_SESSION['contact'])){
  if(isset($_SESSION['contact']['success'])){
    $type="success";
    $message = $_SESSION['contact']['success'];
  }
  else {
    $type="danger";
    $message = $_SESSION['contact']['error'];
  }

?>
      <div class="row" style="margin-top: 10px">
         <div class="col-md-12 alert alert-<?=$type?>" role="alert">
            <?=ucwords($message)?>
        </div>
       </div>
<?php
}
unset($_SESSION['contact']);
?>


</form>
</div>
</div>
  <div class="col-lg-1 empty-div-form"></div>
  <div class="col-lg-5">

    <div class="map-area">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14608.073090354103!2d90.37330806977539!3d23.746727800000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b99d0b5839fb%3A0xb2fddcc4dd400a5f!2sMedical+Shop+Bangladesh!5e0!3m2!1sen!2sbd!4v1555221354356!5m2!1sen!2sbd" width="540" height="470" frameborder="0" style="border:0" allowfullscreen></iframe>

    </div>
  </div>
  </div>
</div>
</section>



<?php
include_once "../app/views/partial/footer.php";
?>
