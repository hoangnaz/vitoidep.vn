<!-- Modal -->
<div class="modal product-modal fade" id="updatePassword" tabindex="-1">

					<div class="modal-dialog " role="document">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							Đóng
						</button>
					<div class="modal-content">
							<div class="modal-body">
							<div class="row">
							<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="product-short-details product-short-details">
										<p >Xin chào </p>
										<p ><b class="text-uppercase"><?php echo $_SESSION['customer']->fullname; ?></b></p>
										<p>Để đảm bảo thông tin tài khoản của bạn. Hãy thường xuyên cập nhật mật khẩu nhé.</p>

										<img class="img-responsive" src="images/logo.png" alt="updateinfo image" />
									
									</div>
								</div>
								<div class="col-md-8 col-sm-6 col-xs-12">
									<div class="modal-image">
										
										<div class="col-md-12">
											
											
											<div class="col-md-12 signin-page">
													
											
											<div class="col-md-12 text-center">
												THAY ĐỔI MẬT KHẨU
											</div>
											
											<div class="block text-center">
												
												<form class="text-left clearfix"> 
													<div class="form-group">
													  <input  class="form-control" id="password_old"  placeholder="Mật khẩu hiện tại">
													</div>
													<div class="form-group">
													  <input type="password" class="form-control" placeholder="Mật khẩu mới" id="new_password" >
													</div>
													<div class="form-group">
													  <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" id="re_password" >
													</div>
													
												  	<input type="hidden" class="form-control" value="<?php echo $_SESSION['customer']->password;?>" id="current_password" >
													
													
												  	<input type="hidden" class="form-control" value="<?php echo $_SESSION['customer']->id_customer;?>" id="id_customer" >
												
													
													
													<div class="col-xs-12 col-md-12">
															<p  id="messagUpdatePass" class="text-warning"></p>
													</div>
													
													<div class="text-center button_update_pass">
													  <button  onsubmit="event.preventDefault();" onclick="return update_pasword()" class="btn btn-main text-center" >Cập nhật mật khẩu</button>
													</div>
												</form> 
											</div>
										</div>
										
									</div>
								</div>
								
							</div>
						</div>
					</div>
					</div>
		</div>
		<!-- /.modal -->
	