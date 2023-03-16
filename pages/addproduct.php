<?php
ini_set('file_uploads', '1');
include_once("connectDB.php");
$conn = new DB_conn;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        form {
            text-align: left;
            margin: auto;
            margin-left: 10%;
            margin-right: -45%;
        }
    </style>
</head>

<body>
    <?php 
    include_once('topbar.php');
    ?>
    <div class="container-fluid pt-5">
        <h2 class="text-center mb-4"><span class="px-2">Add products</span></h2>
        <form method="POST" action="insert_product.php" enctype="multipart/form-data">
            <div class="row px-xl-5">
                <div class="col-lg-7 mb-5">
                    <div class="mb-3">
                        <label class="help-block text-danger">Name of product:</label>
                        <input type="text" class="form-control" id="id" name="id" require>
                    </div>
                    <div class="mb-3">
                        <label class="help-block text-danger">Product details:</label>
                        <input type="text" class="form-control" id="name" name="name" require>
                    </div>
                    <div class="mb-3">
                        <label class="help-block text-danger">Prices: </label>
                        <input type="text" class="form-control" id="price" name="price" require>
                    </div>
                    <div class="mb-3">
                        <label class="help-block text-danger">Product image:</label>
                        <input type="file" class="form-control" id="picture" name="picture" require>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="category" id="category">
                            <option value="">-- Choose product types--</option>
                            <?php
                            $sql = $conn->select_category();
                            while ($data = mysqli_fetch_array($sql)) { ?>
                                <option> <?php echo $data['c_name']; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3" align = 'center'>
                    <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">SAVE</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>