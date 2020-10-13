<?php 
	include 'dbconnect.php';

	$name=$_POST['name'];

	$basepath="img/subcategories/";
	

	//echo "$name<br>";
	//print_r($photo);

	$sql="INSERT INTO subcategories (name) VALUES(:category_name)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':category_name',$name);

	$stmt->execute();

	if($stmt->rowCount()){
		header("location:subcategory_list.php");
	}else{
		echo "Error";
	}


?>