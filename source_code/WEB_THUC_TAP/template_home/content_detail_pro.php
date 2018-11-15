<?php
	include_once("admin/database/pager.php");
	$us_page=new pager();
	include_once("admin/database/select_data.php");
	$us_select=new select_data();
	$id_product=$_GET["id_product"];
	$detail_product=$us_select->query_one_product($id_product);
	
	$list_product_ca=$us_select->query_list_product_catalog($detail_product->catalog_product);
	$count_number_product=0;
	$top_like=$us_select->query_three_product_top_like();
	$list_comment_product=$us_select->list_comment_product($id_product);

	
	
?>
<div id="list_product_find">
</div>
	<div id="content_detail">
	 			<div class="row">
		 				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 ">
			 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_catalog_detail" >
			 					<p class="text-info">Thông tin sản phẩm</p>
			 				</div>
			 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info_detail_product">
				 				<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-3 col-md-offset-1 col-lg-3 col-lg-offset-1 image_detail_product">
				 					<img src="admin/assert/product/<?php echo $detail_product->image_product;?>" class="img-responsive" alt="Image">
				 				</div>
				 				<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-1 col-lg-6 col-lg-offset-1 detail_product">
				 					<table class="table table-condensed">
				 						<thead>
				 							<tr>
				 								<th><p><?php echo $detail_product->name_product;?></p></th>
				 							</tr>
				 						</thead>
				 						<tbody>
				 							<tr>
				 								<td>

				 							<a  data-toggle="modal" href='#author-id'> <p>Tác giả: <?php echo $detail_product->author_name;?><i class="fa fa-hand-o-left" aria-hidden="true"></i></p></a>
				 						
                                <div class="modal fade" id="author-id" tabindex="-1">
                                    <div class="modal-dialog hidden-xs hidden-ms" style="width:50%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h2 class="modal-title text-center text-danger"> THÔNG TIN TÁC GIẢ</h2>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                                                     <table class="table table-striped table-hover" style="margin-top:30px;">
                                                    
                                                    <tbody>
                                                        <tr width="40%">
                                                            <td colspan="2"><h3 class="text-center text-info"><?php echo $detail_product->author_name;?></h3></td>
                                                        </tr>
                                                         <tr >
                                                            <td colspan="2"> <img src="admin/assert/author/<?php echo $detail_product->avatar;?>" class="img-responsive" alt="Image" width="120px" style="margin:auto;"></td>
                                                          
                                                        </tr>
                                                         <tr>
                                                            <td colspan="2"><?php echo $detail_product->info_author;?></td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                                </div>
                                               
                                            </div>
                                            <div class="modal-footer">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-dialog hidden-lg hidden-md" style="width:90%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h2 class="modal-title text-center text-danger"> THÔNG TIN TÁC GIẢ</h2>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                                                     <table class="table table-striped table-hover" style="margin-top:30px;">
                                                    
                                                    <tbody>
                                                        <tr width="40%">
                                                            <td colspan="2"><h3 class="text-center text-info"><?php echo $detail_product->author_name;?></h3></td>
                                                        </tr>
                                                         <tr >
                                                            <td colspan="2"> <img src="admin/assert/author/<?php echo $detail_product->avatar;?>" class="img-responsive" alt="Image" width="120px" style="margin:auto;"></td>
                                                          
                                                        </tr>
                                                         <tr>
                                                            <td colspan="2"><?php echo $detail_product->info_author;?></td>
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
				 							
                                               
                                                </td>
                                                
				 							</tr>
                                            	<tr>
				 								<td>

				 							<a  data-toggle="modal" href='#publisher'>  <p>Nhà sản xuất / xuất bản: <?php echo $detail_product->name_producer_publisher;?></p></a>
				 						
                                <div class="modal fade" id="publisher" tabindex="-1">
                                    <div class="modal-dialog hidden-xs hidden-ms" style="width:50%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h2 class="modal-title text-center text-danger"> THÔNG TIN NHÀ SẢN XUẤT / XUẤT BẢN</h2>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                                                     <table class="table table-striped table-hover" style="margin-top:30px;">
                                                    
                                                    <tbody>
                                                        <tr width="40%">
                                                            <td colspan="2"><h3 class="text-center text-info"><?php echo $detail_product->name_producer_publisher;?></h3></td>
                                                        </tr>
                                                         <tr >
                                                       
                                                         <tr>
                                                            <td colspan="2"><?php echo $detail_product->producer_publisher_describle;?></td>
                                                        </tr>
                                                          <tr>
                                                            <td colspan="2"><?php echo $detail_product->producer_publisher_address;?></td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                                </div>
                                               
                                            </div>
                                            <div class="modal-footer">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-dialog hidden-md hidden-lg" style="width:90%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h2 class="modal-title text-center text-danger"> THÔNG TIN NHÀ SẢN XUẤT / XUẤT BẢN</h2>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                                                     <table class="table table-striped table-hover" style="margin-top:30px;">
                                                    
                                                    <tbody>
                                                        <tr width="40%">
                                                            <td colspan="2"><h3 class="text-center text-info"><?php echo $detail_product->name_producer_publisher;?></h3></td>
                                                        </tr>
                                                         <tr >
                                                       
                                                         <tr>
                                                            <td colspan="2"><?php echo $detail_product->producer_publisher_describle;?></td>
                                                        </tr>
                                                          <tr>
                                                            <td colspan="2"><?php echo $detail_product->producer_publisher_address;?></td>
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
				 							
                                               
                                                </td>
                                                
				 							</tr>
                                           
                                             <tr>
                                           	 <td>
                                                <p>Danh mục: <?php echo $detail_product->catalog_name;?></p>
                                                </td>
                                            </tr>
                                              <tr>
                                           	 <td>
                                             	Đơn giá sản phẩm:
                                                <?php 
												if($detail_product->promotion_product==0)
												{
													echo number_format($detail_product->price_product);
												}
												else
												{
													echo number_format(($detail_product->price_product)*(1-$detail_product->promotion_product/100));
												}
												
												
												?> 
                                                
                                             </td>

                                             </tr>
                                             
                                              <tr>
                                           	 <td>
                                                <p>Tình trạng:
                                                <?php if($detail_product->quantity_inventory==0)
												{
													echo "Hết hàng";
												}
												else
												{
													echo "Còn ".$detail_product->quantity_inventory." sản phẩm";
												}
												;?>
                                                </p>
                                             </td>
                                            
                                             
                                             </tr>
                                             <tr>
                                             	<td>
                                                	Đơn vị tính:<?php echo $detail_product->unit;?>
                                                </td>
                                             </tr>
                                            
                                            
                                            <tr>
                                             <td style="text-align:center;">
                                            
                                           
                                            <?php 
																		  if($detail_product->quantity_inventory >0)
																		  {
																			  ?>
																			  <a href="javascript:void(0)" onClick="shopping_cart(<?php echo $detail_product->id_product;?>)"><i class="fa fa-2x fa-cart-plus text-info" aria-hidden="true"></i></a>
                                                                               <a href="javascript:void(0)" onClick="buy_now(<?php echo $detail_product->id_product;?>)"><i class="fa fa-2x fa-shopping-basket  text-danger" aria-hidden="true" style="padding-left:30px;"></i></i></a>
																			  <?php
																		  }
																		  else
																		 	{
																		  ?>
                                                                          <a href="javascript:void(0)" onClick="alert('Xin lỗi! Sản phẩm tạm hết hàng.')"><i class="fa fa-2x fa-cart-plus text-info" aria-hidden="true"></i></a>
                                                                          <?php
																			}
																			?>
                                             </td>
                                            </tr>
				 						</tbody>
				 					</table>
				 				</div>
			 					
			 				</div>
			 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_catalog_detail" >
			 					<p class="text-info">Mô tả chi tiết</p>
			 				</div>
			 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 comment_info_product">
			 					<ul class="nav nav-tabs">
								  <li class="active"><a data-toggle="tab" href="#home">Thông tin sản phẩm</a></li>
								  <li><a data-toggle="tab" href="#danhgia_bl">Đánh giá</a></li>
								
								</ul>

								<div class="tab-content">
								  <div id="home" class="tab-pane fade in active" style="max-height:400px; overflow:scroll;">
								 <?php echo $detail_product->describle_product;?>	
                                 <h3 class="text-uppercase">Nhận xét - phản hồi về sản phẩm</h3>
                                  <?php
                                  	foreach($list_comment_product as $lst_rp)
									{
										?>
                                        <p><i> Họ tên:</i><?php echo $lst_rp->fullname; ?></p>
                                        
                                        <p><i> Email:</i><?php echo $lst_rp->email; ?></p>
                                        
                                        <p><i> Nội dung:</i><?php echo $lst_rp->content_comment; ?></p>
                                        
                                        <p><i> Ngày gửi:</i><?php echo date("d-m-Y",strtotime($lst_rp->date_comment)); ?></p>
                                        <?php
									}
								  ?>									  
								  </div>
                                  
								  <div id="danhgia_bl" class="tab-pane fade">
								 
							  		<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1  col-lg-10 col-lg-offset-1">
								  	
                            	<?php 
										if($_SESSION["info_customer"]["id_customer"]=="")
									{
										echo '<a href="login.php"><p class="text-center"> Vui lòng đăng nhập để thực hiện chức năng này</p></a>';
									}
									else
									{
								?>
								  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="comment_report">
								  		
								  	</div>
								
								    	
								    	<p>Nội dung đánh giá
								    	<textarea name="content_comment" id="content_comment" class="form-control" rows="10"></textarea>
								    	</p>
								    	  
                                         <p>    
								    	<button onclick="comment_product( <?php echo $detail_product->id_product;?>)" class="btn btn-primary"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
								    	</p>
								    <?php
								    }
								    ?>	
							
								  </div>
								  
								  </div>
								 
								</div>
			 				</div>
		 					
		 				</div>
		 				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 top_new_product">
		 					<h4 class="text-center">Sản phẩm yêu thích</h4>
                            <?php 
								foreach($top_like as $lts)
								{
							?>
		 					 <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 list_product_feature">
                               		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 frame_product">
                                       			<div class="affect_product">
	                                       			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 product">
                                                    <div class="link_deltail_product"> <a href='detail_product.php?id_product=<?php echo $lts->id_product;?>'><img src="admin/assert/pattern/plus.png" class="img-responsive" alt="Image" width="50px;">
                                                    
                                                 </div>
                                       				<img src="admin/assert/product/<?php echo $lts->image_product;?>" class="img-responsive" alt="Image">
                                       			</div>
                                       			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
	                                   				<div class="title_product">
		                                   				<a href='detail_product.php?id_product=<?php echo $lts->id_product;?>'><h4 class="text-center text-uppercase"><?php echo $lts->name_product;?></h4></a>
		                                   				<p class="text-center"> Giá trị tạo nên niềm tin. Chất lượng tạo nên sự hài lòng</p>
		                                   			</div>
                                       			</div>
                                   				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                       				<div class="col-xs-6 col-sm-6 col-md-9 col-lg-9 product_price_order">
                                       				<i class="fa fa-usd" aria-hidden="true"></i>
                                       					<?php
                                                        	if($lts->promotion_product==0)
												{
													echo number_format($lts->price_product);
												}
												else
												{
													echo number_format(($lts->price_product)*(1-$lts->promotion_product/100));
												}
														?>
														 VNĐ
                                       				</div>
                                       				<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 product_price_order">	  <a href="javascript:void(0)" onClick="shopping_cart(<?php echo $lts->id_product;?>)"> <i class="fa fa-2x fa-cart-plus text-info" aria-hidden="true"></i></a>
                                       				</div>
                                   				</div>
                                   			  </div>
                           			</div>

                      	 </div>

						<?php
								}
						?>
						
		 	

	 				</div>
	 			</div>		
				 			<!- KET THUC DETAIL SAN PHAM-!>
				 			
				 			<!--  sap xep san pham-->
			 
	 			<div class="container" style="border-top:1px solid">
	 			 <div class="row">
            	<div class="col-md-9">
               		 <h3>
                    Sản phầm đề nghị cho bạn</h3>
	            </div>
	            <div class="col-md-3">
	                <!-- Controls -->
	                <div class="controls pull-right hidden-xs">
	                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
	                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
	                            data-slide="next"></a>
	                </div>
	            </div>
		        </div>
		        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
		            <!-- Wrapper for slides -->
		            <div class="carousel-inner">
		                <div class="item active">
		                    <div class="row">
		                    <?php foreach ($list_product_ca as $lst_pro_ca) {
		                    	if($count_number_product<6)
		                    	{
									if($lst_pro_ca->promotion_product==0)
								{
								?>
		                          <div class="col-sm-2">
		                            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-12 col-lg-12 list_product_feature">
					                                       		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 frame_product">
					                                       			<div class="affect_product">
						                                       			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 product">
					                                                    <div class="link_deltail_product"> <a href='detail_product.php?id_product=<?php echo $lst_pro_ca->id_product;?>'><img src="admin/assert/pattern/plus.png" class="img-responsive" alt="Image" width="50px;"></a>
					                                                    
					                                                 </div>
					                                       				<a href='detail_product.php?id_product=<?php echo $lst_pro_ca->id_product;?>'><img src="admin/assert/product/<?php echo $lst_pro_ca->image_product;?>" class="img-responsive" alt="Image"></a>
					                                       			</div>
					                                       			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						                                   				<div class="title_product">
							                                   				<a href=""><h4 class="text-center text-uppercase"><?php echo $lst_pro_ca->name_product;?></h4></a><?php
							                                   					if($detail_product->catalog_product==4)
							                                   					{
							                                   						?>
							                                   						<p class="text-center"> Luôn bên bạn trên con đường học tập.</p>
							                                   					<?php
							                                   					}
							                                   					else
							                                   					{
							                                   						?>
							                                   						<p class="text-center"> Một cuốn sách hay cho ta một điều tốt, một người bạn tốt cho ta một điều hay.</p>
							                                   						<?php
							                                   					}
							                                   				?>
							                                   			</div>
					                                       			</div>
					                                   				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					                                       				<div class="col-xs-6 col-sm-6 col-md-9 col-lg-9 product_price_order">
					                                       				<i class="fa fa-usd" aria-hidden="true"></i>
					                                       					<?php echo $lst_pro_ca->price_product;?>
					                                       				</div>
					                                       				<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 product_price_order">	      <?php 
																		  if($detail_product->quantity_inventory >0)
																		  {
																			  ?>
																			  <a href="javascript:void(0)" onClick="shopping_cart(<?php echo $detail_product->id_product;?>)"><i class="fa fa-2x fa-cart-plus text-info" aria-hidden="true"></i></a>
																			  <?php
																		  }
																		  else
																		 	{
																		  ?>
                                                                          <a href="javascript:void(0)" onClick="alert('Xin lỗi! Sản phẩm tạm hết hàng.')"><i class="fa fa-2x fa-cart-plus text-info" aria-hidden="true"></i></a>
                                                                          <?php
																			}
																			?>
					                                       				</div>
					                                   				</div>
					                                   			  </div>
					                                   			</div>

					                                      	 </div>

		                        </div>
                                 <?php
													}
												else if($lst_pro_ca->promotion_product!=0)
												{
													
													?>
                                                     <div class="col-sm-2">
		                            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-12 col-lg-12 list_product_feature">
					                                       		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 frame_product">
					                                       			<div class="affect_product">
						                                       			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 product">
					                                                    <div class="link_deltail_product"> <a href='detail_product.php?id_product=<?php echo $lst_pro_ca->id_product;?>'><img src="admin/assert/pattern/plus.png" class="img-responsive" alt="Image" width="50px;"></a>
					                                                    
					                                                 </div>
                                                                      <div id="tag_sale_product">
                                                                        <img src="admin/assert/pattern/sale.png"  width="160px;"/>
                                                                      </div>
					                                       				<a href='detail_product.php?id_product=<?php echo $lst_pro_ca->id_product;?>'><img src="admin/assert/product/<?php echo $lst_pro_ca->image_product;?>" class="img-responsive" alt="Image"></a>
					                                       			</div>
					                                       			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						                                   				<div class="title_product">
							                                   				<a href=""><h4 class="text-center text-uppercase"><?php echo $lst_pro_ca->name_product;?></h4></a><?php
							                                   					if($lst_pro_ca->catalog_product==4)
							                                   					{
							                                   						?>
							                                   						<p class="text-center"> Luôn bên bạn trên con đường học tập.</p>
							                                   					<?php
							                                   					}
							                                   					else
							                                   					{
							                                   						?>
							                                   						<p class="text-center"> Một cuốn sách hay cho ta một điều tốt, một người bạn tốt cho ta một điều hay.</p>
							                                   						<?php
							                                   					}
							                                   				?>
							                                   			</div>
					                                       			</div>
					                                   				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					                                       				<div class="col-xs-6 col-sm-6 col-md-9 col-lg-9 product_price_order" style="margin-top:-30px;">  
                                                                        <i class="fa fa-usd" aria-hidden="true" style="font-size:12px;"> <?php echo number_format(($lst_pro_ca->price_product)*(1-$lst_pro_ca->promotion_product/100));?> VNĐ</i> <span style="text-decoration:line-through; font-size:13px;"><?php echo number_format($lst_pro_ca->price_product);?></span>
					                                       					
					                                       				</div>
					                                       				<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 product_price_order">	
                                                                          <?php 
																		  if($lst_pro_ca->quantity_inventory >0)
																		  {
																			  ?>
																			  <a href="javascript:void(0)" onClick="shopping_cart(<?php echo $lst_pro_ca->id_product;?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
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

					                                      	 </div>

		                        </div>
		                        <?php
												}
								}
								$count_number_product++;
							}
							$count_number_product=0;
		                        ?>
		                        

		                        
		                    </div>
		                </div>
		                 <div class="item">
		                    <div class="row">
		                       <?php foreach ($list_product_ca as $lst_pro_ca) {
		                    	if($count_number_product>=6 && $count_number_product<12 )
		                    	{
		                  			if($lst_pro_ca->promotion_product==0)
								{
								?>
		                          <div class="col-sm-2">
		                            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-12 col-lg-12 list_product_feature">
					                                       		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 frame_product">
					                                       			<div class="affect_product">
						                                       			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 product">
					                                                    <div class="link_deltail_product"> <a href='detail_product.php?id_product=<?php echo $lst_pro_ca->id_product;?>'><img src="admin/assert/pattern/plus.png" class="img-responsive" alt="Image" width="50px;"></a>
					                                                    
					                                                 </div>
					                                       				<a href='detail_product.php?id_product=<?php echo $lst_pro_ca->id_product;?>'><img src="admin/assert/product/<?php echo $lst_pro_ca->image_product;?>" class="img-responsive" alt="Image"></a>
					                                       			</div>
					                                       			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						                                   				<div class="title_product">
							                                   				<a href=""><h4 class="text-center text-uppercase"><?php echo $lst_pro_ca->name_product;?></h4></a><?php
							                                   					if($lst_pro_ca->catalog_product==4)
							                                   					{
							                                   						?>
							                                   						<p class="text-center"> Luôn bên bạn trên con đường học tập.</p>
							                                   					<?php
							                                   					}
							                                   					else
							                                   					{
							                                   						?>
							                                   						<p class="text-center"> Một cuốn sách hay cho ta một điều tốt, một người bạn tốt cho ta một điều hay.</p>
							                                   						<?php
							                                   					}
							                                   				?>
							                                   			</div>
					                                       			</div>
					                                   				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					                                       				<div class="col-xs-6 col-sm-6 col-md-9 col-lg-9 product_price_order">
					                                       				<i class="fa fa-usd" aria-hidden="true"></i>
					                                       					<?php echo $lst_pro_ca->price_product;?>
					                                       				</div>
					                                       				<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 product_price_order">	  <?php 
																		  if($lst_pro_ca->quantity_inventory >0)
																		  {
																			  ?>
																			  <a href="javascript:void(0)" onClick="shopping_cart(<?php echo $lst_pro_ca->id_product;?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
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

					                                      	 </div>

		                        </div>
                                 <?php
													}
												else if($lst_pro_ca->promotion_product!=0)
												{
													
													?>
                                                     <div class="col-sm-2">
		                            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-12 col-lg-12 list_product_feature">
					                                       		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 frame_product">
					                                       			<div class="affect_product">
						                                       			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 product">
					                                                    <div class="link_deltail_product"> <a href='detail_product.php?id_product=<?php echo $lst_pro_ca->id_product;?>'><img src="admin/assert/pattern/plus.png" class="img-responsive" alt="Image" width="50px;"></a>
					                                                    
					                                                 </div>
                                                                      <div id="tag_sale_product">
                                                                        <img src="admin/assert/pattern/sale.png"  width="160px;"/>
                                                                      </div>
					                                       				<a href='detail_product.php?id_product=<?php echo $lst_pro_ca->id_product;?>'><img src="admin/assert/product/<?php echo $lst_pro_ca->image_product;?>" class="img-responsive" alt="Image"></a>
					                                       			</div>
					                                       			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						                                   				<div class="title_product">
							                                   				<a href=""><h4 class="text-center text-uppercase"><?php echo $lst_pro_ca->name_product;?></h4></a><?php
							                                   					if($detail_product->catalog_product==4)
							                                   					{
							                                   						?>
							                                   						<p class="text-center"> Luôn bên bạn trên con đường học tập.</p>
							                                   					<?php
							                                   					}
							                                   					else
							                                   					{
							                                   						?>
							                                   						<p class="text-center"> Một cuốn sách hay cho ta một điều tốt, một người bạn tốt cho ta một điều hay.</p>
							                                   						<?php
							                                   					}
							                                   				?>
							                                   			</div>
					                                       			</div>
					                                   				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					                                       				<div class="col-xs-6 col-sm-6 col-md-9 col-lg-9 product_price_order">  
                                                                         <i class="fa fa-usd" aria-hidden="true" style="font-size:12px;"> <?php echo number_format(($pd->price_product)*(1-$pd->promotion_product/100));?> VNĐ</i> <span style="text-decoration:line-through; font-size:13px;"><?php echo number_format($pd->price_product);?></span>
					                                       					
					                                       				</div>
					                                       				<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 product_price_order">	<a href="javascript:void(0)" onClick="shopping_cart(<?php echo $lst_pro_ca->id_product;?>)"> <i class="fa fa-cart-plus text-info" aria-hidden="true"></i></a>
					                                       				</div>
					                                   				</div>
					                                   			  </div>
					                                   			</div>

					                                      	 </div>

		                        </div>
		                        <?php
												}
								}
								$count_number_product++;
							}
							
		                        ?>
		                        

		                    </div>
		                </div>
		               

		               <!-- het danh sach -->
		            </div>
		        </div>
			 		 	<!-- general_content -->
		 			</div>
 			</div>
 			<!-- Bat dau san pham cung loai -->
 		
 	</div>	
