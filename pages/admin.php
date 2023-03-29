<?php 
    include("connectDB.php");
    $conndb = new DB_conn; 
    $con = $conndb->conn; 
    
    if(!isset($_SESSION['admin_login'])){
        $_SESSION['warning'] = 'กรุณาเข้าสู่ระบบ';
        header('location: login.php');
    }
?>
