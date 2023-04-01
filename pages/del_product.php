<?php
include_once("connectDB.php");
$conn = new DB_conn; //สร้าง object ชื่อ $condb
?>
<?php
$sql = $conn->del_product($_GET['p_id']);
if ($sql) {
    echo "<script>alert('ลบข้อมูลสําเร็จ')</script>";
    header('location: admin_ptest.php');
} else {
    echo "<script>alert('เกิดข้อผิดพลาด')</script>";
}
?>