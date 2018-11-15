 	
					 			<!- KET THUC MENU NEW-!>
					 			<div class="row">
					 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_catalog_detail" >
						 					<H3 class="text-info">LIÊN HỆ VỚI CHÚNG TÔI</H3>
						 				</div>
						 				<div class="col-xs-12 col-lg-12" style="margin-top:20px;">
						 					
						 				
						 				<?php
						 				if($_SESSION["info_customer"]["id_customer"]=="")
						 				{
						 					echo "<h3 class='text-center' style='margin-top:20px;'> <a href='login.php' class='text-info'> Vui lòng đăng nhập để gửi phản hồi.</a> </h3>";
						 					echo '</div>';
						 				}
						 				else
						 				{
						 				?>

						 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_sign_up">
						 			
						 			
						 			
						 				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 form_contact">
						 				
						 					
						 					<div class=" col-lg-12 input_login_data" >
							 					
						 						
						 					
						 					
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 								<label for="content_repon">Nội dung phản hồi:</label>
						 							</div>
						 							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						
						 									<textarea class="form-control" name="" id="content_repon" placeholder="Nội dung phản hồi" required></textarea> 
						 							</div>
						 						
						 						</div>
						 					
						 					</div>	

						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 					
						 							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 btn_contact">
						 								<button onclick="send_feedback()" class="btn btn-primary text-center"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
						 							</div>
						 							
						 						
						 						</div>
						 					
						 					</div>	
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="result_feedback">
                                            </div>	
						 					
						 				


						 				</div>
						 				
						 				
						 				</div>
						 				
						 				
						 				
					 					
					 				</div>
					 				<?php
					 			}
					 				?>
					 				
				 			</div>		
				 			<!- KET THUC DETAIL SAN PHAM-!>
				 			
				 			<!--  sap xep san pham-->
			 				
				 			
					 			
		 			
		 			
			 	</div>	
			 	<!-- content finish-->
			
	 			</div>
	
			 		 	<!-- general_content -->
		 			</div>
 			</div>
 			<!-- Bat dau san pham cung loai -->
 		
 	</div>	