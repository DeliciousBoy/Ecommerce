<?php
// session_start();

	include("connectDB.php");
	include("functions.php");
	
?>


<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
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
			<h2 class="section-title px-5"><span class="px-2">Log in</span></h2>
		</div>
		<div class="row px-xl-5">
			<div class="col-lg-7 mb-5">
				<div class="contact-form">
					<div id="success"></div>
					<form name="user" id="user" align="center" action="user_login.php" method="post">
						
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
							<input type="text" class="form-control" id="username" name="username" placeholder="username" 
							required oninvalid="setCustomValidity('Please enter your username name')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div class="control-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="password" 
							required oninvalid="setCustomValidity('Please enter your password')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div>
							<button class="btn btn-primary py-2 px-4" id = "login "name="login" type="login" id="sendMessageButton">Login</button>
							
						</div>
						<div>
							<hr>
								<p> ยังไม่เป็นสมัครสมาชิกใช่ไหม คลิ๊กที่นี่เพื่อ <a href="signup.php"> Sign up </a></p>
							</hr>
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