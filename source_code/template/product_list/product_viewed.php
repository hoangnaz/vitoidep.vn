	
<section class="products related-products section ">
	<div class="container" >
		<div class="row">
			<div class="title text-center">
				<h2>CÁC SẢN PHẨM BẠN ĐÃ XEM</h2>
			</div>
		</div>
		<div class="row">
			
			<?php

				if($_SESSION['viewed']){
					$count=0;
					foreach ($_SESSION['viewed'] as $key => $value) {
						if($count < 4)
						{
						?>
							<div class="col-md-3">
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
													<span  data-toggle="modal" data-target="#product-modal"  onclick="show_detail(<?php echo $value->id_product;?>)">
														<i class="tf-ion-ios-search-strong" ></i>
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
											<button type="button" class=" btn-shopping " onclick="shopping_cart(<?php echo $value->id_product;?>,0,1)"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Thêm vào giỏ</button>
											<button type="button" class=" btn-buynow " onclick="buy_now(<?php echo $value->id_product;?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Mua ngay</button>
										</div>
										

									</div>
									
										
								</div>
							</div>
						<?php
						}
						$count++;
					}
				}
				else{
					echo "<p class='text-center'>Hiện tại bạn chưa xem cụ thể sản phẩm nào.</p>";
				}
			?>	
			</div>
			
		</div>
	</div>
</section>


