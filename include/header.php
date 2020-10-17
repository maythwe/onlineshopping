<?php 
	session_start();
	include 'backend/dbconnect.php';
	$sql="SELECT * FROM categories";
	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$categories=$stmt->fetchAll();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>May Online Collections</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="icon" href="img/favicon (6).ico" type="image/x-icon">

	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light menu fixed-top">
		<a class="navbar-brand" href="#">May Collections</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Categories
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
				        	<?php 

				        	foreach ($categories as $category) {
				        		
				        	?>
				        		<a class="dropdown-item" href="categories.php?id=<?=$category['id']?>"><?=$category['name']?></a>
					       	<?php } ?>
				          
				        </div>
				      </li>
				<li class="nav-item">
					<a class="nav-link" href="about.php">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">Contact</a>
				</li>

				<?php 
					if (isset($_SESSION['loginuser'])) {
		
				 ?>
				 <li class="nav-item dropdown">
				 	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				 		<?= $_SESSION['loginuser']['name']; ?>
				 	</a>
				 	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				 		<a class="dropdown-item" href="">Profile</a>
				 		<a class="dropdown-item" href="backend/logout.php">Log Out</a>
				 	</div>
				 </li>
				<?php }else{
				 ?>
				
				<li class="nav-item">
					<a class="nav-link" href="backend/login.php">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="backend/register.php">Register</a>
				</li>
				<?php } ?>
				<li class="nav-item">
						<a href="checkout.php" class="nav-link" id="count">
							<span class="p1 fa-stack has-badge" id="item_count">
								<i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse"></i>
							</span>
						
						</a>
					</li>
			</ul>
		</div>
	</nav>