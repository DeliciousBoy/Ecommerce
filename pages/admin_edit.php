<?php
    require_once('admin.php');
    include_once("connectDB.php");
    $conn = new DB_conn;
    $sql = $conn->display_user_edit($_GET['id']);
    // $row = $conn->insert_user($sql);
    while ($data = mysqli_fetch_array($sql)) {
        $fname = $data['first_name'];
        $lname = $data['last_name'];
        $uname = $data['username'];
        $telephone = $data['telephone'];
        $role = $data['role'];
    }

    $id = $_GET['id'];
    if (isset($_POST['edit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $telephone = $_POST['telephone'];
        $role = $_POST['role'];
        $sql = $conn->edit_user($fname, $lname, $uname, $telephone, $id, $role);
        echo $sql;
        if ($sql) {
            header('location: admin_tables.php');
        } else {
            $_SESSION['warning'] = 'เกิดข้อผิดพลาด';
        }
    }
?>


