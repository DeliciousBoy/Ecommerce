<?php


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
<html lang="en">

<head>
	<title>Signup</title>
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
	<div class="container-fluid pt-5">
		<div class="text-center mb-4">
			<h2 class="section-title px-5"><span class="px-2">Sign up</span></h2>
		</div>
		<div class="row px-xl-5">
			<div class="col-lg-7 mb-5">
				<div class="contact-form">
					<div id="success"></div>
					<form name="user" id="user" align="center" action="insert_user.php" method="post">
						
						<?php if (isset($_SESSION['warning'])) { ?>
							<div class="alert alert-warning" role = "alert">
								<?php 
									echo $_SESSION['warning'];
									unset($_SESSION['warning']);
								?>
							</div>

						<?php } ?>
						<?php if (isset($_SESSION['sucess'])) { ?>
							<div class="alert alert-sucess" role = "alert">
								<?php 
									echo $_SESSION['sucess'];
									unset($_SESSION['sucess']);
								?>
							</div>

						<?php } ?>
						
						<div class="control-group">
							<input type="text" class="form-control" id="first_name" name="first_name" placeholder="first name" 
							required oninvalid="setCustomValidity('Please enter your first name')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div class="control-group">
							<input type="text" class="form-control" id="last_name" name="last_name" placeholder="last name" 
							required oninvalid="setCustomValidity('Please enter your last name')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div class="control-group">
							<input type="text" class="form-control" id="username" name="username" placeholder="username" 
							required oninvalid="setCustomValidity('Please enter your username name')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div class="control-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="password" 
							required oninvalid="setCustomValidity('Please enter your password')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div class="control-group">
							<input type="int" class="form-control" id="telephone" name="telephone" placeholder="your telephone" 
							required oninvalid="intValidity('Please enter your telephone number')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div>
							<button class="btn btn-primary py-2 px-4" name="signup" type="submit" id="sendMessageButton">Submit</button>
							
						</div>
						<div>
							<hr>
								<p> เป็นสมาชิกแล้วใช่มั๊ย <a href="login.php"> login </a></p>
							</hr>
						</div>
					</form>
					
				</div>
			</div>
			
		</div>
		
</body>

</html>