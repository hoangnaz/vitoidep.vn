<script>
function check_signup_staff()
{
	full_name=$("#full_name").val();
	full_name=full_name.trim();
	if(full_name=="")
	{
		alert("Vui lòng nhập họ tên nhân viên");
		$("#full_name").focus();
		return false;
	}
	account=$("#account").val();
	account=account.trim();
	if(account=="")
	{
		alert("Vui lòng nhập tài khoản");
		$("#account").focus();
		return false;
	}
		if(account.length<8)
	{
		alert("Vui lòng nhập tài khoản có độ dài tối thiểu 8 ký tự");
		$("#account").focus();
		return false;
	}
	pass=$("#pass").val();
	pass=pass.trim();
	if(pass=="")
	{
		alert("Vui lòng nhập mật khẩu đăng nhập nhân viên");
		$("#pass").focus();
		return false;
	}
	email=$("#email").val();
	email=email.trim();
	if(email=="")
	{
		alert("Vui lòng nhập email nhân viên");
		$("#email").focus();
		return false;
	}
	phone=$("#phone").val();
	phone=phone.trim();
	if(phone.length<10 || phone.length>11)
	{
		alert("Vui lòng số điện thoại có độ dài hợp lệ");
		$("#phone").focus();
		return false;
	}
	address=$("#address").val();
	address=address.trim();
	if(address=="")
	{
		alert("Vui lòng nhập địa chỉ");
		$("#address").focus();
		return false;
	}
}
</script>
<!-- /.row -->
<?php
   // Lấy ngày hiện tại
  $today = date('Y-m-d');
  $year = strtotime(date("Y-m-d", strtotime($today)) . " -15 year");
  $year = strftime("%Y-%m-%d", $year);                          
?> 
                 <div class="row">
                    <div class="col-lg-12">
                       <div class="alert alert-success">
                          <p class="text-center">ĐĂNG KÝ NHÂN VIÊN MỚI</p>
                        </div>
                       <div class="col-xs-12 col-sm-12 col-lg-8 col-lg-offset-2 form_info_input">
						 					<form action="ad_manipulation/ad_staff.php" method="POST" role="form">
						 					
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="full_name">Họ và tên:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<input type="text" name="txt_full_name" class="form-control" id="full_name"  required value='<?php echo $_SESSION["add_staff"]["fullname"];?>' pattern="[À-ža-zA-Z\s].{0,}" title="Tên không bắt đầu bằng số" >
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="account">Tài khoản:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<input type="text" name="txt_account" class="form-control" id="account"  required value='<?php echo $_SESSION["add_staff"][""];?>'  pattern="[a-zA-Z].{7,}" title="Độ dài tối thiểu của tài khoản phải là 8 ký tự, không bao gồm khoảng trống, toàn chữ số, có dấu!">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="pass">Mật khẩu:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<input type="password" name="txt_password" class="form-control" id="pass"  required >
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 				
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="email">Email:</label>
						 							</div>
						 								<div class="col-lg-9">
						 						
						 									<input type="email" name="txt_email" class="form-control" id="email"  required value='<?php echo $_SESSION["add_staff"]["email"];?>'>
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
											 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="email">Giới tính:</label>
						 							</div>
						 								<div class="col-lg-9">
						 									
															 <div class="radio">
																 <label>
																	 <input type="radio" name="sex" id="sex" check="checked" value="1">
																	 <p>Nam</p>
																	 <input type="radio" name="sex" id="sex" value="2">
																	 <p>Nữ</p>
																 </label>
															 </div>
															 
						 									
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
				 							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="phone">Số điện thoại:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<input type="number" name="txt_phone" class="form-control" id="phone"  required value='<?php echo $_SESSION["add_staff"]["phone_number"]; ?>' pattern="[0-9]" title="Số điện thoại phải là số. Độ dài số điện thoại từ 10-11 ">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="date">Ngày sinh:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<input type="date" name="dt_date" class="form-control" id="date"  required value='<?php echo $_SESSION["add_staff"]["date"];?>' max="<?php echo $year?>" title="Nhân viên phải đủ 15 tuổi">
						 							</div>
						 						
						 						</div>
						 					
						 					</div>

						 					
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="address">Địa chỉ:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<textarea class="form-control" name="txt_address" id="address"  required ><?php echo $_SESSION["add_staff"]["address"];?></textarea> 
						 							</div>
						 						
						 						</div>
						 					
						 					</div>	
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="role">Vai trò:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<select name="role_admin" id="input" class="form-control">
                                                                <option value="1">-- Quản trị viên cao cấp --</option>
                                                                 <option value="2">-- Nhân viên bán và giao hàng --</option>
                                                            </select>
						 							</div>
						 						
						 						</div>
						 					
						 					</div>	

						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group" style="text-align:center;">
						 								<button type="submit" name="btn_register" class="btn btn-primary text-center" onclick="return check_signup_staff()">Đăng ký</button>

						 						</div>
						 					
						 					</div>	
						 						
						 					
						 					</form>


						 				</div>
                    </div>
                   
                </div>