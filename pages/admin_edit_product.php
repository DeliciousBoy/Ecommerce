<?php
    require_once('admin.php');
    include_once("connectDB.php");
    $conn = new DB_conn;
    $sql = $conn->display_product_edit($_GET['id']);
    // $row = $conn->insert_user($sql);
    while ($data = mysqli_fetch_array($sql)) {
        $pname = $data['pName'];
        $pdetail = $data['pDetails'];
        $price = $data['pPrice'];
        $c_id = $data['id'];
    }
    
    $id = $_GET['id'];
    if (isset($_POST['Pedit'])) {
        $pname = $_POST['pname'];
        $pdetail = $_POST['pDetails'];
        $price = $_POST['pPrice'];
        $c_id = $_POST['id'];
        $sql = $conn->edit_product($id,$pname, $pdetail, $price, $c_id);
        echo $sql;
        if ($sql) {
            header('location: admin_product_table.php');
        } else {
            $_SESSION['warning'] = 'เกิดข้อผิดพลาด';
        }
    }
?>


