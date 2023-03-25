<?php
include_once("connectDB.php");
$conndb = new DB_conn; 
$con = $conndb->conn;

$user =$_POST['username'];
$pass =$_POST['password'];
$first =$_POST['first_name'];
$last =$_POST['last_name'];
$tele =$_POST['telephone'];


echo $user, $pass, $first, $last, $tele;

$sql = $conndb->insert_user($user, $pass, $first, $last, $tele); 

if(mysqli_query($con,$sql)){
    printf("%d Row insert. \n",mysqli_affected_rows($con));
}

if($sql){
    // echo "<script>alert('add user สำเร็จ')</script>";
    echo "<script>window.location.href='login.php' </script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด')</script>";
 echo "<script>window.location.href='signup.php' </script>";
 }
   

mysqli_close($con);

