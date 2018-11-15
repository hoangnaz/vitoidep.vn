<?php
session_start();
	if($_POST['content']=="")
	{
		echo "<p class='text-danger text-center'>Vui lòng nhập nội dung bình luận!</p>";
	}
	else
	{
		 $content=$_POST['content'];
		 $id_pro=$_POST['id_ro'];
		$date=date('Y-m-d');
		include("../admin/database/update_insert.php");
		$insert=new insert_update_data();
		$result_insert=$insert->insert_comment_product("",$content,$id_pro,$_SESSION["info_customer"]["id_customer"],$date);
		if($result_insert)
		{
			echo "<p class='text-danger text-center'>Cảm ơn bạn đã gửi thông tin đánh giá sản phẩm!</p>";

		}
		else
		{
			echo "<p class='text-danger text-center'>Rất tiếc! Vui lòng thử lại bình luận khác</p>";
		}
		
	}
?>