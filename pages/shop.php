<?php

require_once("component.php");
include_once("connectDB.php");
$conn = new DB_conn;
$sql = $conn->select_product();

if (isset($_POST['p_add'])) {
	//echo "<script>alert('" .$_POST['pName']. "')</script>";
	if (isset($_SESSION['cart'])) {
		#check duplicate products
		$item_array_id = array_column($_SESSION['cart'], 'p_id');
		if (in_array($_POST['p_id'], $item_array_id)) {
			echo '<script> alert ("มีสินค้านี้อยู่ในตระกร้าแล้ว")</script>';
			echo '<script> window.location="shop.php"</script>';
		} else {
			$count = count($_SESSION['cart']);
			$item_array = array('p_id' => $_POST['p_id']);
			$_SESSION['cart'][$count] = $item_array;
			print_r($_SESSION['cart']);
		}
	} else {
		$item_array = array('p_id' => $_POST['p_id']);
		$_SESSION['cart'][0] = $item_array;
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<?php
include_once('topbar.php')
?>

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
		<div class="container">
			<div class="row no-gutters slp_ider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<h1 class="mb-0 bread">Shop</h1>
				</div>
			</div>
		</div>
	</div>

	<!--Products-->
	<?php
	while ($data = mysqli_fetch_array($sql)) {
		echo component($data['pName'],$data['pDetails'],$data['pPrice'],$data['pImage']);
	}
	?>
	</div>
	</div>
	</div>
	</div>
	</section>

	<?php
	include_once ('footer.php');
	?>

	<!-- loader -->
	<div p_id="ftco-loader" class="show fullscreen"><svg class="circular" wp_idth="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-wp_idth="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-wp_idth="4" stroke-miterlimit="10" stroke="#F96D00" />
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

</body>

</html>