<!-- /.row -->
<script>
	function abc(){
		swal({
        text: "Chúc mừng  bạn đã đăng ký thành công.",
        icon: "success"
      });
	}
</script>
<?php
 $list_supplier=$data_sl->query_list_producer_publisher();

 $list_catalog=$data_sl->query_list_sub_catalog();
 ?>
	 <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-warning">
                <p class="text-center">THÊM SẢN PHẨM MỚI</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 form_info_input">
				<form action="ad_manipulation/ad_product.php" method="POST" role="form" enctype="multipart/form-data">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
						<div class="form-group">
							<div class="col-lg-5">
								<label for="pd_name">Tên sản phẩm:</label>
							</div>
							<div class="col-lg-7">
								<input type="text" name="txt_pd_name" class="form-control" id="pd_name"  required>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<div class="col-lg-5">
								<label for="unit">Đơn vị tính:</label>
							</div>
							<div class="col-lg-7">
								<input type="text" name="txt_unit" class="form-control" id="unit"  required>
							</div>
						</div>
					</div>				
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<div class="col-lg-5">
								<label for="supplier">Nhà cung cấp:</label>
							</div>
							<div class="col-lg-7">
								<select name="supplier" id="input" class="form-control">
								<?php foreach( $list_supplier as $list_sp)
									{
										if($list_sp->status==0) {
									?>
										<option value="<?php echo $list_sp->id_producer_publisher?>">-- <?php echo $list_sp->name_producer_publisher?> --</option>
									<?php
										}
									}
									?>                                                            </select>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<div class="col-lg-5">
								<label for="catalog">Danh mục sản phẩm:</label>
							</div>
							<div class="col-lg-7">
								<select name="catalog" id="input" class="form-control">
									<?php foreach( $list_catalog as $list_cl)
									{
										if($list_cl->status==0) {
									?>
											<option value="<?php echo $list_cl->sub_catalog_id?>">-- <?php echo $list_cl->sub_catalog_name?> --</option>
									<?php
										}
									}
									?>        
								</select>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<div class="col-lg-5">
								<label for="describle">Mô tả:</label>
							</div>
							<div class="col-lg-7">
								<textarea type="text" name="txt_describle" class="form-control" id="describle"  required></textarea>
									<script>    CKEDITOR.replace( 'txt_describle');</script>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<div class="col-lg-5">
								<label for="imgage">Hình đại diện:</label>
							</div>
							<div class="col-lg-7">
								<input type="file" name="fl_imgage" class="form-control" id="imgage"  required>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group" style="text-align:center;">
								<button type="submit" name="btn_add_product" class="btn btn-primary text-center">Đăng ký</button>
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>