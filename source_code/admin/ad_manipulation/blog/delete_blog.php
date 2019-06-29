<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/library/common.php');
	include($_SERVER['DOCUMENT_ROOT'].'/entities/blog_post.php');
	include($_SERVER['DOCUMENT_ROOT'].'/database/blog_post.php');
	
	
		 $blogID = $_GET['id_blog'];
		 $status=$_GET['status'];
		 
		$blogDB= new blogPostDB();
		$result = $blogDB->deleteBlog($blogID,$status);
		if($result == 200)
		{
			echo "<script>alert('Cập nhật thành công trạng thái bài viết.')</script>";
			echo "<script>window.location='../../write_blog_mn.php'</script>";
		}
		else if($result == 1000)
		{
			echo "<script>alert('Tên blog này không tồn tại')</script>";
			echo "<script>window.location='../../write_blog_mn.php'</script>";
		}
		else
		{
			echo "<script>alert('Quá trình cập nhật blog thất bại.')</script>";
			echo "<script>window.location='../../write_blog_mn.php'</script>";
			
		}
	
		
	
?>