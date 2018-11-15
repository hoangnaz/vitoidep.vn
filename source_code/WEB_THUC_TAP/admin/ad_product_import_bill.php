<?php

	 $list_supplier=$ad_select->query_list_producer_publisher();

	 $list_catalog=$ad_select->query_list_catalog();

	$lst_product=$ad_select->query_list_product_provicer_publisher($_SESSION['pro_pu']);
	$count=count($lst_product);
	$limit=6;
	$posision=$ad_page->findStart($limit);
	$pag=$ad_page->findPages($count,$limit);
	$current=$_GET["page"];
	$pagination=$ad_page->pageList($current,$pag);
	$lst_product_pagination=$ad_select->query_list_provicer_publisher_page($_SESSION['pro_pu'],$posision,$limit);
	//print_r($lst_custom_pagination);
?>
 <!-- /.row -->
<div  id="cart">
 </div>
 			
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <a class="btn btn-warning" href='sub_import_bill.php'>Tạo phiếu nhập</a>
                       
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <a class="btn btn-success" href='mn_bill_import.php'>Quay lại nhà cung cấp</a>
                       
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 hidden-xs hidden-ms">
                    <div class="col-md-4 col-lg-8">
                    	 <input type="text"  class="form-control" value="" id="info_find" placeholder="Nhập sản phẩm muốn tìm">
                    </div>
                       <div class="col-md-4 col-lg-4">
                       <a><button class="btn-info" onclick="find_product_import()" ><p>Tìm sản phẩm</p></button></a>
                       </div>
                    </div>
                    <div id="content_find" style="margin-top:20px;">
                    </div>
                    <div id="content_list_product">
                    <div class="col-lg-12">
                        <h3 class="text-center text-succes">DANH SÁCH SẢN PHẨM</h3>
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
                                        
                                        <th colspan="2"><p class="text-center">Tác vụ</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
								
										foreach($lst_product_pagination as $lst_product)
										{
											
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $lst_product->id_product;?></td>
                                        
                                        <td>  <img src="assert/product/<?php echo $lst_product->image_product;?>" class="img-responsive text-center" alt="Image" width="80px">
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
                         <div id="pagination_page">
							<?php
                            
                                echo $pagination;
                            ?>
                        </div>
                    </div>
                   </div>
                </div>
                