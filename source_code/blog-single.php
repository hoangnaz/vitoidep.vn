<?php
	error_reporting(0);
	require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/blog.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/database/blog_post.php';
	if(isset($_GET['post'])){
		$blogId = $_GET['post'];
	}
	$blogPost = new blogPostBL();
	$infoPost = $blogPost->getBlogPost($blogId);
	$catalog = 	$infoPost->blog_catalog;
	$blogPost->updateView($blogId);
	$blogPostDB = new blogPostDB();
	if(count($blogPostDB -> getAllBlogFollowCondition($catalog)) > 4){
		$allBlogFollowCatalog = array_chunk($blogPostDB -> getAllBlogFollowCondition($catalog),4);
	}else{
		$allBlogFollowCatalog = $blogPostDB -> getAllBlogFollowCondition($catalog);
	}

	include 'template/master/header.php';
	include_once 'template/master/menu_top.php';
	include_once 'template/master/main_menu.php';
	include_once 'template/single_blog/content.php';
	include_once 'template/single_blog/comment_blog.php';
	include_once 'template/single_blog/the_same_catalog.php';
	include_once 'template/master/footer.php';
	include_once 'template/master/top_message.php';
	include_once 'template/master/js_file.php';
	include_once 'template/partial/sign_in.php';
	include_once 'template/partial/sign_up.php';
	include_once 'template/partial/get_password.php';
	include_once 'template/partial/detail_product.php';
?>






				  