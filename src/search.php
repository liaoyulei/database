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
						<?php
							$con=mysqli_connect('localhost','root','','my_db');
							if(!$con){
								die('Could not connect'.mysqli_error($con));
							}
							if($_GET['type']=='course'){
								$sql="select Cno,Tname,Cname,Mname,Ccredit,Ccharacter,Cstate,Cmaxstu,Cexam,Cremark from course,teacher,module where course.cno='".$_GET['cno']."' and course.tno=teacher.tno and course.mno=module.mno";
								$result=mysqli_query($con,$sql);
								if($row=mysqli_fetch_array($result)){
									echo "<table><tr><th>课程号</th><td>".$row['Cno']."</td></tr>";
									echo "<tr><th>教师名</th><td>".$row['Tname']."</td></tr>";
									echo "<tr><th>课程名</th><td>".$row['Cname']."</td></tr>";
									echo "<tr><th>模块名</th><td>".$row['Mname']."</td></tr>";
									echo "<tr><th>学分</th><td>".$row['Ccredit']."</td></tr>";
									if($row['Ccharacter']=='E'){
										echo "<tr><th>性质</th><td>选修</td></tr>";
									}
									else if($row['Ccharacter']=='R'){
										echo "<tr><th>性质</th><td>必修</td></tr>";
									}
									if($row['Cstate']=='1'){
										echo "<tr><th>状态</th><td>可选</td></tr>";
									}
									else{
										echo "<tr><th>状态</th><td>不可选</td></tr>";
									}
									echo "<tr><th>最大可选人数</th><td>".$row['Cmaxstu']."<td></tr>";
									echo "<tr><th>考核方式</th><td>".$row['Cexam']."<td></tr>";
									echo "<tr><th>备注</th><td>".$row['Cremark']."<td></tr></table>";
								}
							}
							else if($_GET['type']=='activity'){
								$sql="select Aname,Cname,Tname,Mname,Astate,Aremark from activity,course,teacher,module where activity.ano='".$_GET['ano']."' and activity.tno=teacher.tno and activity.cno=course.cno and course.mno=module.mno";
								$result=mysqli_query($con,$sql);
								if($row=mysqli_fetch_array($result)){
									echo "<table><tr><th>活动号</th><td>".$_GET['ano']."</td></tr>";
									echo "<tr><th>活动名</th><td>".$row['Aname']."</td></tr>";
									echo "<tr><th>课程名</th><td>".$row['Cname']."</td></tr>";
									echo "<tr><th>教师名</th><td>".$row['Tname']."</td></tr>";
									echo "<tr><th>模块名</th><td>".$row['Mname']."</td></tr>";
									if($row['Astate']=='1'){
										echo "<tr><th>状态</th><td>进行中</td></tr>";
									}
									else{
										echo "<tr><th>状态</th><td>已结束</td></tr>";
									}
									echo "<tr><th>备注</th><td>".$row['Aremark']."<td></tr></table>";
								}
								else{
									die(mysqli_error($con));
								}
							}
							else if($_GET['type']=='creation'){
								$sql="select Aname,Cname,Mname,Astate,Aremark from creation,course,module where creation.ano='".$_GET['ano']."' and creation.cno=course.cno and course.mno=module.mno";
								$result=mysqli_query($con,$sql);
								if($row=mysqli_fetch_array($result)){
									echo "<table><tr><th>活动号</th><td>".$_GET['ano']."</td></tr>";
									echo "<tr><th>活动名</th><td>".$row['Aname']."</td></tr>";
									echo "<tr><th>课程名</th><td>".$row['Cname']."</td></tr>";
									echo "<tr><th>模块名</th><td>".$row['Mname']."</td></tr>";
									if($row['Astate']=='W'){
										echo "<tr><th>状态</th><td>待签批</td></tr>";
									}
									else if($row['Astate']=='S'){
										echo "<tr><th>状态</th><td>已签批</td></tr>";
									}
									else if($row['Astate']=='F'){
										echo "<tr><th>状态</th><td>已驳回</td></tr>";
									}
									echo "<tr><th>备注</th><td>".$row['Aremark']."<td></tr></table>";
								}
							}
							mysqli_close($con);
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>