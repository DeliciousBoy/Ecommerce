<?php

require_once("user.php");
include_once("connectDB.php");
require_once("component.php");
$conn = new DB_conn;
//$p_id = $_GET['p_id'] ?? null;
//$sql = $conn->select_singlePro($p_id); 
$sql = $conn->select_product();
if (isset($_POST["remove"])) {
    $p_id = $_POST["remove"];

    foreach ($_SESSION["cart"] as $key => $value) {
        if ($value["p_id"] == $p_id) {
            unset($_SESSION["cart"][$key]);
            break; // หยุดการวนลูปทันทีหลังจากลบสินค้าเดียว
        }
    }
    //echo "<script>alert('Product has been removed...!')</script>";
    echo "<script>window.location = 'cart.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('topbar.php')
?>

<div class="hero-wrap hero-bread" style="background-image: url('images/resos.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                <h1 class="mb-0 bread">My Wishlist</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $p_id = array_column($_SESSION['cart'], 'p_id');
                                $total = 0;
                                //$sql = "SELECT * FROM product WHERE p_id IN (" . implode(',', $p_id) . ")";
                                //$query = mysqli_query($conn, $sql);
                                while ($data = mysqli_fetch_array($sql)) {
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        if ($value['p_id'] == $data['p_id']) {
                                            $quantity = $value['quantity'];
                                            echo cartElement($data['p_id'], $data['pName'], $data['pDetails'], $data['pPrice'], $quantity, $data['pImage']);
                                            $total = $total + ($data['pPrice'] * $quantity);
                                        }
                                    }
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-start">
                    <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3">
                            <h3>Cart Totals</h3>
                            <p class="d-flex total-price">
                                <span>total</span>
                                <span><?php if(isset($total)){
                                    echo $total;
                                }else{
                                    $total =0;
                                    echo $total;
                                }  ?></span>
                            </p>
                        </div>
                        <?php
                        $_SESSION['checkout'] = $total;
                        ?>
                        <p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                    </div>
                </div>
</section>

<?php
include_once('footer.php');
?>


<script>
    $(document).ready(function() {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function(e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('quantity').val());

            // If is not undefined

            $('quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });
    });
</script>
<!--logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>