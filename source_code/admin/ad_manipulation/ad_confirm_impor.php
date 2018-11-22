<?php
	session_start();
	if(isset($_POST['btn_add_import_bill']))
	{
		$id_import=rand(10000000,99999999);
		include("../database/select_data.php");
		$data_select= new select_data();
		
		do
		{
			echo $id_import=rand(10000000,99999999);
			$chk_id=$data_select->check_id_import_bill($id_import);
		}
		while($chk_id==1);
		
		
		$error=0;
			foreach($_SESSION['import_order'] as $list_pro_im)
		{	
			if($list_pro_im['price_import']==0)
			{
				 $error=1;
				
			}
		}
		if($error==1)
		{
				echo "<script>";
				echo "alert('Đơn giá nhập phải lớn hơn 0. Vui lòng kiểm tra lại');";
				echo "window.location='../sub_import_bill.php'";
				echo "</script>";		
		}
		else
		{
		
		include("../database/update_insert.php");
		$insert_data=new insert_update_data();
		$result_insert_bill=$insert_data->insert_bill_import($id_import,date('Y-m-d'),$_SESSION["info_staff"]["id_staff"],$_POST['role_admin'],$_GET['total_money'],$_SESSION['pro_pu'],0);
		$new_number=0;
		foreach($_SESSION['import_order'] as $detail_pro_im)
		{	
		$result_insert_detail_bill=$insert_data->insert_detail_bill_import($detail_pro_im["id_product"],$detail_pro_im["number"],$detail_pro_im["price_import"],$id_import);
		
		$new_number=0;
		}
		
				echo "<script>";
				echo "alert('Thêm thành công phiếu nhập');";
				echo "window.location='../mn_bill_import.php'";
				echo "</script>";

	
			unset($_SESSION['import_order']);
			unset($_SESSION['pro_pu']);
		}
	}
	
	elseif(isset($_POST['update_import_bill_confirm']))
	{
		include("../database/select_data.php");
		$data_select= new select_data();
		
	
		
		$error=0;
			foreach($_SESSION['import_order'] as $list_pro_im)
		{	
			if($list_pro_im['price_import']==0)
			{
				 $error=1;
				
			}
		}
		if($error==1)
		{
				echo "<script>";
				echo "alert('Đơn giá nhập phải lớn hơn 0. Vui lòng kiểm tra lại');";
				echo "window.location='../sub_import_bill.php'";
				echo "</script>";		
		}
		else
		{
			// lay danh sach mảng các sản phảm theo mã sp. Tý nữa đối chiếu ko có thì xóa.
			$info_detail_import=$data_select->detail_import_bill($_SESSION['id_import_up']);
			$list_id_product=array();
			foreach($info_detail_import as $value)
			{
				$list_id_product[$value->product]=$_SESSION['id_import_up'];
			}
			include("../database/update_insert.php");
			$insert_data=new insert_update_data();
			
			// cập nhật chi tiết bill. Có update , ko có thêm.
			foreach($_SESSION['import_order'] as $list_pro_im)
			{
				if($data_select->check_product_in_detail_import_bill($_SESSION['id_import_up'],$list_pro_im["id_product"])==1)
				{
					$insert_data->update_detail_bill_import($list_pro_im["number"],$list_pro_im["price_import"],$list_pro_im["id_product"],$_SESSION['id_import_up']);
				}
				else
				{
					$result_insert_detail_bill=$insert_data->insert_detail_bill_import($list_pro_im["id_product"],$list_pro_im["number"],$list_pro_im["price_import"],$_SESSION['id_import_up']);
				}
				
			}
		
			// tien hành xóa sp ko có.
				include_once("../database/delete.php");
				$delete=new deletedata();
				// duyetj xem thang nao dang có trong db mà ko có tren gio nhap thì xóa
				$num=0;
			
				foreach($list_id_product as $key=>$lst_pro)
			{
			
				if(array_key_exists($key,$_SESSION['import_order'])==false)
				{
					
					$delete->delete_one_product_in_import_detail($_SESSION['id_import_up'],$key);
				}
			}
			$info_bill_import=$data_select->info_one_import_bill($_SESSION['id_import_up']);

			$staff_in_charge=$_POST["update_staff_bill_import"];
			if($staff_in_charge=="")
			{
				//print_r($info_bill_import);
				$staff_in_charge=$info_bill_import->staff_in_charge_bill;
			}
			$update_bill_import=$insert_data->update_bill_import($_SESSION["info_staff"]["id_staff"],$staff_in_charge,$_GET['total_money'],$_SESSION['id_import_up']);
				echo "<script>";
				echo "alert('Cập nhật  thành công phiếu nhập');";
				echo "window.location='../mn_bill_import.php'";
				echo "</script>";

				
			unset($_SESSION['import_order']);
			unset($_SESSION['pro_pu']);
			unset($_SESSION['id_import_up']);
		
		}
	}
?>