<?php   
    include_once("connectDB.php");

    if(!isset($_SESSION['user_login']) and !isset($_SESSION['admin_login'])){
        $_SESSION['warning'] = 'กรุณาเข้าสู่ระบบ';
        header('location: login.php');
    }
?>