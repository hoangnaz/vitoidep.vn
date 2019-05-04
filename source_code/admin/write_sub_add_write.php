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
	
	error_reporting(1);
	include("ad_header.php");
	include("ad_side_bar.php");
	include("ad_title.php");
	include("write_sub_add_write_template.php");
	include("ad_footer.php");
?>
