<?php
	$con=mysqli_connect('localhost','root','','my_db');
	if(!$con){
		die('Could not connect'.mysqli_error($con));
	}
	$sql="select count(*) Count from activity";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if($row['Count']==''){
		$row['Count']=0;
	}
	$ano=$row['Count'];
	$sql="select count(*) Count from creation";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if($row['Count']==''){
		$row['Count']=0;
	}
	$ano+=$row['Count'];
	$sql="insert into creation(sno,ano,aname,cno,astate,aremark) values('".$_COOKIE['user']."','".$ano."','".$_POST['aname']."','".$_POST['cno']."','W','".$_POST['aremark']."')";
	if(!mysqli_query($con,$sql)){
		die(mysqli_error($con));
	};
	mysqli_close($con);
	echo "<script>location.href='student.php';</script>";
?>