<?php
	require_once('user_display.php');
	// require_once('cart.php');
	require_once("component.php");
	include_once("connectDB.php");
	$conn = new DB_conn;
	// $sql = $conn->select_product();
    

	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$user_id = $user_data['id'];
		$address_line1 = $_POST['address_line1'];
		$address_line2 = $_POST['address_line2'];
		$city = $_POST['city'];
		$postal_code = $_POST['postal_code'];
		$country = $_POST['country'];
		$mobile = $_POST['mobile'];
		$Price =$_POST['TotalPrice'];
	}
?>
 
<!DOCTYPE html>
<html lang="en">
<?php
include_once('topbar.php')
?>
    <div class="hero-wrap hero-bread" style="background-image: url('images/resos.jpg');">
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
			<form name ="user_address" id = "user_address" action="order_bill.php" class="billing-form" method="post">
				<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Firt Name</label>
	                  <input type="text" name ="first_name" id = "first_name" class="form-control" placeholder=""value = <?php echo $user_data['first_name']?>>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" name = "last_name" id = "last_name" class="form-control" placeholder="" value = <?php echo $user_data['last_name']?>>
	                </div>
                </div>
				
                <div class="w-100"></div>
		            <div class="col-md-12">
						<div class="form-group">
						<label for="state">State / Country</label>
						<input type="text" id = "country" name = "country" class="form-control" placeholder="">
					</div>    	
		            </div>
				
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input type="text" class="form-control" id="address_line1" name = "address_line1" placeholder="House number and street name">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                  <input type="text" class="form-control" id="address_line2" name="address_line2" placeholder="Appartment, suite, unit etc: (optional)">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input type="text" id="city" name ="city" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" id="postal_code" name="postal_code" class="form-control" placeholder="">
	                </div> 
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" id="mobile" name = "mobile" class="form-control" placeholder="" value= <?php echo $user_data['telephone']; ?>>
	                </div>
	              </div>
	              <!-- <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
                </div> -->
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
	        </form>
				<?php
					$subtotal = $_SESSION['checkout'];
					$discount = 0;
					$delivery = 0;
					$total = $subtotal-$discount;
					// print_r([$_SESSION['cart']]);
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
								<input type="hidden" id="TotalPrice" name ="TotalPrice" class="form-control" placeholder="" value="<?php echo $total;?>">
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
							<button class="btn btn-primary py-2 px-4" form = "user_address" name="user_address" type="submit" id="user_address">Submit</button>
							
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
