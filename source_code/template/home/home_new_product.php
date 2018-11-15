<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2><b>Hàng mới về</b></h2>
			</div>
		</div>
		<div class="row">
			
		<?php
			foreach ($lstNewProduct as $key => $value) {
				?>
					<div class="col-md-4">
						<div class="product-item">
							<div class="product-thumb">
								<span class="bage">Sale</span>
								<img class="img-responsive" src="images/product/bot_cam_gao.jpg" alt="product-img" />
								<div class="preview-meta">
									<ul>
										<li>
											<span  data-toggle="modal" data-target="#product-modal">
												<i class="tf-ion-ios-search-strong "></i>
											</span>
										</li>
										<li>
											<a href=""><i class="tf-ion-android-cart"></i></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="product-content">
							<h4><a href="product-single.php"><?php echo $value->name_product;?></a></h4>
								<p class="price text-danger">Giá: <?php echo number_format($value->price_product);?> VNĐ</p>
								
								<div style="margin:auto;">
									<button type="button" class=" btn-shopping " onclick="shopping_cart(<?php echo $value->id_product;?>)"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Thêm vào giỏ</button>
									<button type="button" class=" btn-buynow "><i class="fa fa-shopping-cart" aria-hidden="true"></i>Mua ngay</button>
								</div>
							</div>
						</div>
					</div>
				<?php
			}
		?>
			
			<div class="col-md-12 see_more">
				<a href="danh_sach_san_pham.php?sanpham=moi" class="btn btn-main">Xem thêm các sản phẩm</a>
			</div>
		</div>
	</div>
</section>