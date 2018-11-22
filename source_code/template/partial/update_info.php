<!-- Modal -->
<div class="modal product-modal fade" id="updateInfo" tabindex="-1">
				
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
										<p>Việc cập nhật đầy đủ thông tin cá nhân sẽ giúp chúng tôi phục vụ bạn 
										tốt hơn. Các dịch vụ của chúng tôi sẽ đến với bạn nhanh hơn.</p>
										<p>Hãy cập nhập đầy đủ thông tin để nhận thêm 10 điểm thưởng từ chúng tôi nhé.</p>
										<img class="img-responsive" src="images/logo.png" alt="updateinfo image" />
									</div>
								</div>
								<div class="col-md-8 col-sm-6 col-xs-12">
									<div class="modal-image">
										
										<div class="col-md-12">
											
											
											<div class="col-md-12 signin-page">
													
											
											<div class="col-md-12 text-center">
												CẬP NHẬT THÔNG TIN TÀI KHOẢN CỦA BẠN
											</div>
											
											<div class="block text-center">
													<div class="form-group">
														Giới tính: 
															
														<div class="radio">
															<label>
																<input type="radio" name="rg_sex" id="rg_sex" value="1" checked="checked">
																Nam
															</label>
															<label>
																<input type="radio" name="rg_sex" id="rg_sex" value="0" checked="checked">
																Nữ
															</label>
														</div>
														
													</div>
													<div class="form-group">
														<input type="number"  class="form-control" id="rg_phone_number" placeholder="Vui lòng nhập số điện thoại">
													</div>	
													<span  id="message-error-phone"></span>
													<div class="form-group">
														<input type="date"  class="form-control" id="rg_date" min='1899-01-01' max='<?php echo date('Y-m-d')?>'  placeholder="Vui lòng nhập vào ngày sinh của bạn">
													</div>
													<span  id="message-error-date"></span>
													<div class="form-group">
													
														<textarea name="" id="rg_address" cols="65" rows="5">Vui lòng nhập địa chỉ</textarea>
													</div>
													
													<span  id="message-error-address"></span>
													
													<div class="form-group">
														<input type="text" class="form-control"  id="rg_social_account"   placeholder="Địa chỉ tài khoản (Facebook, Istagram, Twitter nếu có)">
													</div>
													<span  id="message-error-socail"></span>
													
													<span  id="message-update" ></span>
													<div class="text-center" id="button-update">
														<button  onclick="updateInfo('<?php echo $_SESSION['customer']->id_customer; ?>')" class="btn btn-main text-center" >Lưu thông tin</button>
													</div>
													
													</div>
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
	