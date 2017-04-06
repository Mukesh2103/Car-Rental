<?php
include "user_home_header.php";
?>
<html>
	<head>
		<title>Car List</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
	</head>
	<body style="background-image:url('images/pic05.jpg')">
	
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
              <a class="navbar-brand" href="user_Home.php">Car Hiring Services</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
              <li><a href="user_Home.php">Home</a></li>
                <li><a href="carlist_user.php">Hire a Car</a></li>
                <li class="active"><a href="response.php">Response</a></li>
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
        <div class="jumbotron">
	      <div class="container">
	      	<?php
	      		include "connection.php";
	      		if(isset($_SESSION['uid']))
	      			$id=$_SESSION['uid'];
	      		$query="SELECT * FROM `user_table` WHERE id=:id";
	      		$stmt=$db->prepare($query);
	      		$stmt->bindparam(':id',$id);
	      		$stmt->execute();
	      		$car_request=$car_allocate=0;
	      		foreach ($stmt as $row)
	      		{
	      			$car_request=$row['car_request'];
	      			$car_alloted=$row['car_alloted'];
	      		}
	      		if(($car_request=='Yes')&&($car_alloted=='No'))
	      		{
	      			echo"<h1>Car Hire Request is submitted.</h1>
	      			<p>Thank You! to choose our service.Your car hire request is submitted sucessfully.In some time our team will inform you about your Car Hire Request</p>";
	      		}
	      		if(($car_request=='No')&&($car_alloted=='Yes'))
	      		{
	      			echo"<h1>Car Hire Request is approved.</h1>
	      			<p>Your car hire request is approved sucessfully.We will call you and give some information soon.</p>";
	      		}
	      		if(($car_request=='No')&&($car_alloted=='No'))
	      		{
	      			echo"<h1>Car is Returned.</h1>
	      			<p>Thank You for choosing our services.If you like our services then please give your feedback.We will be honoured to provide our services to you again.<br/>A message is sent to you on your registered phone no. stating your journey expenses.</p>";
	      		}
	      	?>
	        <!--<h1>Hello, world!</h1>
	        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
	        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>-->
	      </div>
	    </div>
	    
      </div>
    </div>
    </body>
</html>
<?php include"Index_footer.php";?>