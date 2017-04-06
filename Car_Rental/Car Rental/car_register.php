<?php 
include"admin_home_header.php";
?>

<html>
	<head>
		<title>Car Registration</title>
		<!-- Bootstrap core CSS -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
    	<link href="css/signup.css" rel="stylesheet">
	</head>
	<body style="background-image: url('images/pic04.jpg')">
		<div class="container">
     	<form action="carsave.php" method="post" class="form-signup" onsubmit="return validating()">
        	<h2 class="form-signup-heading">Please fill up the form</h2><br/>
        <?php
        	if(isset($_REQUEST['check']))
        	{
        		if($_REQUEST['check']=='N')
        		{
        			echo "<script>alert('Model of this Car is already present.')</script>";
        		}
        	} 
        ?>
        <table align="center" width="150%">
			<tr>
				<td><h4>Car Name:</h4></td>
				<td>
					<label for="inputCName" class="sr-only">Car Name</label>
        			<input type="text" id="car_name" name="car_name" class="form-control" placeholder="Car Name" required>
        		</td>
			</tr>
			<tr>
				<td><h4>Car Company Name:</h4></td>
				<td>
					<label for="inputCCName" class="sr-only">Car Company Name</label>
        			<input type="text" id="company_name" name="company_name" class="form-control" placeholder="Car Company Name" required>
        		</td>
			</tr>
			<tr>
				<td><h4>No. of Seats:</h4></td>
				<td>
					<label for="inputSeats" class="sr-only">No. of Seats</label>
        			<input type="number" id="seats" name="seats" class="form-control" placeholder="No. of Seats" required>
       			</td>
			</tr>
			<tr>
				<td><h4>Fuel Type:</h4></td>
				<td>
					<label for="inputFuel" class="sr-only">Fuel Type</label>
					<div>
	       				<input type="radio" id="fuel" name="fuel" value="Petrol" required>:Petrol
	       				<input type="radio" id="fuel" name="fuel" value="Diesel" required>:Diesel
       				</div>
       			</td>
			</tr>
			<tr>
				<td><h4>Rent per Day:</h4></td>
				<td>
					<label for="inputRDay" class="sr-only">Rent per Day</label>
       				<input type="text" id="rent_day" name="rent_day" class="form-control" placeholder="Rent per Day" required>
       			</td>
			</tr>
			<tr>
				<td><h4>Rent per Km:</h4></td>
				<td>
					<label for="inputRKm" class="sr-only">Rent per Km</label>
       				<input type="text" id="rent_km" name="rent_km" class="form-control" placeholder="Rent per Km" required>
       			</td>
			</tr>
			<tr>
				<td><h4>No. of Cars:</h4></td>
				<td>
					<label for="inputNoCars" class="sr-only">No. of Cars</label>
       				<input type="text" id="no_cars" name="no_cars" class="form-control" placeholder="No. of Cars" required>
       			</td>
			</tr>
			<tr>
				<td colspan="2">
					<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
				</td>
			</tr>
			<?php
				if(isset($_REQUEST['check']))
				{
					if($_REQUEST['check']=='Y')
					{
						echo"<script>alert('Register Sucessful.')</script>";
						echo"<tr><td colspan='2'><a class='btn btn-lg btn-success btn-block' href='admin_Home.php'>Click here to go to Home Page</a></td></tr>";
					}
				}
			?>
		</table>
		</form>
		
		<script src="js/car_register.js"></script>

    	</div> <!-- /container -->
	</body>
</html>