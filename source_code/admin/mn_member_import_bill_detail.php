<?php
session_start();
if($_SESSION["info_staff"]["fullname"]=="")
	{
		header("Location:login.php");
	}
			else if($_SESSION["info_staff"]['staff_role']==1)
		{
			header("location:index.php");
		}
	include("database/page.php");
	include("database/select_data.php");
	$data_select =new select_data();
	$ad_page=new pagination();
	include("ad_header.php");
	include("ad_side_bar.php");
	include("ad_title.php");
	include("ad_import_bill_staff_detail.php");
	include("ad_footer.php");
?>
