<?php

require_once("component.php");
include_once("connectDB.php");
$conn = new DB_conn;
$sql = $conn->select_product();

if (isset($_POST['p_add'])) {
    if (isset($_POST['p_id']) && isset($_POST['pName'])) {
        $p_id = $_POST['p_id'];
        $p_name = $_POST['pName'];
        echo "<script>alert('You added " . $_POST['pName'] . " to your cart')</script>";
        if (isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'], 'p_id');
            if (in_array($p_id, $item_array_id)) {
                echo '<script> alert ("This product is already in your cart")</script>';
                echo '<script> window.location="shop.php"</script>';
            } else {
                $count = count($_SESSION['cart']);
                $item_array = array('p_id' => $p_id, 'p_name' => $p_name);
                $_SESSION['cart'][$count] = $item_array;
                print_r($_SESSION['cart']);
            }
        } else {
            $item_array = array('p_id' => $p_id, 'p_name' => $p_name);
            $_SESSION['cart'] = array($item_array);
            print_r($_SESSION['cart']);
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
<?php
while ($data = mysqli_fetch_array($sql)) {
    echo component($data['p_id'], $data['pName'], $data['pDetails'], $data['pPrice'], $data['pImage']);
}

?>

<?php
include_once('footer.php');
?>



<!-- loader -->
<div pName="ftco-loader" class="show fullscreen"><svg class="circular" wpNameth="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-wpNameth="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-wpNameth="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>


</html>