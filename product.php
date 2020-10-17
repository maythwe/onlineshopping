
<?php 
	 include 'include/header.php';
	 include 'backend/dbconnect.php';

	$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON  items.subcategory_id=subcategories.id ORDER BY items.id DESC LIMIT 8";




	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$items=$stmt->fetchAll();


 ?>
 <br><br><br>
	<h3 class="text-center py-4">OUR PRODUCTS</h3>
	<div class="container">
		<div class="row">
			<?php 

			foreach ($items as $item) {
				?>
				<div class="col-lg-3 col-md-3 col-sm-6 py-4">
					<div class="card">
						<div class="inner">
							<img src="backend/<?=$item['photo'] ?>" class="card-img-top">
						</div>
						<div class="card-body text-justify item-card-body">
							<p class="py-1 my-0 text-muted">Category: <?=$item['name'] ?></p>
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

	
	<?php 
		include 'include/footer.php';
	 ?>