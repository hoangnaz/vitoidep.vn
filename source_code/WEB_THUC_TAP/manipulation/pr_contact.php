<?php
			session_start(); 
			$id_feedback="";
			$content_feedback=$_POST["content_rp"];
	 	 	$id_user_feedback=$_SESSION["info_customer"]["id_customer"];
			$date=date('Y-m-d');
			include_once("../admin/database/update_insert.php");
			$data=new insert_update_data();
			$chk_insert_feedback=$data->insert_feedback($id_feedback,$content_feedback,$date,$id_user_feedback);
			if($chk_insert_feedback==1)
			{
				echo "<p class='text-center'>Cảm ơn bạn đã gửi thông tin phản hồi cho chúng tôi</p>";		
			}
			else
			{
				echo "<p class='text-center'>Rất tiếc đã xảy ra lỗi. Bạn vui lòng thử lại</p>";
			}
?>