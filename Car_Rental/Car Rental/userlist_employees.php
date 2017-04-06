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
                <li><a href="carlist_employees.php">Cars</a></li>
                <li class="active"><a href="userlist_employees.php">Users</a></li>
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
			$query="SELECT*FROM`user_table`";
			$stmt=$db->query($query);
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='D')
				{
					echo"<script>alert('Account Deleted Successfully')</script>";
				}
			}
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='ND')
					echo"<script>alert('Account Deletion Failed.This User hired a car.')</script>";
			}
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='AC')
					echo"<script>alert('Car Request Approved Sucessfully.')</script>";
			}
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='DC')
					echo"<script>alert('Car Request Denied Sucessfully.')</script>";
			}
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='RC')
					echo"<script>alert('Car is returned Sucessfully.')</script>";
			}
		?>
		<br/><br/>
		<div class="page-header">
			<h1>User List</h1>
		</div>
		<div class="col-md-12">
		<table class="table table-striped" width="100%">
			<thead>
			<tr>
				<th>S.No.</th>
				<th>User Name</th>
				<th>Mobile No.</th>
				<th>Email Id</th>
				<th>Status</th>
				<th>Car Request</th>
				<th>Car Alloted</th>
				<th colspan=5>Operations</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$sno=1;
				foreach($stmt as $row)
				{
					if($row['type']=='User')
					{
						echo"<tr><td>".$sno."</td>";
						echo"<td>".$row['uname']."</td>";
						echo"<td>".$row['umobile']."</td>";
						echo"<td>".$row['uemail']."</td>";
						echo"<td>".$row['status']."</td>";
						echo"<td>".$row['car_request']."</td>";
						echo"<td>".$row['car_alloted']."</td>";
						if($row['status']=='Active')
							echo"<td><a href='statususer_employees.php?id=".$row['id']."'>De-Activate Account</a></td>";
						elseif ($row['status']=='Denied')
							echo"<td><a href='statususer_employees.php?id=".$row['id']."'>Activate Account</a></td>";
						if(($row['car_request']=='No')&&($row['car_alloted']=='No'))
							echo"<td><a href='deleteuser_employees.php?id=".$row['id']."'>Delete Account</a></td>";
						if(($row['car_alloted']=='No')&&($row['car_request']=='Yes'))
						{
							echo"<td><a href='approve_car_request.php?id=".$row['id']."'>Approve Car Request</a></td>";
							echo"<td><a href='deny_car_request.php?id=".$row['id']."'>Deny Car Request</a></td></tr>";
						}
						elseif($row['car_alloted']=='Yes')
						{
							echo"<td><a href='view_hired_details.php?id=".$row['id']."'>View Hired Car Details</a></td>";
							echo"<td><a href='return_car.php?id=".$row['id']."'>Return a Car</a></td></tr>";
						}							
						++$sno;
					}
				}
			?>
			</tbody>
		</table>
		</div>
	</body>
</html>
<?php include"Index_footer.php";?>