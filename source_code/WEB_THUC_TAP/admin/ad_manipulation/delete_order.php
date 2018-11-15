<?php
include("../database/update_insert.php");
$data_insert=new insert_update_data();
include("../database/delete.php");
$delete=new deletedata();
include("../database/select_data.php");
$select_data=new select_data();
$info_bill=$select_data->info_order($_GET['id_order']);
if($info_bill->status_order==2)
	{
		$lst_product=$select_data->list_product_in_order($_GET['id_order']);
		foreach($lst_product as $lst)
		{
			$pro=$select_data->query_one_product($lst->id_product);
			$pro_number=$pro->quantity_inventory+($lst->pro_quantity);
			$data_insert->update_quantity_inventory_product($lst->id_product,$pro_number);
		
		}
	}
	$delete->delete_bill_order($_GET['id_order']);
	$delete->delete_detail_order($_GET['id_order']);	
	$result_delete=$delete->delete_order($_GET['id_order']);	
	if($result_delete)
	{
			if($_GET['id_page']==1)
			{
				echo "<script>";
				echo "alert('Xử lý xóa thành công');";
				echo "window.location='../mn_order.php'";
				echo "</script>";		
			}
			elseif($_GET['id_page']==2)
			{
				echo "<script>";
				echo "alert('Xử lý xóa thành công');";
				echo "window.location='../mn_order_payment.php'";
				echo "</script>";		
			}
			else
			{
				echo "<script>";
						echo "alert('Thất bại');";
						echo "window.location='../mn_order.php'";
						echo "</script>";
			}
	}
?>