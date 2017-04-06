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
		$free_cars = $_POST['free_cars'];
		$free_cars = filter($free_cars);
		$free_cars=$no_cars;
		
		$query="UPDATE `car_list` SET `car_name`=:car_name,`company_name`=:company_name,`seats`=:seats,`fuel`=:fuel,`rent_day`=:rent_day,`rent_km`=:rent_km,`no_cars`=:no_cars,`free_cars`=:free_cars WHERE id=:id";
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
			$stmt->bindparam(':id',$id);
			$stmt->execute();
			header('location:editcars.php?check=U');
		}catch(Exception $e)
		{
			echo"Updation failed.".$e;
		}
	}
?>