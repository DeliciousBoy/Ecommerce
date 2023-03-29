<?php
    ini_set('file_uploads', '1');
    include_once("connectDB.php");
    $conn = new DB_conn;
    $sql = $conn->select_category();
    while ($data = mysqli_fetch_array($sql)) {
        ?>
        <option value="<?php echo $data['id']; ?>"> <?php echo $data['c_name']; ?> </option>
        <?php
    }
?>