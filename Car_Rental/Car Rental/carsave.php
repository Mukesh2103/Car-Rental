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
		$car_name = $_POST['car_name'];
		$car_name = filter($car_name);
		$company_name = $_POST['company_name'];
		$company_name = filter($company_name);
		$seats = $_POST['seats'];
		$seats = filter($seats);
		$fuel = $_POST['fuel'];
		$fuel = filter($fuel);
		$rent_day = $_POST['rent_day'];
		$rent_day = filter($rent_day);
		$rent_km = $_POST['rent_km'];
		$rent_km = filter($rent_km);
		$no_cars = $_POST['no_cars'];
		$no_cars = filter($no_cars);
		$free_cars=$no_cars;
		$query="SELECT*FROM`car_list`WHERE car_name=:car_name AND company_name=:company_name";
		$stmt=$db->prepare($query);
		$stmt->bindparam(':car_name',$car_name);
		$stmt->bindparam(':company_name',$company_name);
		$stmt->execute();
		echo $stmt->rowCount();
		if($stmt->rowCount() > 0)
		{
			header('location:car_register.php?check=N');
			exit();
		}
		
		$query="INSERT INTO `car_list`(`car_name`,`company_name`,`seats`,`fuel`,`rent_day`,`rent_km`,`no_cars`,`free_cars`)
		VALUES(:car_name,:company_name,:seats,:fuel,:rent_day,:rent_km,:no_cars,:free_cars)";
		try
		{
			$stmt=$db->prepare($query);
			$stmt->bindparam(':car_name', $car_name);
			$stmt->bindparam(':company_name', $company_name);
			$stmt->bindparam(':seats', $seats);
			$stmt->bindparam(':fuel', $fuel);
			$stmt->bindparam(':rent_day', $rent_day);
			$stmt->bindparam(':rent_km', $rent_km);
			$stmt->bindparam(':no_cars',$no_cars);
			$stmt->bindparam(':free_cars',$free_cars);
			$stmt->execute();
			//echo"Saved Successfully";
			header('location:car_register.php?check=Y');
		}catch(Exception $e)
		{
			echo"Insertion failed.".$e;
		}
	}
?>