<?php
include_once("user_display.php");
$quantity = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="images/LOGO-OTOP.png">
	<title>OTOP</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="../css/animate.css">

	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<link rel="stylesheet" href="../css/aos.css">

	<link rel="stylesheet" href="../css/ionicons.min.css">

	<link rel="stylesheet" href="../css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="../css/jquery.timepicker.css">


	<link rel="stylesheet" href="../css/flaticon.css">
	<link rel="stylesheet" href="../css/icomoon.css">
	<link rel="stylesheet" href="../css/style.css">
</head>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="index.php"><img src="images/LOGO-OTOPn.png" alt="" width="130" height="50"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>
					<div class="dropdown-menu" aria-labelledby="dropdown04">
						<a class="dropdown-item" href="shop.php">Shop</a>
						<a class="dropdown-item" href="cart.php">Cart</a>
						<a class="dropdown-item" href="checkout.php">Checkout</a>
					</div>
				</li>
				<li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>
						<?php
						if (isset($_SESSION['cart'])) {
							$count = count($_SESSION['cart']);
							echo '<spand id = "cart_count">' . ($count * $quantity) . '</spand>';
						} else {
							echo '<spand id="cart_count">0</spand>';
						}
						?>
					</a></li>
				<?php //echo $user_data['first_name'] . ' ' . $user_data['last_name'] 
				?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user_data['first_name'] . ' ' . $user_data['last_name'] ?></span>
						<!-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> -->
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu" aria-labelledby="dropdown04">
						
						<a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
					</div>
				</li>

			</ul>
		</div>

	</div>
</nav>
</body>