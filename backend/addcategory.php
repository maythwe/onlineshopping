<?php 
	include 'dbconnect.php';

	$name=$_POST['name'];
	$photo=$_FILES['photo'];

	$basepath="img/categories/";
	$fullpath=$basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $fullpath);

	//echo "$name<br>";
	//print_r($photo);

	$sql="INSERT INTO categories (name,logo) VALUES(:category_name,:category_photo)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':category_name',$name);
	$stmt->bindParam(':category_photo',$fullpath);

	$stmt->execute();

	if($stmt->rowCount()){
		header("location:category_list.php");
	}else{
		echo "Error";
	}


?>