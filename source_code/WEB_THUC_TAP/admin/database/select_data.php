<?php
	
	include_once("connect_database.php");

	class select_data extends database
	{
		/*INFO ORDER*/
			function check_id_order($id)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` WHERE `id_order` LIKE '$id'";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$count_id=$PDO->rowCount();
			if($count_id==1)
			{
				return 1;
			}
			else
			{
				return 0;
			}
			
		}
			function info_order($id)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order`  WHERE `order`.`id_order` LIKE '$id'";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			return $count_id=$PDO->fetch(PDO::FETCH_OBJ);

		}
		
			function info_one_order($id)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` INNER JOIN `bill_order` ON `order`.`id_order`=`bill_order`.`id_order` WHERE `order`.`id_order` LIKE '$id'";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			return $count_id=$PDO->fetch(PDO::FETCH_OBJ);

		}
		
			function list_order_follow_status($order_status)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` INNER JOIN `staff` ON `order`.`staff_in_charge`=`staff`.`id_staff`  WHERE `status_order` = $order_status  ORDER BY `date_order` DESC ";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_order_follow_status=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_order_follow_status;
		}
		
			function list_order_follow_staff($staff)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` WHERE (`status_order` = 1  OR `status_order` = 2)  AND `staff_in_charge` = $staff ORDER BY `date_order` DESC";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_order_follow_staff=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_order_follow_staff;
		}
		
			function list_order_follow_staff_page($staff,$pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` WHERE (`status_order` = 1  OR `status_order` = 2)  AND `staff_in_charge` = $staff ORDER BY `date_order` DESC";
			if($pos>=0 && $limit>0 )
			{
				$query.=" limit $pos,$limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_order_follow_staff=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_order_follow_staff;
		}
		
		
		
		
			function list_order_follow_status_page($order_status,$pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `staff` INNER JOIN `order` ON `order`.`staff_in_charge`=`staff`.`id_staff`  WHERE `status_order` = $order_status  ORDER BY `date_order` DESC ";
			if($pos>=0 && $limit>0 )
			{
				$query.=" limit $pos,$limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_order_follow_status_page=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_order_follow_status_page;
		}
		
			function list_order_by_customer($id_customer)
		{
			$pdo=parent::conect_data();
			$query="SELECT DISTINCT(order.id_order),order.total_money_order,order.date_order,order.status_order FROM `detail_info_order` INNER JOIN  `order` ON order.id_order=detail_info_order.id_order WHERE order.id_customer LIKE '$id_customer' ORDER BY order.date_order DESC";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_order_customer=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_order_customer;
		}
		
			function list_product_bill_order($id_order)
		{
			$pdo=parent::conect_data();
			$query="SELECT product_info.name_product,product_info.price_product,product_info.promotion_product,detail_info_order.quantity_one_product as pro_quantity,product_info.id_product,product_info.image_product,detail_info_order.total_money_product_order FROM detail_info_order INNER JOIN product_info ON detail_info_order.product = product_info.id_product WHERE detail_info_order.id_order LIKE '$id_order'";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_pro_order=$PDO->fetchAll(PDO::FETCH_NUM);
			return $list_pro_order;
		}
		
			function list_product_in_order($id_order)
		{
			$pdo=parent::conect_data();
			$query="SELECT product_info.name_product,product_info.price_product,detail_info_order.quantity_one_product as pro_quantity,product_info.id_product,product_info.image_product,detail_info_order.total_money_product_order FROM detail_info_order INNER JOIN product_info ON detail_info_order.product = product_info.id_product WHERE detail_info_order.id_order LIKE '$id_order'";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_pro_order=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_pro_order;
		}
		/*CUSTOMER*/
		function check_login_customer($username,$pass)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `customer` WHERE (account LIKE '$username' AND pass LIKE '$pass') OR (email LIKE '$username' AND pass LIKE '$pass')";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$count_customer=$PDO->rowCount();
			if($count_customer==1)
			{
				return $Customer=$PDO->fetch(PDO::FETCH_OBJ);
			}
			else
			{
				return 0;
			}
			
		}
		
		function ckeck_account($account)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM customer WHERE account LIKE '$account'";
			$PDO=$pdo->prepare($query);
			$param=array($account);
			$PDO->execute($param);
			$result_ck=$PDO->rowCount();
			return $result_ck;
		}
		
			function check_email($email)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM customer WHERE email LIKE '$email'";
			$PDO=$pdo->prepare($query);
			$param=array($email);
			$PDO->execute($param);
			$result_ck=$PDO->rowCount();
			return $result_ck;
		}
		
			function query_number_customer()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM customer ";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$result_ck=$PDO->rowCount();
			return $result_ck;
		}
		
		
		/// list producer_publisher///
			function query_list_producer_publisher()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `producer_publisher`";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_producer_publisher=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_producer_publisher;
		}
		
			function check_id_producer_publisher($id)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `producer_publisher` WHERE id_producer_publisher LIKE  '$id'";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$result=$PDO->rowCount();
			return $result;
		}
		
		
		function query_list_producer_publisher_page($pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `producer_publisher`";
			if($pos>=0&& $limit>0)
			{
				$query.="limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_producer_publisher=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_producer_publisher;
		}
		
			function query_one_producer_publisher($id_pulisher)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `producer_publisher` WHERE `id_producer_publisher` LIKE '$id_pulisher'";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$producer_publisher=$PDO->fetch(PDO::FETCH_OBJ);
			return $producer_publisher;
		}
		
			function query_list_feature_producer_publisher(){
			$pdo=parent::conect_data();
			$query="SELECT * FROM `producer_publisher` LIMIT 0,6";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_pro_producer_publisher=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_pro_producer_publisher;
		}
		

		
		
		function query_list_author_page($pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `author_info`";
			if($pos>=0&& $limit>0)
			{
				$query.="limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_author=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_author;
		}
		
			function query_list_author_follow_catalog($catalog)
		{
			$pdo=parent::conect_data();
			$query="SELECT DISTINCT(author_info.author_name),author_info.info_author,author_info.avatar,author_info.id_author  FROM author_info INNER JOIN product_info ON author_info.id_author=product_info.author WHERE product_info.catalog_product=$catalog LIMIT 0,6";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_author=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_author;
		}
		
		/// list catalog///
			function query_list_catalog()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `catalog_product`";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_catalog=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_catalog;
		}

		/// list catalog///
		function query_list_sub_catalog()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `sub_catalog`";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_catalog=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_catalog;
		}
		
		 		function query_one_catalog($catalog)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `catalog_product` WHERE id_catalog_product=$catalog";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$catalog=$PDO->fetch(PDO::FETCH_OBJ);
			return $catalog;
		}
		
		 
		function query_list_sub_catalog_page($pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `sub_catalog`";
			if($pos>=0&& $limit>0)
			{
				$query.="limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_catalog=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_catalog;
		}

		function query_list_catalog_page($pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `catalog_product`";
			if($pos>=0&& $limit>0)
			{
				$query.="limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_catalog=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_catalog;
		}
		
				function query_number_catalog()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM catalog_product ";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$result_ck=$PDO->rowCount();
			return $result_ck;
		}
		
		function query_list_feature_catalog(){
			$pdo=parent::conect_data();
			$query="SELECT * FROM catalog_product LIMIT 0,6";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_pro_catalog=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_pro_catalog;
		}
		/// list product///
			function query_list_product()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info`";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
		
			return $all_product;
		}
		

			function query_list_search_product($product_name,$catalog,$author,$producer)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info` INNER JOIN `producer_publisher` ON `product_info`.`producer_publisher`=`producer_publisher`.`id_producer_publisher` INNER JOIN `catalog_product` ON `product_info`.`catalog_product`=`catalog_product`.`id_catalog_product` INNER JOIN `author_info` ON `product_info`.`author`=`author_info`.`id_author` WHERE product_info.name_product LIKE '%$product_name%' AND catalog_product.catalog_name LIKE '%$catalog%' AND author_info.author_name LIKE '%$author%' AND producer_publisher.name_producer_publisher LIKE '%$producer%' AND product_info.status_product=0";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_product;
		}
			function query_list_search_product_admin($product_name,$catalog,$author,$producer)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info` INNER JOIN `producer_publisher` ON `product_info`.`producer_publisher`=`producer_publisher`.`id_producer_publisher` INNER JOIN `catalog_product` ON `product_info`.`catalog_product`=`catalog_product`.`id_catalog_product` INNER JOIN `author_info` ON `product_info`.`author`=`author_info`.`id_author` WHERE product_info.name_product LIKE '%$product_name%' AND catalog_product.catalog_name LIKE '%$catalog%' AND author_info.author_name LIKE '%$author%' AND producer_publisher.name_producer_publisher LIKE '%$producer%' AND product_info.status_product=0";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_product;
		}
		
		
		function query_list_product_provicer_publisher($id_provicer)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info` WHERE producer_publisher LIKE '$id_provicer' ";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_product;
		}
		
		function query_list_provicer_publisher_page($id_provicer,$pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info` WHERE producer_publisher LIKE '$id_provicer' ";
			if($pos>=0&& $limit>0)
			{
				$query.="limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_product;
		}
		
		function query_list_search_product_provicer_publisher($info,$id_provicer)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info` WHERE `name_product` LIKE '%$info%' AND producer_publisher LIKE '$id_provicer' ";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_product;
		}
		
		function query_list_search_product_mobile($info)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info` WHERE `name_product` LIKE '%$info%'  AND product_info.status_product=0";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_product;
		}
		
		function query_list_search_price($info)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info` WHERE `price_product` <= $info  AND product_info.status_product=0 ";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_product;
		}
		
		function query_list_search_price_mobile($info)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info` WHERE `price_product` <= $info  AND product_info.status_product=0  ";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_product;
		}
		
		function query_list_product_page($pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info`";
			if($pos>=0&& $limit>0)
			{
				$query.="limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_product;
		}
		
			function query_one_product($id_product)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info`   INNER JOIN producer_publisher ON product_info.producer_publisher=producer_publisher.id_producer_publisher WHERE product_info.id_product=$id_product";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$info_product=$PDO->fetch(PDO::FETCH_OBJ);
			return $info_product;
		}
		
			function query_three_product_top_like()
		{
			$pdo=parent::conect_data();
			$query="SELECT COUNT(product) as Tong_so,product_info.image_product,product_info.name_product,product_info.price_product,product_info.id_product,product_info.promotion_product FROM `detail_info_order` INNER JOIN product_info ON product_info.id_product=detail_info_order.product WHERE product_info.quantity_inventory > 0  AND product_info.status_product=0 GROUP BY product ORDER BY Tong_so DESC  LIMIT 0,2";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$info_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $info_product;
		}
		
			function top_sale_catalog($catalog_id)
		{
			$pdo=parent::conect_data();
			$query="SELECT COUNT(product) as Tong_so,product_info.image_product,product_info.name_product,product_info.price_product,product_info.id_product,product_info.promotion_product FROM `detail_info_order` INNER JOIN product_info ON product_info.id_product=detail_info_order.product WHERE product_info.catalog_product=$catalog_id  AND product_info.status_product=0 GROUP BY product ORDER BY Tong_so DESC  LIMIT 0,1";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$info_product=$PDO->fetch(PDO::FETCH_OBJ);
			return $info_product;
		}
		
			function query_six_product_sale($catalog_product)
		{
			$pdo=parent::conect_data();
			$query="SELECT SUM(detail_info_order.quantity_one_product) as Tong_so,product_info.image_product,product_info.name_product,product_info.price_product,product_info.promotion_product,product_info.id_product FROM `detail_info_order` INNER JOIN product_info ON product_info.id_product=detail_info_order.product WHERE product_info.catalog_product = $catalog_product AND product_info.quantity_inventory > 0  AND product_info.status_product=0 GROUP BY product ORDER BY Tong_so DESC LIMIT 0,6";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$info_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $info_product;
		}
		
			function query_six_product_book_sale()
		{
			$pdo=parent::conect_data();
			$query="SELECT SUM(detail_info_order.quantity_one_product) as Tong_so,product_info.image_product,product_info.name_product,product_info.price_product,product_info.promotion_product,product_info.id_product FROM `detail_info_order` INNER JOIN product_info ON product_info.id_product=detail_info_order.product WHERE product_info.catalog_product != 4 AND product_info.quantity_inventory > 0  AND product_info.status_product=0 GROUP BY product ORDER BY Tong_so DESC LIMIT 0,6";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$info_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $info_product;
		}
		
			function query_six_promotion()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM product_info WHERE quantity_inventory > 0  AND product_info.status_product=0 ORDER BY product_info.promotion_product DESC LIMIT 0,6";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$info_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $info_product;
		}
		
		
		
		/// list product catalog///
			function query_list_product_catalog($catalog)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info` WHERE catalog_product=$catalog   AND product_info.status_product=0 ";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_product;
		}
		
		function query_list_product_catalog_page($pos=-1,$limit=-1,$catalog)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info` WHERE catalog_product=$catalog   AND product_info.status_product=0 ";
			if($pos>=0&& $limit>0)
			{
				$query.="limit $pos, $limit";
			}
			$param=array($catalog);
			$PDO=$pdo->prepare($query);
			$PDO->execute($param);
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_product;
		}
			function query_list_product_moblie_catalog_page($pos=-1,$limit=-1,$catalog)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `product_info` WHERE catalog_product=$catalog AND product_info.quantity_inventory >0  AND product_info.status_product=0 ";
			if($pos>=0&& $limit>0)
			{
				$query.="limit $pos, $limit";
			}
			$param=array($catalog);
			$PDO=$pdo->prepare($query);
			$PDO->execute($param);
			$all_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_product;
		}
		/// list customer///
			function query_list_customer()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `customer`";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_customer=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_customer;
		}
			function query_list_customer_page($pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `customer`";
			if($pos>=0 && $limit>0)
			{
				$query.="limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_cus=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_cus;
		}
		
				function query_one_customer($id_cus)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `customer` WHERE `customer`.`id_customer`=$id_cus";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$one_cus=$PDO->fetch(PDO::FETCH_OBJ);
			return $one_cus;
		}
		
		/// list staff///
			function query_list_staff()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `staff`";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_catalog=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_catalog;
		}
		
				function query_one_staff($id_staff)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `staff` WHERE id_staff=$id_staff ";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$one_staff=$PDO->fetch(PDO::FETCH_OBJ);
			return $one_staff;
		}
			function query_list_staff_page($pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `staff`";
			if($pos>=0&& $limit>0)
			{
				$query.="limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_staff=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_staff;
		}
		
		/// list feedback///
			function query_list_feedback()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `feedback` INNER JOIN `customer` ON 	feedback.id_user_feedback = customer.id_customer";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_catalog=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_catalog;
		}
			function query_list_feedback_page($pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `feedback` INNER JOIN `customer` ON 	feedback.id_user_feedback = customer.id_customer";
			if($pos>=0&& $limit>0)
			{
				$query.=" limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_staff=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_staff;
		}
		
			function query_number_feedback()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM feedback ";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$result_ck=$PDO->rowCount();
			return $result_ck;
		}
		//////////////////////QUERY ABOUT US//////////////////////////
		/*QUERY IMPORT BILL*/
			function check_id_import_bill($id)// kiểm tra trùng id khi thêm phiếu
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` WHERE `id_import_bill` LIKE '$id'";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$count_id_bill_importt=$PDO->rowCount();
			if($count_id_bill_importt==1)
			{
				return 1;
			}
			else
			{
				return 0;
			}
			
		}
		
		function info_one_import_bill($id_import) // lấy thông tin một phiếu nhập
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` WHERE id_import_bill=$id_import";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$info_bill_import=$PDO->fetch(PDO::FETCH_OBJ);
			return $info_bill_import;
			
		}
		
		function list_import_bill() // danh sách phiếu nhập
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `staff` ON import_bill.staff_in_charge_bill=staff.id_staff";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_bill_import=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_bill_import;
			
		}
		function list_import_bill_page($pos=-1,$limit=-1)// danh sách phiếu nhập phân trang
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `staff` ON import_bill.staff_in_charge_bill=staff.id_staff INNER JOIN producer_publisher ON 
producer_publisher.id_producer_publisher=import_bill.id_producer_publisher ORDER BY status_import_bill ASC, `import_bill`.`date_import` DESC ";
			if($pos>=0&& $limit>0)
			{
				$query.=" limit $pos, $limit";
			}
			
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_bill_import=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_bill_import;
			
		}
		
			function list_import_bill_follow_staff($id_staff) // danh sách phiếu nhập theo nhân viên
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `producer_publisher` ON `import_bill`.`id_producer_publisher` = `producer_publisher`.`id_producer_publisher` WHERE import_bill.staff_in_charge_bill = $id_staff AND `import_bill`.`status_import_bill`=0";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_bill_import_staff=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_bill_import_staff;
			
		}
		
			function list_import_bill_follow_staff_page($id_staff,$pos=-1,$limit=-1) // phiếu nhập theo nhân viên phân trang
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `producer_publisher` ON `import_bill`.`id_producer_publisher` = `producer_publisher`.`id_producer_publisher` WHERE import_bill.staff_in_charge_bill = $id_staff AND `import_bill`.`status_import_bill`=0";
			if($pos>=0&& $limit>0)
			{
				$query.=" limit $pos, $limit";
			}
			
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_bill_import_staff=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_bill_import_staff;
			
		}
		
		
		
			function price_one_product_import($id_product) // 
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `info_detail_import_bill` ON info_detail_import_bill.id_import_bill=import_bill.id_import_bill WHERE info_detail_import_bill.product=$id_product ORDER BY import_bill.date_import DESC LIMIT 0,1";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$price_product_import=$PDO->fetch(PDO::FETCH_OBJ);
			return $price_product_import;
			
		}
		
	
		function detail_import_bill($id_import_bill)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `info_detail_import_bill` INNER JOIN `product_info` ON `product_info`.`id_product`=`info_detail_import_bill`.product INNER JOIN `import_bill` ON `info_detail_import_bill`.id_import_bill=`import_bill`.id_import_bill WHERE info_detail_import_bill.id_import_bill=$id_import_bill";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_detail_bill_import=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_detail_bill_import;
			
		}
		function check_product_in_detail_import_bill($id_import_bill,$product)// kiem tra xem đã tồn tại sp trong phiếu nhập
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `info_detail_import_bill` WHERE info_detail_import_bill.id_import_bill=$id_import_bill AND `product`=$product";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$count_detail=$PDO->rowCount();
			return $count_detail;
			
		}
		
		/*COMMENT _ RANTING*/
			function list_comment_product($product)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `comment_rating` INNER JOIN `customer` ON comment_rating.id_user_comment=customer.id_customer WHERE comment_rating.product=$product ORDER BY date_comment DESC LIMIT 0,8 ";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_product=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_product;
			
		}
		
		/*STATUS ORDER*/
			function list_status_order()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order_status`";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$list_status_order=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $list_status_order;
			
		}
		
		function query_number_order()
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` ";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$result_ck=$PDO->rowCount();
			return $result_ck;
		}
			/*LOGIN ADMIN*/
		function check_login_staff($username,$pass)
		{
			$pdo=parent::conect_data();
			$pass=sha1($pass);
			$query="SELECT * FROM `staff` WHERE staff_account LIKE '$username' AND pass LIKE '$pass'  AND staff.status= 0";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$count_staff=$PDO->rowCount();
			if($count_staff==1)
			{
				return $Customer=$PDO->fetch(PDO::FETCH_OBJ);
			}
			else
			{
				return 0;
			}
			
		}
		
		function ckeck_account_staff($account)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM staff WHERE staff_account LIKE '$account'";
			$PDO=$pdo->prepare($query);
			$param=array($account);
			$PDO->execute($param);
			$result_ck=$PDO->rowCount();
			return $result_ck;
		}
		
		function info_staff($id)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `staff` WHERE `id_staff`=$id";
			$PDO=$pdo->prepare($query);
			
			$PDO->execute();
			$result_ck=$PDO->fetch(PDO::FETCH_OBJ);
			return $result_ck;
		}
		
		/**STATISTIC**/
		function query_statistic_day_import($day_star,$day_end)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `staff` ON import_bill.staff_in_charge_bill=staff.id_staff INNER JOIN producer_publisher ON 
producer_publisher.id_producer_publisher=import_bill.id_producer_publisher WHERE `import_bill`.date_import BETWEEN CAST('$day_star' AS DATE) AND CAST('$day_end' AS DATE)
";

			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_day=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_day;
		}
		
		function query_statistic_day_import_page($day_star,$day_end,$pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `staff` ON import_bill.staff_in_charge_bill=staff.id_staff INNER JOIN producer_publisher ON 
producer_publisher.id_producer_publisher=import_bill.id_producer_publisher WHERE `import_bill`.date_import BETWEEN CAST('$day_star' AS DATE) AND CAST('$day_end' AS DATE)
";			if($pos>=0&& $limit>0)
			{
				$query.="limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_day=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_day;
		}
		
		
		
		function query_statistic_day_order($day_star,$day_end)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` WHERE `order`.date_order BETWEEN CAST('$day_star' AS DATE) AND CAST('$day_end' AS DATE)
