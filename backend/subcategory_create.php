<?php
session_start();
  	if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=="Admin") {
include 'include/header.php';
include 'dbconnect.php';

 ?>


	 <!-- Page Heading -->
	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
	 	<h1 class="h3 mb-0 text-gray-800">Subcategory Create</h1>
	 	<a href="subcategory_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i>Go Back</a>
	 </div>

	 <div class="row">
	 	<div class="offset-md-2 col-md-8">
	 		<form action="addsubcategory.php" method="POST">
	 			<div class="form-group">
	 				<label for="name">Subcategory Name</label>
	 				<input type="text" name="name" id="name" class="form-control">
	 			</div>
	 			<div class="form-group">
	 				<label for="category">Category</label>
	 				<select class="form-control" name="category">
	 					<option>Choose..</option>

	 					<?php 

	 					$sql="SELECT * FROM categories";
	 					$stmt=$pdo->prepare($sql);
	 					$stmt->execute();
	 					$categories=$stmt->fetchAll();

	 					foreach ($categories as $category) {

	 						?>
	 						<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
	 					<?php } ?>
	 				</select>
	 			</div>

	 			<input type="submit" class="btn btn-primary float-right" value="Save">
	 			
	 		</form> 
	 	</div>
	 </div>





 <?php 

include 'include/footer.php';
}else{
  		header("location:../index.php");
		}

  ?>