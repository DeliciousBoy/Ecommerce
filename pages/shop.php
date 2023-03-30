<?php

require_once("component.php");
include_once("connectDB.php");
$conn = new DB_conn;
$sql = $conn->select_product();
$sql2 = $conn->select_category();
//c

if (isset($_POST['p_add'])) {
    if (isset($_POST['p_id']) && isset($_POST['pName'])) {
        $p_id = $_POST['p_id'];
        $p_name = $_POST['pName'];
        //echo "<script>alert('You added " . $_POST['pName'] . " to your cart')</script>";*/
        if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
            $item_array = array('p_id' => $p_id, 'p_name' => $p_name);
            $_SESSION['cart'][$count] = $item_array;
        } else {
            $item_array = array('p_id' => $p_id, 'p_name' => $p_name);
            $_SESSION['cart'] = array($item_array);
        }
    } else {
        echo "<script>alert('Error: Missing key(s) in POST data')</script>";
    }
}

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
                            echo component($data['p_id'], $data['pName'], $data['pDetails'], $data['pPrice'], $data['pImage']);
                        }
                    }
                    if (isset($_GET['category'])) {
                        $id = $_GET['category'];
                        $sql3 = $conn->select_product2($id);
                        while ($data = mysqli_fetch_array($sql3)) {
                            echo component($data['p_id'], $data['pName'], $data['pDetails'], $data['pPrice'], $data['pImage']);
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

<?php
include_once('footer.php');
?>




</html>