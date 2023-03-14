<?php
include_once('connectDB.php');
$conn = new DB_conn;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Minishop - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include_once('../pages/topbar.php');
    ?>
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <td colspan="7">
                                <h3>ข้อมูล สมาชิก</h3>
                            </td>
                        </tr>
                        <tr>
                            <th>ลําดับ</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>username</th>
                            <th>telephone_number</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        $sql = $conn->display_user();
                        $i = 1;
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td class="align-middle"><?php echo $i ?> </td>
                                <td class="align-middle"><?php echo $data['first_name'] ?></td>
                                <td class="align-middle"><?php echo $data['last_name'] ?></td>
                                <td class="align-middle"><?php echo $data['username'] ?></td>
                                <td class="align-middle"><?php echo $data['telephone'] ?></td>
                                <td class="align-middle"><a href="userEdit.php?id=<?php echo $data['id'] ?>" class="btn btn-sm btn-primary">Edit</a></td>
                                <td class="align-middle"><a href="del.php?id=<?php echo $data['id'] ?>" class="btn btn-sm btn-primary" onclick="return confirm ('คุณต้องการลบข้อมูลใช่หรือไม่')"><i class="fa fa-times"></i></a></td>
                            </tr>
                        <?php $i = $i + 1;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>