<?php
session_start();

include("connectDB.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$username = $_POST['username'];
	$password = $_POST['password'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$telephone = $_POST['telephone'];
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Signup</title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="Free HTML Templates" name="keywords">
	<meta content="Free HTML Templates" name="description">

	<!-- Favicon -->
	<link href="../img/favicon.ico" rel="icon">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="../css/style.css" rel="stylesheet">
	<style>
		form {
			text-align: center;
			margin:auto;
			margin-left: 20%;
			margin-right : -60%;
		}
	</style>
</head>

<body>
	<!-- header -->
	<?php
	include_once("../pages/topbar.php");
	?>
	<!-- header -->
	<div class="container-fluid pt-5">
		<div class="text-center mb-4">
			<h2 class="section-title px-5"><span class="px-2">Enter User</span></h2>
		</div>
		<div class="row px-xl-5">
			<div class="col-lg-7 mb-5">
				<div class="contact-form">
					<div id="success"></div>
					<form name="user" id="user" align="center" action="insert_user.php" method="post">
						<div class="control-group">
							<input type="text" class="form-control" id="first_name" name="first_name" placeholder="first name" required oninvalid="setCustomValidity('Please enter your first name')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div class="control-group">
							<input type="text" class="form-control" id="last_name" name="last_name" placeholder="last name" required oninvalid="setCustomValidity('Please enter your last name')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div class="control-group">
							<input type="text" class="form-control" id="username" name="username" placeholder="username" required oninvalid="setCustomValidity('Please enter your username name')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div class="control-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="password" required oninvalid="setCustomValidity('Please enter your password')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div class="control-group">
							<input type="int" class="form-control" id="telephone" name="telephone" placeholder="Your telephone" required oninvalid="setCustomValidity('Please enter your telephone number')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div>
							<button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send Message</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- footer -->
		<?php
		include_once("../pages/footer.php");
		?>

</body>

</html>