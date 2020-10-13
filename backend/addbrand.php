<?php 
	include 'dbconnect.php';

	$name=$_POST['name'];
	$photo=$_FILES['photo'];

	$basepath="img/brands/";
	$fullpath=$basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $fullpath);

	//echo "$name and $price and $discount and $brand and $subcategory and $description and $codeno<br>";
	//print_r($photo);

	$sql="INSERT INTO brands(name,photo)VALUES(:brand_name,:brand_photo)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':brand_name',$name);
	$stmt->bindParam(':brand_photo',$fullpath);

	$stmt->execute();

	if($stmt->rowCount()){
		header("location:brand_list.php");
	}else{
		echo "Error";
	}


?>