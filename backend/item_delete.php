<?php  

	include 'dbconnect.php';

	$id=$_GET['id'];

	$sql="DELETE FROM items WHERE items.id=:item_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':item_id',$id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:item_list.php");
	}else{
		echo "Error";
	}

?> 