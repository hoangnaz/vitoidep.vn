<?php
	session_start();
	$url=$_SERVER['DOCUMENT_ROOT'];
	if(isset($_POST["btn_add_catalog"]))
	{
		$status=0;
		 $id_catalog_product="";
		 $catalog_name=$_POST["txt_catalog"];
		 $catalog_describle=$_POST["txt_describle_catalog"];
		 $image_catalog=$_FILES["txt_imgage_catalog"]["name"];
		 if($_FILES['txt_imgage_catalog']['name']==NULL)
	 		{
				$_SESSION["catalog"]=array("name"=>$catalog_name,"catalog_describle"=>$catalog_describle,"image_catalog"=>$image_catalog);
				echo "<script>";
				echo "alert('Quá trình tải file bị lỗi');";
				echo "window.location='../sub_add_catalog.php'";
				echo "</script>";
				
			}
		else
		{
	 // file upload sẽ được lưu vào thư mục

		$path=$url."/images/catalog/";
		$tmp_name_catalog = $_FILES['txt_imgage_catalog']['tmp_name'];
		move_uploaded_file($tmp_name_catalog,$path.$image_catalog);
		include("../database/update_insert.php");
		$connect_data=new insert_update_data();
		$connect_data->Insert_catalog($id_catalog_product,$catalog_name,$catalog_describle,$image_catalog,$status);
		unset($_SESSION["catalog"]);
		}
	}
		
	
?>