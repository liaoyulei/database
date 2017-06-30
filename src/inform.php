<?php
	$con=mysqli_connect('localhost','root','','my_db');
	if(!$con){
		die('Could not connect'.mysqli_error());
	}
	if($_GET['type']=='usual'){
		if($_COOKIE['usertype']=='teacher'){
			$sql="update teacher set tbirth='".$_POST['tbirth']."',tremark='".$_POST['tremark']."' where tno='".$_COOKIE['user']."'";
		}
		else{
			$sql="update student set sbirth='".$_POST['sbirth']."',sremark='".$_POST['sremark']."' where sno='".$_COOKIE['user']."'";
		}
		if(!mysqli_query($con,$sql)){
			die(mysqli_error($con));
		}
	}
	else if($_GET['type']=='password'){
		if($_POST['password1']!=$_POST['password2']){
			die("<script>alert('两次密码不一致！');location.href='account.php';</script>");
		}
		if($_COOKIE['usertype']=='teacher'){
			$sql="update teacher set tpassword='".md5($_POST['password1'])."' where tno='".$_COOKIE['user']."'";
		}
		else{
			$sql="update student set spassword='".md5($_POST['password1'])."' where sno='".$_COOKIE['user']."'";
		}
		if(!mysqli_query($con,$sql)){
			die(mysqli_error($con));
		}
	}
	echo "<script>location.href='account.php';</script>";
	mysqli_close($con);
?>