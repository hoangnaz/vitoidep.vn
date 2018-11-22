<?php

include("../database/delete.php");
$delete=new deletedata();
$delete->delete_product_follow_import_bill($_GET['id_import']);
$result=$delete->delete_import_bill($_GET['id_import']);
if($result)
{
				echo "<script>";
				echo "alert('Xóa bỏ thành công phiếu nhập');";
				echo "window.location='../mn_bill_import.php'";
				echo "</script>";	
}


?>