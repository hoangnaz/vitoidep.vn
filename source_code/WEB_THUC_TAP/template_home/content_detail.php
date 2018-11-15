		<?php
        	include_once("admin/database/select_data.php");
			include_once("admin/database/pager.php");
			$us_select=new select_data();
			$_GET["catalog"];
			$catalog_detail=$us_select->query_one_catalog($_GET["catalog"]);
        
			$us_page=new pager();
			$catalog=$_GET["catalog"];
			$list_pro=$us_select->query_list_product_catalog($catalog);
			$count=count($list_pro);
			$limit=12;
			$posision=$us_page->findStart($limit);
			$pag=$us_page->findPages($count,$limit);
			$param="&catalog=$catalog";
			$current=$_GET["page"];
			$lst=$us_page->pageList($current,$pag,$param);

			$product=$us_select->query_list_product_catalog_page($posision,$limit,$catalog);
			$list_author_catalog=$us_select->query_list_author_follow_catalog($_GET["catalog"]);
			$product_MB=$us_select->query_list_product_moblie_catalog_page($posision,$limit,$catalog);
			$top_sale_novel=$us_select->top_sale_catalog(5);
			$top_sale_skill_life=$us_select->top_sale_catalog(2);
			$top_sale_short=$us_select->top_sale_catalog(6);
			$top_sale_novel=$us_select->top_sale_catalog(5);
			
		
		?>
        <div id="list_product_find">
		</div>
        <!- KET THUC MENU NEW-!>
        			<div class="content_catalog_product">
			 			<div class="row" id="title_catalog">
			 				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 title_catalog_detail">
			 					<h3 class="text-uppercase"><b><?php echo $catalog_detail->catalog_name;?></b></h3>
			 				</div>
			 				<div class="row">
			 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 intro_catalog_detail">
			 						<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 ">
				 						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content_catalog_detail">
				 							<?php echo $catalog_detail->catalog_describle;?>
				 						</div>

			 						</div>
			 						<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 ">
			 						<img src="admin/assert/catalog/<?php echo $catalog_detail->image_catalog;?>" class="img-responsive" alt="Image" width="100%">
			 						</div>
			 					</div>
			 				</div>
					
		 				</div>
				 			<!- KET THUC SAN PHAM-!>
			 			
                         
				 			<!--  sap xep san pham-->
	 					<div id="list_product">
				 				<div class="col-md-10 col-lg-10 hidden-xs">
                               	      	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs">
		                                    	 <?php
	                                 			foreach ($product as  $pd)
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
								                                   					if($_GET["catalog"]==4)
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
								                                   					if($_GET["catalog"]==4)
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

		                                        	 	
                                  	 		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center; margin-bottom:10px;">
		 									<?php echo $lst;?>
		 								</div>
		                                    </div>
                       	        </div>  
                           	      <div class="col-md-2 col-lg-2 hidden-xs"> 
                                  		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 select_fast" >
                                        <h2>TIÊU BIỂU</h2>
                                        </div>
                                  		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 select_fast" >
                                        		<a href="detail_product.php?id_product=<?php echo  $top_sale_novel->id_product;?>" class="text-warning">Tiểu thuyết bán chạy nhất</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 select_fast" >
                                        		<a href="detail_product.php?id_product=<?php echo  $top_sale_skill_life->id_product;?>">Kỹ năng sống bán chạy nhất</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 select_fast" >
                                        		<a href="detail_product.php?id_product=<?php echo  $top_sale_short->id_product;?>">Truyện ngắn bán chạy nhất</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 select_fast" >
                                        	<div data-role="main" class="ui-content">
                                            <form method="post" action="find_price.php">
                                              <div data-role="rangeslider">
                                                <label for="price-min">Mức giá:(0-200.000 VNĐ)</label>
                                                <input type="range" name="price-min" id="price-min" value="" min="0" max="200000" onchange="value_find(this.value)">
                                              </div>
                                              <div id="price_find">
                                              </div>
                                              <p>Bạn có thể tìm kiếm sản phẩm theo mức giá bằng cách kéo mức giá bạn muốn tìm kiếm.</p>
                                                <button type="submit" data-inline="true">Tìm kiếm</button>
                                                
                                              </form>
  </div>
                                        </div>
	                           	      	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 select_fast" >
	                                   		<img src="admin/assert/pattern/banner.jpg" class="img-responsive" alt="Image">
	                                   	</div>
	                                   	                                       
                          	      </div> 	  
		                         <div class="col-xs-12 col-sm-12 hidden-lg hidden-md">
		                       			 	 <?php
	                                 			foreach ($product_MB as  $pdd) 
	                                 			{
													
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
							                                   					if($_GET["catalog"]==4)
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
                               	  
		 		
		 								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center; margin-bottom:10px;">
		 									<?php echo $lst;?>
		 								</div>
		 						</div>	
			 	<!-- content finish-->
						
				 		</div>
		 			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs">
		 					<div id="list_author ">
					 			<div class="col-md-12 col-md-12 col-lg-12 col-lg-12 title_author ">
					 				<h4 class=""><b>DANH SÁCH MỘT SỐ TÁC GIẢ</b></h4>
					 			
					 			
					 			</div>
						 		<div class="col-md-12 col-md-12 col-lg-12 col-lg-12 ">
						 			<?php
	                                	foreach($list_author_catalog as $lts_author)
										{
									?>
						 			
                                        
                                        
                                        
                                        <a  data-toggle="modal" href='#author-id<?php echo $lts_author->id_author;?>'> 
                                        	<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
	                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                                            <img src="admin/assert/author/<?php echo $lts_author->avatar;?>" class="img-responsive " alt="Image">
	                                        </div>
	                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                                            <h5 class="text-center"><?php echo $lts_author->author_name;?></h5>
	                                        </div>
						 				</div>
                                        
                                        </a>
				 						
                                <div class="modal fade" id="author-id<?php echo $lts_author->id_author;?>" tabindex="-1">
                                    <div class="modal-dialog" style="width:50%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h2 class="modal-title text-center text-danger"> THÔNG TIN TÁC GIẢ</h2>
                                            </div>
                                            <div class="modal-body" >
                                                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                                                     <table class="table table-striped table-hover" style="margin-top:30px;">
                                                    
                                                    <tbody>
                                                        <tr width="40%">
                                                            <td colspan="2"><h3 class="text-center text-info"><?php echo $lts_author->author_name;?></h3></td>
                                                        </tr>
                                                         <tr >
                                                            <td colspan="2"> <img src="admin/assert/author/<?php echo $lts_author->avatar;?>" class="img-responsive" alt="Image" width="120px" style="margin:auto;"></td>
                                                          
                                                        </tr>
                                                         <tr>
                                                            <td colspan="2"><?php echo $lts_author->info_author;?></td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                                </div>
                                               
                                            </div>
                                            <div class="modal-footer">
                                                
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
	 			

		 			</div>
		 			
			 	