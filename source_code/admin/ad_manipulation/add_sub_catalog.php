<?php
	session_start();
	if(isset($_POST["btn_add_catalog"]))
	{
		$status=0;
		 $id_catalog_product= rand(10,99);
		 $catalog_name=$_POST["txt_catalog"];
         $catalog_describle=$_POST["txt_describle_catalog"];
         $catalog_parent=$_POST["catalog"];
    
		include("../database/update_insert.php");
        $connect_data=new insert_update_data();
		$connect_data->Insert_sub_catalog($id_catalog_product,$catalog_name,$catalog_describle,$catalog_parent,$status);
		unset($_SESSION["catalog"]);
		
	}
		
	
?>