<?php
ini_set('file_uploads','1');
include_once("connectDB.php");
$conn = new DB_conn;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid pt-5">
        <h2 class="text-center mb-4"><span class="px-2">Add products</span></h2>
        <form method="POST" action="insert_product.php" enctype="multipart/form-data">
            <div class="row px-xl-5">
                <div class="col-lg-7 mb-5">
                    <div class="mb-3">
                        <label class="help-block text-danger">Name of product:</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="mb-3">
                        <label class="help-block text-danger">Product details:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="help-block text-danger">Prices: </label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3">
                        <label class="help-block text-danger">Product image:</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="category" id="category">
                            <option value=""><-- Choose product types --></option>
                            <?php
                            $sql = $conn->select_category();
                            while ($data = mysqli_fetch_array($sql)) { ?>
                                <option value="<?php echo $data['c_id']; ?>"> <?php echo $data['c_name']; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">SAVE</button>
        </form>
    </div>
</body>

</html>
