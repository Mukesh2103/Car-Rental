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
		$id=$_POST['id'];
		$id=filter($id);
		$uid=$_POST['uid'];
		$uid=filter($uid);
		$cid=$_POST['cid'];
		$cid=filter($cid);
		
		$query="UPDATE `user_table` SET `car_request`=:car_request WHERE id=:id";
		try
		{
			$car_request='No';
			$stmt=$db->prepare($query);
			$stmt->bindparam(':car_request',$car_request);
			$stmt->bindparam(':id',$uid);
			$stmt->execute();
			
			$query="DELETE FROM `car_hire` WHERE id=:id";
			try
			{
				$stmt=$db->prepare($query);
				$stmt->bindparam(':id',$id);
				$stmt->execute();
			}
			catch(Exception $e)
			{
				echo"Car Hire ID is not deleted.".$e;
			}
			
			if(isset($_SESSION['type']))
			{
				if($_SESSION['type']=='Admin')
					header('location:userlist.php?check=DC');
				elseif ($_SESSION['type']=='Employee')
				{
					header('location:userlist_employees.php?check=DC');
				}
			}
		}
		catch(Exception $e)
		{
			echo"Car Request is not Approved.".$e;
		}
	}
?>