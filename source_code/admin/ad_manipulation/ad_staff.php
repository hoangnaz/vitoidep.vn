<?php
	session_start();
	if(isset($_POST["btn_register"]))
	{
			 
			 $id_staff="";
       		 $fullname=$_POST["txt_full_name"];
			 $staff_account=$_POST["txt_account"];
			 $pass=$_POST["txt_password"];
	 	 	 $email=$_POST["txt_email"];
			 $phone_number=$_POST["txt_phone"];
			 $date=$_POST["dt_date"];
		     $address=$_POST["txt_address"];
			 $staff_role=$_POST["role_admin"];
			 $staff_sex=$_POST["sex"];
		
			$status=0;
			include_once("../database/select_data.php");
			$select_data=new select_data();
			 if($select_data->ckeck_account_staff($staff_account)>0)
			 {
				 $_SESSION["add_staff"]=array("account"=>$staff_account,"fullname"=>$fullname,"pass"=>$pass,"email"=>$email,"phone_number"=>$phone_number,"date"=>$date,$sex,"address"=>$address,"staff_role"=>$staff_role);
				echo "<script>";
				echo "alert('Xin lỗi, tài khoản đã tồn tại!');";
				echo "window.location='../sub_sign_up_staff.php'";
				echo "</script>";
			 }
			 else
			 {
			include_once("../database/update_insert.php");
			
			$data=new insert_update_data();
			$chk_insert_staff=$data->Insert_staff($id_staff,$staff_account,$fullname,$pass,$email,$phone_number,$date,$staff_sex,$address,$staff_role,$status);
			if($chk_insert_staff==1)
				{
					echo "<script>";
					echo "alert('Thêm thành công tài khoản nhân viên mới');";
					echo "window.location='../mn_staff.php'";
					echo "</script>";
					unset($_SESSION["add_staff"]);
				}
				else
				{
					$_SESSION["add_staff"]=array("account"=>$staff_account,"fullname"=>$fullname,"pass"=>$pass,"email"=>$email,"phone_number"=>$phone_number,"date"=>$date,"address"=>$address,"staff_role"=>$staff_role);
				}
			 }
	}
?>