<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    include_once('topbar.php');
    include_once("connectDB.php");
    $conn = new DB_conn;
    $sql = $conn->display_user_edit($_GET['id']);
    while ($data = mysqli_fetch_array($sql)) {
        $fname = $data['first_name'];
        $lname = $data['last_name'];
        $telephone = $data['telephone'];
        $uname = $data['username'];
    }
    ?>
    <div class="container">
        <h3 class="mt-5">แก้ไขข้อมูลสมาชิก</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="fname" class="form-label">ชื่อ:</label>
                <input type="text" class="form-control" id="fname" name="fname" value=<?php echo $fname ?>>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">นามสกุล:</label>
                <input type="text" class="form-control" id="lname" name="lname" value=<?php echo $lname ?>>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">User Name:</label>
                <input type="text" class="form-control" id="uname" name="uname" value=<?php echo $uname; ?>>
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">telephone: </label>
                <input type="telephone" class="form-control" id="telephone" name="telephone" value=<?php echo $telephone; ?>>
            </div>
            <button type="submit" class="btn btn-primary" id="edit" name="edit">บันทึกการเปลี่ยนแปลง </button>
        </form>
    </div>
    <?php

    $id = $_GET['id'];
    if (isset($_POST['edit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $telephone = $_POST['telephone'];
        $sql = $conn->edit_user($fname, $lname, $telephone, $id);
        echo $sql;
        if ($sql) {
            echo "<script>alert('บันทึกข้อมูลสําเร็จ')</script>";
            echo "<script>window.location.href='display.php' </script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด')</script>";
        }
    }
    ?>
</body>

</html>