<?php
	error_reporting(1);
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
	$ad_page=new pagination();
	include("database/select_data.php");
	$data_select=new select_data();
	include("ad_header.php");
	include("ad_side_bar.php");
	include("ad_title.php");
	include("ad_import_bill_content.php");
	include("ad_footer.php");
?>
