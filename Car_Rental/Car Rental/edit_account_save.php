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
		$upassword = $_POST['upassword'];
		$upassword = filter($upassword);
		$upassword = ($upassword);
		$uid=$_POST['uid'];
		$uid=filter($uid);
		
		$query="UPDATE `user_table` SET `uname`=:uname, `umobile`=:umobile, `upassword`=:upassword WHERE id=:id";
		try 
		{
			$stmt=$db->prepare($query);
			$stmt->bindparam(':uname',$uname);
			$stmt->bindparam(':umobile',$umobile);
			$stmt->bindparam(':upassword',$upassword);
			$stmt->bindparam(':id',$uid);
			$stmt->execute();
			header('location:edit_account.php?check=Y');
		}
		catch(Exception $e)
		{
			echo "Error.".$e;
		}
	}
?>