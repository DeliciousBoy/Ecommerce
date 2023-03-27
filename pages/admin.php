<?php 
    include("connectDB.php");
    $conndb = new DB_conn; 
    $con = $conndb->conn; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">
    <title> admin page</title>
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
        <!-- <h3 class="mt-4"> Welcome , <?php echo $user_data['firstname'] . ' ' . $user_data['lastname'] ?></h3> -->
    </div>
</body>
</html>
