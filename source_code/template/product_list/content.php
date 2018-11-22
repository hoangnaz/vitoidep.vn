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

<!-- <div id="overlay">
	<div>
		<img src="images/loading.gif" width="64px" height="64px"/>
	</div>
</div> -->


<section class="products section" >
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
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		      			
		      			<h5 class="text-center text-uppercase"><b>Top sản phẩm mua nhiều nhất</b></h5>	
		      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		      				<div class="post">
						
						<?php
							$top=true;
						
							foreach ($lstTopFive as $key => $value) {
								$infoProduct=$productDB->getInfoProduct($value->product);
								if($top==true){
									?>
									<div class="post-media post-thumb">
										<a class="text-info" href="product-single.php?name=<?php echo $infoProduct->name_product_no_vietnamse;?>">
											<img src="images/product/<?php echo $infoProduct->image_product;?>" alt="">
										</a>
									</div>
							<?php
								}
								$top=false;
								
								
								?>
									
									<h6 ><a class="text-waring"  href="product-single.php?name=<?php echo $infoProduct->name_product_no_vietnamse;?>"><?php echo $infoProduct->name_product;?></a></h5>
									<div class="post-meta-right ">
										<ul>
											<li>
												<a href="">Còn lại:<?php echo $infoProduct->quantity_inventory;?>  sản phẩm</a>
											</li>
											<li>
											<a href="product-single.php?name=<?php echo $infoProduct->name_product_no_vietnamse;?>"><i class="fa fa-money" aria-hidden="true"></i><?php echo $infoProduct->price_product*(1-($infoProduct->point_promotion)/100);?> VNĐ / Thỏi </a>
											</li>
											
										</ul>
									</div>
								<?php
							}
						?>
					    </div>	
		      		</div>
	      		</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe width="400" height="360" 
						src="https://www.youtube.com/embed/fFxPjFlJOr8?list=PLqnZwdorxpkmqd6hhSJnWQ4bK1KEubmW_"
						 frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
						 allowfullscreen></iframe>
						
					</div>
				</div>
				  
				<!-- <div class="widget">
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
				
				</div> -->
			
       		</div>
			<div class="col-md-9">
			
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
									<option value="6">6</option>
									<option  value="12">12</option>
									<option  value="24">24</option>
									<option  value="48">48</option>
								</select>
							</form>
						</div>
					</div>
				</div>						
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">					
					<div id="pagination-result">
						<input type="hidden" name="rowcount" id="rowcount" />
					</div>
				</div>	
			</div>
		</div>		
</section>


	


<?php
    $productCatalog=$_GET['sanpham'];
    echo '<script>';
    echo 'var catalogProduct="'.$productCatalog.'";';
    echo 'getresult("getresult.php",catalogProduct,9,"ASC");';
    echo '</script>';
?>




