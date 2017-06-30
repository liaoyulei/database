<?php
	$con=mysqli_connect('localhost','root','','my_db');
	if(!$con){
		die('Could not connect'.mysqli_error($con));
	}
	switch($_GET['choose']){
		case '1':
			$sql="select Melective,Mrequired from module where mno='".$_GET['mno']."'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			echo "要求选修".$row['Melective']."学分&emsp;必修".$row['Mrequired']."学分<br />";
			$sql="select sum(Ccredit) Sum from course,sc where sno='".$_COOKIE['user']."' and ccharacter='E' and sc.cno=course.cno";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			if($row['Sum']==''){
				$row['Sum']=0;
			}
			echo "已修选修".$row['Sum']."学分&emsp;";
			$sql="select sum(Ccredit) Sum from course,sc where sno='".$_COOKIE['user']."' and ccharacter='R' and sc.cno=course.cno";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			if($row['Sum']==''){
				$row['Sum']=0;
			}
			echo "已修必修".$row['Sum']."学分<br /><br />";
			$sql="select course.cno Cno,Cname,Ccredit,Ccharacter,Cmaxstu,Cexam,Tname from course,teacher where cstate=1 and mno='".$_GET['mno']."' and course.tno=teacher.tno";
			$result=mysqli_query($con,$sql);
			echo "<form method='post' action='choose.php?type=course'>";
			echo "<table><tr><th></th>";
			echo "<th>课程名</th>";
			echo "<th>教师名</th>";
			echo "<th>学分</th>";
			echo "<th>性质</th>";
			echo "<th>最大人数</th>";
			echo "<th>考核方式</th></tr>";
			while($row=mysqli_fetch_array($result)){
				$sql="select * from sc where sno='".$_COOKIE['user']."' and cno='".$row['Cno']."'";
				$res=mysqli_query($con,$sql);
				if(mysqli_fetch_array($res)){
					echo "<tr><td></td>";
				}
				else{
					echo "<tr><td><input type='checkbox' name='course[]' value='".$row['Cno']."' /></td>";
				}
				echo "<td><a href='search.php?type=course&cno=".$row['Cno']."'>".$row['Cname']."</a></td>";
				echo "<td>".$row['Tname']."</td>";
				echo "<td>".$row['Ccredit']."</td>";
				if($row['Ccharacter']=='E'){
					echo "<td>选修</td>";
				}
				else if($row['Ccharacter']=='R'){
					echo "<td>必修</td>";
				}
				echo "<td>".$row['Cmaxstu']."</td>";
				echo "<td>".$row['Cexam']."</td></tr>";
			}
			echo "<tr><td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td><input type='submit' value='选&emsp;课'></td>";
			echo "<td></td></tr></table></form>";
			break;
		case '2':
			$sql="select Melective,Mrequired from module where mno='".$_GET['mno']."'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			echo "要求选修".$row['Melective']."学分&emsp;必修".$row['Mrequired']."学分<br />";
			$sql="select sum(Ccredit) Sum from course,sc where sno='".$_COOKIE['user']."' and ccharacter='E' and sc.cno=course.cno";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			if($row['Sum']==''){
				$row['Sum']=0;
			}
			echo "已修选修".$row['Sum']."学分&emsp;";
			$sql="select sum(Ccredit) Sum from course,sc where sno='".$_COOKIE['user']."' and ccharacter='R' and sc.cno=course.cno";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			if($row['Sum']==''){
				$row['Sum']=0;
			}
			echo "已修必修".$row['Sum']."学分<br /><br />";
			$sql="select sc.Cno Cno,Cname,Ccredit,Ccharacter,Cmaxstu,Cexam,Tname from sc,course,teacher where sno='".$_COOKIE['user']."' and sc.cno=course.cno and mno='".$_GET['mno']."' and course.tno=teacher.tno";
			$result=mysqli_query($con,$sql);
			echo "<form method='post' action='drop.php?type=course'>";
			echo "<table><tr><th></th>";
			echo "<th>课程名</th>";
			echo "<th>教师名</th>";
			echo "<th>学分</th>";
			echo "<th>性质</th>";
			echo "<th>最大人数</th>";
			echo "<th>考核方式</th></tr>";
			while($row=mysqli_fetch_array($result)){
				echo "<tr><td><input type='checkbox' name='course[]' value='".$row['Cno']."' /></td>";
				echo "<td><a href='search.php?type=course&cno=".$row['Cno']."'>".$row['Cname']."</a></td>";
				echo "<td>".$row['Tname']."</td>";
				echo "<td>".$row['Ccredit']."</td>";
				if($row['Ccharacter']=='E'){
					echo "<td>选修</td>";
				}
				else if($row['Ccharacter']=='R'){
					echo "<td>必修</td>";
				}
				echo "<td>".$row['Cmaxstu']."</td>";
				echo "<td>".$row['Cexam']."</td></tr>";
			}
			echo "<tr><td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td><input type='submit' value='退&emsp;课'></td>";
			echo "<td></td></tr></table></form>";
			break;
		case '3':
			$sql="select Melective,Mrequired from module where mno='".$_GET['mno']."'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			echo "要求选修".$row['Melective']."学分&emsp;必修".$row['Mrequired']."学分<br />";
			$sql="select sum(Ccredit) Sum from course,sc where sno='".$_COOKIE['user']."' and ccharacter='E' and sc.cno=course.cno";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			if($row['Sum']==''){
				$row['Sum']=0;
			}
			echo "已修选修".$row['Sum']."学分&emsp;";
			$sql="select sum(Ccredit) Sum from course,sc where sno='".$_COOKIE['user']."' and ccharacter='R' and sc.cno=course.cno";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
			if($row['Sum']==''){
				$row['Sum']=0;
			}
			echo "已修必修".$row['Sum']."学分<br /><br />";
			$sql="select sc.Cno Cno,Cname,Tname,Ccredit,Ccharacter,Grade from sc,course,teacher where sno='".$_COOKIE['user']."' and sc.cno=course.cno and mno='".$_GET['mno']."' and course.tno=teacher.tno";
			$result=mysqli_query($con,$sql);
			echo "<table><tr><th>课程名</th>";
			echo "<th>教师名</th>";
			echo "<th>学分</th>";
			echo "<th>性质</th>";
			echo "<th>成绩</th></tr>";
			while($row=mysqli_fetch_array($result)){
				echo "<tr><td><a href='search.php?type=course&cno=".$row['Cno']."'>".$row['Cname']."</a></td>";
				echo "<td>".$row['Tname']."</td>";
				echo "<td>".$row['Ccredit']."</td>";
				if($row['Ccharacter']=='E'){
					echo "<td>选修</td>";
				}
				else if($row['Ccharacter']=='R'){
					echo "<td>必修</td>";
				}
				echo "<td>".$row['Grade']."</td>";
			}
			echo "<tr><td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td></tr></table>";
			break;
		case '4':
			$sql="select Ano,Aname,Cname,Tname,Cmaxstu from activity,course,teacher where astate=true and mno='".$_GET['mno']."' and activity.cno=course.cno and activity.tno=teacher.tno";
			$result=mysqli_query($con,$sql);
			echo "<form method='post' action='choose.php?type=activity'>";
			echo "<table><tr><th></th>";
			echo "<th>活动名</th>";
			echo "<th>课程名</th>";
			echo "<th>教师名</th>";
			echo "<th>最大人数</th></tr>";
			while($row=mysqli_fetch_array($result)){
				$sql="select *from participate where sno='".$_COOKIE['user']."' and ano='".$row['Ano']."'";
				$res=mysqli_query($con,$sql);
				if(mysqli_fetch_array($res)){
					echo "<tr><td></td>";
				}
				else{
					echo "<tr><td><input type='checkbox' name='activity[]' value='".$row['Ano']."' /></td>";
				}
				echo "<td><a href='search.php?type=activity&ano=".$row['Ano']."'>".$row['Aname']."</a></td>";
				echo "<td>".$row['Cname']."</td>";
				echo "<td>".$row['Tname']."</td>";
				echo "<td>".$row['Cmaxstu']."</td></tr>";
			}
			echo "<tr><td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td><input type='submit' value='选&ensp;活&ensp;动' /></td>";
			echo "<td></td></tr></table></form>";
			break;
		case '5':
			$sql="select participate.ano Ano,Aname,Cname,Tname,Grade from participate,activity,course,teacher where sno='".$_COOKIE['user']."' and mno='".$_GET['mno']."' and participate.ano=activity.ano and activity.cno=course.cno and activity.tno=teacher.tno";
			$result=mysqli_query($con,$sql);
			echo "<form method='post' action='upload.php?type=activity&mno=".$_GET['mno']."' enctype='multipart/form-data'>";
			echo "<table><tr><th>活动名</th>";
			echo "<th>课程名</th>";
			echo "<th>教师名</th>";
			echo "<th>成绩</th>";
			echo "<th>上传</th>";
			echo "<th>下载</th></tr>";
			while($row=mysqli_fetch_array($result)){
				echo "<tr><td><a href='search.php?type=activity&ano=".$row['Ano']."'>".$row['Aname']."</a></td>";
				echo "<td>".$row['Cname']."</td>";
				echo "<td>".$row['Tname']."</td>";
				echo "<td>".$row['Grade']."</td>";
				echo "<td><input type='file' name='".$row['Ano']."'></td>";
				echo "<td><a href='download.php?ano=".$row['Ano']."''>下载</a></td></tr>";
			}
			echo "<tr><td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td><input type='submit' value='确认上传'></td>";
			echo "<td></td></tr></table></form>";
			break;
		case '6':
			$sql="select Ano,Aname,Cname,Astate from creation,course where sno='".$_COOKIE['user']."' and creation.cno=course.cno and course.mno='".$_GET['mno']."'";
			$result=mysqli_query($con,$sql);
			echo "<form method='post' action='creation.php?type=activity'>";
			echo "<table><tr><th>活动名</th>";
			echo "<th>课程名</th>";
			echo "<th>状态</th></tr>";
			while($row=mysqli_fetch_array($result)){
				echo "<tr><td><a href='search.php?type=creation&ano=".$row['Ano']."'>".$row['Aname']."</a></td>";
				echo "<td>".$row['Cname']."</td>";
				if($row['Astate']=='W'){
					echo "<td>待签批</td></tr>";
				}
				else if($row['Astate']=='S'){
					echo "<td>已签批</td></tr>";
				}
				else if($row['Astate']=='F'){
					echo "<td>已驳回</td></tr>";
				}
			}
			echo "<tr><td><input type='text' size='10' name='aname' /></td>";
			echo "<td>";
			$sql="select Cno,Cname from course where mno='".$_GET['mno']."'";
			$result=mysqli_query($con,$sql);
			while($row=mysqli_fetch_array($result)){
				echo "<input type='radio' name='cno' value='".$row['Cno']."'>".$row['Cname']."&emsp;";
			}
			echo "</td></tr>";
			echo "<tr><td>备注</td>";
			echo "<td><input type='text' size='30' name='aremark' /></td></tr>";
			echo "<tr><td><input type='submit' value='提&emsp;交' /></td>";
			echo "<td></td></tr></table></form>";
			break;
		case '7':
			$sql="select Cno,Cname,Ccredit,Ccharacter from course where tno='".$_COOKIE['user']."' and mno='".$_GET['mno']."'";
			$result=mysqli_query($con,$sql);
			echo "<table><tr><th>课程名</th>";
			echo "<th>学分</th>";
			echo "<th>性质</th>";
			echo "<th>成绩</th>";
			while($row=mysqli_fetch_array($result)){
				echo "<tr><td><a href='search.php?type=course&cno=".$row['Cno']."'>".$row['Cname']."</a></td>";
				echo "<td>".$row['Ccredit']."</td>";
				if($row['Ccharacter']=='E'){
					echo "<td>选修</td>";
				}
				else if($row['Ccharacter']='R'){
					echo "<td>必修</td>";
				}
				echo "<td><a href='report.php?type=course&cno=".$row['Cno']."'>录入/查询</a></td></tr>";
			}
			echo "<tr><td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td></tr></table>";
			break;
		case '8':
			$sql="select Ano,Aname,Cname from activity,course where activity.tno='".$_COOKIE['user']."' and mno='".$_GET['mno']."' and activity.cno=course.cno";
			$result=mysqli_query($con,$sql);
			echo "<table><tr><th>活动名</th>";
			echo "<th>课程名</th>";
			echo "<th>成绩</th>";
			while($row=mysqli_fetch_array($result)){
				echo "<tr><td><a href='search.php?type=activity&ano=".$row['Ano']."'>".$row['Aname']."</a></td>";
				echo "<td>".$row['Cname']."</td>";
				echo "<td><a href='report.php?type=activity&ano=".$row['Ano']."'>录入/查询</a></td></tr>";
			}
			echo "<tr><td></td>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td></tr></table></form>";
			break;
		case '9':
			$sql="select Ano,Aname,Cname from creation,course where astate='W' and creation.cno=course.cno and course.mno='".$_GET['mno']."'";
			$result=mysqli_query($con,$sql);
			echo "<form method='post' action='sign.php'>";
			echo "<table><tr><th></th>";
			echo "<th>活动名</th>";
			echo "<th>课程名</th></tr>";
			while($row=mysqli_fetch_array($result)){
				echo "<tr><td><input type='checkbox' name='creation[]' value='".$row['Ano']."' /></td>";
				echo "<td><a href='search.php?type=creation&ano=".$row['Ano']."'>".$row['Aname']."</a></td>";
				echo "<td>".$row['Cname']."</td></tr>";
			}
			echo "<tr><td><input type='submit' name='submit' value='签批'></td>";
			echo "<td><input type='submit' name='submit' value='驳回'></td>";
			echo "<td></td>";
			break;
		case '10':
			$sql="select Sno,Sname,Ssex,Sbirth,Senrool,Sstate from Student";
			$result=mysqli_query($con,$sql);
			echo "<form method='post' action='update.php?type=student'>";
			echo "<table><tr><th></th>";
			echo "<th>学工号</th>";
			echo "<th>姓名</th>";
			echo "<th>性别</th>";
			echo "<th>出生日期</th>";
			echo "<th>注册日期</th>";
			echo "<th>状态</th></tr>";
			while($row=mysqli_fetch_array($result)){
				echo "<tr><td><input type='checkbox' name='student[]' value='".$row['Sno']."' /></td>";
				echo "<td>".$row['Sno']."</td>";
				echo "<td>".$row['Sname'],"</td>";
				if($row['Ssex']=='M'){
					echo "<td>男</td>";
				}
				else if($row['Ssex']=='F'){
					echo "<td>女</td>";
				}
				echo "<td>".$row['Sbirth']."</td>";
				echo "<td>".$row['Senrool']."</td>";
				if($row['Sstate']=='1'){
					echo "<td>在校生</td>";
				}
				else{
					echo "<td>毕业生</td></tr>";
				}
			}
			echo "<tr><td>请输入所有字段</td>";
			echo "<td><input type='text' name='sno' size='10'></td>";
			echo "<td><input type='text' name='sname' size='10'></td>";
			echo "<td><input type='radio' name='ssex' value='M'>男<br /><input type='radio' name='ssex' value='F'>女</td>";
			echo "<td><input type='Date pickers' name='sbirth' size='10'></td>";
			echo "<td><input type='Date pickers' name='senrool' size='10'></td>";
			echo "<td><input type='radio' name='sstate' value='1'>在校生<br /><input type='radio' name='sstate' value='0'>毕业生</td></tr>";
			echo "<tr><td></td>";
			echo "<td><input type='submit' name='submit' value='添加'></td>";
			echo "<td></td>";
			echo "<td><input type='submit' name='submit' value='删除'></td>";
			echo "<td></td>";
			echo "<td><input type='submit' name='submit' value='修改'></td>";
			echo "<td></td></tr></table></form>";
			break;
		case '11':
			$sql="select Tno,Tname,Tsex,Tbirth,Ttitle from teacher";
			$result=mysqli_query($con,$sql);
			echo "<form method='post' action='update.php?type=teacher'>";
			echo "<table><tr><th></th>";
			echo "<th>职工号</th>";
			echo "<th>姓名</th>";
			echo "<th>性别</th>";
			echo "<th>出生日期</th>";
			echo "<th>职称</th></tr>";
			while($row=mysqli_fetch_array($result)){
				echo "<tr><td><input type='checkbox' name='teacher[]' value='".$row['Tno']."' /></td>";
				echo "<td>".$row['Tno']."</td>";
				echo "<td>".$row['Tname'],"</td>";
				if($row['Tsex']=='M'){
					echo "<td>男</td>";
				}
				else if($row['Tsex']=='F'){
					echo "<td>女</td>";
				}
				echo "<td>".$row['Tbirth']."</td>";
				echo "<td>".$row['Ttitle']."</td></tr>";
			}
			echo "<tr><td>请输入所有字段</td>";
			echo "<td><input type='text' name='tno' size='10'></td>";
			echo "<td><input type='text' name='tname' size='10'></td>";
			echo "<td><input type='text' name='tsex' size='10'></td>";
			echo "<td><input type='Date pickers' name='tbirth' size='10'></td>";
			echo "<td><input type='text' name='ttitle'  size='10'></td></tr>";
			echo "<tr><td><input type='submit' name='submit' value='添加'></td>";
			echo "<td></td>";
			echo "<td><input type='submit' name='submit' value='删除'></td>";
			echo "<td></td>";
			echo "<td><input type='submit' name='submit' value='修改'></td>";
			echo "<td></td></tr></table></form>";
			break;
		case '12':
			$sql="select Mno,Mname,Melective,Mrequired from module";
			$result=mysqli_query($con,$sql);
			echo "<form method='post' action='update.php?type=module'>";
			echo "<table><tr><th></th>";
			echo "<th>模块号</th>";
			echo "<th>模块名</th>";
			echo "<th>选修学分</th>";
			echo "<th>必修学分</th></tr>";
			while($row=mysqli_fetch_array($result)){
				echo "<tr><td><input type='checkbox' name='module[]' value='".$row['Mno']."' /></td>";
				echo "<td>".$row['Mno']."</td>";
				echo "<td>".$row['Mname'],"</td>";
				echo "<td>".$row['Melective']."</td>";
				echo "<td>".$row['Mrequired']."</td></tr>";
			}
			echo "<tr><td>请输入所有字段</td>";
			echo "<td><input type='text' name='mno' size='10'></td>";
			echo "<td><input type='text' name='mname' size='10'></td>";
			echo "<td><input type='number' name='melective' size='10'></td>";
			echo "<td><input type='number' name='mrequired' size='10'></td></tr>";
			echo "<tr><td><input type='submit' name='submit' value='添加'></td>";
			echo "<td></td>";
			echo "<td><input type='submit' name='submit' value='删除'></td>";
			echo "<td></td>";
			echo "<td><input type='submit' name='submit' value='修改'></td></tr></table></form>";
			break;
		case '13':
			$sql="select Cno,Cname,Tno,Ccredit,Ccharacter,Cstate,Cmaxstu,Cexam from Course where mno='".$_GET['mno']."'";
			$result=mysqli_query($con,$sql);
			echo "<form method='post' action='update.php?type=course&mno=".$_GET['mno']."'>";
			echo "<table><tr><th></th>";
			echo "<th>课程号</th>";
			echo "<th>课程名</th>";
			echo "<th>教师号</th>";
			echo "<th>学分</th>";
			echo "<th>性质</th>";
			echo "<th>状态</th>";
			echo "<th>最大人数</th>";
			echo "<th>考核方式</th></tr>";
			while($row=mysqli_fetch_array($result)){
				echo "<tr><td><input type='checkbox' name='course[]' value='".$row['Cno']."' /></td>";
				echo "<td>".$row['Cno']."</td>";
				echo "<td>".$row['Cname'],"</td>";
				echo "<td>".$row['Tno']."</td>";
				echo "<td>".$row['Ccredit']."</td>";
				if($row['Ccharacter']=='E'){
					echo "<td>选修</td>";
				}
				else if($row['Ccharacter']=='R'){
					echo "<td>必修</td>";
				}
				if($row['Cstate']=='1'){
					echo "<td>可选</td>";
				}
				else{
					echo "<td>不可选</td>";
				}
				echo "<td>".$row['Cmaxstu']."</td>";
				echo "<td>".$row['Cexam']."</td></tr>";
			}
			echo "<tr><td>请输入所有字段</td>";
			echo "<td><input type='text' name='cno' size='10'></td>";
			echo "<td><input type='text' name='cname' size='10'></td>";
			echo "<td><input type='text' name='tno' size='10'></td>";
			echo "<td><input type='text' name='ccredit' size='10'></td>";
			echo "<td><input type='radio' name='ccharacter' value='E'>选修<br /><input type='radio' name='ccharacter' value='R'>必修</td>";
			echo "<td><input type='radio' name='cstate' value='1'>可选<br /><input type='radio' name='cstate' value='0'>不可选</td>";
			echo "<td><input type='text' name='cmaxstu' size='10'></td>";
			echo "<td><input type='text' name='cexam' size='10'></td></tr>";
			echo "<tr><td>备注</td>";
			echo "<td colspan='9'><input type='text' name='cremark' size='80'></td></tr>";
			echo "<tr><td><input type='submit' name='submit' value='添加'></td>";
			echo "<td></td>";
			echo "<td><input type='submit' name='submit' value='删除'></td>";
			echo "<td></td>";
			echo "<td><input type='submit' name='submit' value='修改'></td>";
			echo "<td></td>";
			echo "<td><input type='submit' name='submit' value='可选'></td>";
			echo "<td></td>";
			echo "<td><input type='submit' name='submit' value='不可选'></td></tr></table></form>";
			break;
		case '14':
			$sql="select Ano,Aname,course.cno Cno,activity.tno Tno,Astate from activity,course where mno='".$_GET['mno']."' and activity.cno=course.cno";
			$result=mysqli_query($con,$sql);
			echo "<form method='post' action='update.php?type=activity'>";
			echo "<table><tr><th></th>";
			echo "<th>活动号</th>";
			echo "<th>活动名</th>";
			echo "<th>课程号</th>";
			echo "<th>教师号</th>";
			echo "<th>状态</th></tr>";
			while($row=mysqli_fetch_array($result)){
				echo "<tr><td><input type='checkbox' name='activity[]' value='".$row['Ano']."' /></td>";
				echo "<td>".$row['Ano']."</td>";
				echo "<td>".$row['Aname'],"</td>";
				echo "<td>".$row['Cno']."</td>";
				echo "<td>".$row['Tno']."</td>";
				if($row['Astate']=='1'){
					echo "<td>进行中</td>";
				}
				else{
					echo "<td>已结束</td></tr>";
				}
			}
			echo "<tr><td>请输入所有字段</td>";
			echo "<td><input type='text' name='ano' size='10'></td>";
			echo "<td><input type='text' name='aname' size='10'></td>";
			echo "<td><input type='text' name='cno' size='10'></td>";
			echo "<td><input type='text' name='tno' size='10'></td>";
			echo "<td><input type='radio' name='astate' value='1'>进行中<br /><input type='radio' name='astate' value='0'>已结束</td></tr>";
			echo "<tr><td>备注</td>";
			echo "<td colspan='5'><input type='text' name='aremark' size='50'></td></tr>";
			echo "<tr><td><input type='submit' name='submit' value='添加'></td>";
			echo "<td><input type='submit' name='submit' value='删除'></td>";
			echo "<td><input type='submit' name='submit' value='修改'></td>";
			echo "<td><input type='submit' name='submit' value='进行'></td>";
			echo "<td><input type='submit' name='submit' value='结束'></td>";
			echo "<td></td></tr></table></form>";
			break;
	}
	mysqli_close($con);
?>