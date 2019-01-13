<!-- Main Menu Section -->
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Thông tin sản phẩm </h1>
					
				</div>
			</div>
		</div>
	</div>
</section>
<section class="single-product">
	<div class="container">
	
		<div class="row mt-20">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div class='carousel-inner '>
								<div class='item active'>
									<img src='images/product/<?php echo $infoProduct->image_product;?>' alt='' data-zoom-image="images/shop/single-products/product-1.jpg" />
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 share_social">
									<p class="text-center"><?php echo $infoProduct->name_product;?></p>
									<div class="col-xs-5 col-sm-5 col-xs-offset-1 col-sm-offset-1 col-lg-5 col-md-5" >
											<a href="#" onclick="share_fb('http://vitoidep.vn/product-single.php?name=<?php echo $infoProduct->name_product_no_vietnamse;?>');return false;" rel="nofollow" share_url="http://vitoidep.vn/product-single.php?name=<?php echo $infoProduct->name_product_no_vietnamse;?>" target="_blank">
										<img src="../images/share/fb.png" class="img-responsive" style="float:right; padding-right:1%;" title="facebook_link" alt="facebook_link" />
										</a>
									</div>
										<div class="col-xs-5 col-sm-5  col-lg-5 col-md-5">
											<a href="#" onclick="share_twiter('http://vitoidep.vn/product-single.php?name=<?php echo $infoProduct->name_product_no_vietnamse;?>');return false;" rel="nofollow" share_url="http://vitoidep.vn/product-single.php?name=<?php echo $infoProduct->name_product_no_vietnamse;?>" target="_blank">
												<img src="../images/share/tw.png" class="img-responsive" style="float:left; padding-left:1%;" title="facebook_link" alt="facebook_link" />
											</a>
									</div>	
								</div>
								<!-- <div class='item'>
									<img src='images/shop/single-products/product-2.jpg' alt='' data-zoom-image="images/shop/single-products/product-2.jpg" />
								</div>
								
								<div class='item'>
									<img src='images/shop/single-products/product-3.jpg' alt='' data-zoom-image="images/shop/single-products/product-3.jpg" />
								</div>
								<div class='item'>
									<img src='images/shop/single-products/product-4.jpg' alt='' data-zoom-image="images/shop/single-products/product-4.jpg" />
								</div>
								<div class='item'>
									<img src='images/shop/single-products/product-5.jpg' alt='' data-zoom-image="images/shop/single-products/product-5.jpg" />
								</div>
								<div class='item'>
									<img src='images/shop/single-products/product-6.jpg' alt='' data-zoom-image="images/shop/single-products/product-6.jpg" />
								</div> -->
								
							</div>
							
							<!-- sag sol -->
							<!-- <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
								<i class="tf-ion-ios-arrow-left"></i>
							</a>
							<a class='right carousel-control' href='#carousel-custom' data-slide='next'>
								<i class="tf-ion-ios-arrow-right"></i>
							</a> -->
						</div>
						
						<!-- thumb -->
						<!-- <ol class='carousel-indicators mCustomScrollbar meartlab'>
							<li data-target='#carousel-custom' data-slide-to='0' class='active'>
								<img src='images/shop/single-products/product-1.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='1'>
								<img src='images/shop/single-products/product-2.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='2'>
								<img src='images/shop/single-products/product-3.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='3'>
								<img src='images/shop/single-products/product-4.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='4'>
								<img src='images/shop/single-products/product-5.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='5'>
								<img src='images/shop/single-products/product-6.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='6'>
								<img src='images/shop/single-products/product-7.jpg' alt='' />
							</li>
						</ol> -->
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-details">
					<h2><?php echo $infoProduct->name_product;?></h2>
					
				</div>
				
				<div >
					<p class="product-description mt-20">
					<?php echo $infoProduct->describle_product;?>
					</p>
					<p class="product-price"><b>Giá: </b><?php echo number_format((1-($infoProduct->point_promotion/100))*$infoProduct->price_product);?> VNĐ / <?php echo $infoProduct->unit;?></p>
				
				
					<span><b>Số lượng còn lại:</b> <?php echo $infoProduct->quantity_inventory; ?> sản phẩm</span>
					
				</div>
					<div class="product-quantity">
						<span><b>Số lượng mua:</b></span>
						<div class="quantity product-quantity-slider">
							<input id="product-quantity" type="number" min="1" max="100" step="1" value="1" name="product-quantity">
						</div>
					</div>
				<div>
				<a  class="btn btn-main mt-20" onclick="shopping_cart(<?php echo $infoProduct->id_product;?>,0,document.getElementById('product-quantity').value)">Thêm vào giỏ hàng</a>
			</div>
		
			<!-- <div class="product-category">
				<div class="widget widget-tag">
					<h4 class="widget-title">Danh mục</h4>
					<ul class="widget-tag-list">
						<li><a href="#">Animals</a>
						</li> 
					</ul>
				</div>
			</div> -->
				
			</div>
		</div>


