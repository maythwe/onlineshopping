<?php 
	include 'dbconnect.php';

	$name=$_POST['name'];
	$phno=$_POST['phno'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$photo=$_FILES['photo'];

	$basepath="img/users/";
	$fullpath=$basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $fullpath);


	//echo "$name and $price and $discount and $brand and $subcategory and $description and $codeno<br>";
	//print_r($photo);

	$sql="INSERT INTO users(name,profile,phone,address,email,password)VALUES(:user_name,:user_profile,:user_phno,:user_address,:user_email,:user_password)";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':user_name',$name);
	$stmt->bindParam(':user_profile',$fullpath);
	$stmt->bindParam(':user_phno',$phno);
	$stmt->bindParam(':user_address',$address);
	$stmt->bindParam(':user_email',$email);
	$stmt->bindParam(':user_password',$password);

	$stmt->execute();

	if($stmt->rowCount()){
		header("location:index.php");
	}else{
		echo "Error";
	}

 ?>