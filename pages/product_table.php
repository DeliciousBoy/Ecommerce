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
            <td class="align-middle"><?php
                if ($data['id'] == 1) {
                    echo 'Basket';
                } else if ($data['id'] == 2) {
                    echo 'Chair';
                } else if ($data['id'] == 3) {
                    echo 'Lamp';
                } else if ($data['id'] == 4) {
                    echo 'Bowl';
                } else if ($data['id'] == 5) {
                    echo 'Hat';
                }
            ?></td>
            <td class="align-middle"><a href="admin_product_edit.php?id=<?php echo $data['p_id'] ?>" class="btn btn-sm btn-primary">Edit</a></td>
            <td class="align-middle"><a href="del_product.php?p_id=<?php echo $data['p_id'] ?>" class="btn btn-sm btn-primary" onclick="return confirm ('คุณต้องการลบข้อมูลใช่หรือไม่')"><i class="fa fa-times"></i></a></td>
        </tr>
    <?php $i = $i + 1;
    } ?>
</tbody>

