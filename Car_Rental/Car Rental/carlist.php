<?php
	session_start();
	include "Index_header.php";
	if(isset($_REQUEST['check']))
	{
		if($_REQUEST['check']=='Y')
			echo"<script>alert('Please Login first.')</script>";
	}

	if(isset($_SESSION['uid']))
	{
		if($_SESSION['type']=='Admin')
			header('location:admin_Home.php');
		elseif($_SESSION['type']=='User')
			header('location:user_Home.php');
		elseif($_SESSION['type']=='Employee')
			header('location:employees_Home.php');
		exit();
	}	
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
              <a class="navbar-brand" href="Index.php">Car Hiring Services</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="Index.php">Home</a></li>
                <li class="active"><a href="carlist.php">Cars</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
              	<li><a class="btn btn-primary" href="signup.php" role="button">Sign up</a></li>
              	<li><a class="btn btn-success" href="login.php" role="button">Log in</a></li>
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
    <br/><br/>
	
		<?php
			include "connection.php";
			$query="SELECT*FROM`car_list`";
			$stmt=$db->query($query);
		?>
		<div class="page-header">
			<h1>Car List</h1>
		</div>
		<div class="col-md-12">
		<table class="table table-striped" width="100%">
			<thead>
			<tr>
				<th>S.No.</th>
				<th>Car Name</th>
				<th>Car Company</th>
				<th>No. of Seats</th>
				<th>Fuel Type</th>
				<th>Rent per Day</th>
				<th>Rent per Km.</th>
				<th>Available Cars</th>
				<th>Register Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$sno=1;
				foreach($stmt as $row)
				{
					echo"<tr><td>".$sno."</td>";
					echo"<td>".$row['car_name']."</td>";
					echo"<td>".$row['company_name']."</td>";
					echo"<td>".$row['seats']."</td>";
					echo"<td>".$row['fuel']."</td>";
					echo"<td>".$row['rent_day']."</td>";
					echo"<td>".$row['rent_km']."</td>";
					echo"<td>".$row['free_cars']."</td>";
					if($row['free_cars']>0)
					{
						echo"<td><a href='car_hire.php?id=".$row['id']."'>Hire this Car.</a></td></tr>";
					}
					else
						echo"<td>Cars are not available</td></tr>";
					++$sno;
				}
			?>
			</tbody>
		</table>
		</div>
	</body>
</html>
<?php include"Index_footer.php";?>