
<!-- Main Menu Section -->

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Xác nhận thanh toán</h1>
					
				</div>
			</div>
		</div>
	</div>
</section>
<div class="page-wrapper">
   <div class="checkout shopping">
   <?php
         if($_SESSION["product_cart"] && count($_SESSION["product_cart"])>0 ){
      ?>
      <div class="container">
      
         <div class="row">
            <div class="col-md-8">
              
               <div class="block billing-details">
                  <h4 class="widget-title text-center">Xác nhận địa chỉ giao hàng và thông tin cá nhân</h4>
                  <form class="checkout-form">
                     <div class="form-group">
                        <label for="full_name">Họ tên</label>
                        <input type="text" class="form-control" id="full_name_confirm_order" placeholder="" value="<?php echo $_SESSION['info_order']['full_name'];?>">
                     </div>
                     <p id="message-error-fullname"></p>
                     <div class="form-group">
                        <label for="user_address">Địa chỉ</label>
                        <input type="text" class="form-control" id="user_address_order" placeholder="" 
                        value="<?php echo $_SESSION['info_order']['address'];?>">                      
                     </div>
                     <p id="message-error-address"></p>
                     <div class="checkout-country-code clearfix">
                        <div class="form-group">
                           <label for="user_post_code">Số điện thoại</label>
                           <input type="text" max="11" class="form-control" id="phone_order" name="phone_order" value="<?php echo $_SESSION['info_order']['phone_number'];?>">
                        </div>
                     </div>
                     <p id="message-error-phone-order"></p>   
                     <div class="checkout-country-code clearfix">
                        <div class="form-group" >
                           <label for="user_city">Email</label>
                           <input type="text" class="form-control" id="email_order" name="email_order" value="<?php echo $_SESSION['info_order']['email'];?>">
                        </div>
                     </div>
                     <p id="message-error-email_order"></p>   
                  </form>
               </div>
               
            <div class="block">
            <h4 class="widget-title">Phương thức thanh toán</h4>
            <form action="">
               <div class="radio">
                  <label>
                     <input type="radio" name="delivery_method" id="delivery_method" value="Chuyển khoản" checked="checked">
                     <p>Chuyển khoản</p>
                  </label>
                  <p>Hiện tại chúng tôi đang hoàn thành phương thức thanh toán trực tuyến. Vì vậy chúng
                     tôi sẽ cũng cấp giải pháp là gửi tiền vào tài khoản như trong <a data-toggle="modal" href='#list_bank'>danh sách tài khoản </a>
                     trong đây. Chúng tôi sẽ liên hệ trực tiếp để xác nhận với các bạn.
                  </p>
                  
               </div>
               
               <div class="radio">
                  <label>
                     <input type="radio" name="delivery_method" id="delivery_method" value="Thanh toán sau khi nhận hàng" checked="checked">
                     Thanh toán sau khi nhận hàng
                  </label>
               </div>
				</form>
         </div>
      </div>
     <?php
         }
     ?> 
