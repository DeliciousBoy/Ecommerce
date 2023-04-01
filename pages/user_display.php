<?php
    
    include_once('connectDB.php');
    $conndb = new DB_conn; 
    $con = $conndb->conn;

    // if(!isset($_SESSION['admin_login']) or !isset($_SESSION['admin_login'])){
    //     $_SESSION['warning'] = 'กรุณาเข้าสู่ระบบ';
    //     header('location: login.php');
    // }

    if (isset($_SESSION['user_login']) or isset($_SESSION['admin_login'])) {

        //ส่วนในการดึงข้อมูลจาก table
        if (isset($_SESSION['user_login'])){
            $user = $_SESSION['user_login'];
            $stmt = mysqli_prepare($con,"SELECT * FROM user WHERE username = ?");
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
            } 
        }else if(isset($_SESSION['admin_login'])){
            $user = $_SESSION['admin_login'];
            $stmt = mysqli_prepare($con,"SELECT * FROM user WHERE username = ?");
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
            }
        }

    }
?>