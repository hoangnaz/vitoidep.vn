<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/product_info.php';
	$productBL= new product();
	// list san pham noi bat
	$lstHighLightProduct= array_slice($productBL->getHightLightProduct(1),-8);
	$lstNewProduct= array_slice($productBL->getNewProduct(3),-8);
	$listDauGoiSuaTam= array_slice($productBL->getListDauGoiSuaTam(),-4);
	$careSkin= array_slice($productBL->getListCareSkin(),-4);

	
	include_once 'template/master/header.php';
	include_once 'template/master/menu_top.php';
	include_once 'template/master/main_menu.php';
	include_once 'template/intro/banner.php';
	include_once 'template/intro/catalog.php';
	include_once 'template/intro/feature_product.php';
	include_once 'template/intro/adv_2.php';
	include_once 'template/intro/new_product.php';
	include_once 'template/intro/dau_goi_sua_tam.php';
	include_once 'template/intro/care_skin.php';
	include_once 'template/master/footer.php';
	include_once 'template/master/top_message.php';
	include_once 'template/master/js_file.php';
	include_once 'template/partial/detail_product.php';
	include_once 'template/partial/sign_in.php';
	include_once 'template/partial/sign_up.php';
	include_once 'template/partial/get_password.php';
	include_once 'template/partial/update_password.php';

?>