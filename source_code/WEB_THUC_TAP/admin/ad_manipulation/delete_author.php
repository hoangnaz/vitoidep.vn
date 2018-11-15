<?php
		$id_author=$_GET["id_author"];
		$status=$_GET["status"];
		include("../database/delete.php");
		$connect_data=new deletedata();
		$connect_data->delete_author($id_author,$status);
?>