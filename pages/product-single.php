<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	include_once('topbar.php');
	include_once('connectDB.php');
	require_once("component.php");	
	$conn = new DB_conn;
	?>
</head>
<?php

if(isset($_GET['product_id'])){
	$id = $_GET['product_id'];
	$product_data = $conn->select_singlePro($id);
	$product = mysqli_fetch_array($product_data);
	echo $product['pImage'];
?>
<body class="goto-here">
	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mb-5 ftco-animate">
					<a href="<?php $product['pImage']?>" class="image-popup prod-img-bg"><img src="<?php $product['pImage']?>" class="img-fluid" alt="Colorlib Template"></a>
				</div>
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					<h3><?php echo $product['pName']?></h3>
					<p><?php echo $product['pDetails'] ?></p>
					<p class="price"><span>Price : <?php echo $product['pPrice'] ?> baht</span></p>
					<div class="row mt-4">
						<div class="w-100"></div>
						<div class="input-group col-md-6 d-flex mb-3">
							<span class="input-group-btn mr-2">
								<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
									<i class="ion-ios-remove"></i>
								</button>
							</span>
							<input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
							<span class="input-group-btn ml-2">
								<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
									<i class="ion-ios-add"></i>
								</button>
							</span>
						</div>
						<div class="w-100"></div>
					</div>
					<p>
						<a href="cart.html" class="btn btn-black py-3 px-5 mr-2">Add to Cart</a>
						<a href="cart.html" class="btn btn-primary py-3 px-5">Buy now</a>
					</p>
				</div>
			</div>
		</div>
	</section>
	<?php
}else{
	echo "something went wrong";
}
	?>
	<?php
	include_once('footer.php');
	?>

	<script>
		$(document).ready(function() {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function(e) {

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				$('#quantity').val(quantity + 1);


				// Increment

			});

			$('.quantity-left-minus').click(function(e) {
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				// Increment
				if (quantity > 0) {
					$('#quantity').val(quantity - 1);
				}
			});

		});
	</script>

</body>

</html>