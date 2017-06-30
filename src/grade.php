<?php
	$con=mysqli_connect('localhost','root','','my_db');
	if(!$con){
		die('Could not connect'.mysqli_error());
	}
	if($_GET['type']=='course'){
		$sql="select Sno from sc where cno='".$_GET['cno']."'";
		$result=mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($result)){
			$sql="update sc set grade=".$_POST[$row['Sno']]." where sno='".$row['Sno']."' and cno='".$_GET['cno']."'";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
	}
	else if($_GET['type']=='activity'){
		$sql="select Sno from participate where ano='".$_GET['ano']."'";
		$result=mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($result)){
			$sql="update participate set grade=".$_POST[$row['Sno']]." where sno='".$row['Sno']."' and ano='".$_GET['ano']."'";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
	}
	mysqli_close($con);
	echo "<script>location.href='teacher.php';</script>";
?>