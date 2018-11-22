<?php
		$id_staff=$_GET["id_staff"];
		$status=$_GET["status"];
		include("../database/delete.php");
		$connect_data=new deletedata();
		$connect_data->delete_staff($id_staff,$status);
?>