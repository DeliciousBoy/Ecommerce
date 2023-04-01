<?php
include_once('connectDB.php');
require_once("component.php");  
$conn = new DB_conn;
$p_id = $_GET['p_id'] ?? null; // get the product ID from the URL, or null if not specified
$sql = $conn->select_singlePro($p_id); 
$quantity = 1;

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

?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('topbar.php')
?>
<head>
    <!-- Head content here -->
</head>
<body class="goto-here">
<section class="ftco-section">
    <?php
    
    if ($data = mysqli_fetch_array($sql)) {
        echo singlePro($data['p_id'], $data['pName'],$data['pDetails'] ,$data['pPrice'], $quantity, $data['pImage']);
    } else {
        echo "Product not found.";
    }

    ?>
</section>
<?php
include_once('footer.php');
?>
<script>
    $(document).ready(function() {
        // Quantity input field functionality script here
    });
</script>
</body>
</html>