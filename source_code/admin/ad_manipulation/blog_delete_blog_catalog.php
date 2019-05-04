<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/library/common.php');
	include($_SERVER['DOCUMENT_ROOT'].'/entities/catalog_blog.php');
	include($_SERVER['DOCUMENT_ROOT'].'/database/catalog_blog.php');
	
	
		 $catablogID = $_GET['id_catalog_blog'];
		 $catalogStatus=$_GET['status'];
		 
		$blogCatalogtDB= new blogCatalogtDB();
		$resultDeleteBlogCatalog = $blogCatalogtDB->deleteCatalogBlog($catablogID,$catalogStatus);
		if($resultDeleteBlogCatalog == 200)
		{
			echo "<script>alert('Cập nhật thành công trạng thái danh mục.')</script>";
			echo "<script>window.location='../blog_mn_blog_catalog.php'</script>";
		}
		else if($resultDeleteBlogCatalog == 1000)
		{
			echo "<script>alert('Tên danh mục catalog blog này không tồn tại')</script>";
			echo "<script>window.location='../blog_mn_blog_catalog.php'</script>";
		}
		else
		{
			echo "<script>alert('Quá trình cập nhật trạng thái catalog blog thất bại.')</script>";
			echo "<script>window.location='../blog_mn_blog_catalog.php'</script>";
			
		}
	
		
	
?>