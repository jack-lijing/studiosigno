<?php 
$con = mysql_connect("localhost","root","root");
if (!$con)
{
	die('Could not connect:'.mysql_error());
}
//Create table in ss database
mysql_select_db("ss",$con);
$sql = "CREATE TABLE projects
	(
		projectid	int NOT NULL AUTO_INCREMENT,PRIMARY	KEY(ProjectID),
		name 		varchar(15),
		introduce	varchar(1000),
		picture		varchar(100)
	)";
if(!mysql_query($sql,$con))
{
	die("Create table error".mysql_error());
}
mysql_close($con);

?>
