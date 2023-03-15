<?php
ini_set('file_uploads', '1');
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
    <?php
    include_once("topbar.php");
    ?>
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Add Products</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="product" id="product" novalidate="novalidate" action="insert_product.php" enctype="multipart/form-data" method="post" text-align: center;>
                        <div class="control-group">
                            <input type="text" class="form-control" id="pName" name="pName" placeholder="Product Name" required oninvalid="setCustomValidity('Please enter your first name')" oninput="setCustomValidity('')" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="pDetails" name="pDetails" placeholder="Product details" required oninvalid="setCustomValidity('Please enter your last name')" oninput="setCustomValidity('')" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="pPrice" name="pPrice" placeholder="Price of product" required oninvalid="setCustomValidity('Please enter your username name')" oninput="setCustomValidity('')" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="file" class="form-control" id="picture" name="picture" placeholder="picture" required oninvalid="setCustomValidity('Please enter your password')" oninput="setCustomValidity('')" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" name="category" id="category ">
                                <option value=""><-- กรุณาเลือกประเภท --></option>
                                <?php
                                $sql = $conn->select_category();
                                while ($data = mysqli_fetch_array($sql)) { ?>
                                    <option value="<?php echo $data['c_id']; ?>"> <?php echo $data['c_name']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include_once("../pages/footer.php");
        ?>
</body>

</html>