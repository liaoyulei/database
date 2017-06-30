<?php
	$con=mysqli_connect('localhost','root','','my_db');
	if(!$con){
		die('Could not connect'.mysqli_error($con));
	}	
	foreach($_POST['course'] as $cno){
		$sql="delete from sc where sno='".$_COOKIE['user']."' and cno='".$cno."'";
		if(!mysqli_query($con,$sql)){
			die(mysqli_error($con));
		}
	}
	mysqli_close($con);
	echo "<script>location.href='student.php';</script>";
?>