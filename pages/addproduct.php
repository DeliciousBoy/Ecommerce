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
            margin-left: 5%;
            margin-right: 5%;
        }
    </style>
</head>

<body>
    <?php
    include_once('topbar.php');
    ?>
    <div class="container-fluid pt-5">
        <h2 class="text-center mb-4"><span class="px-2">Add products</span></h2>
        <form name="product" id="product" novalidate="novalidate" action="insertPro.php" enctype="multipart/form-data" method="post">
            <div class="control-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" required oninvalid="setCustomValidity('Please enter your first name')" oninput="setCustomValidity('')" />
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <input type="text" class="form-control" id="details" name="pDetails" placeholder="Product details" required oninvalid="setCustomValidity('Please enter your last name')" oninput="setCustomValidity('')" />
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <input type="text" class="form-control" id="price" name="price" placeholder="Price of product" required oninvalid="setCustomValidity('Please enter your username name')" oninput="setCustomValidity('')" />
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <input type="file" class="form-control" id="picture" name="picture" placeholder="picture" required oninvalid="setCustomValidity('Please enter your password')" oninput="setCustomValidity('')" />
                <p class="help-block text-danger"></p>
            </div>
            <div class="mb-3">
                <select class="form-control" name="category" id="category">
                    <option value="">-- Choose product types--</option>
                    <?php
                    $sql = $conn->select_category();
                    while ($data = mysqli_fetch_array($sql)) { ?>
                        <option value="<?php $data['c_id']; ?>"> <?php echo $data['c_name']; ?> </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3" align='center'>
                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">SAVE</button>
            </div>
    </div>
    </div>
    </form>
    </div>
</body>

</html>