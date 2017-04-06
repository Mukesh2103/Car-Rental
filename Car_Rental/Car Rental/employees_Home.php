<?php
session_start();
if($_SESSION['type']!='Employee')
	header('location:login.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Employee Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body style="background-image:url('images/pic05.jpg');">
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="employees_Home.php">Car Hiring Services</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="employees_Home.php">Home</a></li>
                <li><a href="carlist_employees.php">Cars</a></li>
                <li><a href="userlist_employees.php">Users</a></li>
                <li><a href="employees_employee.php">Employees</a></li>
                <li><a href="car_register_employees.php">Car registration</a></li>
                <li><a href="addAccount_employees.php">Add Account</a></li>
                <li><a href="edit_account.php">Edit Account</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
              	<li><a class="btn btn-primary" href="logout.php" role="button">Logout</a></li>
              </ul>
            </div>
            <!-- <div id="navbar" class="navbar-collapse collapse">
	          <div class="navbar-form navbar-right">
	            <p><a class="btn btn-primary" href="signup.php" role="button">Sign up</a></p>
	            <p><a class="btn btn-success" href="login.php" role="button">Log in</a></p>
	   		  </div>
	        </div>-->
          </div>
        </nav>

      </div>
    </div>

    

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="images/3.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
            	<h1 style="color:grey;">Welcome Employee</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/1.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>You can register new model of car</h1>
              <p><a class="btn btn-lg btn-primary" href="car_register_employees.php" role="button">Register a Car</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/2.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Add new Account of Employee and User</h1>
              <p><a class="btn btn-lg btn-primary" href="addAccount_employees.php" role="button">Create Account</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="images/images.png" style="width: 140px; height: 140px;">
          <h2>Cars</h2>
          <p>Edit details of cars, add more cars, remove cars and Remove Car Model and all cars of this models.</p>
          <p><a class="btn btn-default" href="carlist_employees.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/download (7).png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Users</h2>
          <p>Manage account of all Users and Activate/Deactivate Account of Users</p>
          <p><a class="btn btn-default" href="userlist_employees.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/download (8).png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Employees</h2>
          <p>View List of all Employees and Team-mates</p>
          <p><a class="btn btn-default" href="employees_employee.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p><h4 style="color:blue;">Developed by:-Mukesh Dewangan and Ashutosh Mishra</h4></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>

<!-- Mirrored from getbootstrap.com/examples/carousel/ by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 10 Mar 2015 07:28:59 GMT -->
</html>