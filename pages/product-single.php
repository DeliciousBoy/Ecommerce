<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	include_once('topbar.php');
	include_once('connectDB.php');
	include_once("component.php");
	$conn = new DB_conn;
	?>
</head>
<?php

if (isset($_GET['product_id'])) {
	$id = $_GET['product_id'];
	$product_data = $conn->select_singlePro($id);
	$product = mysqli_fetch_array($product_data);
	if (isset($_POST['p_add'])) {
		if (isset($_POST['p_id']) && isset($_POST['pName'])) {
			$p_id = $_POST['p_id'];
			$p_name = $_POST['pName'];
			//echo "<script>alert('You added " . $_POST['pName'] . " to your cart')</script>";*/
			if (isset($_SESSION['cart'])) {
				$count = count($_SESSION['cart']);
				$item_array = array('p_id' => $p_id, 'p_name' => $p_name);
				$_SESSION['cart'][$count] = $item_array;
			} else {
				$item_array = array('p_id' => $p_id, 'p_name' => $p_name);
				$_SESSION['cart'] = array($item_array);
			}
		} else {
			echo "<script>alert('Error: Missing key(s) in POST data')</script>";
		}
	}

?>

	<body class="goto-here">
		<section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mb-5 ftco-animate">
						<a href="<?php echo $product['pImage'] ?>" class="image-popup prod-img-bg"><img src="<?php echo $product['pImage'] ?>" class="img-fluid" alt="Colorlib Template"></a>
					</div>
					<div class="col-lg-6 product-details pl-md-5 ftco-animate">
						<h3><?php echo $product['pName'] ?></h3>
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
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" name="p_id" value="<?php echo $product['p_id'] ?>">
							<input type="hidden" name="pName" value="<?php echo $product['pName']  ?>">
							<button class="add-to-cart text-center py-2 mr-1" type="submit" name="p_add" id="p_add"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></button>
							<a href="cart.php"><button class="buy-now text-center py-2 mr-1" type="submit" name="p_add" id="p_add">Buy now<span><i class="ion-ios-cart ml-1"></i></span></button></a>
						</form>
						</p>
					</div>
				</div>
			</div>
		</section>
	<?php
} else {
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
				if (quantity > 1) {
					$('#quantity').val(quantity - 1);
				}
			});

			// $('.add-to-cart').click(function(e) {
			// 	e.preventDefault();
			// 	var quantity = parseInt($('#quantity').val());
			// });
		});
	</script>

	</body>

</html>