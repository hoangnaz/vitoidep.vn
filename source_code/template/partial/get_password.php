<!-- Modal -->
<div class="modal product-modal fade" id="get_password" tabindex="-1">
			
				<div class="modal-dialog " role="document">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						Đóng
					</button>
				<div class="modal-content">
						<div class="modal-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="modal-image">
									<p class="text-center ">Vui lòng nhập địa chỉ email của bạn để chúng tôi có thể gửi cho bạn mật 
										khẩu mới của bạn
									</p>
									<form class="text-left clearfix">
										<div class="form-group">
											<input type="email" class="form-control" name='textResetEmmail' id='textResetEmmail' placeholder="Email">
										</div>
										<div class="col-xs-12 col-md-12">
											<p  id="messageResetPass" class="text-warning"></p>
										</div>
										
										<div class="text-center">
											<button  onsubmit="event.preventDefault();" onclick="return getPassWord()" class="btn btn-main text-center">Lấy mật khẩu mới</button>
										</div>
									</form>
									
								</div>
							</div>
							
						</div>
					</div>
				</div>
				</div>
		</div>
		<!-- /.modal -->