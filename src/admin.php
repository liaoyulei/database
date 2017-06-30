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
						<div id="user" class="hover">
							<?php echo $_COOKIE['username'];?>
						</div>
					</div>
					<div class="menu_box" id="menu"><ul>
						<li id="menuItem0"></li>
						<li class="menu_style" id="menuItem10" name="MenuItem" onclick="showx(10)">学生管理</li>
						<li class="menu_style" id="menuItem11" name="MenuItem" onclick="showx(11)">教师管理</li>
						<li class="menu_style" id="menuItem12" name="MenuItem" onclick="showx(12)">模块管理</li>
						<li class="menu_style" id="menuItem13" name="MenuItem" onclick="showx(13)">课程管理</li>
						<li class="menu_style" id="menuItem14" name="MenuItem" onclick="showx(14)">活动管理</li>
					</ul></div>
				</div>
				<div class="submenu_box"><ul>
					<?php
						$con=mysqli_connect('localhost','root','','my_db');
						if(!$con){
							die('Could not connect'.mysqli_error($con));
						}
						$sql="select Mno,Mname from module";
						$result=mysqli_query($con,$sql);
						while($row=mysqli_fetch_array($result)){
							echo "<li class='submenu_style' id='submenuItem".$row['Mno']."' onclick='showy(".$row['Mno'].")'>".$row['Mname']."</li>";
						}
						mysqli_close($con);
					?>
				</ul></div>
				<div class="main" id="main">
					<img src="images/months.jpg" border="0" />
				</div>
			</div>
		</div>
	</body>
</html>