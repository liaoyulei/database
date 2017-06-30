<?php
	setcookie('user','',time()-3600);
	setcookie('username','',time()-3600);
	setcookie('usertype','',time()-3600);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>第二课堂管理系统</title>
		<meta http-equiv="Content-Type" charset="utf-8" />
		<script src="index.js" type="text/javascript"></script>
	</head>
	<body>
		<table border=0 cellpadding=0 cellspacing=0 width=100% style="margin:150px 0 0 0;">
			<tr>
				<td valign=center height=100% align=center style="padding:20px 0 0 0">
					<div style="background:url(images/login.jpg) no-repeat;width:242px;height:141px;padding:155px 0px 0px 264px;margin:0px auto;">
						<form method="post" action="login.php">
							<table border="0" cellpadding=0 cellspacing=0 width=100%>
								<tr>
									<td height=27px align="right" width="80px" color="FFFFFF">账&nbsp;&nbsp;号：</td>
									<td align=left><input type="textbox" class="master_tb" id="username" name="user"  maxlength="25" size="15" /></td>
								</tr>
								<tr>
									<td height=27px align="right" color="FFFFFF">密&nbsp;&nbsp;码：</td>
									<td align=left><input type="password" class="master_tb" id="password"  name="password" maxlength="25" size="15" /></td>
								</tr>
								<tr>
									<td height=27px align=center>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="登 录"/></td>
								</tr>
							</table>
						</form>
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>