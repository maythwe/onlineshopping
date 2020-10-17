<?php 
include 'include/header.php';
include 'backend/dbconnect.php';

$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON  items.subcategory_id=subcategories.id ORDER BY items.id DESC LIMIT 8";




	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$items=$stmt->fetchAll();
	//var_dump($items);


 ?>

	<div class="container container-carousel pb-4">
		<div class="carousel slide" id="headerCarousel" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#headerCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#headerCarousel" data-slide-to="1" class=""></li>
				<li data-target="#headerCarousel" data-slide-to="2" class=""></li>
			</ol>
			<div class="carousel-inner">
				 <div class="carousel-item active">
				 	<img src="img/cover4.jpg" class="d-block w-100">
				 	<div class="img-overlay"></div>
				 	<div class="carousel-caption">
				 		<h3>Easy to Choose</h3>
				 		<p>lsorem ipsum dolor sit amet, consectetur adipisicing elit</p>
				 	</div>
				 </div>
				 <div class="carousel-item">
				 	<img src="img/cover3.jpg" class="d-block w-100">
				 	<div class="img-overlay"></div>
				 	<div class="carousel-caption">
				 		<h3>Pleasure</h3>
				 		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
				 	</div>
				 </div>
				 <div class="carousel-item">
				 	<img src="img/cover2.jpg" class="d-block w-100">
				 	<div class="img-overlay"></div>
				 	<div class="carousel-caption">
				 		<h3>Many Design</h3>
				 		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
				 	</div>
				 </div>
			</div>
			
		</div>
	</div>

	<h3 class="text-center py-4 text-dark">NEW ARRIVAL</h3>

	<div class="container my-4 py-4">
		<div class="row">
			<?php 

				foreach ($items as $item) {
			?>
			<div class="col-lg-3 col-md-3 col-sm-6 py-4">
				<div class="card">
					<div class="inner">
						<img src="backend/<?=$item['photo'] ?>" alt="Card image cap" class="card-img-top">
						<div class="overlay" data-target="#product_detail" data-toggle="modal">
							<button class="btn btn-warning border-radius view_detail" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>" data-price="<?= $item['price'] ?>" data-discount="<?= $item['discount'] ?>" data-brand="<?= $item['brand_name'] ?>" data-subcategory="<?= $item['sub_name'] ?>" data-description="<?= $item['description'] ?>" data-photo="<?= $item['photo'] ?>">Quick View</button>
						</div> 
					</div>
					<div class="card-body text-justify item-card-body">
						<p class="py-1 my-0 text-muted">Category: <?=$item['sub_name'] ?></p>
						<p class="py-1 my-0 text-muted">Name: <?=$item['name'] ?></p>
						<p class="py-1 my-0 text-muted">Price:
							<?php 
								if (isset($item['discount'])) {
									echo $item['discount']."MMK";


							 ?>
							 <del class="d-block ml-4"><?= $item['price']."MMK"; ?></del>
							 <?php 
							 }else{
							 	echo $item['price']."MMK";
							 } ?>
						</p>
						<div class="container-fluid p-0 m-0">
							<div class="row text-center p-0 m-0">
								<div class="col-md-6 item-bg mt-1">
									<a href="" class="text-decoration-none text-dark item-save">
										<i class="fas fa-heart fa-lg py-3"></i>
									</a>
								</div>
								<div class="col-md-6 item-bg mt-1">
									<a href="javascript:void(0)" class="text-decoration-none text-dark item-add addtocart" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>" data-price="<?= $item['price'] ?>" data-discount="<?= $item['discount'] ?>">
										<i class="fas fa-cart-plus fa-lg py-3 item-add"></i>
									</a>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<?php } ?>


		
		</div>

	</div>

	<div class="text-center">
		<button class=" btn btn-outline-info"><a href="product.php" class="nav-link">
		View More..</a></button>
	</div>

	<!-- <div class="container">
		<div class="row slick">
			<div class="col-lg-3">
				<img src="img/bag1.jpg" class="card-img-top">
				<p class="pt-2 text-center">Name:Bag 1</p>
			</div>
		</div>
	</div> -->
	
	<?php 
		include 'include/footer.php';



	 ?>