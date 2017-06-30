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
								die('Could not connect'.mysqli_error());
							}
							if($_GET['type']=='course'){
								echo "<form method='post' action='grade.php?type=course&cno=".$_GET['cno']."'>";
								echo "<table><tr><th>学生</th>";
								echo "<th>成绩</th></tr>";
								$sql="select sc.Sno Sno,Sname,Grade from sc,student where cno='".$_GET['cno']."' and sc.sno=student.sno";
								$result=mysqli_query($con,$sql);
								while($row=mysqli_fetch_array($result)){
									echo "<tr><td>".$row['Sname']."</td>";
									echo "<td><input type='text' name='".$row['Sno']."'value='".$row['Grade']."'></tr></td>";
								}
								echo "<tr><td><input type='submit' value='提交成绩'></td>";
								echo "<td></td></tr></table></form>";
							}
							else if($_GET['type']=='activity'){
								echo "<form method='post' action='grade.php?type=activity&ano=".$_GET['ano']."'>";
								echo "<table><tr><th>学生</th>";
								echo "<th>成绩</th></tr>";
								$sql="select participate.sno Sno,Sname,Grade from participate,student where ano='".$_GET['ano']."' and participate.sno=student.sno";
								$result=mysqli_query($con,$sql);
								while($row=mysqli_fetch_array($result)){
									echo "<tr><td>".$row['Sname']."</td>";
									echo "<td><input type='text' name='".$row['Sno']."' value='".$row['Grade']."'></td></tr>";
								}
								echo "<tr><td><input type='submit' value='提交成绩'></td>";
								echo "<td></td></tr></table></form>";
							}
							mysqli_close($con);
						?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>