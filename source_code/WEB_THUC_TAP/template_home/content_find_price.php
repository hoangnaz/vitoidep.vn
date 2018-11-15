				 			
				 			<!--  sap xep san pham-->
			 					<div id="list_product_find">
				 				</div>
                  <?php
	
	session_start();
	include_once("admin/database/select_data.php");
	$data=new select_data();
	$result_seacrh=$data->query_list_search_price($_POST['price-min']);
	$result_seacrh_mobile=$data->query_list_search_price_mobile($_POST['price-min']);
	?>
 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-lg hidden-md">
							<?php foreach ($result_seacrh_mobile as $pdd) {
								
						?>
						
												 	  <div class="col-xs-12 col-sm-12 mobile_product_intro">
			                                   	 		 <div class="mobile_product">
			                                   	 	 		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			                                   	 	 		<a href='detail_product.php?id_product=<?php echo $pdd->id_product;?>'><img src="admin/assert/product/<?php echo $pdd->image_product;?>" class="img-responsive" alt="Image"></a>
			                                   	 	 		</div>
				                                   	 	 	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				                                   	 	 		<table class="table table-hover">
				                                   	 	 			<thead>
				                                   	 	 				<tr>
				                                   	 	 					<th colspan="3"><a href='detail_product.php?id_product=<?php echo $pdd->id_product;?>'><h4 class="text-center text-info"><?php echo $pdd->name_product;?></h4></a></th>
				                                   	 	 				</tr>
				                                   	 	 			</thead>
				                                   	 	 			<tbody>
				                                   	 	 				
				                                   	 	 				<tr>
				                                   	 	 					<td colspan="3">
				                                   	 	 					<?php
							                                   					if($pdd->catalog_product==4)
							                                   					{
							                                   						?>
							                                   						<p class="text-center"> Luôn bên bạn trên con đường học tập.</p>
							                                   					<?php
							                                   					}
							                                   					else
							                                   					{
							                                   						?>
							                                   						<p class="text-center">Một cuốn sách hay, cũng giống như một người bạn tốt.</p>
							                                   						<?php
							                                   					}
							                                   				?>
				                                   	 	 					</td>
				                                   	 	 				</tr>
				                                   	 	 				<tr>

				                                   	 	 					<td width="50px">
                                                                          <?php 
																		  if($pdd->quantity_inventory >0)
																		  {
																			  ?>
																			  <a href="javascript:void(0)" onClick="shopping_cart(<?php echo $pdd->id_product;?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
																			  <?php
																		  }
																		  else
																		 	{
																		  ?>
                                                                          <a href="javascript:void(0)" onClick="alert('Xin lỗi! Sản phẩm tạm hết hàng.')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                                          <?php
																			}
																			?>
                                                                          
				                                   	 	 					</td>
                                                                          
			                                   	 	 						<td>
                                                                              <?php
																			
                                                                              if($pdd->promotion_product!=0)
																		  {
																			  ?>
                                                                              <p class="text-danger"><i class="fa fa-usd" aria-hidden="true"></i><?php echo number_format(($pdd->price_product)*(1-$pdd->promotion_product/100));?> VNĐ
                                                    <span class="text-muted" style="text-decoration:line-through; font-size:13px;">	<?php echo number_format($pdd->price_product);?></span></p>																		<?php
																		  }
																		  else
																		  {
													?>
													<?php echo number_format($pdd->price_product);?></span></p>
                                                    <?php
																		  }
													?>
												</td>
						                                       				<td><a href='detail_product.php?id_product=<?php echo $pdd->id_product;?>'><i class="fa fa-info" aria-hidden="true"></i>
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
	                                 			foreach ($result_seacrh as  $pd)
	                                 			 {
												if($pd->promotion_product==0)
												{
	                                 			?>
		                                       <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 list_product_feature">
		                                       		<div class="col-lg-12 frame_product">
			                                       		<div class="affect_product">
				                                       			<div class="col-xs-12 col-sm-12 col-md-11 col-md-offset-0 col-lg-11 col-lg-offset-0 product">
				                                                    <div class="link_deltail_product"> <a href='detail_product.php?id_product=<?php echo $pd->id_product;?>'><img src="admin/assert/pattern/plus.png" class="img-responsive" alt="Image" width="50px;"></a>
				                                                	 </div>
			                                       				<a href='detail_product.php?id_product=<?php echo $pd->id_product;?>'><img src="admin/assert/product/<?php echo $pd->image_product;?>" class="img-responsive" alt="Image"></a>
			                                       				</div>
				                                       			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
					                                   				<div class="title_product">
						                                   				<a href="detail_product.php?id_product=<?php echo  $pd->id_product;?>" ><h4 class="text-center text-info"><?php echo $pd->name_product;?></h4></a>
						                                   				<?php
								                                   					if($pd->catalog_product==4)
								                                   					{
								                                   						?>
								                                   						<p class="text-center"> Luôn bên bạn trên con đường học tập.</p>
								                                   					<?php
								                                   					}
								                                   					else
								                                   					{
								                                   						?>
								                                   						<p class="text-center">Một cuốn sách hay, cũng giống như một người bạn tốt.</p>
								                                   						<?php
								                                   					}
								                                   				?>
						                                   			</div>
				                                       			</div>
				                                       	</div>		
		                                   				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		                                       				<div class="col-md-9 col-lg-9 product_price_order">
		                                       				
                                                        
		                                       					<i class="fa fa-usd" aria-hidden="true"></i><?php echo  number_format($pd->price_product);?> VNĐ
		                                       				</div>
		                                       				<div class="col-md-3 col-lg-3 product_price_order">   <?php 
																		  if($pd->quantity_inventory >0)
																		  {
																			  ?>
																			  <a href="javascript:void(0)" onClick="shopping_cart(<?php echo $pd->id_product;?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
																			  <?php
																		  }
																		  else
																		 	{
																		  ?>
                                                                          <a href="javascript:void(0)" onClick="alert('Xin lỗi! Sản phẩm tạm hết hàng.')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                                          <?php
																			}
																			?>
		                                       				</div>
		                                   				</div>

		                                   			</div>

		                                      	 </div>
		                                      	 <?php
													}
												else if($pd->promotion_product!=0)
												{
													?>
                                                     <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 list_product_feature">
		                                       		<div class="col-lg-12 frame_product">
			                                       		<div class="affect_product">
				                                       			<div class="col-xs-12 col-sm-12 col-md-11 col-md-offset-0 col-lg-11 col-lg-offset-0 product">
				                                                    <div class="link_deltail_product"> <a href='detail_product.php?id_product=<?php echo $pd->id_product;?>'><img src="admin/assert/pattern/plus.png" class="img-responsive" alt="Image" width="50px;"></a>
				                                                	 </div>
                                                                      <div id="tag_sale_product">
                                        <img src="admin/assert/pattern/sale.png"  width="160px;"/>
                                        </div>
			                                       				<a href='detail_product.php?id_product=<?php echo $pd->id_product;?>'><img src="admin/assert/product/<?php echo $pd->image_product;?>" class="img-responsive" alt="Image"></a>
			                                       				</div>
				                                       			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
					                                   				<div class="title_product">
						                                   				<a href="detail_product.php?id_product=<?php echo  $pd->id_product;?>" ><h4 class="text-center text-info"><?php echo $pd->name_product;?></h4></a>
						                                   				<?php
								                                   					if($pd->catalog_product==4)
								                                   					{
								                                   						?>
								                                   						<p class="text-center"> Luôn bên bạn trên con đường học tập.</p>
								                                   					<?php
								                                   					}
								                                   					else
								                                   					{
								                                   						?>
								                                   						<p class="text-center">Hãy hình thành thói quen đọc sách.</p>
								                                   						<?php
								                                   					}
								                                   				?>
						                                   			</div>
				                                       			</div>
				                                       	</div>		
		                                   				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		                                       				<div class="col-md-9 col-lg-9 product_price_order" style="margin-top:-52px;">						
																		
                                          <i class="fa fa-usd" aria-hidden="true" style="font-size:12px;"> <?php echo number_format(($pd->price_product)*(1-$pd->promotion_product/100));?> VNĐ</i> <span style="text-decoration:line-through; font-size:13px;"><?php echo number_format($pd->price_product);?></span></p>
										</div>
		                                       				<div class="col-md-3 col-lg-3 product_price_order">  <?php 
																		  if($pd->quantity_inventory >0)
																		  {
																			  ?>
																			  <a href="javascript:void(0)" onClick="shopping_cart(<?php echo $pd->id_product;?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
																			  <?php
																		  }
																		  else
																		 	{
																		  ?>
                                                                          <a href="javascript:void(0)" onClick="alert('Xin lỗi! Sản phẩm tạm hết hàng.')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                                          <?php
																			}
																			?>
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
			 	<!-- content finish-->
			
	 		</div>
	 		 	<!-- general_content -->
 	</div>