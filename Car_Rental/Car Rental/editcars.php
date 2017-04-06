<html>
	<head>
		<title>Car Details Updation</title>
		<!-- Bootstrap core CSS -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
    	<link href="css/signup.css" rel="stylesheet">
	</head>
	<body style="background-image: url('images/pic04.jpg')">
		<?php
			include "connection.php";
			if(isset($_REQUEST['id']))
			{
				$id=$_REQUEST['id'];
			}
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='U')
				{
					echo"<script>alert'Updated Successfully'</script>";
					header('location:carlist_admin.php');
				}
			}
			$query="SELECT*FROM`car_list` WHERE id=:id";
			$stmt=$db->prepare($query);
			$stmt->bindparam(':id',$id);
			$stmt->execute();
			$car_name=$company_name=$seats=$fuel=$rent_day=$rent_km=$no_cars=$free_cars="";
			foreach($stmt as $row)
			{
				$car_name=$row['car_name'];
				$company_name=$row['company_name'];
				$seats=$row['seats'];
				$fuel=$row['fuel'];
				$rent_day=$row['rent_day'];
				$rent_km=$row['rent_km'];
				$no_cars=$row['no_cars'];
				$free_cars=$row['free_cars'];
			}
		?>
		<div class="container">
     	<form action="editcarsave.php" method="post" class="form-signup" onsubmit="return validating()">
     	<input type="hidden" name="id" value="<?php echo $id;?>">
        <h2 class="form-signup-heading">Please fill up the form</h2><br/>
        <table align="center" width="150%">
			<tr>
				<td><h4>Car Name:</h4></td>
				<td>
					<label for="inputCName" class="sr-only">Car Name</label>
        			<input type="text" id="car_name" name="car_name" value="<?php echo $car_name;?>" class="form-control" required>
        		</td>
			</tr>
			<tr>
				<td><h4>Car Company Name:</h4></td>
				<td>
					<label for="inputCCName" class="sr-only">Car Company Name</label>
        			<input type="text" id="company_name" name="company_name" value="<?php echo $company_name;?>" class="form-control" required>
        		</td>
			</tr>
			<tr>
				<td><h4>No. of Seats:</h4></td>
				<td>
					<label for="inputSeats" class="sr-only">No. of Seats</label>
        			<input type="number" id="seats" name="seats" value="<?php echo $seats;?>" class="form-control" required>
       			</td>
			</tr>
			<tr>
				<td><h4>Fuel Type:</h4></td>
				<td>
					<label for="inputFuel" class="sr-only">Fuel Type</label>
					<div>
						<?php 
						if($fuel==="Petrol")
						{
	       					echo "<input type='radio' id='fuel' name='fuel' value='Petrol' checked required>:Petrol";
	       					echo "<input type='radio' id='fuel' name='fuel' value='Diesel' required>:Diesel";
						}
						elseif ($fuel==="Diesel")
						{
							echo "<input type='radio' id='fuel' name='fuel' value='Petrol' required>:Petrol";
							echo "<input type='radio' id='fuel' name='fuel' value='Diesel' checked required>:Diesel";
						}
	       				?>
       				</div>
       			</td>
			</tr>
			<tr>
				<td><h4>Rent per Day:</h4></td>
				<td>
					<label for="inputRDay" class="sr-only">Rent per Day</label>
       				<input type="text" id="rent_day" name="rent_day" value="<?php echo $rent_day;?>" class="form-control" required>
       			</td>
			</tr>
			<tr>
				<td><h4>Rent per Km:</h4></td>
				<td>
					<label for="inputRKm" class="sr-only">Rent per Km</label>
       				<input type="text" id="rent_km" name="rent_km" value="<?php echo $rent_km;?>" class="form-control" required>
       			</td>
			</tr>
			<input type="hidden" id="no_cars" name="no_cars" value="<?php echo $no_cars;?>">
			<input type="hidden" id="free_cars" name="free_cars" value="<?php echo $free_cars;?>">
			<tr>
				<td colspan="2">
					<button class="btn btn-lg btn-primary btn-block" type="update">Update</button>
				</td>
			</tr>
		</table>
		</form>
		
		<script src="js/car_register.js"></script>

    	</div> <!-- /container -->
	</body>
</html>