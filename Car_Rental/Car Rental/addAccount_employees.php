<?php 
include"employees_home_header.php";
?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signup Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signup.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  
  </head>

  <body style="background-image: url('images/pic04.jpg')">

    <div class="container">
      <form action="addAccountSave_employees.php" method="post" class="form-signup" onsubmit="return validating()">
        <h2 class="form-signup-heading">Please sign up</h2><br/>
        <?php 
	        if(isset($_REQUEST['check']))
			{
				if($_REQUEST['check']=='N')
					echo "<script>alert('UserId is already present.')</script>";
			}
		?>
        <table align="center" width="125%">
			<tr>
				<td><h4>User Name:</h4></td>
				<td>
					<label for="inputName" class="sr-only">User Name</label>
        			<input type="text" id="uname" name="uname" class="form-control" placeholder="Your Name" required>
        		</td>
			</tr>
			<tr>
				<td><h4>Mobile No.:</h4></td>
				<td>
					<label for="inputMobile" class="sr-only">Mobile No.</label>
					<div class="input-group">
						<span class="input-group-addon">+91</span>
	        			<input type="text" id="umobile" name="umobile" minlength="10" maxlength="10" class="form-control" placeholder="Your Mobile No." required>
        			</div>
        		</td>
			</tr>
			<tr>
				<td><h4>Type:</h4></td>
				<td>
					<label for="inputType" class="sr-only">Type</label>
        			<input type="radio" id="type" name="type" value="Employee" required>:Employee
        			<input type="radio" id="type" name="type" value="User" required>:User
        		</td>
			</tr>
			<tr>
				<td><h4>Email Id:</h4></td>
				<td>
					<label for="inputEmail" class="sr-only">Email address</label>
        			<input type="email" id="uemail" name="uemail" class="form-control" placeholder="Email address" required>
       			</td>
			</tr>
			<tr>
				<td><h4>Password:</h4></td>
				<td>
					<label for="inputPassword" class="sr-only">Password</label>
       				<input type="password" id="upassword" name="upassword" minlength="8" maxlength="15" class="form-control" placeholder="Password" required>
       			</td>
			</tr>
			<tr>
				<td><h4>Retype Password:</h4></td>
				<td>
					<label for="inputRetypePassword" class="sr-only">Password</label>
       				<input type="password" id="urepassword" name="urepassword" minlength="8" maxlength="15" class="form-control" placeholder="Password" required>
       			</td>
			</tr>
			<tr>
				<td colspan="2">
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
				</td>
			</tr>
			<?php
				if(isset($_REQUEST['check']))
				{
					if($_REQUEST['check']=='Y')
					{
						echo"<script>alert('Account added Sucessful.')</script>";
						echo"<tr><td colspan='2'><a class='btn btn-lg btn-success btn-block' href='employees_Home.php'>Click here to go to Home Page</a></td></tr>";
					}
				}
			?>
		</table>
	</form>
	<script src="js/signup.js">
	</script>

    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>