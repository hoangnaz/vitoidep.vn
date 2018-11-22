<?php
	echo $_GET['id_import'];
	include("../database/select_data.php");
	
	include("../database/update_insert.php");
	$insert_data=new insert_update_data();
	$data_select=new select_data();
	$info_product_import=$data_select->detail_import_bill( $_GET['id_import']);
	print_r($info_product_import);
	$numbernew=0;
	foreach($info_product_import as $pro)
	{
		$info_product=$data_select->query_one_product($pro->product);
		$new_number=$info_product->quantity_inventory+$pro->quantity_import;
		$update_product=$insert_data->update_product_price_number($new_number,$pro->product);
		$numbernew=0;
	}
	$result_confirm=$insert_data->update_confirm_import(1,$_GET['id_import']);
	if($result_confirm)
	{
		
		echo "<script>";
				echo "alert('Cập nhật thành công');";
				echo "window.location='../mn_bill_import.php'";
				echo "</script>";
	}
	
?>