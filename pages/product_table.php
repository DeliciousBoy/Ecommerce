<?php
    include_once('connectDB.php');
    $conn = new DB_conn;
?> 

<tbody class="align-middle">
    <?php
    $sql = $conn->display_products();
    $i = 1;
    while ($data = mysqli_fetch_array($sql)) {
    ?>
        <tr>
            <td class="align-middle"><?php echo $i ?> </td>
            <td class="align-middle"><?php echo $data['pName'] ?></td>
            <td class="align-middle"><?php echo $data['pDetails'] ?></td>
            <td class="align-middle"><?php echo $data['pPrice'] ?></td>
            <td class="align-middle"><?php echo $data['pImage'] ?></td>
            <td class="align-middle"><?php echo $data['id'] ?></td>
            <td class="align-middle"><a href="admin_product_edit.php?id=<?php echo $data['p_id'] ?>" class="btn btn-sm btn-primary">Edit</a></td>
            <td class="align-middle"><a href="deluser.php?id=<?php echo $data['p_id'] ?>" class="btn btn-sm btn-primary" onclick="return confirm ('คุณต้องการลบข้อมูลใช่หรือไม่')"><i class="fa fa-times"></i></a></td>
        </tr>
    <?php $i = $i + 1;
    } ?>
</tbody>

<script>
    if (id==1){

    }
</script>