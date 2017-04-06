<?php
session_start();
if(isset($_REQUEST['id']))
	$uid=$_REQUEST['id'];
$rent_fuel=0;
?>
<html>	
	<head>
		<title>Hired Car Details</title>
		<!-- Bootstrap core CSS -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
    	<link href="css/signup.css" rel="stylesheet">
	</head>
	<body style="background-image: url('images/pic04.jpg')">
		<?php
			include "connection.php";
			
			$query="SELECT*FROM`user_table` WHERE id=:id";
			$stmt=$db->prepare($query);
			$stmt->bindparam(':id',$uid);
			$stmt->execute();
			$uname=$umobile=$uemail=$total_rent="";
			foreach($stmt as $row)
			{
				$uname=$row['uname'];
				$umobile=$row['umobile'];
				$uemail=$row['uemail'];
				$total_rent=$row['total_rent'];
			}
			
			$query="SELECT*FROM`car_hire` WHERE uid=:uid";
			$stmt=$db->prepare($query);
			$stmt->bindparam(':uid',$uid);
			$stmt->execute();
			$id=$cid=$address=$from=$where=$no_days="";
			foreach($stmt as $row)
			{
				$id=$row['id'];
				$cid=$row['cid'];
				$address=$row['address'];
				$from=$row['from'];
				$where=$row['where'];
				$no_days=$row['no_days'];
			}
			
			$query="SELECT*FROM`car_list` WHERE id=:id";
			$stmt=$db->prepare($query);
			$stmt->bindparam(':id',$cid);
			$stmt->execute();
			$car_name=$company_name=$seats=$fuel=$rent_day=$rent_km=$no_cars="";
			foreach($stmt as $row)
			{
				$car_name=$row['car_name'];
				$company_name=$row['company_name'];
				$seats=$row['seats'];
				$fuel=$row['fuel'];
				$rent_day=$row['rent_day'];
				$rent_km=$row['rent_km'];
				$no_cars=$row['no_cars'];
			}
			
		?>
		<div class="container">
     	<form action="return_car_save.php" method="post" class="form-signup" onsubmit="return validating()">
     	<input type="hidden" id="uid" name="uid" value="<?php echo $uid;?>">
     	<input type="hidden" id="cid" name="cid" value="<?php echo $cid;?>">
     	<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
        <h2 align="center" class="form-signup-heading">Hired Car Details</h2><br/>
        <table align="center" width="150%">
        	<tr>
				<td><h4>User Name:</h4></td>
				<td><h4><?php echo $uname;?></h4></td>
			</tr>
			<tr>
				<td><h4>Mobile no.:</h4></td>
				<td><h4><?php echo $umobile;?></h4></td>
			</tr>
			<tr>
				<td><h4>Email id:</h4></td>
				<td><h4><?php echo $uemail;?></h4></td>
			</tr>
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
				<td><h4>Address:</h4></td>
				<td><h4><?php echo $address;?></h4></td>
			</tr>
			<tr>
				<td><h4>From:</h4></td>
				<td><h4><?php echo $from;?></h4></td>
			</tr>
			<tr>
				<td><h4>Where:</h4></td>
				<td><h4><?php echo $where;?></h4></td>
			</tr>
			<tr>
				<td><h4>No. of Days:</h4></td>
				<td><h4><?php echo $no_days;?></h4></td>
			</tr>
			<tr>
				<td><h4>Enter Km.:</h4></td>
				<td>
					<label for="inputKm" class="sr-only">Enter Km.</label>
        			<input type="text" id="no_km" name="no_km" class="form-control" placeholder="Enter Km." required>
        		</td>
			</tr>
			<!-- <tr>
				<td colspan="2">
					<input type="checkbox" name="calculate" id="calculate" value="calculate"> Calculate Total Rent
				</td>
			</tr>-->
			<tr class='btn btn-lg btn-default btn-block'>
				<td><h4>Rent of Car:<br/><h6>(Without including fuel cost)</h6></h4></td>
				<td><h4><?php echo $total_rent;?></h4></td>
			</tr>
			<script> if(document.getElementByID(calculate.id)=='calculate')
			{
				$rent_fuel=$km*$rent_km;
				$total_rent=$total_rent+$rent_fuel;
				
				echo "<tr>
						<td><h4>Rent of Fuel:</h4></td>
						<td><h4>$rent_fuel</h4></td>
					</tr>";
				
				echo"<tr>
						<td><h4>Total Rent:</h4></td>
						<td><h4>".$total_rent."</h4></td>
					</tr>";
			}</script>
			<!-- <tr>
				<td colspan="2">
					<button class="btn btn-lg btn-primary btn-block" type="button"">Calculate Rent</button>
				</td>
			</tr>-->
			<input type="hidden" id="total_rent" name="total_rent" class="form-control">
			<tr>
				<td colspan="2">
					<button class="btn btn-lg btn-primary btn-block" type="submit">Return a Car</button>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php 
						if(isset($_SESSION['type']))
						{
							if($_SESSION['type']=='Admin')
								echo"<a class='btn btn-lg btn-success btn-block' href='userlist.php'>Back</a>";
							elseif ($_SESSION['type']=='Employee')
								echo"<a class='btn btn-lg btn-success btn-block' href='userlist_employee.php'>Back</a>";
						}
					?>
				</td>
			</tr>
		</table>
		</form>
				
    	</div> <!-- /container -->
	</body>
</html>