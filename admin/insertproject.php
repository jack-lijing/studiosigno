<?PHP
	require "class.item.php";
	$P = new item;
	$P->name = $_POST['name'];
	$P->introduce= $_POST['intro'];
	$P->picture= $_POST['picture'];
	$P->sql="INSERT INTO projects (name,introduce,picture) VALUES ('$P->name','$P->introduce','$P->picture')";
	$P->open();
	$P->query();

?>
