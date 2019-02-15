<?php
	session_start();
    error_reporting(1);
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/customer.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/template/email/confirm_email.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/function/send_mail.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/library/const.php';
	define(RESETPASS,'RESET PASSWORD');
	if(isset($_POST['emailReset'])){
		$emailReset = $_POST['emailReset'];
	}
	$newPassword = rand(10000000,99999999);
	$customer = new customerDB();
	$resultResetPassword = $customer->resetPassword($emailReset,$newPassword);
	if($resultResetPassword == 400){
		echo 400;
	} 
	else {
		$name = "";
		$tempalte= new template();
		$tempalteHTML= $tempalte->getTemplateResetPassword($newPassword);
		$sendMail=new Mail();
		$resultSendMail = $sendMail->sendMail($emailReset,$name,RESETPASS,$tempalteHTML);
		if($resultSendMail == 200){
			echo 200;
		} else {
			echo 400;
		}
    }
?>