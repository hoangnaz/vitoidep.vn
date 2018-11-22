<?php
	session_start();
	if(isset($_POST["btn_add_supplier"]))
	{
			 $status=0;
			echo $id_supplier=$_POST["txt_supplier_id"];
       		echo $name_supplier=$_POST["txt_supplier_name"];
			echo $supplier_describle=$_POST["txt_describle_supplier"];
			echo $address=$_POST["txt_address_supplier"];
	 	 	echo $email=$_POST["txt_email_supplier"];
			include("../database/select_data.php");
			$data_select=new select_data();
			if($data_select->check_id_producer_publisher($id_supplier)==1)
			{
				$_SESSION["add_supplier"]=array("id_supplier"=>$id_supplier,"name_supplier"=>$name_supplier,"supplier_describle"=>$supplier_describle,"address"=>$address,"email"=>$email);
					echo "<script>";
					echo "alert('Rất tiếc đã trùng mã nhà cung cấp ');";
					echo "window.location='../sub_add_supplier.php'";
					echo "</script>";
				
			}
			else
			{
		
			
			include_once("../database/update_insert.php");
			$data=new insert_update_data();
			$chk_insert_supplier=$data->insert_producer_publisher($id_supplier,$name_supplier,$supplier_describle,$address,$email,$status);
			if($chk_insert_supplier==1)
				{
					echo "<script>";
					echo "alert('Thêm thành công ');";
					echo "window.location='../mn_supplier.php'";
					echo "</script>";
					unset($_SESSION["add_supplier"]);
				}
				else
				{
					$_SESSION["add_supplier"]=array("id_supplier"=>$id_supplier,"name_supplier"=>$name_supplier,"supplier_describle"=>$supplier_describle,"address"=>$address,"email"=>$email);
				}
			}
	}
?>