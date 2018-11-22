<?php
		$id_supplier=$_GET["id_supplier"];
		$status=$_GET["status"];
		include("../database/delete.php");
		$connect_data=new deletedata();
		$connect_data->delete_producer_publisher($id_supplier,$status);
?>