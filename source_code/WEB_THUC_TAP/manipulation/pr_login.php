<?php 
	session_start();
	error_reporting(0);
	include_once("../admin/database/select_data.php");
	$data=new select_data();
	$name=$_POST["user_lg"];
	$pass=$_POST["pas_lg"];
	$ck_login=$data->check_login_customer($name,$pass);
	if($ck_login==0)
	{
		echo "<p class='text-center text-danger'> Tài khoản hoặc mật khẩu chưa chính xác </p>";
	}
	else
	{
		echo "<a href='index.php' class='text-info'> <h4 class='text-center'> Đăng nhập thành công Click quay lại trang chủ.</a>";
		$_SESSION["info_customer"]=array("id_customer"=>$ck_login->id_customer,"fullname"=>$ck_login->fullname,"account"=>$ck_login->account,"pass"=>$ck_login->pass,"email"=>$ck_login->email,"phone_number"=>$ck_login->phone_number,"date"=>$ck_login->date,"sex"=>$ck_login->sex,"address"=>$ck_login->address);
	}
	
?>