include_once('connectDB.php');
$conn = new DB_conn;
?>
<!DOCTYPE html>
<html lang="en">
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td{
  text-align: center;
  padding: 8px;
}
th {
  background-color: #00CB3D;
  color: white;
}

tr:nth-child(odd) {
  background-color: #DAFFE9;

}
</style>

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
                            <th colspan="7">
                                <h3>ข้อมูล สมาชิก</h3>
                            </th>
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