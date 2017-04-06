<?php 
include"employees_home_header.php";
?>

<html>
	<head>
		<title>Car List</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body style="background-image:url('images/pic05.jpg')">
	<!-- NAVBAR
================================================== -->
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
                <li><a href="employees_Home.php">Home</a></li>
                <li class="active"><a href="carlist_employees.php">Cars</a></li>
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
<!-- ======================================================================================= -->	
    
    
		<?php
			include "connection.php";
			$query="SELECT*FROM`car_list`";
			$stmt=$db->query($query);
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='D')
				{
					echo"<script>alert('Car Deleted Successfully')</script>";
				}
			}
		?>
		<br/><br/>
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
				<th>Total Cars</th>
				<th>Available Cars</th>
				<th colspan=4>Operations</th>
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
					echo"<td>".$row['no_cars']."</td>";
					echo"<td>".$row['free_cars']."</td>";
					if($row['no_cars']>0)
					{
						echo"<td><a href='editcars_employees.php?id=".$row['id']."'>Edit Details</a></td>";
						echo"<td><a href='addcars_employees.php?id=".$row['id']."'>Add Cars</a></td>";
						echo"<td><a href='removecars_employees.php?id=".$row['id']."'>Remove Cars</a></td>";
						if($row['no_cars']==$row['free_cars'])
							echo"<td><a href='deletecars_employees.php?id=".$row['id']."'>Remove Car Model and All Cars</a></td></tr>";
						else
							echo"<td>Sorry!All Car is not present in stock.</td></tr>";
					}
					else
					{
						echo"<td colspan=2>Cars are not available</td>";
						echo"<td><a href='addcars_employees.php?id=".$row['id']."'>Add Cars</a></td></tr>";
						echo"<td><a href='deletecars_employees.php?id=".$row['id']."'>Remove Car Model and All Cars</a></td></tr>";
					}
					++$sno;
				}
			?>
			</tbody>
		</table>
		</div>
	</body>
</html>
<?php include"Index_footer.php";?>