
<?php
	 $list_supplier=$ad_select->query_list_producer_publisher();
	 $list_catalog=$ad_select->query_list_catalog();
    $lst_product_pagination=$ad_select->query_list_product();
	
    
?>
 <!-- /.row -->
 <div  id="cart">
 </div>
 			
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <a class="btn btn-warning" href='sub_add_product.php'>Thêm sản phẩm mới</a>
                       
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 hidden-xs hidden-ms">
                   
                    </div>
                    <div id="content_find" style="margin-top:20px;">
                    </div>
                    <div id="content_list_product">
                    <div class="col-lg-12">
                        <h3 class="text-center text-succes">DANH SÁCH SẢN PHẨM</h3>
                        <div class="table-responsive">
                             <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><p class="text-center">MSP</p></th>
                                        <th><p class="text-center">Hình ảnh</p></th>
                                        <th><p class="text-center">Tên sản phẩm</p></th>
                                        <th><p class="text-center">Giá nhập sản phẩm</p></th>
                                        <th><p class="text-center">Giá bán</p></th>
                                        <th><p class="text-center">Số lượng tồn</p></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
								
										foreach($lst_product_pagination as $lst_product)
										{
											
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $lst_product->id_product;?></td>
                                        
                                        <td>  <img src="../images/product/<?php echo $lst_product->image_product;?>" class="img-responsive text-center" alt="Image" width="80px">
                                       </td>
                                       <td><?php echo $lst_product->name_product;?></td>
                                       <?php
                                       	$info_product_import=$ad_select->price_one_product_import($lst_product->id_product);
										
									   ?>
                                       
                                        <td width="120px"><?php echo number_format(	$info_product_import->import_price);?> VNĐ</td>
                                 
                                        <td width="120px"><?php echo number_format($lst_product->price_product);?> VNĐ</td>
                                 
                                       <td class="text-center"><?php echo $lst_product->quantity_inventory;?></td>
                                    
                                       <td>
                                        <a  data-toggle="modal" href='#info_pro<?php echo $lst_product->id_product;?>'> <i class="fa fa-info-circle text-info" aria-hidden="true"></i></a>
                                          
                                            <div class="modal fade" id="info_pro<?php echo $lst_product->id_product;?>">
                                                <div class="modal-dialog" style="width:90%">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h2 class="modal-title text-center text-danger"> THÔNG TIN SẢN PHẨM</h2>
                                                        </div>
                                                        <div class="modal-body">
                                                        <?php
                                                        echo $lst_product->id_product;
                                                        $info_product=$ad_select->query_one_product($lst_product->id_product);
														?>
                                                            <div class="col-xs-12 col-lg-8 col-lg-offset-2">
                                                                 <table class="table table-striped table-hover" style="margin-top:30px;">
                                                                
                                                                <tbody>
                                                                    <tr width="40%">
                                                                        <td colspan="2"><h3 class="text-center text-info"><?php echo $info_product->name_product;?></h3></td>
                                                                    </tr>
                                                                     <tr style="text-align:center;">
                                                                        <td colspan="2" > <img src="assert/product/<?php echo $info_product->image_product;?>" class="img-responsive text-center" alt="Image" width="80px" style="margin:auto;"></td>
                                                                      
                                                                    </tr>
                                                                     <tr>
                                                                        <td><p class="text-center"> Giá bán:</p></td>
                                                                        <td><?php echo $info_product->price_product;?>/<?php echo $info_product->unit;?></td>
                                                                    </tr>
                                                                    
                                                                     <tr>
                                                                        <td><p class="text-center">Nhà sản xuất/ xuất bản</p></td>
                                                                        <td><?php echo $info_product->name_producer_publisher;?></td>
                                                                    </tr>
                                                                    
                                                                     <tr>
                                                                        <td><p class="text-center">Danh mục</p></td>
                                                                        <td><?php echo $info_product->sub_catalog;?></td>
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
                                        <td>
                                        <a  data-toggle="modal" href='#upda_pro<?php echo $lst_product->id_product;?>'> <i class="fa fa-pencil-square-o text-danger" aria-hidden="true"></i></a>
                                            <div class="modal fade" id="upda_pro<?php echo $lst_product->id_product;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title text-center text-warning">CẬP NHẬT THÔNG TIN</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                              <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 form_info_input">
                                                                   	<form action="ad_manipulation/up_product.php?id_product=<?php echo $lst_product->id_product;?>" method="POST" role="form" enctype="multipart/form-data">
						 					
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
						 						<div class="form-group">
						 							<div class="col-lg-5">
						 								<label for="pd_name">Tên sản phẩm:</label>
						 							</div>
						 							<div class="col-lg-7">
						 						
						 									<input type="text" name="txt_pd_name" class="form-control" id="pd_name"  required value="<?php echo $info_product->name_product;?>">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
						 						<div class="form-group">
						 							<div class="col-lg-5">
						 								<label for="pd_price">Đơn giá sản phẩm:</label>
						 							</div>
						 							<div class="col-lg-7">
						 						
						 									<input type="number" name="txt_pd_price" min="0" class="form-control" id="pd_price"  required value="<?php echo $info_product->price_product;?>" title="Đơn giá không thể nhỏ hơn 0">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
                                            
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
						 						<div class="form-group">
						 							<div class="col-lg-5">
						 								<label for="pd_price_pro">Khuyến mãi:</label>
						 							</div>
						 							<div class="col-lg-7">
						 						
						 									<input type="number" name="txt_pd_promotion" class="form-control" id="pd_price_pro"  required value="<?php echo $info_product->promotion_product;?>" max="100" min="0" pattern=".{0,100}">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					
						 					
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-5">
						 								<label for="unit">Đơn vị tính:</label>
						 							</div>
						 							<div class="col-lg-7">
						 						
						 									<input type="text" name="txt_unit" class="form-control" id="unit"  required value="<?php echo $info_product->unit;?>">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					
				 							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							
						 							<div class="col-lg-5">
						 								<label for="supplier">Nhà cung cấp:</label>
						 							</div>
						 							<div class="col-lg-7">
						 						
						 									<select name="supplier" id="input" class="form-control">
                                                             <option value="">-- Vui lòng chọn nhà sản xuất/ xuất bản nếu muốn cập nhật--</option>
                                                            <?php foreach( $list_supplier as $list_sp)
															{
																if($list_sp->status==0)
																{
															?>
                                                            	 <option value="<?php echo $list_sp->id_producer_publisher?>">-- <?php echo $list_sp->name_producer_publisher?> --</option>
															<?php
																}
                                                            }
                                                            ?>                                                            </select>
						 							</div>
						 						
						 						</div>
						 						
						 					
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							
						 							<div class="col-lg-5">
						 								<label for="catalog">Danh mục sản phẩm:</label>
						 							</div>
						 							<div class="col-lg-7">
						 						
						 									<select name="catalog" id="input" class="form-control">
                                                             <option value="">-- Chọn danh mục bạn muốn cập nhật cho sản phẩm --</option>
                                                      	   <?php foreach( $list_catalog as $list_cl)
															{
																if($list_cl->status==0)
																{
															?>
                                                            	 <option value="<?php echo $list_cl->id_catalog_product?>">-- <?php echo $list_cl->catalog_name?> --</option>
															<?php
																}
                                                            }
                                                            ?>        
                                                            </select>
						 							</div>
						 						
						 						</div>
						 						
						 					
						 					
						 					</div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-5">
						 								<label for="describle">Mô tả:</label>
						 							</div>
						 							<div class="col-lg-7">
						 						
						 									<textarea type="text" name="txt_describle" class="form-control" id="describle<?php echo $lst_product->id_product;?>"  required><?php echo $info_product->describle_product;?></textarea>
                                                              <script>    CKEDITOR.replace( 'describle<?php echo $lst_product->id_product;?>');</script>
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							
						 							<div class="col-lg-5">
						 								<label for="imgage">Hình đại diện:</label>
						 							</div>
						 							<div class="col-lg-7">
						 						
						 									<input type="file" name="fl_imgage" class="form-control" id="imgage">
						 							</div>
						 						
						 						</div>
						 						
						 					
						 					
						 					</div>
						 				

						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group" style="text-align:center;">
						 								<button type="submit" name="btn_update_product" class="btn btn-primary text-center">Cập nhật sản phẩm</button>

						 						</div>
						 					
						 					</div>	
						 						
						 					
						 					</form>


                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       </td>
                                        
											  <?php 
                                            if($lst_product->status_product==0)
                                            {
                                           ?>
                                             <td width="60px"><a href="javascript:void(0)" onClick="delete_product(<?php echo $lst_product->id_product;?>,1)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                             <?php
                                            }
                                            else if($lst_product->status_product!=0)
                                            {
                                            ?>
                                            <td width="60px"><a href="javascript:void(0)" onClick="recyecle_product(<?php echo $lst_product->id_product;?>,0)"><i class="fa fa-recycle" aria-hidden="true"></i></a></td>
                                            <?php
                                            }
                                             ?>
                                      
                                 
                                       
                                    </tr>
                                    <?php 
									}
									?>
                                </tbody>
                            </table>
                        </div>
                         <div id="pagination_page">
							<?php
                            
                                echo $pagination;
                            ?>
                        </div>
                    </div>
                   </div>
                </div>
                