
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Kết quả tìm kiếm</h1>
					
				</div>
			</div>
		</div>
	</div>
</section>
<section class="products section">
	<div class="container">
		<div class="col-md-3">
			<div class="row">
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
							<div class="embed-responsive embed-responsive-16by9" style="margin-top:30px; margin-bottom:30px;">
								<iframe width="400" height="360" 
								src="https://www.youtube.com/embed/fFxPjFlJOr8?list=PLqnZwdorxpkmqd6hhSJnWQ4bK1KEubmW_"
								frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
								allowfullscreen></iframe>
							</div>		
						</div>
					</div>
				</div>	
			</div>
        
			<div class="col-md-9">
				<div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php
							if(!$lstSeach || count($lstSeach) == 0) {
								?>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<img class="img-responsive"  src="images/image_no_search.jpg" alt="product-img" style="
											margin: auto;" />
											<h3 class="text-center text-danger">Chúng tôi không tìm thấy sản phẩm phù hợp</h3>
									</div>
								<?php
							}
							else{
								foreach ($lstSeach as $key => $value) {
								?>
									<div class="col-md-4">
										<div class="product-item">
											<div class="product-thumb">
												<?php
													if($value->point_promotion > 0){
														?>
														<span class="bage"><i class="fa fa-bolt text-danger" aria-hidden="true"></i> - <?php echo $value->point_promotion;?> %</span>
														<?php
													}
												?>
												<img class="img-responsive" src="images/product/<?php echo $value->image_product;?>" alt="product-img" />
												<div class="preview-meta">
													<ul>
														<li>
															<span  data-toggle="modal" data-target="#product-modal" onclick="show_detail(<?php echo $value->id_product;?>)">
																<i class="tf-ion-ios-search-strong">

																</i>
															</span>
														</li>
													</ul>
												</div>
											</div>
											<div class="product-content">

												<h4><a href="product-single.php?name=<?php echo $value->name_product_no_vietnamse;?>"><?php echo $value->name_product;?></a></h4>
														<?php
														if($value->point_promotion > 0){
														?>
															<p class="price text-warning">Giá: <?php echo number_format((1- $value->point_promotion/100)*$value->price_product);?> VNĐ  <sub color="black"><strike><?php echo number_format($value->price_product);?> VNĐ</strike></sub></p>
														<?php
														}else{
														?>
															<p>Giá: <?php echo number_format($value->price_product);?> VNĐ</p>
														<?php
														}
														?>	
													<div style="margin:auto;">
														<button type="button" class=" btn-shopping-list " onclick="shopping_cart(<?php echo $value->id_product;?>,0,1)"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Thêm vào giỏ</button>
														<button type="button" class=" btn-buynow-list " onclick="buy_now(<?php echo $value->id_product;?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Mua ngay</button>
													</div>

											</div>
										</div>
									</div>
								<?php
								}
							}
						?>
					</div>	
				</div>
			</div>
				
		</div>	
</section>


	





