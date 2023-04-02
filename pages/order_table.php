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
            <td class="align-middle"><?php echo $data['order_id'] ?></td>
            <td class="align-middle"><?php echo $data['user_id'] ?></td>
            <td class="align-middle"><?php echo $data['name'] ?></td>
            <td class="align-middle"><?php echo $data['quantity'] ?></td>
            <td class="align-middle"><?php echo $data['address'] ?></td>
            <td class="align-middle"><?php echo $data['address2'] ?></td>
            <td class="align-middle"><?php echo $data['city'] ?></td>
            <td class="align-middle"><?php echo $data['postal_code'] ?></td>
            <td class="align-middle"><?php echo $data['country'] ?></td>
            <td class="align-middle"><?php echo $data['mobile'] ?></td>
            <td class="align-middle"><a href="del_order.php?order_id=<?php echo $data['order_id'] ?>" class="btn btn-sm btn-primary" onclick="return confirm ('คุณต้องการลบข้อมูลใช่หรือไม่')"><i class="fa fa-times"></i></a></td>
        </tr>
    <?php $i = $i + 1;
    } ?>
</tbody>