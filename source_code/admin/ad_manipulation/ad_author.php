<?php
	session_start();
	if(isset($_POST["btn_add_author"]))
	{
		
		echo $id_author="";
		$status=0;
		echo $author_name=$_POST["txt_name_author"];
		echo $info_author=$_POST["txt_describle_author"];
		echo $avatar=$_FILES["txt_imgage_author"]["name"];
		 if($_FILES['txt_imgage_author']['name']==NULL)
	 		{
				
				$_SESSION["auhthor"]=array("author_name"=>"$author_name","info_author"=>$info_author);
				echo "<script>";
				echo "alert('Quá trình tải file bị lỗi');";
				echo "window.location='../sub_add_author.php'";
				echo "</script>";
				
			}
		else
		{
	 // file upload sẽ được lưu vào thư mục

		$path="../assert/author/";
		$tmp_name_author = $_FILES['txt_imgage_author']['tmp_name'];
		move_uploaded_file($tmp_name_author,$path.$avatar);
		include("../database/update_insert.php");
		$connect_data=new insert_update_data();
		$connect_data->Insert_author($id_author,$author_name,$info_author,$avatar,$status);
		unset($_SESSION["catalog"]);
		}
	}
		
	
?>