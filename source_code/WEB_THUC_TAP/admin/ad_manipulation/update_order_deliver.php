<?php
include("../database/select_data.php");
$select_data=new select_data();
include("../database/update_insert.php");
$data_insert=new insert_update_data();

	if(isset($_POST['upt_order_deliver']))
	{
		echo $_GET['id_order'];
		//echo $_GET['id_staff'];
		echo $staff=$_POST['role_admin'];
		if($_POST['role_admin']=="")
		{
			echo $staff=$_GET['id_staff'];
		}
		$data_insert->update_bill_order($_GET['id_order'],$staff);
		$data_insert->update_staff_manage_order($_GET['id_order'],$staff,$_GET['or_status']);
			
		
			  		
					
		}
		
?>