<?php 
session_start();
include 'dbconnect.php';

$email=$_POST['email'];
$password=$_POST['password'];

//echo "$email and $password";

$sql="SELECT * FROM users WHERE email=:user_email AND password=:user_password";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':user_email',$email);
$stmt->bindParam(':user_password',$password);
$stmt->execute();
$data=$stmt->fetch(PDO::FETCH_ASSOC);


if ($data) {
	$_SESSION['loginuser']=$data;
	if ($_SESSION['loginuser']) {
		header("location:index.php");
	}else{
		header("location:login.php");
	}
}else{
	header("location:login.php");

}
 ?>

