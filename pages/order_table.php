<?php
    include_once('connectDB.php');
    $conn = new DB_conn;
?> 

<tbody class="align-middle">
    <?php
    $sql = $conn->order_display();
    $i = 1;
    while ($data = mysqli_fetch_array($sql)) {
    ?>
        <tr>
            <td class="align-middle"><?php echo $i ?> </td>
            <td class="align-middle"><?php echo $data['user_id'] ?></td>
            <td class="align-middle"><?php echo $data['address_line1'] ?></td>
            <td class="align-middle"><?php echo $data['address_line2'] ?></td>
            <td class="align-middle"><?php echo $data['city'] ?></td>
            <td class="align-middle"><?php echo $data['postal_code'] ?></td>
            <td class="align-middle"><?php echo $data['country'] ?></td>
            <td class="align-middle"><?php echo $data['mobile'] ?></td>
            <td class="align-middle"><?php echo $data['order'] ?></td>

            <!-- <td class="align-middle"><a href="admin_user_edit.php?id=<?php echo $data['id'] ?>" class="btn btn-sm btn-primary">Edit</a></td> -->
            <!-- <td class="align-middle"><a href="deluser.php?id=<?php echo $data['id'] ?>" class="btn btn-sm btn-primary" onclick="return confirm ('คุณต้องการลบข้อมูลใช่หรือไม่')"><i class="fa fa-times"></i></a></td> -->
        </tr>
    <?php $i = $i + 1;
    } ?>
</tbody>