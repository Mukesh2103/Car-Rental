<?php
	function filter($data)
	{
		$data=trim($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		include 'connection.php';
		$uid=$_POST['uid'];
		$uid=filter($uid);
		$cid=$_POST['cid'];
		$cid=filter($cid);
		$address=$_POST['address'];
		$address=filter($address);
		$from=$_POST['from'];
		$from=filter($from);
		$where=$_POST['where'];
		$where=filter($where);
		$no_days=$_POST['no_days'];
		$no_days=filter($no_days);
		$total_rent=0;
		
		$query="SELECT * FROM `car_list` WHERE id=:id";
		$stmt=$db->prepare($query);
		$stmt->bindparam(':id',$cid);
		$stmt->execute();
		foreach ($stmt as $row)
		{
			$rent_day=$row['rent_day'];
		}
		
		$total_rent=$no_days*$rent_day;
		
		$query="UPDATE `user_table` SET `total_rent`=:total_rent WHERE id=:id";
		$stmt=$db->prepare($query);
		$stmt->bindparam(':total_rent',$total_rent);
		$stmt->bindparam(':id',$uid);
		$stmt->execute();
		
		$query="SELECT * FROM `car_hire` WHERE uid=:uid";
		$stmt=$db->prepare($query);
		$stmt->bindparam(':uid',$uid);
		$stmt->execute();
		
		if($stmt->rowCount()>0)
		{
			header('location:car_hire.php?check=N&id='.$cid);
			exit();
		}
		
		$query="INSERT INTO `car_hire` (`uid`,`cid`,`address`,`from`,`where`,`no_days`) VALUES(:uid,:cid,:address,:from,:where,:no_days)";
		try
		{
			$stmt=$db->prepare($query);
			$stmt->bindparam(':uid',$uid);
			$stmt->bindparam(':cid',$cid);
			$stmt->bindparam(':address',$address);
			$stmt->bindparam(':from',$from);
			$stmt->bindparam(':where',$where);
			$stmt->bindparam(':no_days',$no_days);
			$stmt->execute();
			
			$query="UPDATE `user_table` SET `car_request`=:car_request WHERE id=:id";
			$car_request='Yes';
			$stmt=$db->prepare($query);
			$stmt->bindparam(':car_request',$car_request);
			$stmt->bindparam(':id',$uid);
			$stmt->execute();
			
			header('location:car_hire.php?id='.$cid.'&check=Y');
		}
		catch(Exception $e)
		{
			echo"Insertion Failed.".$e;
		}
	}
?>