<?php

require_once("user.php");
require_once("component.php");
include_once("connectDB.php");

$conn = new DB_conn;
$sql = $conn->select_product();
$sql2 = $conn->select_category();
//c

if (isset($_POST['p_add'])) {
    if (isset($_POST['p_id']) && isset($_POST['pName']) && isset($_POST['quantity'])) { // add check for quantity
        //unset($_SESSION["cart"]);
        $p_id = $_POST['p_id'];
        $p_name = $_POST['pName'];
        $quantity = $_POST['quantity'];
        if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
            $item_array = array('p_id' => $p_id, 'pName' => $p_name, 'quantity' => $quantity); // add quantity to item array
            $_SESSION['cart'][$count] = $item_array;
        } else {
            $item_array = array('p_id' => $p_id, 'pName' => $p_name, 'quantity' => $quantity); // add quantity to item array
            $_SESSION['cart'] = array($item_array);
        }
        echo "<script>alert('You added " . $_POST['pName'] . " to your cart')</script>";
    } else {
        echo "<script>alert('Error: Missing key(s) in POST data')</script>";
    }
}

/**/
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('topbar.php')
?>

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slpNameer-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Shop</h1>
            </div>
        </div>
    </div>
</div>
<!--Products-->
<section class="ftco-section bg-light">
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-10 order-md-last">
                <div class="row">
                    <?php
                    if (!isset($_GET['category'])) {
                        while ($data = mysqli_fetch_array($sql)) {
                            echo component($data['p_id'], $data['pName'], $data['pPrice'], $quantity,$data['pImage']);
                        }
                    }
                    if (isset($_GET['category'])) {
                        $id = $_GET['category'];
                        $sql3 = $conn->select_product2($id);
                        while ($data = mysqli_fetch_array($sql3)) {
                            echo component($data['p_id'], $data['pName'], $data['pPrice'], $quantity,$data['pImage']);
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="sidebar">
                    <div class="sidebar-box-2">
                        <h2 class="heading">Categories</h2>
                        <div class="fancy-collapse-panel">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <ul>
                                            <?php
                                            while ($row_data = mysqli_fetch_assoc($sql2)) {
                                                $category_name = $row_data['c_name'];
                                                $category_id = $row_data['id'];
                                                //echo  "<li><a href='shop.php?category=all</a></li>";
                                                echo "<li><a href='shop.php?category=$category_id'>$category_name</a></li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary"  type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
</div>
<?php
include_once('footer.php');
?>
</html>