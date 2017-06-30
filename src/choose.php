<?php
	$con=mysqli_connect('localhost','root','','my_db');
	if(!$con){
		die('Could not connect'.mysqli_error($con));
	}
	if($_GET['type']=='course'){
		foreach($_POST['course'] as $cno){
			$sql="insert into sc(sno,cno) values('".$_COOKIE['user']."','".$cno."')";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}

		}
	}
	else if($_GET['type']=='activity'){
		foreach($_POST['activity'] as $ano){
			$sql="insert into participate(sno,ano) values('".$_COOKIE['user']."','".$ano."')";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
	}
	mysqli_close($con);
	echo "<script>location.href='student.php';</script>";
?>