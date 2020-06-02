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

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="<?= PATH ?>admin/addProduct">Add Products</a></li>
          <li><a href="/admin/message">Message</a></li>
          <li><a href="productlist.html">Products List</a></li>
          <li><a href="addblog.html">Add Blog</a></li>
          <li><a href="bloglist.html">blog List</a></li>
          <li><a href="companyinfo.html">Company Info</a></li>
          <li><a href="usercontrol.html">User Control</a></li>
          <li><a href="userprofile.html">User Profile List</a></li>
          <li><a href="orderlist.html">Order List</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="login.html">Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1>Medical Shop Bangladesh</h1>
        </div>
        <div class="col-md-2">
          <div class="dropdown create">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Create Content
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a type="button" data-toggle="modal" data-target="#addPage">Add Products</a></li>
              <li><a type="button" data-toggle="modal" data-target="#addPage">Add Blog</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="index.html" class="list-group-item active main-color-bg">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
            </a>
            <a href="addproduct.html" class="list-group-item">
              <span class="glyphicon glyphicon-list-alt" aria-hidden="true">
              </span> Add products <span class="badge">12</span></a>
            <a href="productlist.html" class="list-group-item">
              <span class="glyphicon glyphicon-user" aria-hidden="true">
              </span> Products List <span class="badge">203</span></a>
            <a href="addblog.html" class="list-group-item">
              <span class="glyphicon glyphicon-list-alt" aria-hidden="true">
              </span> Add Blog <span class="badge">12</span></a>
            <a href="bloglist.html" class="list-group-item">
              <span class="glyphicon glyphicon-user" aria-hidden="true">
              </span> Blog list <span class="badge">203</span></a>
            <a href="companyinfo.html" class="list-group-item">
              <span class="glyphicon glyphicon-list-alt" aria-hidden="true">
              </span> Company Info <span class="badge">12</span></a>
            <a href="usercontrol.html" class="list-group-item">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true">
              </span> User Control <span class="badge">33</span></a>
            <a href="userprofile.html" class="list-group-item">
              <span class="glyphicon glyphicon-user" aria-hidden="true">
              </span> User Profile<span class="badge">203</span></a>
            <a href="orderlist.html" class="list-group-item">
              <span class="glyphicon glyphicon-user" aria-hidden="true">
              </span> Order List<span class="badge">203</span></a>
          </div>

        </div>
        <div class="col-md-9">
          <!-- Website Overview -->
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Website Overview</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 203</h2>
                  <h4> Regstred Users</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 12,334</h2>
                  <h4>Visitors</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 12</h2>
                  <h4>Total Products</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 33</h2>
                  <h4> Total Blog</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 33</h2>
                  <h4>Total Order</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 33</h2>
                  <h4>Panding Order</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 33</h2>
                  <h4>Total Partner</h4>
                </div>
              </div>
            </div>
          </div>

          <!-- Latest Users -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Latest Users</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Joined</th>
                </tr>
                <tr>
                  <td>Jill Smith</td>
                  <td>jillsmith@gmail.com</td>
                  <td>Dec 12, 2016</td>
                </tr>
                <tr>
                  <td>Eve Jackson</td>
                  <td>ejackson@yahoo.com</td>
                  <td>Dec 13, 2016</td>
                </tr>
                <tr>
                  <td>John Doe</td>
                  <td>jdoe@gmail.com</td>
                  <td>Dec 13, 2016</td>
                </tr>
                <tr>
                  <td>Stephanie Landon</td>
                  <td>landon@yahoo.com</td>
                  <td>Dec 14, 2016</td>
                </tr>
                <tr>
                  <td>Mike Johnson</td>
                  <td>mjohnson@gmail.com</td>
                  <td>Dec 15, 2016</td>
                </tr>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>



  <footer id="footer">
    <p>Copyright Medical Shop Bangladesh, &copy; 2017</p>
  </footer>

  <!-- Modals -->

  <!-- Add Page -->
  <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Page</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Page Title</label>
              <input type="text" class="form-control" placeholder="Page Title">
            </div>
            <div class="form-group">
              <label>Page Body</label>
              <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Published
              </label>
            </div>
            <div class="form-group">
              <label>Meta Tags</label>
              <input type="text" class="form-control" placeholder="Add Some Tags...">
            </div>
            <div class="form-group">
              <label>Meta Description</label>
              <input type="text" class="form-control" placeholder="Add Meta Description...">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    CKEDITOR.replace('editor1');
  </script>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>