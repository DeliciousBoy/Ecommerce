<?php
	include_once('connectDB.php');
	unset($_SESSION['user_login']);
	unset($_SESSION['admin_login']);
	unset($_SESSION['cart']);
	header("Location: index.php");
?>



