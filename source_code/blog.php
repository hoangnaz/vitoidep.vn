<?php
	// if(isset($_GET['chuyen_muc'])){
	// 	$catalogBlog= $_GET['chuyen_muc'];
	// 	switch ($catalogBlog) {
	// 		case 'review-danh-gia-san-pham':
	// 			$title = "Review đánh giá sản phẩm";
	// 			break;
	// 		case 'meo-vat-cuoc-song':
	// 			$title = "Mẹo vặt cuộc sống";
	// 			break;
	// 		case 'bi-quyet-lam-dep':
	// 			$title = "Bí quyết làm đẹp";
	// 			break;
	// 		case 'tam-su-chia-se':
	// 			$title = "Tâm sự chia sẻ";
	// 			break;
				
	// 		default:
	// 			header("Location:404_page.php");
	// 		break;
	// 	}
	// }
	
	include 'template/master/header.php';
	include_once 'template/master/menu_top.php';
	include_once 'template/master/main_menu.php';
	 include_once 'template/blog/blog_left.php';
	 include_once 'template/blog/blog_right.php';
	//include_once 'template/blog/maintanace.php';
	include_once 'template/master/footer.php';
	include_once 'template/master/top_message.php';
	include_once 'template/master/js_file.php';
	include_once 'template/partial/sign_in.php';
	include_once 'template/partial/sign_up.php';
	include_once 'template/partial/get_password.php';
	include_once 'template/partial/detail_product.php';
?>


