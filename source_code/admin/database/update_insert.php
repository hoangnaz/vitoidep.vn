<?php
	include_once("connect_database.php");
	$data=new database();
	class insert_update_data extends database
	{
		/*ADMIN INFO*/
		// `id_staff`, `staff_account`, `fullname`, `pass`, `email`, `phone_number`, `DOB`, `sex`, `address`, `staff_role`, `status`, `created_at`, `updated_at`
		
		function Insert_staff($id_staff,$staff_account,$fullname,$pass,$email,$phone_number,$date,$sex,$address,$staff_role,$status)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO staff VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$PDO=$pdo->prepare($query);
			$pass=sha1($pass);
			$param=array($id_staff,$staff_account,$fullname,$pass,$email,$phone_number,$date,$sex,$address,$staff_role,$status,date("Y-m-d H:i:s"),date("Y-m-d H:i:s"));
			$insert_staff=$PDO->execute($param);
			return $insert_staff; 
		}
		
		function update_staff($staff_account,$fullname,$pass,$email,$phone_number,$date,$address,$staff_role,$id_staff)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `staff` SET `staff_account`=?,`fullname`=?,`pass`=?,`email`=?,`phone_number`=?,`DOB`=?,`address`=?,`staff_role`=?  WHERE `id_staff`=?";
			$PDO=$pdo->prepare($query);
			
			$param=array($staff_account,$fullname,$pass,$email,$phone_number,$date,$address,$staff_role,$id_staff);
			$update_staff=$PDO->execute($param);
			return $update_staff;
		}
		
		/*ROLE*/
		
		
		function Insert_staff_role($id_role,$role_name,$role_describe)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO role_staff VALUES (?,?,?)";
			$PDO=$pdo->prepare($query);
			$param=array($id_role,$role_name,$role_describe);
			$insert_staff_role=$PDO->execute($param);
			if($insert_staff_role==1)
				{
					echo "<script>";
					echo "alert('Thêm mới thành công vai trò của nhân viên');";
					//echo "window.location='../sub_ad_list_new.php'";
					echo "</script>";
				}
				elseif($insert_staff_role==0)
				{
					echo "<script>";
					echo "alert('Quá trình thêm vai trò nhân viên thất bại. Vui lòng thử lại');";
					//echo "window.location='../sub_ad_list_new.php'";
					echo "</script>";	
				}
		}
	
		/*CATALOG PRODUCT*/
			function Insert_catalog($id_catalog_product,$catalog_name,$catalog_describle,$catalog_id,$status)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO catalog_product VALUES (?,?,?,?,?)";
			$PDO=$pdo->prepare($query);
			$param=array($id_catalog_product,$catalog_name,$catalog_describle,$catalog_id,$status);
			$insert_catalog=$PDO->execute($param);
			if($insert_catalog==1)
				{
					echo "<script>";
					echo "alert('Thêm mới thành công danh mục sản phẩm');";
					echo "window.location='../mn_catalog.php'";
					echo "</script>";
				}
				elseif($insert_catalog==0)
				{
					echo "<script>";
					echo "alert('Quá trình thêm danh mục thất bại. Vui lòng thử lại');";
					echo "window.location='../sub_add_catalog.php'";
					echo "</script>";	
				}
		}
		
	
		function Insert_sub_catalog($sub_catalog_id,$sub_catalog_name,$sub_catalog_describe,$catalog_id,$status)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO sub_catalog VALUES (?,?,?,?,?)";
			$PDO=$pdo->prepare($query);
			$param=array($sub_catalog_id,$sub_catalog_name,$sub_catalog_describe,$catalog_id,$status);
			$insert_catalog=$PDO->execute($param);
			if($insert_catalog==1)
				{
					echo "<script>";
					echo "alert('Thêm mới thành công danh mục sản phẩm');";
					echo "window.location='../mn_sub_catalog.php'";
					echo "</script>";
				}
				elseif($insert_catalog==0)
				{
					echo "<script>";
					echo "alert('Quá trình thêm danh mục thất bại. Vui lòng thử lại');";
					echo "window.location='../mn_sub_catalog.php'";
					echo "</script>";	
				}
		}
		
		
	
	
		/**/
		/*FEEDBACK*/
			function insert_feedback($id_feedback,$content_feedback,$date,$id_user_feedback)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO feedback VALUES (?,?,?,?)";
			$PDO=$pdo->prepare($query);
			$param=array($id_feedback,$content_feedback,$date,$id_user_feedback);
			$insert_feedback=$PDO->execute($param);
			return $insert_feedback;
			
		}
		/**/
		
			/*producer_publisher*/
			function insert_producer_publisher($id_producer_publisher,$name_producer_publisher,$producer_publisher_describle,$address,$email,$status)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO producer_publisher VALUES (?,?,?,?,?,?)";
			$PDO=$pdo->prepare($query);
			$param=array($id_producer_publisher,$name_producer_publisher,$producer_publisher_describle,$address,$email,$status);
			$insert_producer_publisher=$PDO->execute($param);
			return $insert_producer_publisher;
			
		}
	
		
		function update_producer_publisher($name_producer_publisher,$producer_publisher_describle,$address,$email,$id_producer_publisher)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `producer_publisher` SET `name_producer_publisher`=?,`producer_publisher_describle`=?,`producer_publisher_address`=?,`producer_publisher_email`=? WHERE `id_producer_publisher` LIKE ?";
			$PDO=$pdo->prepare($query);
			$param=array($name_producer_publisher,$producer_publisher_describle,$address,$email,$id_producer_publisher);
			$update_producer_publisher=$PDO->execute($param);
			if($update_producer_publisher)
			{
				echo "<script>";
				echo "alert('Cập nhật thành công');";
				echo "window.location='../mn_supplier.php'";
				echo "</script>";		
			}
			else
			{
				echo "<script>";
						echo "alert('Cập nhật thất bại');";
						echo "window.location='../mn_supplier.php'";
						echo "</script>";
			}
		}
		
		/**/
		
		/*AUTHOR*/
			function Insert_author($id_author,$author_name,$info_author,$avatar,$status)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO author_info VALUES (?,?,?,?,?)";
			$PDO=$pdo->prepare($query);
			$param=array($id_author,$author_name,$info_author,$avatar,$status);
			$insert_author=$PDO->execute($param);
			if($insert_author==1)
				{
					echo "<script>";
					echo "alert('Thêm mới thành công tác giả mới');";
					echo "window.location='../mn_author.php'";
					echo "</script>";
				}
				elseif($insert_author==0)
				{
					echo "<script>";
					echo "alert('Đã xảy ra lỗi. Vui lòng thử lại');";
					echo "window.location='../sub_add_author.php'";
					echo "</script>";	
				}
		}
		
		
		
		
		function update_author($id_author,$author_name,$info_author,$avatar)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `author_info` SET `author_name`=?,`info_author`=?,`avatar`=? WHERE `id_author`=?";
			$PDO=$pdo->prepare($query);
			$param=array($author_name,$info_author,$avatar,$id_author);
			$update_auhor=$PDO->execute($param);
			if($update_auhor)
			{
				echo "<script>";
				echo "alert('Cập nhật thành công tác giả');";
				echo "window.location='../mn_author.php'";
				echo "</script>";		
			}
			else
			{
				echo "<script>";
						echo "alert('Cập nhật thất bại');";
						echo "window.location='../mn_author.php'";
						echo "</script>";
			}
		}
		/**/
		
			/*PRODUCT*/
			function insert_product_info($id_product,$name_product,$new_str,$image,$describle,$quantity,$catalog_product,$price,$unit,$promotion,$supplier,$hightlight,$status)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO product_info VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$PDO=$pdo->prepare($query);
			$param=array($id_product,$name_product,$new_str,$image,$describle,$quantity,$catalog_product,$price,$unit,$promotion,$supplier,$hightlight,$status);
			$insert_product=$PDO->execute($param);
			return $insert_product;
			
		}
		
	
			function update_product($id_product,$name_product,$image,$describle,$quantity,$catalog_product,$price,$unit,$promotion,$supplier,$hightlight,$status)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `product_info` SET `name_product`=?,`image_product`=?,`describle_product`=?,`point_promotion`=?,`price_product`=?,`unit`=?,`producer_publisher`=?,`sub_catalog`=? WHERE id_product=?";
			$PDO=$pdo->prepare($query);
			$param=array($name_product,$image,$describle,$promotion,$price,$unit,$supplier,$catalog_product,$id_product);
			$update_pro=$PDO->execute($param);
			if($update_pro)
			{
				echo "<script>";
				echo "alert('Cập nhật thành công');";
				echo "window.location='../mn_product.php'";
				echo "</script>";		
			}
			else
			{
				echo "<script>";
						echo "alert('Cập nhật thất bại');";
						echo "window.location='../mn_product.php'";
						echo "</script>";
			}
			
		}
		
			
		function update_product_price_number($quantity,$id_product)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `product_info` SET `quantity_inventory`=? WHERE `id_product`=?";
			$PDO=$pdo->prepare($query);
			$param=array($quantity,$id_product);
			$update_catalog=$PDO->execute($param);
			
		}
		
		function update_catalog($id_catalog_product,$catalog_name,$catalog_describle,$image_catalog)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `catalog_product` SET `catalog_name`=?,`catalog_describle`=?,`image_catalog`=? WHERE `id_catalog_product`=?";
			$PDO=$pdo->prepare($query);
			$param=array($catalog_name,$catalog_describle,$image_catalog,$id_catalog_product);
			$update_catalog=$PDO->execute($param);
			if($update_catalog)
			{
				echo "<script>";
				echo "alert('Cập nhật thành công danh mục');";
				echo "window.location='../mn_catalog.php'";
				echo "</script>";		
			}
			else
			{
				echo "<script>";
						echo "alert('Cập nhật thất bại');";
						echo "window.location='../mn_catalog.php'";
						echo "</script>";
			}
		}
		/* ORDER*/
	/*	`id_order`, `id_customer`, `reciever`, `email`, `phone_nummber`, `address_recieve`, `date_order`, `total_money`, `staff`, `status_order`*/
			function insert_order($id_order,$id_customer,$reciever,$email,$phone_nummber,$address_recieve,$date_order,$total_money,$staff,$status_order)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO `order` VALUES (?,?,?,?,?,?,?,?,?,?)";
			$PDO=$pdo->prepare($query);
			$param=array($id_order,$id_customer,$reciever,$email,$phone_nummber,$address_recieve,$date_order,$total_money,$staff,$status_order);
			$insert_order=$PDO->execute($param);
			return $insert_order;
			
		}
		
		function insert_order_detail($product,$quantity,$price,$id_order)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO `detail_info_order` VALUES (?,?,?,?)";
			$PDO=$pdo->prepare($query);
			$param=array($product,$quantity,$price,$id_order);
			$insert_order_detail=$PDO->execute($param);
			return $insert_order_detail;
			
		}
		
		function insert_comment_product($id_comment,$content_comment,$product,$id_user_comment,$date_comment)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO `comment_rating` VALUES (?,?,?,?,?)";
			$insert_comment=$pdo->prepare($query);
			$param=array($id_comment,$content_comment,$product,$id_user_comment,$date_comment);
			$ck_insert_comment=$insert_comment->execute($param);
			return $ck_insert_comment;
		}
		
			function update_staff_manage_order($id_order,$id_staff,$status)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `order` SET `staff_in_charge`=$id_staff WHERE  `id_order` LIKE '$id_order'";
			$insert_comment=$pdo->prepare($query);
			$param=array($id_staff,$id_order);
			$upda_or=$insert_comment->execute($param);
			if($upda_or && $status==1)
			{
				echo "<script>";
				echo "alert('Cập nhật thành công');";
				echo "window.location='../mn_order.php'";
				echo "</script>";		
			}
			if($upda_or && $status==2)
			{
				echo "<script>";
				echo "alert('Cập nhật thành công');";
				echo "window.location='../mn_order_payment.php'";
				echo "</script>";		
			}
			else
			{
				echo "<script>";
						echo "alert('Cập nhật thất bại');";
						echo "window.location='../mn_order.php'";
						echo "</script>";
			}
		}
		
			function update_status_order($status,$id_order,$page)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `order` SET `status_order`=$status WHERE `id_order` LIKE '$id_order'";
			echo $query;
			$upda_status_order=$pdo->prepare($query);
			$param=array($status,$id_order);
			$up_sta_or=$upda_status_order->execute($param);
			if($up_sta_or && $page==1)
			{
				echo "<script>";
				echo "alert('Cập nhật thành công');";
				echo "window.location='../mn_order.php'";
				echo "</script>";		
			}
			elseif($up_sta_or && $page==2)
			{
				echo "<script>";
				echo "alert('Cập nhật thành công');";
				echo "window.location='../mn_order_payment.php'";
				echo "</script>";		
			}
			elseif($up_sta_or && $page==3)
			{
				echo "<script>";
				echo "alert('Cập nhật thành công');";
				echo "window.location='../mn_order_finnish.php'";
				echo "</script>";		
			}
			else
			{
				echo "<script>";
						echo "alert('Cập nhật thất bại');";
						echo "window.location='../mn_order.php'";
						echo "</script>";
			}
		}
			function update_quantity_inventory_product($id_product,$quantity_inventory)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `product_info` SET `quantity_inventory`=? WHERE `id_product`= ?";
			$up_product=$pdo->prepare($query);
			$param=array($quantity_inventory,$id_product);
			$upda_or=$up_product->execute($param);
		}
		
		
		/*INSERT BILL IMPORT*/
		
			function insert_bill_import($id_import,$date,$staff_create,$staff_in_charge_bill,$total_money,$producer_publisher,$status)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO `import_bill` VALUES (?,?,?,?,?,?,?)";
			$insert_bill_import=$pdo->prepare($query);
			$param=array($id_import,$date,$staff_create,$staff_in_charge_bill,$total_money,$producer_publisher,$status);
			$is_bill_import=$insert_bill_import->execute($param);
		}
		
			function update_bill_import($staff_create,$staff_in_charge_bill,$total_money,$id_import)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `import_bill` SET `staff_create`=?,`staff_in_charge_bill`=?,`total_money`=? WHERE `id_import_bill`=?";
			$insert_bill_import=$pdo->prepare($query);
			$param=array($staff_create,$staff_in_charge_bill,$total_money,$id_import);
			$update_bill_import=$insert_bill_import->execute($param);
			return $update_bill_import;
		}
		
		
		function update_confirm_import($status,$id_import)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `import_bill` SET `status_import_bill`= ? WHERE `id_import_bill`=?";
			$insert_bill_import=$pdo->prepare($query);
			$param=array($status,$id_import);
			$update_bill_import=$insert_bill_import->execute($param);
			return $update_bill_import;
		}
		
			function insert_detail_bill_import($product,$quantity_import,$import_price,$id_import_bill)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO `info_detail_import_bill` VALUES (?,?,?,?)";
			$insert_detail_bill_import=$pdo->prepare($query);
			$param=array($product,$quantity_import,$import_price,$id_import_bill);
			$detail_bill_import=$insert_detail_bill_import->execute($param);
			return $detail_bill_import;
		}
		
			function update_detail_bill_import($quantity_import,$import_price,$product,$id_import_bill)// cập nhật lại thông tin phiếu nhập chi tiết khi cập nhật có thêm sp
		{
			$pdo=parent::conect_data();
			$query="UPDATE `info_detail_import_bill` SET `quantity_import`=?,`import_price`=? WHERE `product`= ? AND `id_import_bill`=? ";
			$insert_detail_bill_import=$pdo->prepare($query);
			$param=array($quantity_import,$import_price,$product,$id_import_bill);
			$detail_bill_import=$insert_detail_bill_import->execute($param);
			return $detail_bill_import;
		}
		
		//id_bill_order	id_order	date_bill_create	id_staff_create

		
		/*--------BILL--------------------*/
			function insert_bill_order($id_order,$date_bill_create,$id_staff_create)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO `bill_order` VALUES (?,?,?)";
			$insert_bill=$pdo->prepare($query);
			$param=array($id_order,$date_bill_create,$id_staff_create);
			$bill_order=$insert_bill->execute($param);
			return $bill_order;
		}
		
			function update_bill_order($id_order,$id_staff_create)
		{
			$pdo=parent::conect_data();
			echo $query="UPDATE `bill_order` SET  `id_staff_create`= $id_staff_create WHERE `id_order` LIKE '$id_order'";
			$insert_bill=$pdo->prepare($query);
			$up_bill_order=$insert_bill->execute();
			return $up_bill_order;
		}
		
		
	}
	
	
	
	

/*$data=new insert_update_data();

$in_up_data=$data-> insert_bill_order("","Saturday12086770",date("Y-m-d"),3);
if($in_up_data)
{
	echo "dimg";
}
else
{
	echo "sai";
}*/

					/*$kq=$in_up_data->insert_order("TU3007201723423",2,"Nguyễn Văn Dũng","Nguyenvandung@gmail.com",0988460098,"Quảng Bình",29/07/2017,30000,1,1);
					if($kq)
					{
						echo "ok";
					}
					else
					{
						echo "fail";
					}*/
		
//$data->Insert_staff("","ngocdieu","Nguyễn Ngọc Diệu","nguyeanh","nguyenanhhoangltqbh@gmail.com",988460072,"07/02/1994","Quảng Bình",1);
//$data->Insert_customer("","Nguyễn Anh Hoàng","nguyenah","nguyenah7294","nguyenanhhoangltqbh@gmail.com",984506553,07/02/1994,1,"Lệ Ninh - Lệ Thủy - Quảng Bình");
	//$data->Insert_staff_role("","Nhân viên giao hang","Thực hiện công tác giao hàng và báo về cho nhân viên lập hóa đơn để cập nhật tình trạng đơn hàng");
?>
