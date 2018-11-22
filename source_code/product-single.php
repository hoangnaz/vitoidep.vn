<?php
include_once 'template/master/header.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/product_info.php';
$productBL=new product();
$infoProduct=$productBL->getOneProductFollowName($_GET['name']);
$lstTheSameProduct=$productBL->getSameProduct($infoProduct->sub_catalog);
$lstSlice=array_slice($lstTheSameProduct,-4);

$_SESSION['viewed'][$infoProduct->id_product]=$infoProduct;

include_once 'template/master/menu_top.php';
include_once 'template/master/main_menu.php';
include_once 'template/master/partial/product_detail.php';
include_once 'template/detail_product/info.php';
include_once 'template/detail_product/comment.php';
include_once 'template/detail_product/the_same_catalog.php';
include_once 'template/master/footer.php';
include_once 'template/master/top_message.php';
include_once 'template/master/js_file.php';
include_once 'template/partial/sign_in.php';
include_once 'template/partial/sign_up.php';
include_once 'template/partial/get_password.php';
include_once 'template/partial/detail_product.php';
?>




