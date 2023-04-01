<?php
require_once('user_display.php');
require_once("component.php");
include_once("connectDB.php");
$conn = new DB_conn;
$sql = $conn->select_product();

?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('topbar.php')
?>

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="shop.php">Home</a></span> <span>Checkout</span></p>
				<h1 class="mb-0 bread">Checkout</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-10 ftco-animate">
				<form action="#" class="billing-form">
					<h3 class="mb-4 billing-heading">Billing Details</h3>
					<div class="row align-items-end">
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstname">Firt Name</label>
								<input type="text" class="form-control" placeholder="" value=<?php echo $user_data['first_name'] ?>>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="lastname">Last Name</label>
								<input type="text" class="form-control" placeholder="" value=<?php echo $user_data['last_name'] ?>>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="state">State / Country</label>
								<input type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="streetaddress">Street Address</label>
								<input type="text" class="form-control" placeholder="House number and street name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="towncity">Town / City</label>
								<input type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="postcodezip">Postcode / ZIP *</label>
								<input type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input type="text" class="form-control" placeholder="" value=<?php echo $user_data['telephone']; ?>>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="emailaddress">Email Address</label>
								<input type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group mt-4">
								<div class="radio">
									<label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
									<label><input type="radio" name="optradio"> Ship to different address</label>
								</div>
							</div>
						</div>
					</div>
				</form><!-- END -->

				<?php
					$subtotal = $_SESSION['checkout'];
					$discount = 0;
					$delivery = 0;
					$total = $subtotal-$discount;
				?>

				<div class="row mt-5 pt-3 d-flex">
					<div class="col-md-6 d-flex">
						<div class="cart-detail cart-total bg-light p-3 p-md-4">
							<h3 class="billing-heading mb-4">Cart Total</h3>
							<p class="d-flex">
								<span>Subtotal</span>
								<span><?php echo $subtotal ?></span>
							</p>
							<p class="d-flex">
								<span>Delivery</span>
								<span><?php echo $delivery ?></span>
							</p>
							<p class="d-flex">
								<span>Discount</span>
								<span><?php echo $discount ?></span>
							</p>
							<hr>
							<p class="d-flex total-price">
								<span>Total</span>
								<span><?php echo $total ?></span>
							</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="cart-detail bg-light p-3 p-md-4">
							<h3 class="billing-heading mb-4">Payment Method</h3>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
										<label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
									</div>
								</div>
							</div>
							<p><a href="shop.php"  class="btn btn-primary py-3 px-4">Place an order<?php unset($_SESSION['cart']);?></a></p>
						</div>
					</div>
				</div>
			</div> <!-- .col-md-8 -->
		</div>
	</div>
</section> <!-- .section -->


<?php
include_once('footer.php');
?>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
	</svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

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
<!-- logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="logout.php">Logout</a>
			</div>
		</div>
	</div>
</div>
</body>

</html>