<?php
session_start();

include("connectionDB.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$telephone = $_POST['telephone'];

	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

		//save to database
		$user_id = random_num(20);
		$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

		mysqli_query($con, $query);

		header("Location: login.php");
		die;
	} else {
		echo "Please enter some valid information!";
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Signup</title>
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
					<form name="user" id="user" novalidate="novalidate" action="insert_user.php" method="post">
						<div class="control-group">
							<input type="email" class="form-control" id="first_name" name="first_name" placeholder="first name" required oninvalid="setCustomValidity('Please enter your first name')" oninput="setCustomValidity('')" />
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
							<input type="text" class="form-control" id="password" name="password" placeholder="password" required oninvalid="setCustomValidity('Please enter your password')" oninput="setCustomValidity('')" />
							<p class="help-block text-danger"></p>
						</div>
						<div class="control-group">
							<input type="password" class="form-control" id="telephone" name="telephone" placeholder="Your telephone" required oninvalid="setCustomValidity('Please enter your telephone number')" oninput="setCustomValidity('')" />
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