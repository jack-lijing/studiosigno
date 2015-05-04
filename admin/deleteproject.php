<?php
	require "class.item.php";
	$P = new item;
	$P->sql="DELETE from projects where projectid =".$_GET['id'];
	$P->open();
	$P->query();
?>
