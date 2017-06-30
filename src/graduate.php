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
					<div class="menu_box" id="menu"><ul>
						<li id="menuItem0"></li>
						<li class="menu_style" id="menuItem3" name="MenuItem" onclick="showx(3)">我的课程</li>
						<li class="menu_style" id="menuItem4" name="MenuItem" onclick="showx(5)">我的活动</li>
					</ul></div>
				</div>
				<div class="submenu_box"><ul>
					<?php
						$con=mysqli_connect('localhost','root','','my_db');
						if(!$con){
							die('Could not connect'.mysqli_error());
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