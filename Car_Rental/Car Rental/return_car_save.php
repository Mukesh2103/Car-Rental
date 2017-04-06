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
		$total_rent=$_POST['total_rent'];
		$total_rent=filter($total_rent);
		
		$query="UPDATE `user_table` SET `car_alloted`=:car_alloted, `total_rent`=:total_rent WHERE id=:id";
		try
		{
			$car_alloted='No';
			$stmt=$db->prepare($query);
			$stmt->bindparam(':car_alloted',$car_alloted);
			$stmt->bindparam(':total_rent',$total_rent);
			$stmt->bindparam(':id',$uid);
			$stmt->execute();
			
			$query="SELECT*FROM`car_list` WHERE id=:id";
			$stmt=$db->prepare($query);
			$stmt->bindparam(':id',$cid);
			$stmt->execute();
			foreach ($stmt as $row)
			{
				$free_cars=$row['free_cars'];
			}
			
			$free_cars=$free_cars+1;
			
			$query="UPDATE `car_list` SET `free_cars`=:free_cars WHERE id=:id";
			try
			{
				$stmt=$db->prepare($query);
				$stmt->bindparam(':free_cars',$free_cars);
				$stmt->bindparam(':id',$cid);
				$stmt->execute();
			}
			catch(Exception $e)
			{
				echo"Car Increasing Failed.";
			}
			
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
					header('location:userlist.php?check=RC');
				elseif ($_SESSION['type']=='Employee')
				{
					header('location:userlist_employees.php?check=RC');
				}
			}
		}
		catch(Exception $e)
		{
			echo"Car return process is failed.".$e;
		}
	}
?>