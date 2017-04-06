<?php include"admin_home_header.php";?>
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
              <a class="navbar-brand" href="admin_Home.php">Car Hiring Services</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="admin_Home.php">Home</a></li>
                <li><a href="carlist_admin.php">Cars</a></li>
                <li><a href="userlist.php">Users</a></li>
                <li class="active"><a href="employees.php">Employees</a></li>
                <li><a href="car_register.php">Car registration</a></li>
                <li><a href="addAccount.php">Add Account</a></li>
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
		include"connection.php";
			$query="SELECT*FROM`user_table`";
			$stmt=$db->query($query);
			if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='D')
				{
					echo"<script>alert('Account Deleted Successfully')</script>";
				}
			}
		?>
		<br/><br/>
		<div class="page-header">
			<h1>Employees List</h1>
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
				<th colspan=2>Operations</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$sno=1;
				foreach($stmt as $row)
				{
					if($row['type']=='Employee')
					{
						echo"<tr><td>".$sno."</td>";
						echo"<td>".$row['uname']."</td>";
						echo"<td>".$row['umobile']."</td>";
						echo"<td>".$row['uemail']."</td>";
						echo"<td>".$row['status']."</td>";
						if($row['status']=='Active')
							echo"<td><a href='statusemployees.php?id=".$row['id']."'>De-Activate Account</a></td>";
						elseif ($row['status']=='Denied')
							echo"<td><a href='statusemployees.php?id=".$row['id']."'>Activate Account</a></td>";
						echo"<td><a href='deleteemployees.php?id=".$row['id']."'>Delete Account</a></td></tr>";
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