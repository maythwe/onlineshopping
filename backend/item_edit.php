<?php
	session_start();
  		if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=="Admin") {
			include 'include/header.php';
			include 'dbconnect.php';

$id=$_GET['id'];
//echo $id;

$sql="SELECT * FROM items WHERE items.id=:item_id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':item_id',$id);
$stmt->execute();
$item=$stmt->fetch(PDO::FETCH_ASSOC);

//var_dump($item);

 ?>


	 <!-- Page Heading -->
	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
	 	<h1 class="h3 mb-0 text-gray-800">Item</h1>
	 	<a href="item_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i>Go Back</a>
	 </div>

	 <div class="row">
	 	<div class="offset-md-2 col-md-8">
	 		<form action="updateitem.php" method="POST" enctype="multipart/form-data">
	 			<input type="hidden" name="id" value="<?php echo $item['id']?>">
	 			<input type="hidden" name="codeno" value="<?php echo $item['codeno']?>">
	 			<div class="form-group">
	 				<label for="name">Item Name</label>
	 				<input type="text" name="name" id="name" class="form-control" value="<?php echo $item['name'] ?>">
	 			</div>
	 			<div class="form-group">
	 				<label for="photo">Item Photo</label>
	 				<input type="file" name="photo" id="photo" class="form-control-file" accept="image/*">
	 				<input type="hidden" name="oldphoto" value="<?php echo $item['name'] ?>">
	 				<img src="<?php echo $item['photo']?>" width="150" height="150">
	 			</div>
	 			<ul class="nav nav-tabs" id="myTab" role="tablist">
	 				<li class="nav-item" role="presentation">
	 					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#price" role="tab" aria-controls="home" aria-selected="true">Unit Price</a>
	 				</li>
	 				<li class="nav-item" role="presentation">
	 					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#discount" role="tab" aria-controls="profile" aria-selected="false">Discount Price</a>
	 				</li>
	 			</ul>
	 			<div class="tab-content" id="myTabContent">
	 				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	 					<input type="number" name="price" class="form-control mt-3" placeholder="Unit Price" value="<?php echo $item['price'] ?>">
	 				</div>
	 				<div class="tab-pane fade" id="discount" role="tabpanel" aria-labelledby="profile-tab">
	 					<input type="number" name="discount" class="form-control mt-3" placeholder="Discount Price" value="<?php echo $item['discount'] ?>">
	 				</div>
	 			</div>
	 			<div class="form-group">
	 				<label>Brand</label>
	 				<select class="form-control" name="brand" id="brand">
	 					<option>Choose...</option>

	 					<?php 
	 						$sql="SELECT * From brands";
	 						$stmt=$pdo->prepare($sql);
	 						$stmt->execute();
	 						$brands=$stmt->fetchAll();

	 						foreach ($brands as $brand) {
	 					 ?>
	 					 <option value="<?php echo $brand['id']; ?>"<?php 
	 					 if ($brand['id']==$item['brand_id']) {
	 					  	echo "selected";
	 					  } ?>><?php echo $brand['name']; ?></option>

	 					<?php } ?>

	 				</select>
	 			</div>
	 			<div class="form-group">
	 				<label for="subcategory">Subcategory</label>
	 				<select class="form-control" name="subcategory">
	 					<option>Choose..</option>

	 					<?php 

	 					$sql="SELECT * FROM subcategories";
	 					$stmt=$pdo->prepare($sql);
	 					$stmt->execute();
	 					$subcategories=$stmt->fetchAll();

	 					foreach ($subcategories as $subcategory) {

	 					 ?>
	 					 <option value="<?php echo $subcategory['id']; ?>"<?php 
	 					 if ($subcategory['id']==$item['subcategory_id']) {
	 					  	echo "selected";
	 					  } ?>><?php echo $subcategory['name']; ?></option>
	 					<?php } ?>
	 				</select>
	 			</div>
	 			<div class="form-group">
	 				<label for="description">Description</label>
	 				<textarea class="form-control" name="description" id="description"><?php echo $item['description'] ?></textarea>
	 			</div>
	 			<input type="submit" class="btn btn-primary float-right" value="Update">
	 		</form> 
	 	</div>
	 </div>





 <?php 

include 'include/footer.php';
}else{
  header("location:../index.php");
}

  ?>