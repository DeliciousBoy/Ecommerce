<?php
    require_once('admin.php');
    include_once("connectDB.php");
    $conn = new DB_conn;
    $sql = $conn->display_product_edit($_GET['p_id']);
    // $row = $conn->insert_user($sql);
    while ($data = mysqli_fetch_array($sql)) {
        $pname = $data['pName'];
        $pdetail = $data['pDetails'];
        $price = $data['pPrice'];
        $pimage = $data['pImage'];
        $c_id = $data['id'];
    }

    $id = $_GET['p_id'];
    if (isset($_POST['Pedit'])) {
        $pname = $_POST['pname'];
        $pdetail = $_POST['lname'];
        $price = $_POST['uname'];
        $pimage = $_POST['telephone'];
        $c_id = $_POST['role'];
        $sql = $conn->edit_product($id,$pname, $pdetail, $price,$pimage, $c_id);
        echo $sql;
        if ($sql) {
            header('location: admin_tables.php');
        } else {
            $_SESSION['warning'] = 'เกิดข้อผิดพลาด';
        }
    }
?>


