<?php
	$con=mysqli_connect('localhost','root','','my_db');
	if(!$con){
		die('Could not connect'.mysqli_error($con));
	}
	if($_POST['submit']=='签批'){
		foreach($_POST['creation'] as $ano){
			$sql="update creation set astate='S' where ano='".$ano."'";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
			$sql="select Ano,Aname,Cno,Astate,Aremark from creation where ano='".$ano."'";
			$result=mysqli_query($con,$sql);
			if($row=mysqli_fetch_array($result)){
				$sql="insert into activity(ano,aname,cno,tno,astate,aremark) values('".$row['Ano']."','".$row['Aname']."','".$row['Cno']."','".$_COOKIE['user']."',1,'".$row['Aremark']."')";
				if(!mysqli_query($con,$sql)){
					die(mysqli_error($con));
				}
			}
			else{
				die(mysqli_error($con));
			}
		}
	}
	else if($_POST['submit']=='驳回'){
		foreach($_POST['creation'] as $ano){
			$sql="update creation set astate='F' where ano='".$ano."'";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
	}
	echo "<script>location.href='teacher.php';</script>";
	mysqli_close($con);
?>