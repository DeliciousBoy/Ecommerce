<?php
include_once("connectDB.php");
$conn = new DB_conn; 
?>
<?php
$sql = $conn->del_product($_GET['p_id']);
if ($sql) {
    echo "<script>alert('ลบสินค้าสำเร็จ')</script>";
    echo "<script>window.location.href='cart.php' </script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาด')</script>";
}
?>