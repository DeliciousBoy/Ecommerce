<?php 
    include_once("connectDB.php");
    require_once('user_display.php');
    $conn = new DB_conn;
    $con = $conndb->conn;
    
    // $id = $_POST['id'];
    $user_id = $user_data['id'];
    $address_line1 = $_POST['address_line1'];
    $address_line2 = $_POST['address_line2'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];
    $mobile = $_POST['mobile'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    // $order = $_SESSION['cart'];
    
    
    echo 'user_id: ',$user_id ,' ','name: ',$first_name, $last_name, ' address: ' ,$address_line1, $address_line2,'  city: ' ,$city," postal_code: " ,$postal_code
    ,' country: ', $country, " mobile: ",$mobile;

    $sql = $conndb->insert_order($user_id,$address_line1,$address_line2,$city,$postal_code,$country,$mobile);
    if(mysqli_query($con,$sql)){
        printf("%d Row insert. \n",mysqli_affected_rows($con));
    }
    
    // if($sql){
    //     echo "<script>alert('add order สำเร็จ')</script>";
    //     echo "<script>window.location.href='login.php' </script>";
    // }else{
    //     echo "<script>alert('เกิดข้อผิดพลาด')</script>";
    //     echo "<script>window.location.href='signup.php' </script>";
    // }
       
    
    mysqli_close($con);
?>