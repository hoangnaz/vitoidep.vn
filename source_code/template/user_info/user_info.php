
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Thông tin cá nhân</h1>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="list-inline dashboard-menu text-center">
            <li ><a href="general_info.php">Thông tin cá nhân</a></li>
						<li class="active"><a href="general_info.php">Lịch sử mua hàng</a></li>
						<li><a  href="user_info.php"> <i class="fa fa-bell" aria-hidden="true"></i> Thông báo của bạn</a></li>
        
        </ul>
        <div class="dashboard-wrapper dashboard-user-profile">
          <div class="media info_user">
            <div class="pull-left text-center" href="#">
              <img class="media-object user-img" src="images/user_info/<?php echo $_SESSION['customer']->avatar;?>" id="img-avatar" alt="Image">
              <form  method="POST"  enctype="multipart/form-data" action="function/upload_avatar.php?id_customer=<?php echo $_SESSION['customer']->id_customer;?>"> 
              <div class="upload-btn-wrapper">
              
                <button class="btn_upload">Chọn ảnh đại diện</button>
                <input type="file" name="myfile" id="image-avt" />

              </div>
              <div>
                  <button type="submit" class="btn_upload">Xác nhận</button> 
                </form>
              </div>
              
              
            </div>
            <div class="media-body">
              <ul class="user-profile-list">
                <li class="text-center"><h3><span>Chào mừng quay trở lại </span> <b><?php echo $_SESSION['customer']->fullname;?></b></h3></li>
                <li><p><span>Email:</span><?php echo $_SESSION['customer']->email;?><p></li>
                <li><p><span>Số điện thoại:</span><?php echo $_SESSION['customer']->phone_number;?></p></li>
                <li><p><span>Ngày sinh:</span><?php echo $_SESSION['customer']->DOB;?></p></li>
                <li><p><span>Giới tính:</span><?php echo $_SESSION['customer']->sex=1?"Nam":"Nữ";?></p></li>
                <li><p><span>Số điểm tích thưởng hiện có:</span></span><?php echo $_SESSION['customer']->point;?> điểm</p></li>
                <li><p><span>Bạn hiện đang là thành viên :</span><?php echo rankUser($_SESSION['customer']->point);?></p></li>
                <li><a href="user_info.php"><p>Xem các ưu đãi dành cho bạn và các thành viên vàng khác tại đây.
                  Hãy thu thập nhiều điểm thưởng hơn nữa để nhận nhiều ưu đãi từ <a href="index.php">VÌ TÔI ĐẸP</a>
                </p></a></li>
               <li><a  data-toggle="modal" data-target="#updateInfo"><p class="text-info"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Bổ sung thêm thông tin cá nhân tại đây</p></a></li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>