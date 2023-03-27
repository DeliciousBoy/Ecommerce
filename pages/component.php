<?php

function component($p_id, $p_name, $p_details, $p_price, $path_img)
{
    $element = '<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
    <div class="product d-flex flex-column">
        <a href="#" class="img-prod"><img class="img-fluid img-thumbnail" src="' . $path_img . '" alt="Colorlib Template">
            <div class="overlay"></div>
        </a>
        <div class="text py-3 pb-4 px-3">
            <input type="hidden" name="pName" value="' . $p_name . '">
            <p class="pDetails">' . $p_details . '</p>
            <p class="pPrice">Price: ' . $p_price . '</p>
            <input type="hidden" name="p_id" value="' . $p_id . '">
            <p class="bottom-area d-flex px-3">
                <button class="add-to-cart text-center py-2 mr-1" type="submit" name="p_add" id="p_add"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></button>
                <button class="buy-now text-center py-2" type="submit" name="p_add" id="p_add"><a href="checkout.php">Buy now</a><span><i class="ion-ios-cart ml-1"></i></span></button>
            </p>
        </div>
    </div>
</div>';
    return $element;
}
?>