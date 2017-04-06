<?php
	include 'connection.php';
	if(isset($_REQUEST['id']))
	{
		$id=$_REQUEST['id'];
	}
	try
	{
		$query = "DELETE FROM `user_table` WHERE `id`=:id";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		header('location:employees.php?check=D');
	}catch (Exception $e)
	{
		echo "Deletion Failed.";
	}
?>