<?php
if (isset($_POST['update_import_bill'])) {
	unset($_SESSION["import_order"]);
	unset($_SESSION['pro_pu']);
	$id_bill_import = $_GET['id_import_bill'];
	$_SESSION['id_import_up'] = $_GET['id_import_bill'];
	$info_import_bill_detail = $ad_select->detail_import_bill($id_bill_import);
	foreach ($info_import_bill_detail as $info_dt_ip) {
		$id_product = $info_dt_ip->product;
		$_SESSION['import_order'][$id_product] = array('id_product' => $info_dt_ip->id_product, 'image' => $info_dt_ip->image_product, 'name_product' => $info_dt_ip->name_product, 'number' => $info_dt_ip->quantity_import, 'price_import' => $info_dt_ip->import_price);
	}
	$_SESSION['pro_pu'] = $info_dt_ip->id_producer_publisher;
	//print_r($info_import_bill_detail);
}
$lst_staff = $ad_select->query_list_staff();
?>
<!-- /.row -->
<div id="aaa">
</div>
<div class="row">
	<?php
	if (!$_SESSION['import_order'] || $_SESSION['import_order'] == NULL) {
		echo "<a href='sub_add_product_import_bill.php'><p class='text-center'> Bạn chưa chọn sản phẩm muốn nhập. Vui lòng quay lại trang sản phẩm. Để chọn sản phẩm cần nhập </p></a>";
	} else {
		?>
		<div class="col-lg-12">
			<div class="alert alert-success">
				<p class="text-center">DANH SÁCH SẢN PHẨM CẦN NHẬP</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info_detail_product">
				<table class="table table-bordered">
					<thead id="title_table_view_cart">
						<tr>
							<th>Tên sản phẩm</th>
							<th>Hình ảnh</th>
							<th>Số lượng</th>
							<th>Đơn giá nhập</th>
							<th>Thành tiền</th>
							<th>Mã cung cấp</th>
							<th colspan="3"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$total_money = 0;
						foreach ($_SESSION['import_order'] as $value) {
							?>
							<tr>
								<td><?php echo $value["name_product"] ?></td>
								<td><img src="../images/product/<?php echo $value["image"] ?>" class="img-responsive" alt="Image" width="100px"></td>
								<td width="100px"><input type="text" name="update_number<?php echo $value["id_product"] ?>" id="update_number<?php echo $value["id_product"] ?>" class="form-control" value="<?php echo $value["number"] ?>" required pattern="" title=""></td>
								<td width="100px"><input type="text" name="update_price_import<?php echo $value["id_product"] ?>" id="update_price_import<?php echo $value["id_product"] ?>" class="form-control" value="<?php echo $value["price_import"] ?>" required pattern="" title=""></td>
								<th><?php echo $value["price_import"] * $value["number"] ?></th>
								<th><?php echo $_SESSION['pro_pu'] ?></th>
								<td><a href="javascript:void(0)" onClick="upda_number(<?php echo $value["id_product"] ?>)"><i class="fa fa-recycle" aria-hidden="true"></i></a></td>
								<td><a href="javascript:void(0)" onClick="deleta_product_cart(<?php echo $value["id_product"]; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
							</tr>
							<?php
							$total_money += $value["price_import"] * $value["number"];
						}
						?>
						<tr>
							<td colspan="9">
								<p class="text-center">Xóa toàn bộ giỏ hàng hiện tại của bạn<a onclick="delete_all()">Tại đây</a></p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3
						 					 	col-md-offset-3 col-lg-offset-3 info_shopping_cart_left">
					<p>Số lượng loại sản phẩm: <?php echo count($_SESSION['import_order']); ?></p>
					<p>Tổng tiền:<?php echo number_format($total_money); ?> VNĐ</p>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3
						 					 	info_shopping_cart_right">
					<a href="sub_add_product_import_bill.php">
						<p><i class="fa fa-arrow-circle-right fa-2x text-success" aria-hidden="true"></i> TIẾP TỤC THÊM SẢN PHẨM</p>
					</a>
					<!-- khi nhấn thành lập phiếu sẽ tự động thêm nhân viên đăng nhập vào -->
				</div>
			</div>
		</div>
		<form action="ad_manipulation/ad_confirm_impor.php?total_money=<?php echo $total_money; ?>" method="POST" role="form" enctype="multipart/form-data">
			<div class="col-lg-12">
				<p class="text-center"> Vui lòng chọn 1 trong 2. Nếu bạn muốn cập nhật lại nhân viên phụ trách đơn hàng. Vui lòng chọn cột trái (cập nhật nhân viên). Để chọn nhân viên phụ trách cho phiếu nhập mới tạo. Vui lòng chọn cột phải (nhân viên phụ trách).</p>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<div class="col-lg-12">
						<label for="role">Cập nhật nhân viên phụ trách :</label>
					</div>
					<div class="col-lg-12">
						<select name="update_staff_bill_import" id="input" class="form-control">
							<option value="">--Chọn nhân viên muốn cập nhật --</option>
							<?php
							foreach ($lst_staff as $lst_st) {
								if ($lst_st->status == 0 && $lst_st->staff_role == 2) {
									?>
									<option value="<?php echo $lst_st->id_staff; ?>">-- <?php echo $lst_st->fullname; ?> --</option>
								<?php
							}
						}
						?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<div class="col-lg-12">
						<label for="role">Nhân viên phụ trách:</label>
					</div>
					<div class="col-lg-12">
						<select name="role_admin" id="input" class="form-control">
							<?php
							foreach ($lst_staff as $lst_st) {
								if ($lst_st->status == 0 && $lst_st->staff_role == 2) {
									?>
									<option value="<?php echo $lst_st->id_staff; ?>">-- <?php echo $lst_st->fullname; ?> --</option>
								<?php
							}
						}
						?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="form-group" style="text-align:center;">
						<?php
						if ($_SESSION['id_import_up'] > 0) {
							?>
							<button type="submit" name="update_import_bill_confirm" class="btn btn-success text-center">Cập nhât thông tin phiếu nhật</button>
						<?php
					} else {
						?>
							<button type="submit" disabled="disabled" name="update_import_bill_confirm" class="btn btn-success text-center">Cập nhât thông tin phiếu nhật</button>
						<?php
					}
					?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="form-group" style="text-align:center;">
						<button type="submit" name="btn_add_import_bill" class="btn btn-warning text-danger" style="margin-left:100px;">Tạo phiếu nhập</button>
					</div>
				</div>
			</div>
		</form>
	<?php }
?>
</div>