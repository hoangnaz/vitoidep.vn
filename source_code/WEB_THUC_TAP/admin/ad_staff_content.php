<?php
	
    $lst_staff=$ad_select->query_list_staff();
    
	$count=count($lst_staff);
	$limit=10;
	$posision=$ad_page->findStart($limit);
	$pag=$ad_page->findPages($count,$limit);
	$current=$_GET["page"];
	$pagination=$ad_page->pageList($current,$pag);
	$lst_staff_pagination=$ad_select->query_list_staff_page($posision,$limit);
  $today = date('Y-m-d');
  $year = strtotime(date("Y-m-d", strtotime($today)) . " -10 year");
  $year = strftime("%Y-%m-%d", $year);                          
?> 

 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <a class="btn btn-success"  href='sub_sign_up_staff.php'>Thêm nhân viên mới</a>   
                    </div>
                    <div class="col-lg-12">
                      <h4 class="text-uppercase text-center text-primary">Danh sách nhân viên và quản trị viên</h4>
                        <div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th><p class="text-center">Mã nhân viên</p></th>
                                        <th><p class="text-center">Họ và tên</p></th>
                                        <th><p class="text-center">Email</p></th>
                                        <th><p class="text-center">Số điện thoai</p></th>
                                        <th><p class="text-center">Chức vụ</p></th>
                                        <th colspan="3"><p class="text-center">Tác vụ</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
										foreach($lst_staff_pagination as $lst_staff)
										{
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $lst_staff->id_staff;?></td>
                                        <td><?php echo $lst_staff->fullname;?></td>
                                        <td><?php echo $lst_staff->email;?></td>
                                        <td class="text-center">0<?php echo $lst_staff->phone_number;?></td>
                                        <td>
                                        <?php if($lst_staff->staff_role==2)
                                        {
                                        echo "Nhân viên bán hàng và giao hàng";
                                        }
                                        else
                                        {
											echo "Quản trị viên cấp cao";
                                        }
									?>
                                        </td>
                                      
                                      
                                       <td>
                                        <a  data-toggle="modal" href='#staff-id<?php echo $lst_staff->id_staff;?>'> <i class="fa fa-info-circle text-info" aria-hidden="true"></i></a>
                                            <div class="modal fade" id="staff-id<?php echo $lst_staff->id_staff;?>">
                                                <div class="modal-dialog" style="width:90%">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h2 class="modal-title text-center text-danger"> THÔNG TIN NHÂN VIÊN</h2>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-xs-12 col-lg-8 col-lg-offset-2">
                                                                 <table class="table table-striped table-hover" style="margin-top:30px;">
                                                                
                                                                <tbody>
                                                                    <tr width="40%">
                                                                        <td colspan="2"><h3 class="text-center text-info"><?php echo $lst_staff->fullname;?></h3></td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td colspan="2" id="img_customer_detail"> <img src="assert/pattern/<?php if( $lst_staff->staff_role==1)
																		{
																			echo "female.png"; 
																		}
																		
																		else
																		{
																			echo "male.png"; 
																		}
																		?>" class="img-responsive text-center" alt="Image"></td>
                                                                      
                                                                    </tr>
                                                                     <tr>
                                                                        <td><p class="text-center"> Email</p></td>
                                                                        <td><?php echo $lst_staff->email;?></td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td><p class="text-center"> Số điện thoại</p></td>
                                                                        <td><?php echo $lst_staff->phone_number;?></td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td><p class="text-center">Quê quán</p></td>
                                                                        <td><?php echo $lst_staff->address;?></td>
                                                                    </tr>
                                                                    
                                                                     <tr>
                                                                        <td><p class="text-center">Chức vụ</p></td>
                                                                        <td> <?php if($lst_staff->staff_role==1)
																			{
																			echo "Nhân viên bán hàng và giao hàng";
																			}
																			else
																			{
																				echo "Quản trị viên cấp cao";
																			}
																		?></td>
                                                                    </tr>
                                                                        <tr>
                                                                        <td><a href="mn_member_import_bill_detail.php?id_staff=<?php echo $lst_staff->id_staff;?>">Danh sách phiếu nhập quản lý</a></td>
                                                                        <td> <a href="mn_member_detail.php?id_staff=<?php echo $lst_staff->id_staff;?>">Danh sách hóa đơn quản lý</a>
																		</td>
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
                                       
                                        <a  data-toggle="modal" href='#staff-up<?php echo $lst_staff->id_staff;?>'> <i class="fa fa-pencil-square-o text-danger" aria-hidden="true"></i></a>
                                            <div class="modal fade" id="staff-up<?php echo $lst_staff->id_staff;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title text-center text-warning">CẬP NHẬT THÔNG TIN</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 form_info_input">
                                            <form action="ad_manipulation/up_staff.php?id_staff=<?php echo $lst_staff->id_staff;?>" method="POST" role="form">
                                            
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
                                                <div class="form-group">
                                                    <div class="col-lg-5">
                                                        <label for="full_name">Họ và tên:</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                
                                                            <input type="text" name="txt_full_name" class="form-control" id="full_name"  value="<?php echo $lst_staff->fullname;?>">
                                                    </div>
                                                
                                                </div>
                                         
                                            </div>
                                         
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-lg-5">
                                                        <label for="pass">Mật khẩu:</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                
                                                            <input type="password" name="txt_password" class="form-control" id="pass"  value="<?php echo $lst_staff->pass;?>">
                                                    </div>
                                                
                                                </div>
                                            
                                            </div>
                                         
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-lg-5">
                                                        <label for="email">Email:</label>
                                                    </div>
                                                        <div class="col-lg-7">
                                                
                                                            <input type="email" name="txt_email" class="form-control" id="email"   value="<?php echo $lst_staff->email;?>">
                                                    </div>
                                                
                                                </div>
                                            
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-lg-5">
                                                        <label for="phone">Số điện thoại:</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                
                                                            <input type="number" name="txt_phone" class="form-control" id="phone"  value="<?php echo $lst_staff->phone_number;?>">
                                                    </div>
                                                
                                                </div>
                                            
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-lg-5">
                                                        <label for="date">Ngày sinh:</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                
                                                            <input type="date" name="dt_date" class="form-control" id="date" value="<?php echo $lst_staff->DOB;?>" max="<?php echo $year;?>">
                                                    </div>
                                                
                                                </div>
                                            
                                            </div>

                                        
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-lg-5">
                                                        <label for="address">Địa chỉ:</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                
                                                            <textarea class="form-control" name="txt_address" id="address"  ><?php echo $lst_staff->address;?></textarea> 
                                                    </div>
                                                
                                                </div>
                                            
                                            </div>  
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="col-lg-12">
                                             <?php 
										
											if($_SESSION["info_staff"]["id_staff"]==$lst_staff->id_staff)
											{
												?>
                                                 <p class="text-center"> Bạn buộc phải đăng xuất khỏi hệ thống sau  khi cập nhật chính mình</p>
                                                <?php
											}
											
											?>
                                            </div>
                                                <div class="form-group">
                                                    <div class="col-lg-5">
                                                        <label for="role">Vai trò:</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                
                                                            <select name="role_admin" id="role_admin" class="form-control">
                                                            	 <option value="">-- Vai trò nhân viên --</option>
                                                                <option value="1">-- Quản trị viên --</option>
                                                                 <option value="2">-- Nhân viên bán hàng và giao hàngg --</option>
                                                            </select>
                                                    </div>
                                                
                                                </div>
                                            
                                            </div>  

                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group" style="text-align:center;">
                                                        <button type="submit" name="btn_update_staff" class="btn btn-primary text-center">Cập nhật</button>

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
									   	if($lst_staff->status==0)
										{
									   ?>
                                         <td width="60px"><a href="javascript:void(0)" onClick="delete_staff('<?php echo $lst_staff->id_staff;?>',1)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                         <?php
										}
										else if($lst_staff->status!=0)
										{
										?>
                                        <td width="60px"><a href="javascript:void(0)" onClick="recyecle_staff('<?php echo $lst_staff->id_staff;?>',0)"><i class="fa fa-recycle" aria-hidden="true"></i></a></td>
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
                         <div class="col-lg-12">
                        <div id="pagination_page">
							<?php
                            
                                echo $pagination;
                            ?>
                        </div>
                    </div>
                    </div>
                   
                </div>