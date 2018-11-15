<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/database/product_info.php';

$pro=new productDB();
$numberRecord=$pro->getProductFollowOption($_GET['kubun']);




require_once("pagination.class.php");

$perPage = new PerPage();

$sql = "SELECT * from php_interview_questions";
$paginationlink = "getresult.php?page=";	

				
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;


$faq = $pro->getProductPagnition($start,$perPage->perpage,$_GET['kubun']);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = count($numberRecord);
}


	$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink);	



$output = '';
foreach($faq as $k=>$v) {
 $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $v->unit . '</div>';

}
if(!empty($perpageresult)) {
$output .= '<div id="pagination">' . $perpageresult . '</div>';
}
print $output;
?>
