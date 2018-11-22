
<?php

	error_reporting(0);
	require_once $_SERVER['DOCUMENT_ROOT'].'/database/product_info.php';
	include 'template/master/header.php';
	if($_SESSION['numberRecord']){
		$numberRecord=$_SESSION['numberRecord'];
	}else{
		$numberRecord=10;
	}
	if($_SESSION['order_product']){
		$order_droduct=$_SESSION['order_product'];
	}else{
		$order_droduct="ASC";
	}
	$productDB=new productDB();
    $lstTopFive=$productDB->getFiveTopProduct();
	include_once 'template/master/menu_top.php';
	include_once 'template/master/main_menu.php';
	include_once 'template/product_list/content.php';
	include_once 'template/product_list/product_viewed.php';
	include_once 'template/master/footer.php';
	include_once 'template/master/js_file.php';
	include_once 'template/master/top_message.php';
	include_once 'template/partial/sign_in.php';
	include_once 'template/partial/sign_up.php';
	include_once 'template/partial/get_password.php';
	include_once 'template/partial/detail_product.php';
	include_once 'template/master/partial/product_detail.php';

	?>
	