<?php
	error_reporting(1);
	require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/product_info.php';
	$productBL= new product();
	// list san pham noi bat

	$lstHighLightProduct= array_slice($productBL->getHightLightProduct(1),-9);
	$lstNewProduct= array_slice($productBL->getNewProduct(3),-6);
	include_once 'template/master/header.php';
	include_once 'template/master/menu_top.php';
	include_once 'template/master/main_menu.php';
	include_once 'template/home/home_slide.php';
	include_once 'template/home/home_adv_1.php';
	include_once 'template/home/home_catalogy.php';
	include_once 'template/home/home_feature_product.php';
	include_once 'template/home/home_adv_2.php';
	include_once 'template/home/home_new_product.php';
	include_once 'template/home/home_blog.php';
	include_once 'template/home/home_send_mail.php';
	include_once 'template/master/footer.php';
	include_once 'template/master/top_message.php';
	include_once 'template/master/js_file.php';
	include_once 'template/partial/sign_in.php';
	include_once 'template/partial/sign_up.php';
	include_once 'template/partial/get_password.php';
	include_once 'template/partial/detail_product.php';
?>









		
		

		







	

		
		

		






		
