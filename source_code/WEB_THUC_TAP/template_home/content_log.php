<div id="list_product_find">
</div>
			<!- KET THUC MENU NEW-!>
		<div id="login_content">	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 content_left_login">
 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_catalog_detail" >
 					<p class="text-info">Thông tin tài khoản</p>
 				</div>
 				<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 content_login_left">
 						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content_sign_up">
 							<h3 class="title_login">Bạn chưa có tài khoản</h3>
 							<hr>
 							<p class="content_login">Việc bạn trở thành một thành viên của chúng tôi sẽ giúp cho quá trình mua hàng của bạn trở nên dễ dàng hơn. Hãy click để đăng ký và nhận những dịch vụ hỗ trợ khách hàng từ chúng tôi?
 							</p>
 							<a href="sign_up.php">
 							<p class="content_login text-muted">
 							CLICK ĐỂ THAM GIA CÙNG CHÚNG TÔI: <i class="fa fa-id-card-o fa-3x " aria-hidden="true"></i>
 							</p>
 							</a>

 						</div>
					</div>	
 				<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5 content_login_right">
 						<?php 
								if($_SESSION["info_customer"]["id_customer"]=="")
							{
						?>
									 <h3 class="title_login">Bạn đã có tài khoản. Đăng nhập ngay?</h3>
                       <?php
                           	}
                           	else
                           	{
                           		?>
                           		<h3 class="title_login">Bạn đã đăng nhập thành công rồi. Hãy mua sắm thật vui vẻ nhé!</h3>
                           	<?php
                           	}
                       ?>
 						<hr>
 						<div class="col-xs-10 col-xs-offset-1  col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
 							<?php 
								if($_SESSION["info_customer"]["id_customer"]=="")
							
							{
									?>
								<div id="form_login">
 						
 							<div class="form-group">
 								<label for="username">
 								<p >
 									<i class="fa fa-user-o fa-2x" aria-hidden="true"></i> Tài khoản
 								</p></label>
 								<input type="text" class="form-control" id="lg_username" required="required" placeholder="nhập tài khoản hoặc email ">
 							</div>
 							<div class="form-group">
 								<label for="password">
 								<p >
 									<i class="fa fa-key fa-2x" aria-hidden="true"></i> Mật khẩu
 								</p></label>
 								<input type="password" class="form-control" id="lg_password" placeholder="nhập mật khẩu" required="required">
 							</div>
 							</div>

 							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="btn_login">
 								<button onclick="load_ajax()" class="btn btn-muted" ><i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i></button>
	 							
 							</div>
							<?php
							}
							?>
							
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="result_login">
                                	
                                </div>
							
								
							
 							
 							
 								
	 					
 						</div>
 				 
					</div>	
 			
 				
 				
					
				</div>
				<div class="hidden-xs col-md-2 col-lg-2 top_new_product">
					

			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top_new_product">
				
					 <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-12 col-lg-12 ">
                           	 <img src="admin/assert/pattern/banner_view_cart1.png" class="img-responsive" alt="Image">

                          	 </div>

			</div>

			</div>
		</div>		
		<!- KET THUC DETAIL SAN PHAM-!>
	</div>	
		
		<!--  sap xep san pham-->
		
		
			