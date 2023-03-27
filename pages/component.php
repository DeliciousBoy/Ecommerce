<?php

function component($p_id, $p_name, $p_details, $p_price, $path_img){
    $element = '<form action="#" method="post" enctype="multipart/form-data" >
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                            <div class="product d-flex flex-column">
                                <div class="overlay"></div>
                                <a href="#" class="img-prod"><img class="img-flup_id" src="' .$path_img. '" alt="Product Image"></a>
                                <div class="text py-3 pb-4 px-3">
                                <input type="hidden" name="pName" value="' .$p_name. '">
                                <h3 class="pName">' .$p_name. '</h3>
                                <p class="pDetails">' .$p_details. '</p>
                                <p class="pPrice">Price: ' .$p_price. '</p>
                                <input type="hidden" name="p_id" value="' .$p_id. '">
                                <button class="btn btn-primary py-2 px-4" type="submit" name="p_add" id="p_add">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>';
    return $element;
}
?>
