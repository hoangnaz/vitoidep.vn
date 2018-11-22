<?php
		$id_catalog_product=$_GET["id_catalog"];
		$status=$_GET["status"];
		include("../database/delete.php");
		$connect_data=new deletedata();
		$connect_data->delete_catalog($id_catalog_product,$status);
?>