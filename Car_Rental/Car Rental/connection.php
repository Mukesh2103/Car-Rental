<?php
	$dbType="mysql";
	$dbHost="localhost";
	$dbUser="root";
	$dbPassword="";
	$dbName="car_rental";
	try{
		$db=new PDO("$dbType:host=$dbHost;dbname=$dbName;charset=utf8",$dbUser,$dbPassword);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}CATCH(PDOException $e)
	{
		echo"Some error:$e";
	}
	if(!isset($db))
		die(mysql_error());
	else
		//echo"Connected with database.";
?>