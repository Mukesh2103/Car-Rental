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
		
		$query="UPDATE `user_table` SET `car_request`=:car_request, `car_alloted`=:car_alloted WHERE id=:id";
		try
		{
			$car_request='No';
			$car_alloted='Yes';
			$stmt=$db->prepare($query);
			$stmt->bindparam(':car_request',$car_request);
			$stmt->bindparam(':car_alloted',$car_alloted);
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
			
			$free_cars=$free_cars-1;
			
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
				echo"Car Decreasing Failed.";
			}
			if(isset($_SESSION['type']))
			{
				if($_SESSION['type']=='Admin')
					header('location:userlist.php?check=AC');
				elseif ($_SESSION['type']=='Employee')
				{
					header('location:userlist_employees.php?check=AC');
				}
			}
		}
		catch(Exception $e)
		{
			echo"Car Request is not Approved.".$e;
		}
	}
?>