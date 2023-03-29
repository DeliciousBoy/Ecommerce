<?php
//d
function component($p_id, $p_name, $p_details, $p_price, $path_img)
{
    $element = '<form action="#" method="post" enctype="multipart/form-data" >
    <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
    <div class="product d-flex flex-column">
        <a href="#" class="img-prod"><img class="img-fluid img-thumbnail" src="' . $path_img . '" alt="Colorlib Template">
            <div class="overlay"></div>
        </a>
        <div class="text py-3 pb-4 px-3">
            <input type="hidden" name="pName" value="' . $p_name . '">
            <h1 class="pDetails">' . $p_name. '</h1>
            <p class="pDetails">' . $p_details . '</p>
            <p class="pPrice">Price: ' . $p_price . '</p>
            <input type="hidden" name="p_id" value="' . $p_id . '">
                <button class="add-to-cart text-center py-2 mr-1" type="submit" name="p_add" id="p_add"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></button>
                <button class="buy-now text-center py-2" type="submit" name="p_add" id="p_add"><a href="checkout.php">Buy now</a><span><i class="ion-ios-cart ml-1"></i></span></button>
        </div>
    </div>
</div>
</form>';
    return $element;
}

function cartElement($p_id, $p_name, $p_details, $p_price, $path_img){
    $element = ' <form action="#" method="post">
    <tr class="text-center">
    <td><button class="product-remove" type="submit" name="remove" value="' . $p_id . '" style="background-color: #f44336; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px;">
    <span class="ion-ios-close"></span>
    </button></td>

    <td class="image-prod"><div class="img" style="background-image:url('.$path_img.');"></div></td>
    
    <td class="pName">
        <h3>'.$p_name.'</h3>
        <p>'.$p_details.'</p>
    </td>
    <td class="pPrice">$'.$p_price.'</td>
    
    <td class="quantity">
        <div class="input-group mb-3">
         <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
      </div>
  </td>
    
    <td class="total">$'.$p_price.'</td>
  </tr>
  </form>';
  return $element;
}

?>