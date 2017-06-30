<?php
	$con=mysqli_connect('localhost','root','','my_db');
	if(!$con){
		die('Could not connect'.mysqli_error());
	}
	if($_GET['type']=='activity'){
		$sql="select participate.ano Ano from participate,activity,course where sno='".$_COOKIE['user']."' and mno='".$_GET['mno']."' and participate.ano=activity.ano and activity.cno=course.cno";
		$result=mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($result)){
			if($_FILES[$row['Ano']]['error']==0){
				$sql="insert into file(fname,sno,ano) values('".$_FILES[$row['Ano']]['name']."','".$_COOKIE['user']."','".$row['Ano']."')";
				if(!mysqli_query($con,$sql)){
					die(mysqli_error($con));
				}
				else{
					move_uploaded_file($_FILES[$row['Ano']]['tmp_name'], "uploads/".$_COOKIE['user'].$row['Ano'].$_FILES[$row['Ano']]['name']);
				}
			}
		}
	}
	mysqli_close($con);
	echo "<script>location.href='".$_COOKIE['usertype'].".php'</script>";
?>