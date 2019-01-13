<?php

	$list_bill_import=$data_select->list_import_bill_follow_staff($_GET["id_staff"]);
	//echo $_GET["id_staff"];
	$count=count($list_bill_import);
	$limit=10;
	$posision=$ad_page->findStart($limit);
	$pag=$ad_page->findPages($count,$limit);
	$current=$_GET["page"];
	$pagination=$ad_page->pageList($current,$pag);
	$lst_bill_import_pagination=$data_select->list_import_bill_follow_staff_page($_GET["id_staff"],$posision,$limit);
	//print_r($lst_bill_import_pagination);
	if(sizeof($lst_bill_import_pagination)==0)
	{
		echo '<p class="text-center">Hiện tại bạn không phiếu nhập nào trong danh mục quản lý</p>';
	}
	else
	{
	
	//print_r($lst_custom_pagination);
?>
<!-- /.row -->
                 <div class="row">
                
                          
                    
                    <div class="col-lg-12">
                        <h4 class="text-center text-uppercase">DANH SÁCH PHIẾU NHẬP</h4>
                        <div class="table-responsive">
                              <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th width="150px"><p>Mã phiếu nhập</p></th>
                                        <th width="200px"><p>Ngày nhập</p></th>
                                        <th><p>Nhà cung cấp </p></th>
                                        <th><p>Tổng tiền </p></th>
                                      
                                         <th><p class="text-center">Tác vụ</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                	foreach($lst_bill_import_pagination as $lst_im_bill)
									{
								?>
                                    <tr>
                                        <td><?php echo "$lst_im_bill->id_import_bill"; ?></td>
                                        <td><?php echo "$lst_im_bill->date_import"; ?></td>
                                        <td><?php echo "$lst_im_bill->name_producer_publisher"; ?></td>
                                         <td><?php echo number_format($lst_im_bill->total_money); ?> VNĐ</td>
                                          <td>
                                         <a  data-toggle="modal" href='#import-ib<?php echo $lst_im_bill->id_import_bill; ?>'><i class="fa fa-info-circle text-info" aria-hidden="true"></i></a>
                                         <div class="modal fade" id="import-ib<?php echo $lst_im_bill->id_import_bill; ?>">
                                             <div class="modal-dialog" width="80%">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                         <h4 class="modal-title text-uppercase text-center">Chi tiết phiếu nhập <?php echo "$lst_im_bill->id_import_bill"; ?></h4>
                                                     </div>
                                                       <div class="modal-body">
                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info_detail_product">
                                                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 info_account">
                                                            
                                                            <div class="col-xs-12 col-sm-12  col-lg-6 col-lg-offset-3">
                                                      
                                                            <p ><i class="fa fa-2x fa-map-marker" aria-hidden="true"></i>    Nhà sản xuất / nhà xuất bản cung cấp sản phẩm : <?php echo $lst_im_bill->name_producer_publisher;?></p>
                                                       
                                                          </div>
                                                    </div>
                                                  </div>
                                                 <?php
                                                         	
													$info_detail=$data_select->detail_import_bill($lst_im_bill->id_import_bill);		
													?>
                                                    
                                                 <table class="table table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Mã sản phẩm</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Hình ảnh</th>
                                                        <th>Số lượng</th>
                                                        <th>Thành tiền</th>
                                                        
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ( $info_detail as $lst_one_import)
                                                     { 
                                                     ?>
                                                       <tr>
                                                        <td><?php echo $lst_one_import->id_product;?></td>
                                                        <td><?php echo $lst_one_import->name_product;?></td>
                                                        <td><img src="../images/product/<?php echo $lst_one_import->image_product;?>" class="img-responsive" alt="Image" width="60px"></td>
                                                        <td><?php echo $lst_one_import->quantity_import;?></td>
                                                        <td><?php echo number_format($lst_one_import->import_price*$lst_one_import->quantity_import)."VNĐ";?></td>
                                                      </tr>
                                                    <?php
                                                     }
                                                     ?>
                                                     <tr>
                                                     <td colspan="4"></td>
                                                     	<td colspan="1">Tổng giá trị đơn hàng:<?php echo number_format($lst_im_bill->total_money).'VNĐ'; ?></td>
                                                     </tr>
                                                     
                                                    </tbody>
                                                  </table>
                                                
                                                </div>
                                                         
                                                     <div class="modal-footer">
                                                         <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                      
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                       </td>
                           
                                    </tr>
                                    <?php
									}
									?>
                                 
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-8 col-lg-offset-2" style="text-align:center;">
                        <?php
                        	echo $pagination;
						?>
                    </div>
                   
                </div>
        <?php
	}
		?>        