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
		include("database/select_data.php");
	$data_sl=new select_data();
	include("ad_header.php");
	include("ad_side_bar.php");
	include("ad_title.php");
	include("ad_add_sub_catalog.php");
	include("ad_footer.php");
?>
