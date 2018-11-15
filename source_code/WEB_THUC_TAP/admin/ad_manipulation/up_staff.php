<?php
	include_once("../database/select_data.php");
	$data_select=new select_data();
	$info_staff=$data_select->query_one_staff($_GET['id_staff']);
	session_start();
	if(isset($_POST["btn_update_staff"]))
	{
			
			 $id_staff=$_GET['id_staff'];
       		 $fullname=$_POST["txt_full_name"];
			if($fullname=="")
			{
				$fullname=$info_staff->fullname;
			}
			
			
			$staff_account=$info_staff->staff_account;
			$pass=$info_staff->pass;
			
			 $email=$_POST["txt_email"];
			if($email=="")
			{
				$email=$info_staff->email;
			}
			 $phone_number=$_POST["txt_phone"];
			if($phone_number=="")
			{
				$phone_number=$info_staff->phone_number;
			}
			 $date=$_POST["dt_date"];
		    if($date=="")
			{
				$date=$info_staff->date;
			}
			 $address=$_POST["txt_address"];
			if($address=="")
			{
				$address=$info_staff->address;
			}
			 $staff_role=$_POST["role_admin"];
			if($staff_role!=1 && $staff_role!=2)
			{
				 $staff_role=$info_staff->staff_role;
			}
			include_once("../database/update_insert.php");
			$data=new insert_update_data();
			$chk_update_staff=$data->update_staff($staff_account,$fullname,$pass,$email,$phone_number,$date,$address,$staff_role,$id_staff);
			if($chk_update_staff)
				{
						if($_SESSION["info_staff"]["id_staff"]==$id_staff)
						{
							unset($_SESSION["info_staff"]);
							header("location:../login.php");
							
							
						}
						else
						{
						echo "<script>";
						echo "alert('Cập nhật thành công.');";
						
						echo "window.location='../mn_staff.php'";
						echo "</script>";
						}
				}
				else
				{
				echo "alert('Đã có lỗi xảy ra. Vui lòng kiểm tra laị!');";
					echo "window.location='../mn_staff.php'";
					echo "</script>";
				}
		
	}
?>