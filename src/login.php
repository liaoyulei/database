<?php
	$con=mysqli_connect('localhost','root','','my_db');
	if(!$con){
		die('Could not connect'.mysqli_error());
	}
	if($_POST['user']=='admin'){
		if($_POST['password']=='admin'){
			setcookie('user', 'admin', time()+3600);
			setcookie('username', '管理员', time()+3600);
			setcookie('usertype','admin',time()+3600);
			echo "<script>location.href='admin.php';</script>";
		}
		else{
			echo "<script>alert('账号或密码错误！');location.href='index.php';</script>";
		}
	}
	else if(strlen($_POST['user'])<10){
		$sql="select Tname from teacher where tno='".$_POST['user']."' and tpassword='".md5($_POST['password'])."'";
		$result=mysqli_query($con,$sql);
		if($row=mysqli_fetch_array($result)){
			setcookie('user',$_POST['user'],time()+3600);
			setcookie('username',$row['Tname'],time()+3600);
			setcookie('usertype','teacher',time()+3600);
			echo "<script>location.href='teacher.php';</script>";
		}
		else{
			echo "<script>alert('账号或密码错误！');location.href='index.php';</script>";
		}
	}
	else{
		$sql="select sname,sstate from student where sno='".$_POST['user']."' and spassword='".md5($_POST['password'])."'";
		$result=mysqli_query($con,$sql);
		if($row=mysqli_fetch_array($result)){
			setcookie('user',$_POST['user'],time()+3600);
			setcookie('username',$row['sname'],time()+3600);
			if($row['sstate']=='1'){
				setcookie('usertype','student',time()+3600);
				echo "<script>location.href='student.php';</script>";
			}
			else{
				setcookie('usertype','graduate',time()+3600);
				echo "<script>location.href='graduate.php';</script>";
			}
		}
		else{
			echo "<script>alert('账号或密码错误！');location.href='index.php';</script>";
		}
	}
	mysqli_close($con);
?>