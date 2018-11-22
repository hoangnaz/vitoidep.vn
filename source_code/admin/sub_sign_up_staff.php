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
	include("ad_header.php");
	include("ad_side_bar.php");
	include("ad_title.php");
	include("ad_sign_up_content.php");
	include("ad_footer.php");
?>
