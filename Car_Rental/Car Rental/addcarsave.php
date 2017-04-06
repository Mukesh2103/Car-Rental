<?php
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
		$no_cars = $_POST['no_cars'];
		$no_cars = filter($no_cars);
		$free_cars = $_POST['free_cars'];
		$free_cars = filter($free_cars);
		$no_add_cars=$_POST['no_add_cars'];
		$no_add_cars=filter($no_add_cars);
		$no_cars=($no_cars+$no_add_cars);
		$free_cars=($free_cars+$no_add_cars);
		
		$query="UPDATE `car_list` SET `no_cars`=:no_cars,`free_cars`=:free_cars WHERE id=:id";
		try
		{
			$stmt=$db->prepare($query);
			$stmt->bindparam(':no_cars',$no_cars);
			$stmt->bindparam(':free_cars',$free_cars);
			$stmt->bindparam(':id',$id);
			$stmt->execute();
			header('location:addcars.php?check=A');
		}catch(Exception $e)
		{
			echo"Addition failed.".$e;
		}
	}
?>