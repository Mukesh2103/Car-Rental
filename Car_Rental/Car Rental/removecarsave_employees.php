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
		$no_remove_cars=$_POST['no_remove_cars'];
		$no_remove_cars=filter($no_remove_cars);
		if($no_cars>=$no_remove_cars)
		{
			$no_cars=$no_cars-$no_remove_cars;
			$free_cars=$free_cars-$no_remove_cars;
		}
		else
			header('location:removecars_employees.php?check=Y');
		
		$query="UPDATE `car_list` SET `no_cars`=:no_cars,`free_cars`=:free_cars WHERE id=:id";
		try
		{
			$stmt=$db->prepare($query);
			$stmt->bindparam(':no_cars',$no_cars);
			$stmt->bindparam(':free_cars',$free_cars);
			$stmt->bindparam(':id',$id);
			$stmt->execute();
			header('location:removecars_employees.php?check=R');
		}catch(Exception $e)
		{
			echo"Remove operation failed.".$e;
		}
	}
?>