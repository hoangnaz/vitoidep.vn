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


	if(isset($_POST["btn_add_catalog"]))
	{
		$status=0;
		echo $id_catalog_product="";
		echo $catalog_name=$_POST["txt_catalog"];
		echo $catalog_describle=$_POST["txt_describle_catalog"];
		$name_vietnam = utf8tourl(utf8convert($catalog_name));
		echo $image_catalog=$_FILES["txt_imgage_catalog"]["name"];
		 
				$_SESSION["catalog"]=array("name"=>$catalog_name,"catalog_describle"=>$catalog_describle,"image_catalog"=>$image_catalog);
			
		
		include("../database/update_insert.php");
		$connect_data=new insert_update_data();
		$connect_data->Insert_catalog($id_catalog_product,$catalog_name,$catalog_describle,$image_catalog,$status);
		unset($_SESSION["catalog"]);
	
	}
		
	
?>