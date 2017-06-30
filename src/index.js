var col=0,row=0;
function showx(x){
	var id="menuItem"+col;
	var xmlhttp=new XMLHttpRequest();
	document.getElementById(id).style.color="#ffffff";
	id="submenuItem"+row;
	document.getElementById(id).style.backgroundColor="#DBF1A8";
	col=x;
	id="menuItem"+col;
	document.getElementById(id).style.color="#000000";
	id="submenuItem"+row;
	document.getElementById(id).style.backgroundColor="#aaaaaa";
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4&&xmlhttp.status==200){
			document.getElementById("main").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","div.php?choose="+col+"&mno="+row,true);
	xmlhttp.send();
}
function showy(y){
	var id="submenuItem"+row;
	var xmlhttp=new XMLHttpRequest();
	document.getElementById(id).style.backgroundColor="#DBF1A8";
	row=y;
	id="submenuItem"+row;
	document.getElementById(id).style.backgroundColor="#aaaaaa";
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4&&xmlhttp.status==200){
			document.getElementById("main").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","div.php?choose="+col+"&mno="+row,true);
	xmlhttp.send();	
}