<?php
	$list_supplier=$data_select->query_list_producer_publisher();
	$list_bill_import=$data_select->list_import_bill();
	//print_r($list_bill_import);
	$count=count($list_bill_import);
	$limit=10;
	$posision=$ad_page->findStart($limit);
	$pag=$ad_page->findPages($count,$limit);
	$current=$_GET["page"];
	$pagination=$ad_page->pageList($current,$pag);
	$lst_bill_import_pagination=$data_select->list_import_bill_page($posision,$limit);

	
	//print_r($lst_custom_pagination);
?>
<!-- /.row -->
                 <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							
						 							<div class="col-lg-3">
						 								<label for="supplier">Chọn nhà sản xuất và xuất bản:</label>
						 							</div>
						 							<div class="col-lg-5">
						 						
						 									<select name="supplier" id="provicer_publisher" class="form-control" onchange="provicer_publisher(this.value)">
                                                             <option value="">-- Vui lòng chọn nhà sản xuất/ xuất bản --</option>
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
                                 					<div class="col-lg-3">
						 								<a href="ad_manipulation/reset_import_bill.php"><i class="fa fa-2x fa-refresh" aria-hidden="true" >Tạo lại</i> </a>
						 							</div>
                                                    <div class="col-lg-12 text-center" id="report_pro_pub" style="margin-top:10px;">
                                   
                                                    </div>
						 						
						 						</div>
						 						
						 					
						 					
						 					</div>
                          
                    
                    <div class="col-lg-12">
                        <h4 class="text-center text-uppercase">Danh phiếu đã nhập</h4>
                        <div class="table-responsive">
                              <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="150px"><p>Mã phiếu nhập</p></th>
                                        <th width="200px"><p>Ngày nhập</p></th>
                                        <th><p>Nhân viên phụ trách </p></th>
                                        <th><p>Tổng tiền </p></th>
                                      
                                         <th colspan="5"><p class="text-center">Tác vụ</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                	foreach($lst_bill_import_pagination as $lst_im_bill)
									{
								?>
                                    <tr>
                                        <td><?php echo "$lst_im_bill->id_import_bill"; ?></td>
                                        <td><?php echo date("d-m-Y",strtotime($lst_im_bill->date_import)); ?></td>
                                        <td><?php echo "$lst_im_bill->fullname"; ?></td>
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
                                                            <p ><i class="fa fa-2x fa-address-book-o" aria-hidden="true"></i>   Họ tên nhân viên quản lý: <?php echo "$lst_im_bill->fullname"; ?></p>
                                                            <p ><i class="fa fa-2x fa-envelope-o" aria-hidden="true"> </i>   Email:  <?php echo $lst_im_bill->email;?></p>
                                                            <p><i class="fa fa-3x fa-mobile" aria-hidden="true"></i>    Số điện thoại:<?php echo $lst_im_bill->phone_number;?></p>
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
                                                         <th>Đơn giá nhập</th>
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
                                                        <td><img src="assert/product/<?php echo $lst_one_import->image_product;?>" class="img-responsive" alt="Image" width="60px"></td>
                                                        <td><?php echo $lst_one_import->quantity_import;?></td>
                                                        <td><?php echo number_format($lst_one_import->import_price);?> VNĐ</td>
                                                        <td><?php echo number_format($lst_one_import->import_price*$lst_one_import->quantity_import)."VNĐ";?></td>
                                                      </tr>
                                                    <?php
                                                     }
                                                     ?>
                                                     <tr>
                                                     <td colspan="5"></td>
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
                                       <form method="POST" action="sub_import_bill.php?id_import_bill=<?php echo $lst_im_bill->id_import_bill; ?>">
                                  		<td>
                                          <?php
                            	if($lst_im_bill->status_import_bill==0)
								{
									?>
									 <button type="submit" name="update_import_bill" style="background-color:transparent; border:0px;"><i  class="fa fa-wrench" aria-hidden="true" ></i>
								<?php
                                }
								else
								{
									?>
									<i  class="fa fa-wrench text-info" aria-hidden="true" ></i>
								<?php
                                }
							?>
                                  </td>
                          			</form>
                           <td> 
                                 <?php
                            	if($lst_im_bill->status_import_bill==0)
								{
									?>
									 <a onclick="confirm_succes_import(<?php echo $lst_im_bill->id_import_bill;?>)"> <i class="fa fa-check-square-o text-danger" aria-hidden="true"></i></a>
								<?php
                                }
								else
								{
									?>
									 <i class="fa fa-check-square-o text-success" aria-hidden="true"></i>
								<?php
                                }
                           ?>
                           </td>
                            <td> 
                             <?php
                            	if($lst_im_bill->status_import_bill==0)
								{
									?>
									   <a onclick="delete_import(<?php echo $lst_im_bill->id_import_bill;?>)"> <i class="fa fa-trash" aria-hidden="true"></i></a>
								<?php
                                }
								else
								{
									?>
									<i class="fa fa-trash text-success" aria-hidden="true"></i>
								<?php
                                }
							?>
                            
                            
                         </td>
                            <td>
                            <?php
                            	if($lst_im_bill->status_import_bill==0)
								{
									
									echo "<i class='fa fa-circle text-danger' aria-hidden='true' >Chờ xử lý</i>";
								}
								else
								{
									echo "<i class='fa fa-circle text-success' aria-hidden='true' >Hoàn tất</i>";
								}
							?>
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