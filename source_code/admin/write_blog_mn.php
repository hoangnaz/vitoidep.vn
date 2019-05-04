<?php
	error_reporting(0);
	session_start();
	if($_SESSION["info_staff"]["fullname"]=="")
	{
		header("Location:login.php");
	}
	
	else if($_SESSION["info_staff"]['staff_role']==2)
	{
		header("location:mn_member.php");
	}
	include("database/page.php");
	include("database/select_data.php");
	$ad_select=new select_data();
	$ad_page=new pagination();
	include("ad_header.php");
	include("ad_side_bar.php");
	include("ad_title.php");
	include("write_add_blog_content_template.php");
	// add content list catalog blog
	include("ad_footer.php");
?>