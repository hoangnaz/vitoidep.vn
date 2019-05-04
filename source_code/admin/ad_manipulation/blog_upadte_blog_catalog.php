<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/library/common.php');
	include($_SERVER['DOCUMENT_ROOT'].'/entities/catalog_blog.php');
	include($_SERVER['DOCUMENT_ROOT'].'/database/catalog_blog.php');
	
	if(isset($_POST["btn_update_write_catalog"]))
	{
		 $catablogID = $_GET['idCatalogBlog'];
		 $catalogName=$_POST['txt_catalog_blog_name'];
		 $catalogDecription=$_POST['txt_describle_catalog_blog'];
		 $catalogSumary=$_POST['txt_sumary_catalog_blog'];
		
		// get set data in entity
		$catalogBlogEntity= new catalogBlog();		
		$catalogBlogEntity->setIDCatalog($catablogID);
		$catalogBlogEntity->setNameCatalogBlog($catalogName);
		$catalogBlogEntity->setDescriptionCatalogBlog($catalogDecription);
		$catalogBlogEntity->setSumaryCatalogBlog($catalogSumary);
		$blogCatalogtDB= new blogCatalogtDB();
		$resultUpdateBlogCatalog = $blogCatalogtDB->updateCatalogBlog($catalogBlogEntity,$catablogID);
		if($resultUpdateBlogCatalog == 200)
		{
			echo "<script>alert('Cập nhật thành công danh mục.')</script>";
			echo "<script>window.location='../blog_mn_blog_catalog.php'</script>";
		}
		else if($resultUpdateBlogCatalog == 1000)
		{
			echo "<script>alert('Tên danh mục catalog blog này không tồn tại')</script>";
			echo "<script>window.location='../blog_mn_blog_catalog.php'</script>";
		}
		else
		{
			echo "<script>alert('Quá trình cập nhật catalog blog thất bại.')</script>";
			echo "<script>window.location='../blog_mn_blog_catalog.php'</script>";
			
		}
	}
		
	
?>