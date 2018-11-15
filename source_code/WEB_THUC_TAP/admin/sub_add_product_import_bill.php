<?php
	session_start();
	if($_SESSION["info_staff"]["fullname"]=="")
	{
		header("Location:login.php");
	}

		else if($_SESSION["info_staff"]['staff_role']==2)
		{
			header("location:mn_member.php");
		}
	error_reporting(0);
	include("database/page.php");
	include("database/select_data.php");
	$ad_select=new select_data();
	$ad_page=new pagination();
	include("ad_header.php");
	include("ad_side_bar.php");
	include("ad_title.php");
	include("ad_product_import_bill.php");
	include("ad_footer.php");
?>
