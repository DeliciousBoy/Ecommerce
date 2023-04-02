<?php

$quantity = 1;

if (isset($_POST['p_add'])) {
    if (isset($_POST['p_id']) && isset($_POST['pName']) && isset($_POST['quantity'])) {
        //unset($_SESSION["cart"]);
        $p_id = $_POST['p_id'];
        $p_name = $_POST['pName'];
        $quantity = $_POST['quantity'];
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            $item_exists = false;
            foreach ($cart as &$item) {
                if ($item['p_id'] == $p_id) {
                    $item['quantity'] += $quantity;
                    $item_exists = true;
                    break;
                }
            }
            if (!$item_exists) {
                $item_array = array('p_id' => $p_id, 'pName' => $p_name, 'quantity' => $quantity);
                $cart[] = $item_array;
            }
            $_SESSION['cart'] = $cart;
        } else {
            $item_array = array('p_id' => $p_id, 'pName' => $p_name, 'quantity' => $quantity);
            $_SESSION['cart'] = array($item_array);
        }
        // echo "<script>alert('You added " . $_POST['pName'] . " to your cart')</script>";
    } else {
        echo "<script>alert('Error: Missing key(s) in POST data')</script>";
    }
}
function component($p_id, $p_name, $p_price, $quantity,$path_img)
{
    $element = '
    <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
    <div class="product d-flex flex-column">
        <a href="product-single.php?p_id='.$p_id.'" class="img-prod"><img class="img-fluid img-thumbnail" src="' . $path_img . '" alt="Colorlib Template">
            <div class="overlay"></div>
        </a>
        <div class="text py-3 pb-4 px-3">
        <form method="post" enctype="multipart/form-data" >
            <input type="hidden" name="pName" value="' . $p_name . '">
            <h1 class="pDetails">' . $p_name. '</h1>
            <p class="pPrice">Price: ' . $p_price . '</p>
            <input type="hidden" name="p_id" value="' . $p_id . '">
            <div class="quantity">
            <input type="hidden" name="quantity" value="' . $quantity . '">
            <input type="number" name="quantity" value="1" min="1" max="100">
            </div>
            <button class="add-to-cart text-center py-2 mr-1" type="submit" name="p_add" id="p_add"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></button>
            <button class="buy-now text-center py-2" type="submit" name="p_add" id="p_add"><a href="cart.php">Go to cart</a><span><i class="ion-ios-cart ml-1"></i></span></button>
            </form>
        </div>
    </div>
</div>';
    return $element;
}


function cartElement($p_id, $p_name, $p_details, $p_price, $quantity, $path_img) {
    $element = '<form method="post">
        <tr class="text-center">
            <td>
                <button class="product-remove" type="submit" name="remove" value="' . $p_id . '" style="background-color: #f44336; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px;">
                    <span class="ion-ios-close"></span>
                </button>
            </td>

            <td class="image-prod">
                <div class="img" style="background-image:url('.$path_img.');"></div>
            </td>

            <td class="pName">
                <h3>'.$p_name.'</h3>
                <p>'.$p_details.'</p>
            </td>
            
            <td class="pPrice">$'.$p_price.'</td>

            <td class="quantity">
            <div class="input-group mb-3">
            <input type="text" name="quantity" class="quantity form-control input-number" value="'.$quantity.'" min="1" max="100" readonly>
            </div>
            </td>


            <td class="total">$'.($p_price * $quantity).'</td>

        </tr>
    </form>
    ';
    return $element;
}


function singlePro($p_id, $p_name, $p_details, $p_price, $quantity, $path_img) {
    $element = '
        <div class="container">
        <div class="row">
        <div class="col-lg-6 mb-5 ftco-animate">
            <a href="' . $path_img . '" class="image-popup prod-img-bg"><img src="' . $path_img . '" class="img-fluid" alt="Product Image"></a>
        </div>
        <div class="col-lg-6 product-details pl-md-5 ftco-animate">
            <input type="hidden" name="pName" value="' . $p_name . '">
            <h3>' . $p_name . '</h3>
            <p>' . $p_details . '</p>
            <p class="price"><span>Price : ' . $p_price . ' baht</span></p>
            <input type="hidden" name="p_id" value="' . $p_id . '">
            <div class="row mt-4">
                <div class="w-100"></div>

                <form method="post" enctype="multipart/form-data" >
            <div class="input-group col-md-6 d-flex mb-3">
                <span class="input-group-btn mr-2">
        
                </span>
                <input type="hidden" name="quantity" value="' . $quantity . '">
                <input type="number" name="quantity" value="1" min="1" max="100">
               
            </div>
            <input type="hidden" name="p_id" value="' . $p_id . '">
            <input type="hidden" name="pName" value="' . $p_name . '">
            <p>
                <button class="add-to-cart text-center py-2 mr-1" type="submit" name="p_add" id="p_add"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></button>
                <button class="buy-now text-center py-2 mr-1" type="submit" name="p_add" id="p_add"><a href="cart.php?p_id=' . $p_id . '">Go to cart<span><i class="ion-ios-cart ml-1"></i></span></a></button></a>
            </p>
        </div>
    </form>
    <script>
    // Get the quantity input and the plus/minus buttons
    var quantity = document.getElementById("quantity");
    var plusBtn = document.querySelector(".quantity-right-plus");
    var minusBtn = document.querySelector(".quantity-left-minus");

    // Add click event listeners to the plus/minus buttons
    plusBtn.addEventListener("click", function() {
    quantity.value = parseInt(quantity.value) + 1;
    });

    minusBtn.addEventListener("click", function() {
    if (quantity.value > 1) {
        quantity.value = parseInt(quantity.value) - 1;
    }
    });
    </script>
    ';
    return $element;
}
?>