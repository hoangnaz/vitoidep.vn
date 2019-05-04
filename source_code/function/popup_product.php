<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/product_info.php';
    $productDB= new productDB();
    $productInfo= $productDB->getInfoProduct($_GET['id_product']);
    $_SESSION['viewed'][$productInfo->id_product]=$productInfo;
    $outputProduct=
    '<div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="modal-image">
                <img class="img-responsive" src="images/product/'.$productInfo->image_product.'" alt="product-img" />
                   <a  href="product-single?name='.$productInfo->name_product_no_vietnamse.'" ><h4 class="text-uppercase text-center">Xem thông tin sản phẩm</h4></a>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="product-short-details">
            <div>    
                <h2 class="product-title">'.$productInfo->name_product.'</h2>
            </div>
            <div>     
                <p class="product-price">Giá: '.number_format($productInfo->price_product).' VNĐ</p>
            </div> 
            <div>
            <div class="product-short-description">

                '.$productInfo->describle_product.'
                </div>
             </div>
                <a class="btn-buynow" onclick="shopping_cart('.$productInfo->id_product.',1,1)">Thêm vào giỏ hàng</a>
                
               
            </div>
        </div>
    </div>';
    echo  $outputProduct;
?>