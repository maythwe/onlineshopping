<?php  

	include 'dbconnect.php';

	$id=$_GET['id'];

	$sql="DELETE FROM brands WHERE brands.id=:brand_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':brand_id',$id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:brand_list.php");
	}else{
		echo "Error";
	}

?> 