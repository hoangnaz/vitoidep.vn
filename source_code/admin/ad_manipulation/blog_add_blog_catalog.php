<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/library/common.php');
	include($_SERVER['DOCUMENT_ROOT'].'/entities/catalog_blog.php');
	include($_SERVER['DOCUMENT_ROOT'].'/database/catalog_blog.php');
	
	if(isset($_POST["btn_add_write_catalog"]))
	{
		$catalogName=$_POST['txt_catalog_blog_name'];
		$catalogDecription=$_POST['txt_describle_catalog_blog'];
		$catalogSumary=$_POST['txt_sumary_catalog_blog'];
		// get set data in entity
		$catalogBlogEntity= new catalogBlog();
		
		$catablogID = utf8tourl(utf8convert($catalogName));
		$catalogBlogEntity->setIDCatalog($catablogID);
		$catalogBlogEntity->setNameCatalogBlog($catalogName);
		$catalogBlogEntity->setDescriptionCatalogBlog($catalogDecription);
		$catalogBlogEntity->setSumaryCatalogBlog($catalogSumary);
		$blogCatalogtDB= new blogCatalogtDB();
		$resultInsertBlogCatalog = $blogCatalogtDB->insertCatalogBlog($catalogBlogEntity);
		if($resultInsertBlogCatalog == 200)
		{
			unset($_SESSION["catalog_blog"]);
			echo "<script>alert('Thêm thành công danh mục.')</script>";
			echo "<script>window.location='../blog_mn_blog_catalog.php'</script>";
		}
		else if($resultInsertBlogCatalog == 1000)
		{
			$_SESSION["catalog_blog"]= array("txt_catalog_blog_name"=>$catalogName,"txt_sumary_catalog_blog"=>$catalogSumary,"txt_describle_catalog_blog"=>$catalogDecription);
			echo "<script>alert('Tên danh mục catalog blog này đã tồn tại')</script>";
			echo "<script>window.location='../blog_sub_add_blog_catalog.php'</script>";
		}
		else
		{
			$_SESSION["catalog_blog"]= array("txt_catalog_blog_name"=>$catalogName,"txt_sumary_catalog_blog"=>$catalogSumary,"txt_describle_catalog_blog"=>$catalogDecription);
			echo "<script>alert('Quá trình thêm catalog blog thất bại.')</script>";
			echo "<script>window.location='../blog_sub_add_blog_catalog.php'</script>";
			
		}
	}
		
	
?>