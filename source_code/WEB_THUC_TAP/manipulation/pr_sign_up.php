<?php
	error_reporting(0);
	session_start();
	if(isset($_POST["btn_register"]))
	{
			 
			$id_customer="";
       		$fullname=$_POST["txt_full_name"];
			$account=$_POST["txt_account"];
			$pass=$_POST["txt_password"];
			$pass_again=$_POST["txt_passagain"];
	 	 	$email=$_POST["txt_email"];
			$phone_number=$_POST["txt_phone"];
			$date=$_POST["dt_date"];
			$sex=$_POST["rd_sex"];
		    $address=$_POST["txt_address"];
			$_SESSION["info_signup"]=array("fullname"=>$fullname,"account"=>$account,"email"=>$email,"phone_number"=>$phone_number,"date"=>$date,"address"=>$address,"sex"=>$sex);
			include_once("../admin/database/select_data.php");
			$select_data=new select_data();
			 if($select_data->ckeck_account($account)>0)
			 {
				echo "<script>";
				echo "alert('Xin lỗi, tài khoản của bạn đã tồn tại!');";
				echo "window.location='../sign_up.php'";
				echo "</script>";
			 }
			  if($select_data->check_email($email)>0)
			 {
				echo "<script>";
				echo "alert('Xin lỗi, email đã được dụng!');";
				echo "window.location='../sign_up.php'";
				echo "</script>";
			 }
			 else
			 {
				
				
					include_once("../admin/database/update_insert.php");
					$data=new insert_update_data();
					
					
					
					$chk_insert_customer=$data->Insert_customer($id_customer,$fullname,$account,$pass,$email,$phone_number,$date,$sex,$address);
					if($chk_insert_customer==1)
					{
						header("Location: ../sign_up_success.php");		
					}
					else
					{
						echo "<script>";
						echo "alert('Tạo mới tài khoản thất bại. Vui lòng kiểm tra lại');";
						echo "window.location='../sign_up.php'";
						echo "</script>";
					}
					unset($_SESSION["info_signup"]);
				
			}
	}
?>
