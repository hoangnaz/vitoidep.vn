<?php
	error_reporting(0);
	require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/user_massage.php';
	include_once 'template/master/header.php';
	$messageBL= new userMassageBL();
	// get message of usser
	$lstMessage= array_reverse($messageBL->getMassageUser($_SESSION['customer']->id_customer));
	
	include_once 'template/master/menu_top.php';
	include_once 'template/master/main_menu.php';
	include_once 'template/user_message/message.php';
	include_once 'template/master/footer.php';
	include_once 'template/master/top_message.php';
	include_once 'template/master/js_file.php';
	include_once 'template/partial/sign_in.php';
	include_once 'template/partial/sign_up.php';
	include_once 'template/partial/get_password.php';
	include_once 'template/partial/update_info.php';
	include_once 'template/partial/detail_product.php';

?>



	
