<?php
	session_start();
	if(isset($_POST["btn_update_author"]))
	{
		
		echo $id_author=$_GET["id"];
		$status=0;
		echo $author_name=$_POST["txt_name_author"];
		echo $info_author=$_POST["txt_describle_author"];
		
		 if($_FILES['txt_imgage_author']['name']==NULL)
	 		{
				$avatar=$_GET['image'];
			}
		else
		{
			echo $avatar=$_FILES["txt_imgage_author"]["name"];
	
		}
		 // file upload sẽ được lưu vào thư mục

		$path="../assert/author/";
		$tmp_name_author = $_FILES['txt_imgage_author']['tmp_name'];
		move_uploaded_file($tmp_name_author,$path.$avatar);
		include("../database/update_insert.php");
		$connect_data=new insert_update_data();
		$connect_data->update_author($id_author,$author_name,$info_author,$avatar);
	}
		
	
?>