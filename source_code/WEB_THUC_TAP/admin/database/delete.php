<?php
	include_once("connect_database.php");
	$data=new database();
	class deletedata extends database
	{
		/*delete catalog*/
		function delete_catalog($id_catalog_product,$status)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `catalog_product` SET `status`=$status WHERE `id_catalog_product`=$id_catalog_product";
			$PDO=$pdo->prepare($query);
			$update_catalog=$PDO->execute();
			if($update_catalog)
			{
				echo "<script>";
				echo "alert('Thay đổi thành công trạng thái danh mục');";
				echo "window.location='../mn_catalog.php'";
				echo "</script>";		
			}
			else
			{
				echo "<script>";
						echo "alert('Thay đổi trạng thái danh mục thất bại');";
						echo "window.location='../mn_catalog.php'";
						echo "</script>";
			}
		}
	
			/*delete supplier*/
		function delete_producer_publisher($id_producer_publisher,$status)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `producer_publisher` SET `status`=$status WHERE `id_producer_publisher` LIKE '$id_producer_publisher'";
			$PDO=$pdo->prepare($query);
			$update_supplier=$PDO->execute();
			if($update_supplier)
			{
				echo "<script>";
				echo "alert('Thao tác thành công');";
				echo "window.location='../mn_supplier.php'";
				echo "</script>";		
			}
			else
			{
				echo "<script>";
						echo "alert('Thất bại. Vui lòng thử lại');";
						echo "window.location='../mn_supplier.php'";
						echo "</script>";
			}
		}
		
			/*delete staff*/
		function delete_staff($id_supplier_product,$status)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `staff` SET `status`=$status WHERE `id_staff`=$id_supplier_product";
			$PDO=$pdo->prepare($query);
			$update_staff=$PDO->execute();
			if($update_staff)
			{
				echo "<script>";
				echo "alert('Thay đổi thành công trạng thái nhân viên');";
				echo "window.location='../mn_staff.php'";
				echo "</script>";		
			}
			else
			{
				echo "<script>";
						echo "alert('Thay đổi trạng thái nhân viên thất bại');";
						echo "window.location='../mn_staff.php'";
						echo "</script>";
			}
		}
		
		/*delete author*/
		function delete_author($id_author,$status)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `author_info` SET `status`=$status WHERE `id_author`=$id_author";
			$PDO=$pdo->prepare($query);
			$update_author=$PDO->execute();
			if($update_author)
			{
				echo "<script>";
				echo "alert('Thay đổi thành công trạng thái tác giả');";
				echo "window.location='../mn_author.php'";
				echo "</script>";		
			}
			else
			{
				echo "<script>";
						echo "alert('Thay đổi trạng thái tác giả thất bại');";
						echo "window.location='../mn_author.php'";
						echo "</script>";
			}
		}
		
			/*delete product*/
		function delete_product($id_product,$status)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `product_info` SET `status_product`=$status WHERE `id_product`=$id_product";
			$PDO=$pdo->prepare($query);
			$delete_pro=$PDO->execute();
			if($delete_pro)
			{
				echo "<script>";
				echo "alert('Thay đổi thành công trạng thái sản phẩm');";
				echo "window.location='../mn_product.php'";
				echo "</script>";		
			}
			else
			{
				echo "<script>";
						echo "alert('Thay đổi trạng thái sản phẩm thất bại');";
						echo "window.location='../mn_product.php'";
						echo "</script>";
			}
		}
		
		/*DELETE ORDER*/
		function delete_bill_order($id_order)
		{
			$pdo=parent::conect_data();
			$query="DELETE FROM `bill_order` WHERE `bill_order`.id_order LIKE '$id_order'";
			$PDO=$pdo->prepare($query);
			$delete_order=$PDO->execute();
			
		}
		function delete_detail_order($id_oreder)
		{
			$pdo=parent::conect_data();
			$query="	DELETE FROM `detail_info_order` WHERE `detail_info_order`.id_order LIKE '$id_oreder'";
			$PDO=$pdo->prepare($query);
			$delete_order=$PDO->execute();
			
		}
		
		function delete_order($id_order)
		{
			$pdo=parent::conect_data();
			$query="DELETE FROM `order` WHERE `id_order` LIKE '$id_order'";
			$PDO=$pdo->prepare($query);
			$delete_order=$PDO->execute();
			return $delete_order;
			
		}
		
		/*-------DELETE IMPORT-------------*/
			function delete_one_product_in_import_detail($id_order,$product)
		{
			$pdo=parent::conect_data();
			$query="DELETE FROM `info_detail_import_bill` WHERE id_import_bill=$id_order AND product=$product";
			$PDO=$pdo->prepare($query);
			$delete_order=$PDO->execute();
		}
		
			function delete_product_follow_import_bill($id_order)
		{
			$pdo=parent::conect_data();
			$query="DELETE FROM `info_detail_import_bill` WHERE id_import_bill=$id_order";
			$PDO=$pdo->prepare($query);
			$delete_order=$PDO->execute();
			return 	$delete_order;
		}
			function delete_import_bill($id_import_bill)
		{
			$pdo=parent::conect_data();
			$query="DELETE FROM `import_bill` WHERE `import_bill`.`id_import_bill`=$id_import_bill";
			$PDO=$pdo->prepare($query);
			$delete_order=$PDO->execute();
			return $delete_order;
		}
	}

?>