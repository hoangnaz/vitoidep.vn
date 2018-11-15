<?php
	error_reporting(0);
	session_start();
	if(isset($_POST["update_user"]))
	{
			 
			$id_customer="";
       		$fullname=$_POST["up_username"];
			
			if($fullname=="")
			{
				$fullname=$_SESSION["info_customer"]["fullname"];
			}
			
	 	 	$email=$_POST["up_email"];
			
			if($email=="")
			{
				$email=$_SESSION["info_customer"]["email"];
			}
			if($email!="")
			{
				include_once("../admin/database/select_data.php");
				$data_select=new select_data();
				if($data_select->check_email($email)>0)
				{
					echo "<script>alert('Rất tiếc email này đã được sử dụng. Chúng tôi sẽ giữ nguyên email của bạn');</script>";
					$email=$_SESSION["info_customer"]["email"];
				}
			}
			
			echo $phone_number=$_POST["upda_phone"];
			if($phone_number=="")
			{
				$phone_number=$_SESSION["info_customer"]["phone_number"];
			}
		    $address=$_POST["up_address"];
			if($address=="")
			{
				$address=$_SESSION["info_customer"]["address"];
			}
			
			include_once("../admin/database/update_insert.php");
			$upda_date=new insert_update_data();
			 				
					$chk_update_customer=$upda_date->update_customer($fullname,$email,$phone_number,$address,$_SESSION["info_customer"]["id_customer"]);
					if($chk_update_customer)
					{
						echo "<script>";
						echo "alert('Cập nhật thành công. Vui lòng đăng nhập lại để cập nhật sự thay đổi');";
						echo "window.location=' ../login.php'";
						echo "</script>";
					
					}
					else
					{
						echo "<script>";
						echo "alert('Cập nhật thất bại');";
						echo "window.location='../login.php'";
						echo "</script>";
					}
					unset($_SESSION["info_customer"]);
		
		
	}
?>
