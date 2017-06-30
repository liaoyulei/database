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
							$sql="select Fname from file where sno='".$_COOKIE['user']."' and ano='".$_GET['ano']."'";
							$result=mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($result)){
								echo "<a href='uploads/".$_COOKIE['user'].$_GET['ano'].$row['Fname']."'>".$row['Fname']."</a><br />";
							}
							mysqli_close($con);
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>