";

			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_order_day=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_order_day;
		}
		
		function query_statistic_day_order_page($day_star,$day_end,$pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` WHERE `order`.date_order BETWEEN CAST('$day_star' AS DATE) AND CAST('$day_end' AS DATE)
";			if($pos>=0&& $limit>0)
			{
				$query.="limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_order_day=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_order_day;
		}
		
		function query_statistic_week_order($week,$year)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` WHERE WEEK(date_order)=$week AND YEAR(date_order)=$year";

			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_day=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_day;
		}
		
		function query_statistic_week_order_page($week,$year,$pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` WHERE WEEK(date_order)= $week AND YEAR(date_order)= $year ";
			if($pos>=0&& $limit>0)
			{
				$query.=" limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_month=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_month;
		}
		
		function query_statistic_week_import($week,$year)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `staff` ON import_bill.staff_in_charge_bill=staff.id_staff INNER JOIN producer_publisher ON 
producer_publisher.id_producer_publisher=import_bill.id_producer_publisher WHERE WEEK(date_import)=$week AND YEAR(date_import)=$year";

			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_day=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_day;
		}
		
		function query_statistic_week_import_page($week,$year,$pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `staff` ON import_bill.staff_in_charge_bill=staff.id_staff INNER JOIN producer_publisher ON 
producer_publisher.id_producer_publisher=import_bill.id_producer_publisher WHERE WEEK(date_import)= $week AND YEAR(date_import)= $year ";
			if($pos>=0&& $limit>0)
			{
				$query.=" limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_week=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_week;
		}
		
		
		
		
		function query_statistic_month_order($month,$year)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` WHERE MONTH(date_order)=$month AND YEAR(date_order)=$year";

			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_day=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_day;
		}
		
		function query_statistic_month_order_page($month,$year,$pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` WHERE MONTH(date_order)= $month AND YEAR(date_order)= $year ";
			if($pos>=0&& $limit>0)
			{
				$query.=" limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_month=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_month;
		}
		
		
			
		function query_statistic_month_import($month,$year)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `staff` ON import_bill.staff_in_charge_bill=staff.id_staff INNER JOIN producer_publisher ON 
producer_publisher.id_producer_publisher=import_bill.id_producer_publisher WHERE MONTH(date_import)=$month AND YEAR(date_import)=$year";

			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_month=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_month;
		}
		
		function query_statistic_month_import_page($month,$year,$pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `staff` ON import_bill.staff_in_charge_bill=staff.id_staff INNER JOIN producer_publisher ON 
producer_publisher.id_producer_publisher=import_bill.id_producer_publisher WHERE MONTH(date_import)= $month AND YEAR(date_import)= $year ";
			if($pos>=0&& $limit>0)
			{
				$query.=" limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_month=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_month;
		}
		
		
		function query_statistic_year_order($year)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` WHERE  YEAR(date_order)=$year";

			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_day=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_day;
		}
		
		function query_statistic_year_order_page($year,$pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `order` WHERE YEAR(date_order)= $year ";
			if($pos>=0&& $limit>0)
			{
				$query.=" limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_month=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_month;
		}
		
		function query_statistic_year_import($year)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `staff` ON import_bill.staff_in_charge_bill=staff.id_staff INNER JOIN producer_publisher ON 
producer_publisher.id_producer_publisher=import_bill.id_producer_publisher WHERE  YEAR(date_import)=$year";

			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_year=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_year;
		}
		
		function query_statistic_year_import_page($year,$pos=-1,$limit=-1)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `import_bill` INNER JOIN `staff` ON import_bill.staff_in_charge_bill=staff.id_staff INNER JOIN producer_publisher ON 
producer_publisher.id_producer_publisher=import_bill.id_producer_publisher WHERE YEAR(date_import)= $year ";
			if($pos>=0&& $limit>0)
			{
				$query.=" limit $pos, $limit";
			}
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_year=$PDO->fetchAll(PDO::FETCH_OBJ);
			return $all_import_year;
		}
	/* BILL ORDER*/
	
	function info_bill_order($order)
		{
			$pdo=parent::conect_data();
			$query="SELECT * FROM `bill_order` INNER JOIN `order` ON  `bill_order`.id_order=`order`.id_order INNER JOIN `staff` ON `bill_order`.id_staff_create=`staff`.id_staff WHERE `bill_order`.id_order LIKE '$order'";
			$PDO=$pdo->prepare($query);
			$PDO->execute();
			$all_import_year=$PDO->fetch(PDO::FETCH_OBJ);
			return $all_import_year;
		}
	}
/*	$a=new select_data();
print_r($a->info_bill_order("Saturday12086770"));

 */
?>