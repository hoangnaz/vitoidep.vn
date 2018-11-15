<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Danh sách sản phẩm</h1>
					
				</div>
			</div>
		</div>
	</div>
</section>
<div id="overlay">
	<div>
		<img src="images/loading.gif" width="64px" height="64px"/>
	</div>
</div>

<section class="products section">
	<div class="container">
		<div class="row">
			<div class="col-md-3">

				
				<div class="widget product-category">
					<h4 class="widget-title">Danh mục</h4>
					<div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="false">
									<?php
										$open=true;
										foreach ($blCatalog->lstSubProduct() as $keyCatalog => $valueCatalog) {
										
											?>
														<div class="panel panel-default">
															<div class="panel-heading" role="tab" id="heading<?php echo $valueCatalog->id_catalog_product;?>">
																	<h4 class="panel-title">
																		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $valueCatalog->id_catalog_product;?>" aria-expanded="<?php echo $open;?>" aria-controls="collapse<?php echo $valueCatalog->id_catalog_product;?>">
																		<?php echo $keyCatalog;?>
																		</a>
																	</h4>
															</div>
														  <div id="collapse<?php echo $valueCatalog->id_catalog_product;?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $valueCatalog->id_catalog_product;?>">
																<div class="panel-body">
														<ul>	
													<?php
														foreach ($valueCatalog as $key => $value) {
													?>
															
															<li><a href="danh_sach_san_pham.php?sanpham=<?php echo $value->sub_catalog_id; ?>"><?php  echo $value->sub_catalog_name;?></a></li>
													<?php	
														}
													?>
														</ul>
													</div>
													</div>
												</div>
											<?php
											$open=false;
										}
									?>	
					</div>
					
				</div>
				<div class="widget">
				<h4 class="widget-title">CHỌN THEO MỨC GIÁ</h4>
				<div class="radio">
					<label>
						<input type="radio" name="price_choice" id="price_1" value="price_1" checked="checked">
						0 - 100.000 VNĐ
					</label>
					<label>
						<input type="radio" name="price_choice" id="price_2" value="price_2" >
						100.000 - 200.000 VNĐ
					</label>
					<label>
						<input type="radio" name="price_choice" id="price_3" value="price_3" >
						200.000 - 500.000 VNĐ
					</label>
					<label>
						<input type="radio" name="price_choice" id="price_4" value="price_4">
						> 500.000 VNĐ
					</label>
				</div>
				
				</div>
				<div class="widget">
					<p>Sản phẩm bán chạy nhất</p>
					<div class="col-md-12">
				<div class="product-item">
					<div class="product-thumb">
						<img class="img-responsive" src="images/shop/products/product-6.jpg" alt="product-img" />
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
						<h4><a href="product-single.html">Rainbow Shoes</a></h4>
						<p class="price">$200</p>
					</div>
				</div>
			</div>
</div>
        </div>
			<div class="col-md-9">
			<div class="row">
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
								<h4 class="widget-title">Sắp xếp theo</h4>
							</div>	
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
								<div class="widget">
										<form method="post" action="#">
															<input type="hidden" id="productCatalog" value="<?php echo $_GET['sanpham']; ?>">
															<input type="hidden" id="numberRecord" value="<?php echo $numberRecord;?>">
															<select class="form-control" name="order_product" onchange='getresult("getresult.php",$("#productCatalog").val(),$("#numberRecord").val(),$("select[name=order_product]").val())'>
																																																															
																	<option value="ASC">A - Z</option>
																	<option  value="DESC">Z - A</option>
																	<option value="HightToLow">Giá cao đến thấp</option>
																	<option value="LowToHight">Giá từ thấp đến cao</option>
															</select>
											</form>
									</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
								<h4 class="widget-title">Số lượng hiển thị</h4>
							</div>	
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
								<div class="widget">
									<form method="post" action="#">
												<input type="hidden" id="productCatalog" value="<?php echo $_GET['sanpham']; ?>">
												<input type="hidden" id="order_product" value="<?php echo $order_droduct;?>">
												<select class="form-control" name="numberRecord" onchange='getresult("getresult.php",$("#productCatalog").val(),$("select[name=numberRecord]").val(),$("#order_product").val())'>
																<option value="5">5</option>
																<option  value="10">10</option>
																<option  value="20">20</option>
																<option  value="50">50</option>
												</select>
									</form>
								</div>
							</div>
							</div>						
				<div class="row">
					
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												
												
												
											
												
                        <div id="pagination-result">
                            
                        
                        
                        
                            <input type="hidden" name="rowcount" id="rowcount" />
                        </div>
                    </div>
                    
				
			</div>	
</section>


	


<?php
    $productCatalog=$_GET['sanpham'];
    echo '<script>';
    echo 'var catalogProduct="'.$productCatalog.'";';
    echo 'getresult("getresult.php",catalogProduct,10,"ASC");';
    echo '</script>';
?>




