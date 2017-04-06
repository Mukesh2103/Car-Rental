<?php 
session_start();
if(isset($_SESSION['type']))
{
	if($_SESSION['type']!="User")
		header('location:carlist.php');
}
else
	header('location:carlist.php?check=Y');	
?>
<html>	
	<head>
		<title>Details entering for Car hiring</title>
		<!-- Bootstrap core CSS -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
    	<link href="css/signup.css" rel="stylesheet">
	</head>
	<body style="background-image: url('images/pic04.jpg')">
		<?php
			include "connection.php";
			if(isset($_REQUEST['check']))
			{
				if ($_REQUEST['check']=='N')
				{
					echo "<script>alert('You have already hired a car.')</script>";
					if(isset($_GET['id']))
						$cid=$_REQUEST['id'];
				}
				if ($_REQUEST['check']=='Y')
				{
					echo "<script>alert('Form is submitted Sucessfully.')</script>";
					if(isset($_GET['id']))
						$cid=$_REQUEST['id'];
				}
			}
			if(isset($_REQUEST['id']))
				$cid=$_REQUEST['id'];
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
			
			if(isset($_SESSION['uid']))
				$uid=$_SESSION['uid'];
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
		?>
		<div class="container">
     	<form action="car_hiresave.php" method="post" class="form-signup" onsubmit="return validating()">
     	<input type="hidden" id="uid" name="uid" value="<?php echo $uid;?>">
     	<input type="hidden" id="cid" name="cid" value="<?php echo $cid;?>">
        <h2 class="form-signup-heading">Please fill up the form</h2><br/>
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
				<td>
					<label for="inputAddress" class="sr-only">Address</label>
        			<input type="text" id="address" name="address" class="form-control" placeholder="Your Address" required>
        		</td>
			</tr>
			<tr>
				<td><h4>From:</h4></td>
				<td>
					<label for="inputFrom" class="sr-only">From</label>
        			<input type="text" id="from" name="from" class="form-control" placeholder="Pickup Place" required>
        		</td>
			</tr>
			<tr>
				<td><h4>Where:</h4></td>
				<td>
					<label for="inputWhere" class="sr-only">Where</label>
        			<input type="text" id="where" name="where" class="form-control" placeholder="Places where want to go" required>
        		</td>
			</tr>
			<tr>
				<td><h4>No. of Days:</h4></td>
				<td>
					<label for="inputNo_Days" class="sr-only">No. of Days</label>
        			<input type="number" id="no_days" name="no_days" class="form-control" required>
        		</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<button class="btn btn-lg btn-primary btn-block" type="update">Submit</button>
				</td>
			</tr>
			<?php
				if(isset($_REQUEST['check']))
				{
					if($_REQUEST['check']=='Y'||$_REQUEST['check']=='N')
					{
						echo"<tr>
								<td colspan='2' class='btn btn-lg btn-default btn-block'><h4>Rent of Car:".$row['total_rent']."</h4><br/><h6>(without including fuel cost)</h6></td></tr>";
						echo"<tr><td colspan='2'><a class='btn btn-lg btn-success btn-block' href='user_Home.php'>Click here to go to Home Page</a></td></tr>";
					}
				}
			?>
		</table>
		</form>
		<script>
        	function validating()
        	{
        		if(address_match(document.getElementById('address')))
        		{
	           		if(from_match(document.getElementById('from')))
	           		{	
	           			if(where_match(document.getElementById('where')))
	           			{
	           				if(no_days_match(document.getElementById('no_days')))
	           				{
	   							return true;
	           				}
						}
					}
					return false;
        		}
		 		else
           			return false;
			}

        	/*function address_match(obj_address)
    		{
		    	var address_format = /^[A-Za-z0-9.,- ]+$/;
		    	var address = obj_address.value;
		    	if(address.match(address_format))
		    		return true;
		    	else
			    {
		    		alert("Enter Characters Only");
		    		obj_address.focus();
		    		return false;
		    	}
    		}*/
    		
    		function from_match(obj_from)
    		{
		    	var from_format = /^[A-Za-z0-9 ]+$/;
		    	var from = obj_from.value;
		    	if(from.match(form_format))
		    		return true;
		    	else
			    {
		    		alert("Enter Characters Only");
		    		obj_from.focus();
		    		return false;
		    	}
    		}

    		function where_match(obj_where)
    		{
		    	var where_format= /^[A-Za-z0-9 ]+$/;
		    	var where = obj_where.value;
		    	if(where.match(where_format))
		    		return true;
		    	else
			    {
		    		alert("Enter Characters Only");
		     		obj_where.focus();
		    		return false;
		    	}
    		}
    
      		function no_days_match(obj_no_days)
      		{
		    	var numbers1 = /^\d{1}$/;
				var numbers2 = /^\d{2}$/;
		    	var no_days = obj_no_days.value;
		    	if(no_days.match(numbers1)||no_days.match(numbers2))
		    		return true;
		    	else
			    {
		    		alert("Enter Numeric details only");
		    		obj_no_days.focus();
		    		return false;
		    	}
    		}

		</script>
		
    	</div> <!-- /container -->
	</body>
</html>		