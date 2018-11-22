
<?php
    error_reporting(0);
   
    include 'template/master/header.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/function/search.php';
    $searchDB=new search();
    $lstSeach=$searchDB->getValueSearch($_SESSION['search_value']);

	include_once 'template/master/menu_top.php';
	include_once 'template/master/main_menu.php';
	include_once 'template/search/content.php';
	include_once 'template/detail_product/the_same_catalog.php';
	include_once 'template/master/footer.php';
	include_once 'template/master/js_file.php';
	include_once 'template/master/top_message.php';
	include_once 'template/partial/sign_in.php';
	include_once 'template/partial/sign_up.php';
	include_once 'template/partial/get_password.php';
	include_once 'template/partial/detail_product.php';
	include_once 'template/master/partial/product_detail.php';

	?>
	