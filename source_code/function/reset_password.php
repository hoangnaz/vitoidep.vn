<?php
	session_start();
    error_reporting(1);
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/customer.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/template/email/confirm_email.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/function/send_mail.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/library/const.php';
	if(isset($_POST['emailReset'])){
		$emailReset = $_POST['emailReset'];
	}
	$newPassword = rand(10000000,99999999);
	echo $newPassword;
?>