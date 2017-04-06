<?php
session_start();
if(isset($_REQUEST['id']))
	$uid=$_REQUEST['id'];
?>
<html>	
	<head>
		<title>Car Hire Request Details</title>
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
			$uname=$umobile=$uemail="";
			foreach($stmt as $row)
			{
				$uname=$row['uname'];
				$umobile=$row['umobile'];
				$uemail=$row['uemail'];
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
		<form class="form-signup">
     	<h2 align="center" class="form-signup-heading">Car Hire Request Details</h2><br/>
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