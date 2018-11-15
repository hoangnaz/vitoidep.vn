<?php
	session_start();

	require_once $_SERVER['DOCUMENT_ROOT'].'/database/product_info.php';
	require_once("pagination.class.php");
	$pro=new productDB();
	$perPage = new PerPage();
	
	$paginationlink = "getresult.php?kubun=".$_GET['kubun']."&page=";	

					
	$page = 1;
	if(!empty($_GET["page"])) {
	$page = $_GET["page"];
	}
	if(!$_SESSION['numberRecord']){
		if(isset($_GET['numberRecord'])){
			$recordNumber=$_GET['numberRecord'];
		}else{
			$recordNumber=10;
		}
		
	}else{
		if(isset($_GET['numberRecord'])){
			$recordNumber=$_GET['numberRecord'];
		}else{
			$recordNumber=$_SESSION['numberRecord'];
		}
		
	}
	if(!$_SESSION['order_product']){
		if(isset($_GET['order'])){
			$order=$_GET['order'];
		}else{
			$order="ASC";
		}
		
	}else{
		if(isset($_GET['order'])){
			$order=$_GET['order'];
		}else{
			$order=$_SESSION['order_product'];	
		}
		
	}
	
	$_SESSION['numberRecord']=$recordNumber;
	$_SESSION['order_product']=$order;
	$perPage->perpage=$_SESSION['numberRecord'];
	$start = ($page-1)*$perPage->perpage;
	if($start < 0) $start = 0;
	$conditonSearch=array();
	switch ($_GET['kubun']) {
		case 'noibat':
			$conditonSearch["conditon"]="highlights";
			$conditonSearch["value"]= 1;
			$conditonSearch["order"]=$_SESSION['order_product'];
			$numberRecord=$pro->getHightLightProductAndNew($conditonSearch);
			$faq=$pro->getProductPagnitionByEqual($start,$perPage->perpage,$conditonSearch);
			break;
		case 'moi':
			$conditonSearch["conditon"]="status_product";
			$conditonSearch["value"]=3;
			$conditonSearch["order"]=$_SESSION['order_product'];
			$numberRecord=$pro->getHightLightProductAndNew($conditonSearch);
			$faq=$pro->getProductPagnitionByEqual($start,$perPage->perpage,$conditonSearch);
			break;
		case 'MEKENHANOI':
			$conditonSearch["conditon"]="status_product";
			$conditonSearch["value"]="MEKENHANOI";
			$conditonSearch["order"]=$_SESSION['order_product'];
			$numberRecord=$pro->getHightLightProductAndNew($conditonSearch);
			$faq=$pro->getProductPagnitionByEqual($start,$perPage->perpage,$conditonSearch);
			break;	
		case '10XBEAUTY':
			$conditonSearch["conditon"]="producer_publisher";
			$conditonSearch["value"]="10XBEAUTY";
			$conditonSearch["order"]=$_SESSION['order_product'];
			$numberRecord=$pro->getHightLightProductAndNew($conditonSearch);
			$faq=$pro->getProductPagnitionByEqual($start,$perPage->perpage,$conditonSearch);
			break;	
			
		default:
			
			$conditonSearch["value"]=$_GET['kubun'];
			$conditonSearch["order"]=$_SESSION['order_product'];
			$numberRecord=$pro->getProductFollowOption($_GET['kubun']);
			$faq = $pro->getProductPagnition($start,$perPage->perpage,$conditonSearch);
			break;


	}

	if(empty($_GET["rowcount"])) {
	$_GET["rowcount"] = count($numberRecord);
	}


		$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink);	



	$output = '';
	if($faq!=FAIL_PROCESS)
	{


	foreach($faq as $k=>$v) {

		$output .='<div class="col-md-4">
							<div class="product-item">
								<div class="product-thumb">
									<img class="img-responsive" src="images/shop/products/product-9.jpg" alt="product-img" />
									<div class="preview-meta">
										<ul>
											<li>
												<span  data-toggle="modal" data-target="#product-modal">
													<i class="tf-ion-ios-search-strong"></i>
												</span>
											</li>
											<li>
												<a href="#" ><i class="tf-ion-ios-heart"></i></a>
											</li>
											<li>
												<a href=""><i class="tf-ion-android-cart"></i></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="product-content">
									<h4><a href="product-single.html">'.$v->name_product.'</a></h4>
									<p class="price">'.number_format($v->price_product).'VNĐ</p>
									
									<div style="margin:auto;">
										<button type="button" class=" btn-shopping " onclick="shopping_cart('.$v->id_product.')"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Thêm vào giỏ</button>
										<button type="button" class=" btn-buynow "><i class="fa fa-shopping-cart" aria-hidden="true"></i>Mua ngay</button>
									</div>
								</div>
								
								
								
							</div>
						</div>';



		$output .= '<input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' ;

		}
	}
	else{
		$output .='
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<img class="img-responsive"  src="images/image_no_search.jpg" alt="product-img" style="
				margin: auto;" />
				<h3 class="text-center text-danger">Chúng tôi không tìm thấy sản phẩm phù hợp</h3>
		</div>';
	
	}
	if(!empty($perpageresult)) {
		
		
			
		
		
	$output .= '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div id="pagination">' . $perpageresult . '</div>
				</div>';
				}
	print $output;
?>
