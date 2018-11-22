<script>
	function check_supplier()
	{
		supplier_id=$("#supplier_id").val();
		supplier_id=supplier_id.trim();
		if(supplier_id=="")
		{
			alert("Chưa nhập mã nhà cung cấp, sản xuất.");
			$("#supplier_id").select();
			return false;
		}
		supplier_name=$("#supplier_name").val();
		supplier_name=supplier_name.trim();
		if(supplier_name=="")
		{
			alert("Chưa nhập tiêu đề nhà cung cấp, sản xuất.");
			$("#supplier_name").select();
			return false;
		}
		
		
		address_supplier=$("#address_supplier").val();
		address_supplier=address_supplier.trim();
		if(address_supplier=="")
		{
			alert("Chưa nhập địa chỉ.");
			$("#address_supplier").select();
			return false;
		}
		
		var content = CKEDITOR.instances['txt_describle_supplier'].getData();
		content=content.trim();
		if(content=="")
		{
		alert("Chưa nhập mô tả");
		CKEDITOR.instances['txt_describle_supplier'].focus();
		return false;
		}
	}
</script>
<!-- /.row -->
                 <div class="row">
                    <div class="col-lg-12">
                       <div class="alert alert-danger">
                          <p class="text-center">THÊM NHÀ CUNG CẤP</p>
                        </div>
                       <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 form_info_input">
						 					<form action="ad_manipulation/ad_supplier.php" method="POST" role="form" enctype="multipart/form-data">
						 					
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="supplier_id">Mã nhà sản xuất, cung cấp:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<input type="text" name="txt_supplier_id" class="form-control" id="supplier_id"  required value='<?php echo $_SESSION["add_supplier"]["id_supplier"]?>'>
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="supplier_name">Tên nhà sản xuất, cung cấp:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<input type="text" name="txt_supplier_name" class="form-control" id="supplier_name"  required value='<?php echo $_SESSION["add_supplier"]["name_supplier"]?>'>
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="describle_supplier">Mô tả:</label>
						 							</div>
						 							<div class="col-lg-9">
						 										<textarea name="txt_describle_supplier" class="form-control" id="txt_describle_supplier"  required><?php echo $_SESSION["add_supplier"]["supplier_describle"]?></textarea>
                                                                  <script>    CKEDITOR.replace( 'txt_describle_supplier' );</script>
						 									
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="address_supplier">Địa chỉ:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<textarea name="txt_address_supplier" class="form-control" id="address_supplier"  required><?php echo $_SESSION["add_supplier"]["address"]?></textarea>
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="email_supplie">Email:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<input type="email" name="txt_email_supplier" class="form-control" id="email_supplie"  required value='<?php echo $_SESSION["add_supplier"]["email"]?>'>
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					
						 				

						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group" style="text-align:center;">
						 								<button type="submit" name="btn_add_supplier" onclick="return check_supplier()" class="btn btn-primary text-center">Tạo nhà cung cấp</button>

						 						</div>
						 					
						 					</div>	
						 						
						 					
						 					</form>


		 				</div>
                    </div>
                   
                </div>