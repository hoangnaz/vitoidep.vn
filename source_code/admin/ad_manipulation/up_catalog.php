<?php
	session_start();
	if(isset($_POST["btn_update_catalog"]))
	{
		echo $id_catalog_product=$_GET["id"];
		echo $catalog_name=$_POST["txt_catalog"];
		echo $catalog_describle=$_POST["txt_describle_catalog"];
		echo $image_catalog=$_FILES["txt_imgage_catalog"]["name"];
		 if($_FILES['txt_imgage_catalog']['name']==NULL)
	 		{
				$image_catalog=$_GET["image"];
				include("../database/update_insert.php");
				$connect_data=new insert_update_data();
				$connect_data->update_catalog($id_catalog_product,$catalog_name,$catalog_describle,$image_catalog);
			}
		else
		{
	 // file upload sẽ được lưu vào thư mục

		$path="../assert/catalog/";
		$tmp_name_catalog = $_FILES['txt_imgage_catalog']['tmp_name'];
		move_uploaded_file($tmp_name_catalog,$path.$image_catalog);
		include("../database/update_insert.php");
		$connect_data=new insert_update_data();
		$connect_data->update_catalog($id_catalog_product,$catalog_name,$catalog_describle,$image_catalog);
		
		}
	}
		
	
?>