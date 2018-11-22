<?php
	session_start();
	if(isset($_POST["btn_upda_supplier"]))
	{
		
			echo $id_supplier=$_GET["id_supplier"];
       		echo $name_supplier=$_POST["txt_supplier_name"];
			echo $supplier_describle=$_POST["txt_describle_supplier"];
			echo $address=$_POST["txt_address_supplier"];
	 	 	echo $email=$_POST["txt_email_supplier"];
			include_once("../database/update_insert.php");
			$data=new insert_update_data();
			$chk_update=$data->update_producer_publisher($name_supplier,$supplier_describle,$address,$email,$id_supplier);
			
		
	}
?>