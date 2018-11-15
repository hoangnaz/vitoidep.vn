<?php
		$id_product=$_GET["id_product"];
		$status=$_GET["status"];
		include("../database/delete.php");
		$connect_data=new deletedata();
		$connect_data->delete_product($id_product,$status);
?>