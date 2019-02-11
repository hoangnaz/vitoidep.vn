<?php
    class template{
        function getTemplateEmailConfirm($info,$lstOrder){
            $contentHTML ="";
            $contentHTML.='<!DOCTYPE html>';
            $contentHTML.='<html lang="">';
            $contentHTML.='<head>';
            $contentHTML.='<meta charset="utf-8">';
            $contentHTML.='<meta http-equiv="X-UA-Compatible" content="IE=edge">';
            $contentHTML.='<meta name="viewport" content="width=device-width, initial-scale=1">';
            $contentHTML.='<title>Email</title>';
            $contentHTML.='</head>';
            $contentHTML.='<body style="width:100%; color:#222;">';
            $contentHTML.='<div style="width:100%; margin:auto;">';

            $contentHTML.='<div class="container" style="border:2px solid #a19d9d; width: 70%; box-shadow: 2px; background-color:#F3F3F3;">';
            

            $contentHTML.='<div style="background-color: #FFF; margin-bottom: 20px; margin-top:20px;">';
            $contentHTML.='<img src="cid:logo" style=" margin-left:30%;width: 40%; " >';

            $contentHTML.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 100%; margin-top: 20px;  margin:auto;">';
            $contentHTML.='<p style="padding-top: 50px; padding-left:20px;padding-right:20px;">Xin chào !'.$info['name'].'</p>';
            $contentHTML.='<p style="padding-left:20px;padding-right:20px;">Chúng tôi xin vui lòng thông báo đơn đặt hàng của bạn đã được xử lý thành công đơn hàng của bạn. Chúng tôi sẽ nhanh 
            chóng gửi đến bạn đơn hàng bao gồm:</p>';
            $contentHTML.='</div>';
            $contentHTML.='</div>';
            $contentHTML.='<div  style="width: 95%; margin:auto; margin-top: 20px;">';
            $contentHTML.='<table class="table table-hover">';
            $contentHTML.='<thead>';
            $contentHTML.='<tr>';
            $contentHTML.='<th style="text-align:center">Mã sản phẩm</th>';
            $contentHTML.='<th style="text-align:center">Tên sản phẩm</th>';
            $contentHTML.='<th style="text-align:center">Số lượng</th>';
            $contentHTML.='<th style="text-align:center">Đơn giá</th>';
            $contentHTML.='<th style="text-align:center">Thành tiền</th>';
            $contentHTML.='</tr>';
            $contentHTML.='</thead>';
            $contentHTML.='<tbody>';
            $count=0;
            foreach ($lstOrder as $key => $value) {
                $count++;
                $contentHTML.='<tr >';
                $contentHTML.='<td style="text-align:center">'.$count.'</td>';
                $contentHTML.='<td style="text-align:center">'.$value['info']->name_product.'</td>';
                $contentHTML.='<td style="text-align:center">'.$value['number'].'</td>';
                $price = (1-($value['info']->point_promotion/100))* $value['info']->price_product;

                $contentHTML.='<td style="text-align:center">'.number_format( $price).'VNĐ</td>';
                $totalMoney= $price*$value['number'];
												
                $contentHTML.='<td style="text-align:center">'.number_format( $totalMoney).'VNĐ</td>';
                $contentHTML.='</tr>';
            }
            $contentHTML.='</tbody>';
            $contentHTML.='</table>';
            $contentHTML.='</div>';
            $contentHTML.='</hr>';
            
            $contentHTML.='<div  style="height: auto; width: 90%; margin: auto;">';

            $contentHTML.='<div style="width:50%;">';
            $contentHTML.='<p>Đơn hàng được giao đến:'.$info['name'].'</p>';
            $contentHTML.='<p>Địa chỉ nhận hàng:'.$info['address'].' </p>';
            $contentHTML.='</div>';
            $contentHTML.='<div style="width:50%;"';
            $contentHTML.='<p>Email: <a href="mailto:+'.$info['email'].'" target="_blank">'.$info['email'].'</a></p>';

            $contentHTML.='<p> Số điện thoai: '.$info['phone'].' </p>';
            $contentHTML.='</div>';
            $contentHTML.='<div  style="height: auto; width: 80%; margin: auto;">';
            $contentHTML.='<div><p class="text-success">Đơn hàng sẽ được giao và nhận tiền: '.$info['delivery'].' </p></div>';
            $contentHTML.='</div>';
            $contentHTML.='</div>';
            $contentHTML.='<div style="width:100%;">';
            $contentHTML.=' <p style="padding-left:20px;padding-right:20px;">Đơn hàng sẽ nhanh chóng được chuyển đến bạn trong khoảng thời gian từ 3-4 ngày làm việc</p>';
            $contentHTML.=' </div>';
            $contentHTML.=' <div>';
                
            $contentHTML.='   <img src="cid:deliver" style="width: 60%; height:300px; margin-left:20%;" class="img-responsive" alt="Image">';

            $contentHTML.='</div>';

            $contentHTML.='<div style=" margin-bottom: 30px;width:100%;">';
            $contentHTML.='<ul>';
            $contentHTML.='<li><p>Trong trường hợp bạn nhờ người nhận giúp, vui lòng gửi cho người nhận một trong những giấy tờ sau:</li>';
            $contentHTML.='<li>Kiểm tra kĩ thông tin đơn hàng trước khi thanh toán, bạn cũng có thể kiểm tra 
            ngoại quan sản phẩm (nhãn hiệu, mẫu mã, màu sắc, số lượng, ...) và từ chối
            nhận hàng nếu không ưng ý.Vui lòng không kích hoạt các thiết
            bị điện máy-điện tử hoặc dùng thử sản phẩm</p></li>';
            $contentHTML.='<li><p>Chúng tôi sẽ cập nhật với bạn thông tin về (những) sản phẩm còn lại (nếu có) qua email</p></li>';      
            $contentHTML.='</ul>';

            $contentHTML.='</div>';
            $contentHTML.='<div  style="text-align:center; margin-top:30px; padding-bottom:20px; width:100%;">';
            $contentHTML.='    <p class="text-center">Nguyễn Kim, Phường 12, Quận 5 (2,40 km)Thành phố Hồ Chí Minh</p>';
            $contentHTML.='</div>';
            $contentHTML.='<div style="width: 100%; background-color: cornflowerblue; margin-top:10px;">';
            $contentHTML.='<h4  style="padding-top:15px;padding-bottom:15px;text-align:center;">VÌ TÔI ĐẸP SHOP</h4>';
            $contentHTML.='</div>';
            $contentHTML.='</div>';
            
            $contentHTML.='<script src="Hello World"></script>';
            $contentHTML.='</div>';
            $contentHTML.='</body>';
            $contentHTML.='</html>';						
                return  $contentHTML;
        }
		function getTemplateResetPassword($info, $newPassWord){
			 $contentHTML ="";
            $contentHTML.='<!DOCTYPE html>';
            $contentHTML.='<html lang="">';
            $contentHTML.='<head>';
            $contentHTML.='<meta charset="utf-8">';
            $contentHTML.='<meta http-equiv="X-UA-Compatible" content="IE=edge">';
            $contentHTML.='<meta name="viewport" content="width=device-width, initial-scale=1">';
            $contentHTML.='<title>Email</title>';
            $contentHTML.='</head>';
            $contentHTML.='<body style="width:100%; color:#222;">';
            $contentHTML.='<div style="width:100%; margin:auto;">';

            $contentHTML.='<div class="container" style="border:2px solid #a19d9d; width: 70%; box-shadow: 2px; background-color:#F3F3F3;">';
            

            $contentHTML.='<div style="background-color: #FFF; margin-bottom: 20px; margin-top:20px;">';
            $contentHTML.='<img src="cid:logo" style=" margin-left:30%;width: 40%; " >';

            $contentHTML.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 100%; margin-top: 20px;  margin:auto;">';
            $contentHTML.='<p style="padding-top: 50px; padding-left:20px;padding-right:20px;">Xin chào !'.$info['name'].'</p>';
            $contentHTML.='<p style="padding-left:20px;padding-right:20px;">Mật khẩu truy cập mới của bạn là <b>'.$newPassWord.'</b></p>';
            $contentHTML.='</div>';
            $contentHTML.='</div>';
            $contentHTML.='</hr>';
            $contentHTML.='<div  style="text-align:center; margin-top:30px; padding-bottom:20px; width:100%;">';
            $contentHTML.='    <p class="text-center">Nguyễn Kim, Phường 12, Quận 5 (2,40 km)Thành phố Hồ Chí Minh</p>';
            $contentHTML.='</div>';
            $contentHTML.='<div style="width: 100%; background-color: cornflowerblue; margin-top:10px;">';
            $contentHTML.='<h4  style="padding-top:15px;padding-bottom:15px;text-align:center;">VÌ TÔI ĐẸP SHOP</h4>';
            $contentHTML.='</div>';
            $contentHTML.='</div>';
            
            $contentHTML.='<script src="Hello World"></script>';
            $contentHTML.='</div>';
            $contentHTML.='</body>';
            $contentHTML.='</html>';						
            return  $contentHTML;
		
		}
    }

?>