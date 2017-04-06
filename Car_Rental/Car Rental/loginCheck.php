<?php
session_start();
	function filter($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include 'connection.php';
		$uemail = $_POST['uemail'];
		$uemail = filter($uemail);
		$upass = $_POST['upassword'];
		$upass = filter($upass);
		$upass = ($upass);
		$status = 'Active';
		$sql = "SELECT * FROM `user_table` WHERE `uemail`=:uemail AND `upassword`=:upassword AND `status`=:status";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':uemail',$uemail);
		$stmt->bindParam(':upassword', $upass);
		$stmt->bindParam(':status', $status);
		$stmt->execute();
		
		$count = $stmt->rowCount();
		if($count==0){
			header('location:login.php?check=N');
		}else{
			foreach ($stmt as $row){
				$_SESSION['uid'] = $row['id'];
				$_SESSION['uemail'] = $row['uemail'];
				$_SESSION['type'] = $row['type'];
				if($row['type']=='Admin')
					header('location:admin_Home.php');
				elseif($row['type']=='User')
					header('location:user_Home.php');
				elseif($row['type']=='Employee')
					header('location:employees_Home.php');
				
			 	/*echo "<br/>ID : ".$row['id'];
				echo "<br/>Email : ".$row['uemail'];
				echo "<br/>Type : ".$row['type'];
				echo "<br/>Status : ".$row['status'];
				echo "<br/>Name : ".$row['uname'];*/
			}
		}
	}
	else{
		header('location:login.php');
	}
?>