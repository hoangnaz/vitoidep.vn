<?php
	error_reporting(0);
	session_start();
	include_once("admin/database/select_data.php");
	$us_select=new select_data();
	include("template_home/ic_header.php");
	include("template_home/ic_menu.php");
	include("template_home/ic_logo_search.php");
	include("template_home/ic_catalog_menu.php");
	include("template_home/content_index.php");
 	include("template_home/ic_footer.php");
?>
   