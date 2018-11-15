<?php
	$top_six=$us_select->query_six_product_sale(4);
	$top_six_book=$us_select->query_six_product_book_sale();
	$top_six_promotion=$us_select->query_six_promotion();

?>		 		
<div id="list_product_find">
</div>

	<div class="row" style="border-bottom:1px solid #999;">

		<div id="list_book_sale">
		<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="list_promotion">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_feature">
						<h4><b>SẢN PHẨM KHUYẾN MÃI</b></h4>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-lg hidden-md">
							<?php foreach ($top_six_promotion as $top_pro) {
								
						?>
						<div class="col-xs-12 col-sm-12 mobile_product_intro">
							<div class="mobile_product">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<a href='detail_product.php?id_product=<?php echo $top_pro->id_product;?>'><img src="admin/assert/product/<?php echo $top_pro->image_product;?>" class="img-responsive" alt="Image"></a>
                                    
                                    
								</div>
								<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
									<table class="table table-hover">
										<thead>
											<tr>
												<th colspan="3"><a href='detail_product.php?id_product=<?php echo $top_pro->id_product;?>'><h4 class="text-center text-info"><?php echo $top_pro->name_product;?></h4></a></th>
											</tr>
										</thead>
										<tbody>
											
											<tr>
												<td colspan="3">
													<p class="text-center"> Hãy biến việc đọc sách thành một thói quen.</p>
												</td>
											</tr>
											<tr>

												<td width="50px">
													 <a href="javascript:void(0)" onClick="shopping_cart(<?php echo $top_pro->id_product;?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
												</td>
												<td><p class="text-danger"><i class="fa fa-usd" aria-hidden="true"></i><?php echo number_format(($top_pro->price_product)*(1-$top_pro->promotion_product/100));?> VNĐ
                                                    <span class="text-muted" style="text-decoration:line-through; font-size:13px;">
													<?php echo number_format($top_pro->price_product);?></span></p>
												</td>
												<td><a href='detail_product.php?id_product=<?php echo $top_pro->id_product;?>'><i class="fa fa-info" aria-hidden="true"></i>
													Chi tiết</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

						</div>
						<?php
							}
						?>
						
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs">
						<?php 
						foreach ($top_six_promotion as $top_pro) {
							
						?>
						<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 list_product_feature">
							<div class="col-md-11 col-md-offset-1 col-lg-11 col-lg-offset-1 frame_product">
								<div class="affect_product">
										
									<div class="col-xs-12 col-sm-12 col-md-11 col-md-offset-0 col-lg-11 col-lg-offset-0 product">
										
                                        <div class="link_deltail_product"> <a href='detail_product.php?id_product=<?php echo $top_pro->id_product;?>'><img src="admin/assert/pattern/plus.png" class="img-responsive" alt="Image"></a>
										</div>
                                        <div id="tag_sale_product">
                                        <img src="admin/assert/pattern/sale.png"  width="160px;"/>
                                        </div>
										<a href='detail_product.php?id_product=<?php echo $top_pro->id_product;?>'><img src="admin/assert/product/<?php echo $top_pro->image_product;?>" class="img-responsive" alt="Image"></a>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
										<div class="title_product_promotion">
											<a href="#"><h4 class="text-center"><?php echo $top_pro->name_product;?></h4></a>
											<p class="text-center"> Hãy đọc sách mỗi ngày bạn nhé.</p>
										</div>
									</div>
								</div>		
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="col-md-9 col-lg-9 product_price_order">
																		
                                          <p> <i class="fa fa-usd" aria-hidden="true"> <?php echo number_format(($top_pro->price_product)*(1-$top_pro->promotion_product/100));?> VNĐ</i> <span style="text-decoration:line-through; font-size:13px;"><?php echo number_format($top_pro->price_product);?></span></p>
										</div>
										<div class="col-md-3 col-lg-3 product_price_order"><a  href="javascript:void(0)" onClick="shopping_cart(<?php echo $top_pro->id_product;?>)"> <i class="fa fa-2x fa-cart-plus text-info" aria-hidden="true"></i></a>
										</div>
									</div>

							</div>

						</div>
						<?php
							}
						?>
					</div>
				
					
				</div>
		</div>
		<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_feature">
						<h4><b>SÁCH BÁN CHẠY NHẤT</b></h4>
					</div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-lg hidden-md">
							<?php foreach ($top_six_book as $tsb) {
								
						?>
						<div class="col-xs-12 col-sm-12 mobile_product_intro">
							<div class="mobile_product">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<a href='detail_product.php?id_product=<?php echo $tsb->id_product;?>'><img src="admin/assert/product/<?php echo $tsb->image_product;?>" class="img-responsive" alt="Image"></a>
                                    
                                    
								</div>
								<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
									<table class="table table-hover">
										<thead>
											<tr>
												<th colspan="3"><a href='detail_product.php?id_product=<?php echo $tsb->id_product;?>'><h4 class="text-center text-info"><?php echo $tsb->name_product;?></h4></a></th>
											</tr>
										</thead>
										<tbody>
											
											<tr>
												<td colspan="3">
													<p class="text-center"> Hãy biến việc đọc sách thành một thói quen.</p>
												</td>
											</tr>
											<tr>

												<td width="50px">
													 <a href="javascript:void(0)" onClick="shopping_cart(<?php echo $tsb->id_product;?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
												</td>
												<td>
                                                <?php
                                                if($tsb->promotion_product>0)
													{
												?>
                                                <p class="text-danger"><i class="fa fa-usd" aria-hidden="true"></i><?php echo number_format(($tsb->price_product)*(1-$tsb->promotion_product/100));?> VNĐ
                                                    <span class="text-muted" style="text-decoration:line-through; font-size:13px;">
													<?php echo number_format($tsb->price_product);?></span></p>
                                                   <?php
                                                   }
												   else
												   {
													   ?>
                                                        <p class="text-danger"><i class="fa fa-usd" aria-hidden="true"></i><?php echo number_format(($tsb->price_product));?> VNĐ
                                                       <?php
												   }
												   ?> 
												</td>
												<td><a href='detail_product.php?id_product=<?php echo $tsb->id_product;?>'><i class="fa fa-info" aria-hidden="true"></i>
													Chi tiết</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

						</div>
						<?php
								
						}
						?>
						
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs">

						<?php foreach ($top_six_book as $tsb) {
							if($tsb->promotion_product==0)
							{
						?>
						<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 list_product_feature">
							<div class="col-md-11 col-md-offset-1 col-lg-11 col-lg-offset-1 frame_product">
								<div class="affect_product">
									<div class="col-xs-12 col-sm-12 col-md-11 col-md-offset-0 col-lg-11 col-lg-offset-0 product">
										<div class="link_deltail_product"><a href='detail_product.php?id_product=<?php echo $tsb->id_product;?>'><img src="admin/assert/pattern/plus.png" class="img-responsive" alt="Image" width="50px;"></a>
										</div>
										<a href='detail_product.php?id_product=<?php echo $tsb->id_product;?>'><img src="admin/assert/product/<?php echo $tsb->image_product;?>" class="img-responsive" alt="Image"></a>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
										<div class="title_product_promotion">
											<a href='detail_product.php?id_product=<?php echo $tsb->id_product;?>'><h4 class="text-center text-info"><?php echo $tsb->name_product;?></h4></a>
											<p class="text-center"> Một cuốn sách hay cho ta một điều tốt, một người bạn tốt cho ta một điều hay.</p>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="col-md-9 col-lg-9 product_price_order" style="height:35px;">
											<i class="fa fa-usd" aria-hidden="true"></i>
											<?php echo number_format($tsb->price_product);?> VNĐ
										</div>
										<div class="col-md-3 col-lg-3 product_price_order"><a  href="javascript:void(0)" onClick="shopping_cart(<?php echo $tsb->id_product;?>)"> <i class="fa fa-2x fa-cart-plus text-info" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>

						</div>
						<?php
							}
							else
							{
						?>
                        	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 list_product_feature">
							<div class="col-md-11 col-md-offset-1 col-lg-11 col-lg-offset-1 frame_product">
								<div class="affect_product">
										
									<div class="col-xs-12 col-sm-12 col-md-11 col-md-offset-0 col-lg-11 col-lg-offset-0 product">
										
                                        <div class="link_deltail_product"> <a href='detail_product.php?id_product=<?php echo $tsb->id_product;?>'><img src="admin/assert/pattern/plus.png" class="img-responsive" alt="Image"></a>
										</div>
                                        <div id="tag_sale_product">
                                        <img src="admin/assert/pattern/sale.png"  width="160px;"/>
                                        </div>
										<a href='detail_product.php?id_product=<?php echo $tsb->id_product;?>'><img src="admin/assert/product/<?php echo $tsb->image_product;?>" class="img-responsive" alt="Image"></a>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
										<div class="title_product_promotion">
											<a href="#"><h4 class="text-center"><?php echo $tsb->name_product;?></h4></a>
											<p class="text-center"> Hãy đọc sách mỗi ngày bạn nhé.</p>
										</div>
									</div>
								</div>		
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="col-md-9 col-lg-9 product_price_order" style="margin-top:-40px;">
																		
                                          <p> <i class="fa fa-usd" aria-hidden="true"> <?php echo number_format(($tsb->price_product)*(1-$tsb->promotion_product/100));?> VNĐ</i> <span style="text-decoration:line-through; font-size:13px;"><?php echo number_format($tsb->price_product);?></span></p>
										</div>
										<div class="col-md-3 col-lg-3 product_price_order"><a  href="javascript:void(0)" onClick="shopping_cart(<?php echo $tsb->id_product;?>)"> <i class="fa fa-2x fa-cart-plus text-info" aria-hidden="true"></i></a>
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
				
		
		<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_feature">
						<h4><b>DỤNG CỤ HỌC TẬP CHẠY NHẤT</b></h4>
					</div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-lg hidden-md">
							<?php foreach ($top_six as $top_equipment) {
								
						?>
						<div class="col-xs-12 col-sm-12 mobile_product_intro">
							<div class="mobile_product">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<a href='detail_product.php?id_product=<?php echo $top_equipment->id_product;?>'><img src="admin/assert/product/<?php echo $top_equipment->image_product;?>" class="img-responsive" alt="Image"></a>
                                    
                                    
								</div>
								<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
									<table class="table table-hover">
										<thead>
											<tr>
												<th colspan="3"><a href='detail_product.php?id_product=<?php echo $top_equipment->id_product;?>'><h4 class="text-center text-info"><?php echo $top_equipment->name_product;?></h4></a></th>
											</tr>
										</thead>
										<tbody>
											
											<tr>
												<td colspan="3">
													<p class="text-center"> Hãy biến việc đọc sách thành một thói quen.</p>
												</td>
											</tr>
											<tr>

												<td width="50px">
													 <a href="javascript:void(0)" onClick="shopping_cart(<?php echo $top_equipment->id_product;?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
												</td>
												<td>
                                                <?php
                                                if($top_equipment->promotion_product>0)
													{
												?>
                                                <p class="text-danger"><i class="fa fa-usd" aria-hidden="true"></i><?php echo number_format(($top_equipment->price_product)*(1-$top_equipment->promotion_product/100));?> VNĐ
                                                    <span class="text-muted" style="text-decoration:line-through; font-size:13px;">
													<?php echo number_format($top_equipment->price_product);?></span></p>
                                                   <?php
                                                   }
												   else
												   {
													   ?>
                                                        <p class="text-danger"><i class="fa fa-usd" aria-hidden="true"></i><?php echo number_format(($top_equipment->price_product));?> VNĐ
                                                       <?php
												   }
												   ?> 
												</td>
												<td><a href='detail_product.php?id_product=<?php echo $top_equipment->id_product;?>'><i class="fa fa-info" aria-hidden="true"></i>
													Chi tiết</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

						</div>
						<?php
								
						}
						?>
						
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs">

						<?php foreach ($top_six as $top_equipment) {
							if($top_equipment->promotion_product==0)
							{
						?>
						<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 list_product_feature">
							<div class="col-md-11 col-md-offset-1 col-lg-11 col-lg-offset-1 frame_product">
								<div class="affect_product">
									<div class="col-xs-12 col-sm-12 col-md-11 col-md-offset-0 col-lg-11 col-lg-offset-0 product">
										<div class="link_deltail_product"><a href='detail_product.php?id_product=<?php echo $top_equipment->id_product;?>'><img src="admin/assert/pattern/plus.png" class="img-responsive" alt="Image" width="50px;"></a>
										</div>
										<a href='detail_product.php?id_product=<?php echo $top_equipment->id_product;?>'><img src="admin/assert/product/<?php echo $top_equipment->image_product;?>" class="img-responsive" alt="Image"></a>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
										<div class="title_product_promotion">
											<a href='detail_product.php?id_product=<?php echo $top_equipment->id_product;?>'><h4 class="text-center text-info"><?php echo $top_equipment->name_product;?></h4></a>
											<p class="text-center"> Một cuốn sách hay cho ta một điều tốt, một người bạn tốt cho ta một điều hay.</p>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="col-md-9 col-lg-9 product_price_order" style="height:35px;">
											<i class="fa fa-usd" aria-hidden="true"></i>
											<?php echo number_format($top_equipment->price_product);?> VNĐ
										</div>
										<div class="col-md-3 col-lg-3 product_price_order"><a  href="javascript:void(0)" onClick="shopping_cart(<?php echo $top_equipment->id_product;?>)"> <i class="fa fa-2x fa-cart-plus text-info" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>

						</div>
						<?php
							}
							else
							{
						?>
                        	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 list_product_feature">
							<div class="col-md-11 col-md-offset-1 col-lg-11 col-lg-offset-1 frame_product">
								<div class="affect_product">
										
									<div class="col-xs-12 col-sm-12 col-md-11 col-md-offset-0 col-lg-11 col-lg-offset-0 product">
										
                                        <div class="link_deltail_product"> <a href='detail_product.php?id_product=<?php echo $top_equipment->id_product;?>'><img src="admin/assert/pattern/plus.png" class="img-responsive" alt="Image"></a>
										</div>
                                        <div id="tag_sale_product">
                                        <img src="admin/assert/pattern/sale.png"  width="160px;"/>
                                        </div>
										<a href='detail_product.php?id_product=<?php echo $top_equipment->id_product;?>'><img src="admin/assert/product/<?php echo $top_equipment->image_product;?>" class="img-responsive" alt="Image"></a>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
										<div class="title_product_promotion">
											<a href="#"><h4 class="text-center"><?php echo $top_equipment->name_product;?></h4></a>
											<p class="text-center"> Hãy đọc sách mỗi ngày bạn nhé.</p>
										</div>
									</div>
								</div>		
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="col-md-9 col-lg-9 product_price_order" style="margin-top:-40px;">
																		
                                          <p> <i class="fa fa-usd" aria-hidden="true"> <?php echo number_format(($top_equipment->price_product)*(1-$top_equipment->promotion_product/100));?> VNĐ</i> <span style="text-decoration:line-through; font-size:13px;"><?php echo number_format($top_equipment->price_product);?></span></p>
										</div>
										<div class="col-md-3 col-lg-3 product_price_order"><a  href="javascript:void(0)" onClick="shopping_cart(<?php echo $top_equipment->id_product;?>)"> <i class="fa fa-2x fa-cart-plus text-info" aria-hidden="true"></i></a>
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
			</div>
		
