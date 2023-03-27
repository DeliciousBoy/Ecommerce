<?php 
    include("connectDB.php");
    $conndb = new DB_conn; 
    $con = $conndb->conn; 
    if(!isset($_SESSION['admin_login'])){
        $_SESSION['warning'] = 'กรุณาเข้าสู่ระบบ';
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">
    <title> admin page</title>
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
<body?>
    <div class="container">
    <?php
        if (isset($_SESSION['admin_login'])) {

            //ส่วนในการดึงข้อมูลจาก table 
            $user = $_SESSION['admin_login'];
            $stmt = mysqli_prepare($con,"SELECT * FROM user WHERE username = ?");
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                echo '<h3 class="mt-4">Welcome, '.$user_data['first_name'].' '.$user_data['last_name'].'</h3>';
            } else {
                echo '<p>Failed to retrieve user data</p>';
            }
        } else {
            echo '<p>You are not authorized to view this page</p>';
        }
        ?>
        <a href="logout.php " class="btn btn-danger" > logout </a>
        <!-- <h3 class="mt-4"> Welcome , <?php echo $user_data['firstname'] . ' ' . $user_data['lastname'] ?></h3> -->
    </div>
</body>
</html>
