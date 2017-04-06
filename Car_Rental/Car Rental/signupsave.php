<?php
	session_start();
	function filter($data)
	{
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		include 'connection.php';
		$uname = $_POST['uname'];
		$uname = filter($uname);
		$umobile = $_POST['umobile'];
		$umobile = filter($umobile);
		$uemail = $_POST['uemail'];
		$uemail = filter($uemail);
		$upassword = $_POST['upassword'];
		$upassword = filter($upassword);
		$upassword = ($upassword);
		$type = 'User';
		$status = 'Active';
		$car_request='No';
		$car_alloted='No';
		
		$query="SELECT*FROM`user_table`WHERE uemail=:uemail";
		$stmt=$db->prepare($query);
		$stmt->bindparam(':uemail',$uemail);
		$stmt->execute();
		echo $stmt->rowCount();
		if($stmt->rowCount() > 0)
		{
			header('location:signup.php?check=N');
			exit();
		}
		
		$query="INSERT INTO `user_table`(`uname`,`umobile`,`uemail`,`upassword`,`type`,`status`,`car_request`,`car_alloted`)
		VALUES(:uname,:umobile,:uemail,:upassword,:type,:status,:car_request,:car_alloted)";
		try
		{
			$stmt=$db->prepare($query);
			$stmt->bindparam(':uname', $uname);
			$stmt->bindparam(':umobile', $umobile);
			$stmt->bindparam(':uemail', $uemail);
			$stmt->bindparam(':upassword', $upassword);
			$stmt->bindparam(':type', $type);
			$stmt->bindparam(':status', $status);
			$stmt->bindparam(':car_request',$car_request);
			$stmt->bindparam(':car_alloted',$car_alloted);
			$stmt->execute();
			header('location:signup.php?check=Y');
			//echo"Saved Successfully";
		}catch(Exception $e)
		{
			//var_dump($e);
			echo"Insertion failed.".$e;
		}
	}
?>