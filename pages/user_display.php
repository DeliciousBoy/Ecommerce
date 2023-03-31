<?php
    include_once('connectDB.php');
    $conndb = new DB_conn; 
    $con = $conndb->conn;

    if (isset($_SESSION['user_login'])) {

        //ส่วนในการดึงข้อมูลจาก table 
        $user = $_SESSION['user_login'];
        $stmt = mysqli_prepare($con,"SELECT * FROM user WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

        } else {
            // echo '<p>Failed to retrieve user data</p>';
            ;

        }
    } else {
        ;
        // echo '<p>You are not authorized to view this page</p>';

    }
    // echo $user_data['first_name'].' '.$user_data['last_name']
?>