<?php
	session_start();
	error_reporting(0);
 include("../database/select_data.php");
 $data=new select_data(); 
 $lst_product_find=$data->query_list_search_product_provicer_publisher($_POST['content'],$_SESSION['pro_pu']);
 if(sizeof($lst_product_find)==0)
 {
	 echo '<h3 class="text-center" style="margin-top:60px;">Rất tiếc, không có sản phẩm phù hợp.</h3>';
 }
 else
 {
 
echo '<h3 class="text-center" style="margin-top:60px;">DANH SÁCH SẢN PHẨM TÌM KIẾM</h3>';
 ?>
<div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th><p class="text-center">MSP</p></th>
                                        <th><p class="text-center">Hình ảnh</p></th>
                                        <th><p class="text-center">Tên sản phẩm</p></th>
                                        <th><p class="text-center">Giá nhập sản phẩm</p></th>
                                        <th><p class="text-center">Giá bán</p></th>
                                        <th><p class="text-center">Số lượng tồn</p></th>
                                        
                                        <th colspan="5"><p class="text-center">Tác vụ</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
								
										foreach($lst_product_find as $lst_product)
										{
											
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $lst_product->id_product;?></td>
                                        
                                        <td>  <img src="../images/product/<?php echo $lst_product->image_product;?>" class="img-responsive text-center" alt="Image" width="80px">
                                       </td>
                                       <td><?php echo $lst_product->name_product;?></td>
                                       <?php
                                       	$info_product_import=$data->price_one_product_import($lst_product->id_product);
										
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
                                                        $info_product=$data->query_one_product($lst_product->id_product);
														?>
                                                            <div class="col-xs-12 col-lg-8 col-lg-offset-2">
                                                                 <table class="table table-striped table-hover" style="margin-top:30px;">
                                                                
                                                                <tbody>
                                                                    <tr width="40%">
                                                                        <td colspan="2"><h3 class="text-center text-info"><?php echo $info_product->name_product;?></h3></td>
                                                                    </tr>
                                                                     <tr style="text-align:center;">
                                                                        <td colspan="2" > <img src="../images/product/<?php echo $info_product->image_product;?>" class="img-responsive text-center" alt="Image" width="80px" style="margin:auto;"></td>
                                                                      
                                                                    </tr>
                                                                     <tr>
                                                                        <td><p class="text-center"> Giá bán:</p></td>
                                                                        <td><?php echo $info_product->price_product;?>/<?php echo $info_product->unit;?></td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td><p class="text-center">Tác giả</p></td>
                                                                        <td><?php echo $info_product->author_name;?></td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td><p class="text-center">Nhà sản xuất/ xuất bản</p></td>
                                                                        <td><?php echo $info_product->name_producer_publisher;?></td>
                                                                    </tr>
                                                                    
                                                                     <tr>
                                                                        <td><p class="text-center">Danh mục</p></td>
                                                                        <td><?php echo $info_product->catalog_name;?></td>
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
                                        
                                     
                                         <td><a href="javascript:void(0)" onclick="ajax_inport_order(<?php echo $lst_product->id_product;?>)"><i class="fa fa-plus" aria-hidden="true" class="text-info"></i></a></td>
                                       
                                    </tr>
                                    <?php 
									}
									?>
                                </tbody>
                            </table>
                        </div>
                       	 <?php
				 }
		?>