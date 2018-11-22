<?php
	include("../database/select_data.php");
	$data_select=new select_data();
	include("../database/update_insert.php");
	$connect_data=new insert_update_data();
	session_start();
	if(isset($_POST["btn_update_product"]))
	{
	
		echo $id_product=$_GET['id_product'];
		$info_product=$data_select->query_one_product($id_product);
		echo $name_product=$_POST["txt_pd_name"];
		if($name_product=="")
		{
			$name_product=$info_product->name_product;
		}
		echo $describle_product=$_POST["txt_describle"];
		if($describle_product=="")
		{
			$describle_product=$info_product->describle_product;
		}
		echo $unit=$_POST["txt_unit"];
		if($unit=="")
		{
			$unit=$info_product->unit;
		}
	
		echo $producer_publisher=$_POST["supplier"];
		if($producer_publisher=="")
		{
			$producer_publisher=$info_product->producer_publisher;
		}
		echo $catalog_product=$_POST["catalog"];
		if($catalog_product=="")
		{
			$catalog_product=$info_product->sub_catalog;
		}
		echo $image_product=$_FILES["fl_imgage"]["name"];
		if($image_product=="")
		{
			$image_product=$info_product->image_product;
		}
		echo $promotion_product=$_POST["txt_pd_promotion"];
		if($promotion_product=="")
		{
			$promotion_product=$info_product->promotion_product;
		}
		echo $price_product=$_POST["txt_pd_price"];
		if($price_product=="")
		{
			$price_product=$info_product->price_product;
		}
		
	
		 if($_FILES['fl_imgage']['name']==NULL)
	 		{
				
				$connect_data->update_product($id_product,$name_product,$image_product,$describle_product,$quantity = 20,$catalog_product,$price_product,$unit,$promotion_product,$producer_publisher,$hightlight = 0,$status =1);
			}
		else
		{
	 // file upload sẽ được lưu vào thư mục

		$path="../assert/product/";
		$tmp_name_product = $_FILES['fl_imgage']['tmp_name'];
		move_uploaded_file($tmp_name_product,$path.$image_product);
		
		$connect_data->update_product($id_product,$name_product,$image_product,$describle_product,$quantity = 20,$catalog_product,$price_product,$unit,$promotion_product,$producer_publisher,$hightlight = 0,$status=1);
		}
	}
		
	
?>