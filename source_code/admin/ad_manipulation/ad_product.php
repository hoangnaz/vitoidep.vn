<?php
	session_start();

	function utf8convert($str) {

		if(!$str) return false;

		$utf8 = array(

	'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

	'd'=>'đ|Đ',

	'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

	'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

	'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

	'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

	'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',

										);

		foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);

	return $str;

	}

	function utf8tourl($text){
        $text = strtolower(utf8convert($text));
        $text = str_replace( "ß", "ss", $text);
        $text = str_replace( "%", "", $text);
        $text = preg_replace("/[^_a-zA-Z0-9 -] /", "",$text);
        $text = str_replace(array('%20', ' '), '-', $text);
        $text = str_replace("----","-",$text);
        $text = str_replace("---","-",$text);
        $text = str_replace("--","-",$text);
	return $text;
	}



	if(isset($_POST["btn_add_product"]))
	{
	
		 $id_product= rand(10000,999999);
		$status=0;
		 $name_product=$_POST["txt_pd_name"];
		
		 $describle=$_POST["txt_describle"];
		 $unit=$_POST["txt_unit"];
		 $supplier=$_POST["supplier"];
		 $catalog_product=$_POST["catalog"];
		 $image=$_FILES["fl_imgage"]["name"];
		 $quantity=0;
		 $promotion=0;
		 $price=0;
		 $hightlight = 0;
		 $new_str = utf8tourl(utf8convert($name_product));

		
		 if($_FILES['fl_imgage']['name']==NULL)
	 		{
				
				$_SESSION["product"]=array('name_product'=>$name_product,"image"=>$image, "describle"=>$describle,"unit"=>$unit,"supplier"=>$supplier,"catalog_product"=>$catalog_product);
				echo "<script>";
				echo "alert('Quá trình tải file bị lỗi');";
				echo "window.location='../sub_add_product.php'";
				echo "</script>";
				
			}
		else
		{
	 // file upload sẽ được lưu vào thư mục

		$path="../assert/product/";
		$tmp_name_product = $_FILES['fl_imgage']['tmp_name'];
		move_uploaded_file($tmp_name_product,$path.$image);
		include("../database/update_insert.php");
		$connect_data=new insert_update_data();
		$connect_data->insert_product_info($id_product,$name_product, $new_str ,$image,$describle,$quantity,$catalog_product,$price,$unit,$promotion,$supplier,$hightlight,$status);
		unset($_SESSION["product"]);
		echo "<script>";
				echo "alert('Thêm mới sản phẩm thành công');";
				echo "window.location='../mn_product.php'";
				echo "</script>";
		}
	}
	



	
?>