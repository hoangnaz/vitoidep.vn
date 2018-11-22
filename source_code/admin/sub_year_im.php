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
	include("database/pager.php");
	include("database/select_data.php");
	$ad_select=new select_data();
	$ad_pager=new pager();
	include("ad_header.php");
	include("ad_side_bar.php");
	include("ad_title.php");
	include("ad_ip_statistic_year.php");
	include("ad_footer.php");
?>
