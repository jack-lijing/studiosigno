<?PHP
	require "class.item.php";
	$P = new item;
	$P->name = $_POST['name'];
	$P->introduce= $_POST['intro'];
	$P->id= $_POST['id'];
	$P->sql="update  projects set name='$P->name',introduce='$P->introduce' where id=$P->id ";
	$P->open();
	$P->query();

?>
