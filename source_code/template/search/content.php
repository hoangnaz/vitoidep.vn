
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
<div id="overlay">
	<div>
		<img src="images/loading.gif" width="64px" height="64px"/>
	</div>
</div>

<section class="products section">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="widget">
					<h4 class="widget-title">Sắp xếp theo</h4>
					<form method="post" action="#">
                        <select class="form-control">
                            <option>A - Z</option>
                            <option>Z - A</option>
                            <option>Giá cao đến thấp</option>
                            <option>Giá từ thấp đến cao</option>
                        </select>
                    </form>
	            </div>
				<div class="widget product-category">
					<h4 class="widget-title">Danh mục</h4>
					<div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
					  	<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingOne">
						      	<h4 class="panel-title">
						        	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          	Son gấc dền
						        	</a>
						      	</h4>
						    </div>
					    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<ul>
									<li><a href="">Son gấc dền có màu</a></li>
									<li><a href="">Son dưỡng</a></li>
									<li><a href="">Son kem gấc dền</a></li>
								</ul>
							</div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingTwo">
					      <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					         	Bột và ngũ cóc
					        </a>
					      </h4>
					    </div>
					    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					    	<div class="panel-body">
					     		<ul>
									<li><a href="">Bột cám</a></li>
									<li><a href="">Bột cà phê</a></li>
									<li><a href="">Bột trà xanh</a></li>
								</ul>
					    	</div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingThree">
					      <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					          	Tinh chất - series - dầu dưỡng
					        </a>
					      </h4>
					    </div>
					    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					    	<div class="panel-body">
					      		<ul>
									<li><a href="">Tinh dầu bưởi</a></li>
									<li><a href="">Shoe Color</a></li>
									<li><a href="">Gladian Shoes</a></li>
									<li><a href="">Swis Shoes</a></li>
								</ul>
					    	</div>
					    </div>
					  </div>
					   <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingThree">
					      <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					          Chắm sóc
					        </a>
					      </h4>
					    </div>
					    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					    	<div class="panel-body">
					      		<ul>
									<li><a href="">Chăm sóc cơ thể</a></li>
									<li><a href="">Tóc</a></li>
									<li><a href="">Da mặt</a></li>
								
								</ul>
					    	</div>
					    </div>
					  </div>
					</div>
					
				</div>
				<div class="widget">
					Mức giá sản phẩm
					<p>100.000 - 200.000 VNĐ</p>
					<p>100.000 - 200.000 VNĐ</p>
					<p>100.000 - 200.000 VNĐ</p>
					<p>100.000 - 200.000 VNĐ</p>
					<p>100.000 - 200.000 VNĐ</p>
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
										<?php
											if(!$lstSeach || count($lstSeach) == 0)
											{
												echo "aaaaaaaaaaaa";
											}
											else{
												foreach ($lstSeach as $key => $value) {
													?>
															<div class="col-md-4">
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
																<h4><a href="product-single.html"><?php echo $value->name_product;?></a></h4>
																<p class="price"><?php echo number_format($value->price_product);?>'VNĐ</p>
															</div>
														</div>
													</div>
													<?php
												}
											}
										?>
                    </div>
                    
				
			</div>	
</section>


	





