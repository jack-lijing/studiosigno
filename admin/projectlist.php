<html>
	<head>
	<meta charset="utf-8"/>
	<link type="text/css" rel="stylesheet" href="style.css"></link>
<script type="text/javascript">
	var xmlhttp=new XMLHttpRequest();
	function deleteproject(id)
	{
		if(xmlhttp !=null)
		{
			xmlhttp.onreadystatechange=function(){state_Change(id)};
			xmlhttp.open("GET","/admin/deleteproject.php?id="+id,true);
			xmlhttp.send(null);
		}else{
			alert("your browser doest not support xmlhttp");
		}
	}
	function state_Change(id)
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var resp = xmlhttp.responseText;
			var obj = eval("("+resp+")");
			if(obj.result=="success")
			{
				var ol = document.getElementById("list");
				var li = document.getElementById("p"+id);
				ol.removeChild(li);
			}
			else
				alert("delete failed");
		}
	}
</script>
	</head>
	<body>
	<h1>项目列表</h1>
	<ol id="list">
	<?php
	$con = mysql_connect("localhost","root","root");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());	
  	}

	mysql_select_db("ss", $con);

	$result = mysql_query("SELECT * FROM projects");

	while($row = mysql_fetch_array($result))
	{
		echo "<li id=p$row[id]>\n";
		echo "<a href=/admin/showproject.php?id=$row[id] >$row[name]</a>\n";
		echo "<button onclick=deleteproject($row[id])>删除</button>\n";
		echo "<a href=/admin/modifyproject.php?id=".$row['id'].">修改</a>\n";
			#echo "<img src=http://172.20.7.61".urlencode($row['picture'])."/>";
	  	echo "</li>\n";
	}

	mysql_close($con);
	?>
	</ol>
</body>
	
</html>
