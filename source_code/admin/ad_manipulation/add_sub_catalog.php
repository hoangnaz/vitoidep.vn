<?php
	session_start();
	if(isset($_POST["btn_add_catalog"]))
	{
		$status=0;
		echo $id_catalog_product= rand(10,99);
		echo $catalog_name=$_POST["txt_catalog"];
        echo $catalog_describle=$_POST["txt_describle_catalog"];
        echo $catalog_parent=$_POST["catalog"];
        
	
	 // file upload sẽ được lưu vào thư mục

		$path="../assert/catalog/";
		$tmp_name_catalog = $_FILES['txt_imgage_catalog']['tmp_name'];
		move_uploaded_file($tmp_name_catalog,$path.$image_catalog);
		include("../database/update_insert.php");
        $connect_data=new insert_update_data();
        
		$connect_data->Insert_sub_catalog($id_catalog_product,$catalog_name,$catalog_describle,$catalog_parent,$status);
		unset($_SESSION["catalog"]);
		
	}
		
	
?>