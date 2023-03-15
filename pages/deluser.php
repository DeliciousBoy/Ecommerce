<?php
include_once("connectDB.php");
$conn = new DB_conn; //สร้าง object ชื่อ $condb
?>
<?php
$sql = $conn->del_user($_GET['id']);
?>