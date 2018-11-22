<?php
	session_start();
	if(isset($_POST['btn_add_import_bill']))
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
		
		include("../database/update_insert.php");
		$insert_data=new insert_update_data();
		$detail_import_bill=$data->detail_import_bill($_SESSION['id_import_up']);

		foreach($_SESSION['import_order'] as $detail_pro_im)
		{	
		$result_insert_detail_bill=$insert_data->insert_detail_bill_import($detail_pro_im["id_product"],$detail_pro_im["number"],$detail_pro_im["price_import"],$id_import);
		//$info_product=$data_select->query_one_product($detail_pro_im["id_product"]);
		//print_r($info_product);
		//$new_number=$info_product->quantity_inventory+$detail_pro_im["number"];
		//$update_product=$insert_data->update_product_price_number($new_number,$detail_pro_im["price"],$detail_pro_im["id_product"]);
		}
		
				echo "<script>";
				echo "alert('Thêm thành công phiếu nhập');";
				echo "window.location='../mn_bill_import.php'";
				echo "</script>";

	
			unset($_SESSION['import_order']);
			unset($_SESSION['pro_pu']);
		}
	}
?>