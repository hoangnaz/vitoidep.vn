<?php
	
	$lst_supplier=$ad_select->query_list_producer_publisher();
	$count=count($lst_supplier);
	$limit=5;
	$posision=$ad_page->findStart($limit);
	$pag=$ad_page->findPages($count,$limit);
	$current=$_GET["page"];
	$pagination=$ad_page->pageList($current,$pag);
	$lst_supplier_pagination=$ad_select->query_list_producer_publisher_page($posision,$limit);

?>
<!-- /.row -->
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <a class="btn btn-success"  href='sub_add_supplier.php'>Thêm nhà cung cấp, sản xuất</a>
                      
                    </div>
                    <div class="col-lg-12">
                        <h4 class="text-uppercase text-center text-primary">Danh sách nhà cung cấp, sản xuất</h4>
                        <div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th><p class="text-center">Mã nhà cung cấp, sản xuất</p></th>
                                        <th><p class="text-center">Tên nhà cung cấp, sản xuất</p></th>
                                        <th><p class="text-center">Địa chỉ</p></th>

                                        <th colspan="3"><p class="text-center">Tác vụ</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php 
										foreach($lst_supplier_pagination as $lst_producer_publisher)
										{
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $lst_producer_publisher->id_producer_publisher;?></td>
                                        <td><?php echo $lst_producer_publisher->name_producer_publisher;?></td>
                                        <td><?php echo $lst_producer_publisher->producer_publisher_address;?></td>
                                        <td>
                                        <a  data-toggle="modal" href='#producer_publisher-id<?php echo $lst_producer_publisher->id_producer_publisher;?>'> <i class="fa fa-info-circle text-info" aria-hidden="true"></i></a>
                                            <div class="modal fade" id="producer_publisher-id<?php echo $lst_producer_publisher->id_producer_publisher;?>" tabindex="-1">
                                                <div class="modal-dialog" style="width:60%">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h2 class="modal-title text-center text-danger"> THÔNG TIN NHÀ SẢN XUẤT, CUNG CẤP</h2>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-xs-12 col-lg-12 ">
                                                                 <table class="table table-striped table-hover" style="margin-top:30px;">
                                                                
                                                                <tbody>
                                                                    <tr width="40%">
                                                                        <td colspan="2"><h3 class="text-center text-info"><?php echo $lst_producer_publisher->name_producer_publisher;?></h3></td>
                                                                    </tr>
                                                                    
                                                                     <tr>
                                                                        <td  width="150px"><p class="text-center" > Email</p></td>
                                                                        <td><?php echo $lst_producer_publisher->producer_publisher_email;?></td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td width="150px"><p class="text-center" > Mô tả</p></td>
                                                                      <td><?php echo $lst_producer_publisher->producer_publisher_describle;?></td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td width="150px"><p class="text-center">Địa chỉ</p></td>
                                                                        <td><?php echo $lst_producer_publisher->producer_publisher_address;?></td>
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
                                        <a  data-toggle="modal" href='#supperlier<?php echo $lst_producer_publisher->id_producer_publisher;?>'> <i class="fa fa-pencil-square-o text-danger" aria-hidden="true"></i></a>
                                            <div class="modal fade" id="supperlier<?php echo $lst_producer_publisher->id_producer_publisher;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title text-center text-warning">CẬP NHẬT NHÀ SẢN XUẤT, CUNG CẤP</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 form_info_input">
                                                                    <form action="ad_manipulation/up_supplier.php?id_supplier=<?php echo $lst_producer_publisher->id_producer_publisher;?>" method="POST" role="form" enctype="multipart/form-data">
                                                                    
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
                                                                        <div class="form-group">
                                                                            <div class="col-lg-3">
                                                                                <label for="supplier_name">Tên nhà sản xuất, cung cấp:</label>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                        
                                                                                    <input type="text" name="txt_supplier_name" class="form-control" id="supplier_name"  required value="<?php echo $lst_producer_publisher->name_producer_publisher;?>">
                                                                            </div>
                                                                        
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="form-group">
                                                                            <div class="col-lg-3">
                                                                                <label for="describle_supplier">Mô tả:</label>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                                        <textarea name="txt_describle_supplier" class="form-control" id="txt_describle_supplier<?php echo $lst_producer_publisher->id_producer_publisher;?>"  required><?php echo $lst_producer_publisher->producer_publisher_describle;?></textarea>
                                                                                                                                                                                         <script>    CKEDITOR.replace( 'txt_describle_supplier<?php echo $lst_producer_publisher->id_producer_publisher;?>' );</script>
    
                                                                            </div>
                                                                        
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="form-group">
                                                                            <div class="col-lg-3">
                                                                                <label for="address_supplier">Địa chỉ:</label>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                        
                                                                                    <textarea name="txt_address_supplier" class="form-control" id="address_supplier"  required><?php echo $lst_producer_publisher->producer_publisher_address;?></textarea>
                                                                            </div>
                                                                        
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="form-group">
                                                                            <div class="col-lg-3">
                                                                                <label for="email_supplie">Email:</label>
                                                                            </div>
                                                                            <div class="col-lg-9">
                                                                        
                                                                                    <input type="email" name="txt_email_supplier" class="form-control" id="email_supplie"  required value="<?php echo $lst_producer_publisher->producer_publisher_email;?>">
                                                                            </div>
                                                                        
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                

                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                        <div class="form-group" style="text-align:center;">
                                                                                <button type="submit" name="btn_upda_supplier" class="btn btn-primary text-center">Cập nhật cung cấp</button>

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
									   	if($lst_producer_publisher->status==0)
										{
									   ?>
                                         <td width="60px"><a href="javascript:void(0)" onClick="delete_supplier('<?php echo $lst_producer_publisher->id_producer_publisher;?>',1)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                         <?php
										}
										else if($lst_producer_publisher->status!=0)
										{
										?>
                                        <td width="60px"><a href="javascript:void(0)" onClick="recyecle_supplier('<?php echo $lst_producer_publisher->id_producer_publisher;?>',0)"><i class="fa fa-recycle" aria-hidden="true"></i></a></td>
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