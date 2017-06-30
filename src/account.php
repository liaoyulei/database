<!DOCTYPE html>
<html>
	<head>
		<title>第二课堂管理系统</title>
		<meta http-equiv="Content-Type" charset="utf-8" />
		<link href="index.css" type="text/css" rel="stylesheet" />
		<script src="index.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="page_style">
			<div class="top_box">
				<div class="top_box_inner">
					<div class="logo">
						<img src="images/ruc_logo.png" border="0">
					</div>
					<div>
						<div id="log" class="hover"><a href="index.php">登出</a></div>
						<div id="user" class="hover"><a href="account.php" target="view_window">
							<?php echo $_COOKIE['username'];?>
						</a></div>
					</div>
					<div id="account">
						<form method="post" action="inform.php?type=usual">
						<?php
							$con=mysqli_connect('localhost','root','','my_db');
							if(!$con){
								die('Could not connect'.mysqli_error($con));
							}
							if($_COOKIE['usertype']=='teacher'){
								$sql="select Tname,Tsex,Tbirth,Ttitle,Tremark from teacher where tno='".$_COOKIE['user']."'";
								$result=mysqli_query($con,$sql);
								if($row=mysqli_fetch_array($result)){
									echo "职工号：<input type='number' value='".$_COOKIE['user']."' disabled='true'><br /><br />";
									echo "姓名：<input type='text' value='".$row['Tname']."' disabled='true'><br/><br />";
									echo "性别：<input type='text' value='".$row['Tsex']."' disabled='true'><br /><br />";
									echo "出生日期：<input type='Date pickers' name='tbirth' value='".$row['Tbirth']."'><br /><br />";
									echo "职称：<input type='text' value='".$row['Ttitle']."' disabled='true'><br /><br />";
									echo "备注：<input type='text' name='tremark' value='".$row['Tremark']."'><br /><br />";
								}
								else{
									die('未知错误！');
								}	
							}
							else{
								$sql="select Sname,Ssex,Sbirth,Senrool,Sremark from student where sno='".$_COOKIE['user']."'";
								$result=mysqli_query($con,$sql);
								if($row=mysqli_fetch_array($result)){
									echo "学工号：<input type='number' value='".$_COOKIE['user']."' disabled='true'><br /><br />";
									echo "姓名：<input type='text' value='".$row['Sname']."' disabled='true'><br/><br />";
									echo "性别：<input type='text' value='".$row['Ssex']."' disabled='true'><br /><br />";
									echo "出生日期：<input type='Date pickers' name='sbirth' value='".$row['Sbirth']."'><br /><br />";
									echo "注册时间：<input type='Date pickers' value='".$row['Senrool']."' disabled='true'><br /><br />";
									echo "备注：<input type='text' name='sremark' value='".$row['Sremark']."'><br /><br />";
								}
								else{
									die('未知错误！');
								}
							}
							mysqli_close($con);
						?>
							<input type="submit" value="提交"/><br /><br />
						</form>
						<form method="post" action="inform.php?type=password">
							重置密码：<input type="password" name="password1"><br /><br /> 
							确认密码：<input type="password" name="password2"><br /><br />
							<input type="submit" value="确认重置"/><br /><br />
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>