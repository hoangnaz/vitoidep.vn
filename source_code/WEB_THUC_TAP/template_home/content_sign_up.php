<?php
   // Lấy ngày hiện tại
  $today = date('Y-m-d');
  $year = strtotime(date("Y-m-d", strtotime($today)) . " -10 year");
  $year = strftime("%Y-%m-%d", $year);                          
?> 

  
    <div id="list_product_find">
    </div>
			<!- KET THUC MENU NEW-!>
		<div id="login_content">	
					 			<div class="row">
					 				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 content_left_login">
						 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_catalog_detail" >
						 					<H3 class="text-info">TẠO TÀI KHOẢN MỚI</H3>
						 				</div>
                                        
   
  
						 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_sign_up">
						 				<h3 >Tạo tài khoản</h3>
						 				<p class="text-muted">Bạn thực sự đã có tài khoản. Hoặc tạm thời quên mật khẩu. Click để quay lại trang <a href="login.php" style="text-decoration: underline;"> đăng nhập </a></p>
						 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 				<h3>Vui lòng điền thông tin </h3>	
						 				</div>
						 				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 form_info_input">
						 					<form action="manipulation/pr_sign_up.php" method="POST" role="form">
						 					
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
						 						<div class="form-group">
						 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						 								<label for="full_name">Họ và tên hiển thị:</label>
						 							</div>
						 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						 						
						 									<input type="text" name="txt_full_name" class="form-control" id="full_name"  required value="<?php echo $_SESSION["info_signup"]["fullname"]?>"  pattern="[À-ža-zA-Z\s].{0,}" title="Tên không bắt đầu bằng số" >
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						 								<label for="account">Tài khoản:</label>
						 							</div>
						 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						 						
						 									<input type="text" name="txt_account" class="form-control" id="account"  required value="<?php echo $_SESSION["info_signup"]["account"]?>"  pattern="[a-zA-Z].{8,}" title="Độ dài tối thiểu của tài khoản phải là 8 ký tự, không bao gồm khoảng trống, toàn chữ số, có dấu!">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						 								<label for="pass">Mật khẩu:</label>
						 							</div>
						 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						 						
						 									<input type="password" name="txt_password" class="form-control" id="pass"  required autofocus="autofocus"  pattern="[a-zA-Z].{8,}" title="Độ dài tối thiểu của mật khẩu phải là 8 ký tự, gồm số và ký tự, bắt đầu bằng ký tự chữ, không bao gồm khoảng trống, toàn chữ số, có dấu!">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						 								<label for="passagain">Xác thực mật khẩu:</label>
						 							</div>
						 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						 						
						 									<input type="password" name="txt_passagain" class="form-control" id="passagain"  required  pattern="[a-zA-Z].{8,}" title="Độ dài tối thiểu của mật khẩu phải là 8 ký tự, gồm số và ký tự,bắt đầu bằng ký tự chữ, không bao gồm khoảng trống, toàn chữ số, có dấu!">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						 								<label for="email">Email:</label>
						 							</div>
						 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						 						
						 									<input type="email" name="txt_email" class="form-control" id="email"  required value="<?php echo $_SESSION["info_signup"]["email"]?>" title="Vui lòng nhập đúng định dạng email">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
				 							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						 								<label for="phone">Số điện thoại:</label>
						 							</div>
						 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						 						
						 									<input type="number" name="txt_phone" class="form-control" id="phone"   value="<?php echo $_SESSION["info_signup"]["phone_number"]?>" required pattern="[0-9]{10,11}" title="Số điện thoại phải là số. Độ dài số điện thoại từ 10-11 ">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						 								<label for="date">Ngày sinh:</label>
						 							</div>
						 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						 						
						 									<input type="date" name="dt_date" class="form-control" id="date"  required  max="<?php echo  $year;?>" title="Khách mua trực tuyến phải lớn hơn 10 tuổi">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>

						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						 								<label for="phone">Giới tính:</label>
						 							</div>
						 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						 						
						 									<div class="radio" required>
						 										<label>
						 											<input type="radio" name="rd_sex" id="input" value="0"  required>
						 											Nam
						 										</label>
						 										<label>
						 											<input type="radio" name="rd_sex" id="input" value="1"  required >
						 											Nữ
						 										</label>
						 									</div>
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						 								<label for="address">Địa chỉ:</label>
						 							</div>
						 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						 						
						 									<textarea class="form-control" name="txt_address" id="address"  required><?php echo $_SESSION["info_signup"]["address"]?></textarea> 
						 							</div>
						 						
						 						</div>
						 					
						 					</div>	

						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						 						
					 									<div class="checkbox">
									 						<label>
									 							<input type="checkbox" value="" required>
									 							Vui lòng đồng ý với các <b>điều khoản</b> của chúng tôi.
									 						</label>
									 					</div> 
						 							</div>
						 							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						 								<button type="submit" name="btn_register" onclick="return check_info_sign_up()" class="btn btn-primary text-center">Đăng ký</button>
						 							</div>
						 							
						 						
						 						</div>
						 					
						 					</div>	
						 						
						 					
						 					</form>


						 				</div>
						 				
						 				
						 				</div>
						 				
						 				
						 				
					 					
					 				</div>
					 				<div class="hidden-xs col-md-2 col-lg-2 top_new_product">
					 					

									
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top_new_product">
					 				
					 					 <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-12 col-lg-12 ">
			                                       	 <img src="Admin/Assert/pattern/banner_view_cart1.png" class="img-responsive" alt="Image">

			                                      	 </div>

									</div>

				 				</div>
				 			</div>		
				 			<!- KET THUC DETAIL SAN PHAM-!>
				 			
				 			<!--  sap xep san pham-->
		
			 	</div>	
	 <script>
   function check_info_sign_up()
   {
	   full_name=$("#full_name").val();
		full_name=full_name.trim();
		if(full_name=="")
		{
			 alert("Tên không thể chỉ chứa khoảng trắng");
			$("#full_name").select();	 
			return false;
		}
		 
		account=$("#account").val();
		account=account.trim();
		if(account=="")
		{
			 alert("Vui lòng điền thông tin tài khoản");
			$("#account").select();	 
			return false;
		} 
		
		pass=$("#pass").val();
		pass=pass.trim();
		if(pass=="")
		{
			 alert("Vui lòng điền mật khẩu");
			$("#pass").select();	 
			return false;
		}
		
		passagain=$("#passagain").val();
		passagain=passagain.trim();
		if(passagain=="")
		{
			 alert("Vui lòng điền xác nhận mật khẩu");
			$("#passagain").select();	 
			return false;
		}
		
		
		
		if($("#pass").val()!=$("#passagain").val())
		{
			 alert("Mật khẩu không trùng nhau");
			$("#pass").select();	 
			return false;
		}
		
		email=$("#email").val();
		email=email.trim();
		if(email=="")
		{
			 alert("Vui lòng điền email");
			$("#email").select();	 
			return false;
		}
		
		
		phone=$("#phone").val();
		phone=phone.trim();
		if(phone.length<10 || phone.length>11)
		{
			alert("Vui lòng nhập điện thoại có độ dài từ 10-11 số");
			$("#phone").focus();	 
			return false;
		}
		
		address=$("#address").val();
		address=address.trim();
		if(address=="")
		{
			 alert("Vui lòng điền địa chỉ");
			$("#address").select();	 
			return false;
		}
		
		
   }
   </script>		 	