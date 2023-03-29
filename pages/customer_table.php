<?php
    include_once('connectDB.php');
    $conn = new DB_conn;
?> 

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
            <td class="align-middle"><a href="deluser.php?id=<?php echo $data['id'] ?>" class="btn btn-sm btn-primary" onclick="return confirm ('คุณต้องการลบข้อมูลใช่หรือไม่')"><i class="fa fa-times"></i></a></td>
        </tr>
    <?php $i = $i + 1;
    } ?>
</tbody>