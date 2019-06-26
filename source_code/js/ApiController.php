<?php

   namespace frontend\controllers;

   use yii\rest\ActiveController;

   use frontend\models\ThongTinMay;

   use frontend\models\Link;
   	error_reporting(0);
   class ApiController extends ActiveController {

     public $modelClass = 'frontend\models\ThongTinMay';

     public function actionApiRequest(){
       $soLuongRanh = \Yii::$app->request->get('so_luong_ranh');

       $ip = $_SERVER['REMOTE_ADDR'];

       $thongTinMay = ThongTinMay::findOne(['ip_may'=>$ip]);

       $thongTinMay->ranh = $soLuongRanh;

       $thongTinMay->save();

       $danhSachMay = ThongTinMay::find()->all();

       $tongCookieRanh = 0;

       foreach ($danhSachMay as $may) {

        $tongCookieRanh = $tongCookieRanh + $may->ranh;

       }

       $danhSachLink =  Link::find()->where(['trang_thai' => 0])->all();
       $danhSachLinkHuy =  Link::find()->where(['trang_thai' => 3])->all();
       $linkHuy = $danhSachLinkHuy[0];
       echo 123; die;
       var_dump($linkHuy);die;
       if(!empty($linkHuy)){
       		 	$kq = array('data' => array('code'=>'2',
	        	'tin_nhan'=>'Vui lòng hủy link này'	
	        	'link' => $linkHuy->link,
		    	'ma_link' => $linkHuy->id
	        )); 
       }else{
       	 $linkXem = $danhSachLink[0];

	       if($linkXem->so_luong_view < $tongCookieRanh){

	           $kq = array('data' => array('code'=>'0',
	       		'tin_nhan'=>'Không đủ số lương cookie để chạy')); 
	       }

	       else{

	        $kq = array('data' => array('code'=>'1',
	        'tin_nhan'=>'Vui lòng chạy link này'	
	        'link' => $linkXem->link,
	        'so_luong_chay' => $thongTinMay->ranh,
	        'thoi_gian' => $linkXem->so_phut,
	        'ma_link' => $linkXem->id
	        )); 

	       }
       }
    return $kq;

     }

   }

?>