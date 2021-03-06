<html>
	<head>
		<title>Add New Cars</title>
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
				if($_REQUEST['check']=='A')
				{
					echo"<script>alert('New Car Added Successfully')</script>";
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
     	<form action="addcarsave.php" method="post" class="form-signup" onsubmit="return validating()">
     	<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
        <h2 class="form-signup-heading">Please fill up the form</h2><br/>
        <table align="center" width="150%">
			<tr>
				<td><h4>Car Name:</h4></td>
				<td><h4><?php echo $car_name;?></h4></td>
			</tr>
			<tr>
				<td><h4>Car Company Name:</h4></td>
				<td><h4><?php echo $company_name;?></h4></td>
				</tr>
			<tr>
				<td><h4>No. of Seats:</h4></td>
				<td><h4><?php echo $seats;?></h4></td>
			</tr>
			<tr>
				<td><h4>Fuel Type:</h4></td>
				<td>
					<label for="inputFuel" class="sr-only">Fuel Type</label>
					<div>
						<?php 
						if($fuel==="Petrol")
	       					echo "<input type='radio' id='fuel' name='fuel' value='Petrol' checked required>:Petrol";
						elseif ($fuel==="Diesel")
							echo "<input type='radio' id='fuel' name='fuel' value='Diesel' checked required>:Diesel";
	       				?>
       				</div>
       			</td>
			</tr>
			<tr>
				<td><h4>Rent per Day:</h4></td>
				<td><h4><?php echo $rent_day;?></h4></td>
			</tr>
			<tr>
				<td><h4>Rent per Km:</h4></td>
				<td><h4><?php echo $rent_km;?></h4></td>
			</tr>
			<tr>
				<td><h4>No. of Cars:</h4></td>
				<td><h4><?php echo $no_cars;?></h4></td>
				<input type="hidden" id="no_cars" name="no_cars" value="<?php echo $no_cars;?>">
			</tr>
			<input type="hidden" id="free_cars" name="free_cars" value="<?php echo $free_cars;?>">
			<tr>
				<td><h4>No. of new Cars:</h4></td>
				<td>
					<label for="inputNoNewCars" class="sr-only">No. of new Cars</label>
       				<input type="text" id="no_add_cars" name="no_add_cars" placeholder="No. of new Cars" class="form-control" required>
       			</td>
			</tr>
			<tr>
				<td colspan="2">
					<button class="btn btn-lg btn-primary btn-block" type="update">Add</button>
				</td>
			</tr>
		</table>
		</form>
		
		<script>
			function validating()
			{
				if(add_cars_match(document.getElementById('no_add_cars'))
					return true;
				else
					return false;
			}
			function add_cars_match(obj_add_cars)
			{
				var no_add_cars_format=/^[0-9]+$/;
				var no_add_cars=obj_add_cars.value;
				if(no_add_cars.match(no_add_cars_format))
					return true;
				else
				{
					alert("Enter number only.");
					obj_add_cars.focus();
					return false;
				}
			}
		</script>

    	</div> <!-- /container -->
	</body>
</html>		