<?php
	$con=mysqli_connect('localhost','root','','my_db');
	if(!$con){
		die('Could not connect'.mysqli_error($con));
	}
	if($_GET['type']=='student'){
		if($_POST['submit']=='添加'){
			$sql="insert into student(sno,sname,ssex,sbirth,senrool,sstate,spassword) values('".$_POST['sno']."','".$_POST['sname']."','".$_POST['ssex']."','".$_POST['sbirth']."','".$_POST['senrool']."',".$_POST['sstate'].",'".md5($_POST['sno'])."')";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
		else if($_POST['submit']=='删除'){
			foreach($_POST['student'] as $sno){
				$sql="delete from student where sno='".$sno."'";
				if(!mysqli_query($con,$sql)){
					die(mysqli_error($con));
				}
			}
		}
		else if($_POST['submit']=='修改'){
			$sql="update student set sname='".$_POST['sname']."',ssex='".$_POST['ssex']."',sbirth='".$_POST['sbirth']."',senrool='".$_POST['senrool']."',sstate=".$_POST['sstate']." where sno='".$_POST['sno']."'";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
	}
	else if($_GET['type']=='teacher'){
		if($_POST['submit']=='添加'){
			$sql="insert into teacher(tno,tname,tsex,tbirth,ttitle,tpassword) values('".$_POST['tno']."','".$_POST['tname']."','".$_POST['tsex']."','".$_POST['tbirth']."','".$_POST['ttitle']."','".md5($_POST['tno'])."')";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
		else if($_POST['submit']=='删除'){
			foreach($_POST['teacher'] as $tno){
				$sql="delete from teacher where tno='".$tno."'";
				if(!mysqli_query($con,$sql)){
					die(mysqli_error($con));
				}
			}
		}
		else if($_POST['submit']=='修改'){
			$sql="update teacher set tname='".$_POST['tname']."',tsex='".$_POST['tsex']."',tbirth='".$_POST['tbirth']."',ttitle='".$_POST['ttitle']." where tno='".$_POST['tno']."'";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
	}
	else if($_GET['type']=='module'){
		if($_POST['submit']=='添加'){
			$sql="insert into module(mno,mname,melective,mrequired) values('".$_POST['mno']."','".$_POST['mname']."','".$_POST['melective']."','".$_POST['mrequired']."')";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
		else if($_POST['submit']=='删除'){
			foreach($_POST['module'] as $mno){
				$sql="delete from module where mno='".$mno."'";
			}
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
		else if($_POST['submit']=='修改'){
			$sql="update module set melective=".$_POST['melective'].",mrequired=".$_POST['mrequired']." where mno='".$_POST['mno']."'";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
	}
	else if($_GET['type']=='course'){
		$mno=$_GET['mno'];
		if($_POST['submit']=='添加'){
			$sql="insert into course(cno,cname,tno,mno,ccredit,ccharacter,cstate,cmaxstu,cexam,cremark) values('".$_POST['cno']."','".$_POST['cname']."','".$_POST['tno']."','".$mno."',".$_POST['ccredit'].",'".$_POST['ccharacter']."',".$_POST['cstate'].",".$_POST['cmaxstu'].",'".$_POST['cexam']."','".$_POST['cremark']."')";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
		else if($_POST['submit']=='删除'){
			foreach($_POST['course'] as $cno){
				$sql="delete from course where cno='".$cno."'";
			}
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
		else if($_POST['submit']=='修改'){
			$sql="update course set cname='".$_POST['cname']."',tno='".$_POST['tno']."',ccredit='".$_POST['ccredit']."',ccharacter='".$_POST['ccharacter']."',cstate=".$_POST['cstate'].",cmaxstu=".$_POST['cmaxstu'].",cexam='".$_POST['cexam']."',cremark='".$_POST['cremark']."' where cno='".$_POST['cno']."'";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
		else if($_POST['submit']=='可选'){
			foreach($_POST['course'] as $cno){
				$sql="update course set cstate=1 where cno='".$cno."'";
				if(!mysqli_query($con,$sql)){
					die(mysqli_error($con));
				}
			}
		}
		else if($_POST['submit']=='不可选'){
			foreach($_POST['course'] as $cno){
				$sql="update course set cstate=0 where cno='".$cno."'";
				if(!mysqli_query($con,$sql)){
					die(mysqli_error($con));
				}
			}
		}
	}
	else if($_GET['type']=='activity'){
		if($_POST['submit']=='添加'){
			$sql="insert into activity(ano,aname,cno,tno,astate,aremark) values('".$_POST['ano']."','".$_POST['aname']."','".$_POST['cno']."','".$_POST['tno']."',".$_POST['astate'].",'".$_POST['aremark']."')";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
		else if($_POST['submit']=='删除'){
			foreach($_POST['activity'] as $ano){
				$sql="delete from activity where ano='".$ano."'";
				if(!mysqli_query($con,$sql)){
					die(mysqli_error($con));
				}
			}
		}
		else if($_POST['submit']=='修改'){
			$sql="update activity set aname='".$_POST['aname']."',cno='".$_POST['cno']."',tno='".$_POST['tno']."',astate=".$_POST['astate'].",aremark='".$_POST['aremark']."' where ano='".$_POST['ano']."'";
			if(!mysqli_query($con,$sql)){
				die(mysqli_error($con));
			}
		}
		else if($_POST['submit']=='进行'){
			foreach($_POST['activity'] as $ano){
				$sql="update activity set astate=1 where ano='".$ano."'";
				if(!mysqli_query($con,$sql)){
					die(mysqli_error($con));
				}
			}
		}
		else if($_POST['submit']=='结束'){
			foreach($_POST['activity'] as $ano){
				$sql="update activity set astate=0 where ano='".$ano."'";
				if(!mysqli_query($con,$sql)){
					die(mysqli_error($con));
				}
			}
		}
	}
	echo "<script>location.href='admin.php'</script>";
	mysqli_close($con);
?>