<?php
include 'connection.php';
if(isset($_REQUEST['id']))
{
	$id=$_REQUEST['id'];
}
try
{
	$query = "SELECT `id`, `status` FROM `user_table` WHERE `id`=:id";
	$stmt = $db->prepare($query);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	foreach ($stmt  as $row)
	{
		if($row['status']==='Active')
			$status="Denied";
		elseif ($row['status']==="Denied")
		$status="Active";
		$query = "UPDATE `user_table` SET `status`=:status WHERE `id`=:id";
		$stmt = $db->prepare($query);
		$stmt->bindparam(':status',$status);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		header('location:employees.php');
	}
}catch (Exception $e)
{
	echo "Deletion Failed.";
}
?>