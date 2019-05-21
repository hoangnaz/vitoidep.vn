<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/blog.php';
	$blogPostBL = new blogPostBL();
	$topFive = $blogPostBL->topFiveView();
	include_once 'template/master/header.php';
	include_once 'template/master/menu_top.php';
	include_once 'template/master/main_menu.php';
	include_once 'template/home/home_slide.php';
	include_once 'template/home/home_adv_1.php';
	include_once 'template/home/home_catalogy.php';
	include_once 'template/home/home_blog.php';
	include_once 'template/home/home_send_mail.php';
	include_once 'template/master/footer.php';
	include_once 'template/master/top_message.php';
	include_once 'template/master/js_file.php';
	include_once 'template/partial/sign_in.php';
	include_once 'template/partial/intro_minh_chau.php';
	include_once 'template/partial/intro_hien_le.php';
	include_once 'template/partial/sign_up.php';
	include_once 'template/partial/get_password.php';
	include_once 'template/partial/update_password.php';
	
?>









		
		

		







	

		
		

		






		
