	
<!-- Modal -->
<div class="modal product-modal fade" id="edit_position">
		
			<div class="modal-dialog " role="document">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					Đóng
				</button>
			<div class="modal-content">
					<div class="modal-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="modal-image">
								<p class="text-center ">Vui lòng nhập địa chỉ bạn muốn giao hàng ở đây
								</p>
							
									<div class="form-group text-left clearfix">
									
									<textarea name="txt_up_address" id="txt_up_address" style="width:100%; " ><?php echo $_SESSION['customer']->address; ?></textarea>
									</div>
									<span  id="message-update" ></span>
									<div class="text-center">
										<button onclick="updateDelivery('<?php echo $_SESSION['customer']->id_customer; ?>')" class="btn btn-main green text-center" id="btn_update_delivery">Xác nhận</button>
									</div>
								
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
			</div>
</div>
<!-- /.modal -->