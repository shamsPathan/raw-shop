<?php
define("PATH", "http://" . $_SERVER['HTTP_HOST'] . "/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Medical Shop Bangladesh</title>
  <!-- Bootstrap core CSS -->
  <link href="<?= PATH ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= PATH ?>css/styleb.css" rel="stylesheet">
  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>
<body>

<header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1><center><b>Medical Shop Bangladesh</b></center></h1>
        </div>
      </div>
    </div>
  </header>



<div class="container"> 
<style>
.dropbtn {
  background-color: #006687;
  color:white;
  padding: 8px;
  font-size: 16px;
  border: 0;
  cursor: pointer;
  position: relative;
}
.dropbtn:hover, .dropbtn:focus {
  background-color: #66cc00;
}
.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 100%;
  overflow: auto;
  box-shadow: 5px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  color:66cc00;
  padding: 5px;
  text-decoration: none;
  font-size: 14px;
  display: block;
}
.dropdown a:hover {
  background-color:66cc00;
}
.show {display: block;}
</style>

<div class="dropdown">
  <button onclick="Function1()" class="dropbtn">Company Section</button>
  <div id="Dropdown1" class="dropdown-content">
    <a href="#home">Add Adminer</a>
    <a href="<?= PATH ?>admin">Adminer List</a>
    <a href="#contact">Partner Add</a>
    <a href="#contact">Partner List</a>
  </div>
</div>

<div class="dropdown">
  <button onclick="Function2()" class="dropbtn">Products Section</button>
  <div id="Dropdown2" class="dropdown-content">
    <a href="<?= PATH ?>admin/addProduct">Add Product</a>
    <a href="<?= PATH ?>admin/productlist">Products List</a>
  </div>
</div>
<div class="dropdown">
  <button onclick="Function3()" class="dropbtn">Doctor Section</button>
  <div id="Dropdown3" class="dropdown-content">
    <a href="#home">Doctor Add</a>
    <a href="#about">Doctor List</a>
  </div>
</div>

<div class="dropdown">
  <button onclick="Function4()" class="dropbtn">Hospital Section</button>
  <div id="Dropdown4" class="dropdown-content">
    <a href="#home">Hospital Add</a>
    <a href="#about">Hospital List</a>
  </div>
</div>

<div class="dropdown">
  <button onclick="Function8()" class="dropbtn">Appionment Section</button>
  <div id="Dropdown8" class="dropdown-content">
    <a href="#home">Appionment List</a>
    <a href="#about">Patient List</a>
  </div>
</div>

<div class="dropdown">
  <button onclick="Function5()" class="dropbtn">Customer Section</button>
  <div id="Dropdown5" class="dropdown-content">
    <a href="#home">Offline Order</a>
    <a href="#about">Order List</a>
    <a href="#about">Delevary List</a>
    <a href="#about">Panding List</a>
    <a href="#about">User List</a>
  </div>
</div>

<div class="dropdown">
  <button onclick="Function6()" class="dropbtn">Blog Section</button>
  <div id="Dropdown6" class="dropdown-content">
    <a href="#home">Add Blog</a>
    <a href="#about">Blog List</a>
  </div>
</div>

<div class="dropdown">
  <button onclick="Function7()" class="dropbtn">Massage Section</button>
  <div id="Dropdown7" class="dropdown-content">
    <a href="<?= PATH ?>/admin/message">General Massage </a>
    <a href="#about">Patient Massage</a>
    <a href="#about">Students Massage</a>
    <a href="#about">Customer Complain</a>
  </div>
</div>




<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function Function1() {
  document.getElementById("Dropdown1").classList.toggle("show");
}

function Function2(){
  document.getElementById("Dropdown2").classList.toggle("show");
}
function Function3(){
  document.getElementById("Dropdown3").classList.toggle("show");
}
function Function4(){
  document.getElementById("Dropdown4").classList.toggle("show");
}
function Function5(){
  document.getElementById("Dropdown5").classList.toggle("show");
}
function Function6(){
  document.getElementById("Dropdown6").classList.toggle("show");
}
function Function7(){
  document.getElementById("Dropdown7").classList.toggle("show");
}
function Function8(){
  document.getElementById("Dropdown8").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</div>
  

 


  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Panel Heading</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <button type="button" class="btn btn-sm btn-primary btn-create">Create New Task</button>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th class="hidden-xs">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr> 
                  </thead>
                  <tbody>
                          <tr>
                            <td align="center">
                              <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                            </td>
                            <td class="hidden-xs">1</td>
                            <td>Master Shine</td>
                            <td>name@domain.com</td>
                          </tr>
                          <tr>
                            <td align="center">
                              <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                            </td>
                            <td class="hidden-xs">1</td>
                            <td>Master Shine</td>
                            <td>name@domain.com</td>
                          </tr>
                          <tr>
                            <td align="center">
                              <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                            </td>
                            <td class="hidden-xs">1</td>
                            <td>Master Shine</td>
                            <td>name@domain.com</td>
                          </tr>
                          <tr>
                            <td align="center">
                              <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                            </td>
                            <td class="hidden-xs">1</td>
                            <td>Master Shine</td>
                            <td>name@domain.com</td>
                          </tr>
                          <tr>
                            <td align="center">
                              <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                            </td>
                            <td class="hidden-xs">1</td>
                            <td>Master Shine</td>
                            <td>name@domain.com</td>
                          </tr>
                        </tbody>
                </table>
            
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">Page 1 of 5
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

</div></div>
</div>


    



  <footer id="footer">
    <p>Copyright Medical Shop Bangladesh, &copy; 2019</p>
  </footer>

  <!-- Modals -->

 


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>






