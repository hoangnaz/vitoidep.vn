<?php 
	session_start();
	error_reporting(0);
	include_once("../database/select_data.php");
	$data=new select_data();
	if(isset($_POST['login_btn']))
	{
		$name=$_POST["user_name"];
		$pass=$_POST["password"];
		$ck_login=$data->check_login_staff($name,$pass);
		if($ck_login==0)
		{
			echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác.')</script>";
			echo "<script>window.location='../login.php'</script>";
		}
		else
		{
			$_SESSION["info_staff"]=array("id_staff"=>$ck_login->id_staff,"fullname"=>$ck_login->fullname,"staff_account"=>$ck_login->staff_account,"email"=>$ck_login->email,"phone_number"=>$ck_login->phone_number,"date"=>$ck_login->date,"staff_role"=>$ck_login->staff_role);
			$_SESSION["info_staff"]['staff_role'];
			if($_SESSION["info_staff"]['staff_role']==1)
			{
				echo "<script>window.location='../index.php'</script>";
			}
			else if($_SESSION["info_staff"]['staff_role']==2)
			{
				echo "<script>window.location='../mn_member.php'</script>";
			}
			
		}
	}
	
?>