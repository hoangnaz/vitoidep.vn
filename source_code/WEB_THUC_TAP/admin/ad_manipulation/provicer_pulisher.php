<?php
		error_reporting(0);
	session_start();
	$count=0;
	if(!$_SESSION['pro_pu'] || $_SESSION['pro_pu']=='')
	{
	$_SESSION['pro_pu']=$_POST['pro_pub'];
	echo $_SESSION['pro_pu'];
	?>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                                <a class="btn btn-info"  href='sub_add_product_import_bill.php'>Thêm sản phẩm vào phiếu</a>
                               
                            </div>
    <?php
	
	}
	else
	{
		if($_SESSION['pro_pu']!=$_POST['pro_pub'])
		{
			
		include("../database/select_data.php");
		$date_select=new select_data();	
		$pro_pubiser=$date_select->query_one_producer_publisher($_SESSION['pro_pu']);
		
		echo "Xin lỗi, bạn không thể tạo phiếu nhập khi chọn nhà sản xuất, xuất bản khác nhau. Vui lòng chọn ".$pro_pubiser->name_producer_publisher;
		
		}
		else
		{
			$_SESSION['pro_pu']=$_POST['pro_pub'];
			?>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                                <a class="btn btn-info"  href='sub_add_product_import_bill.php'>Thêm sản phẩm vào phiếu</a>
                               
                            </div>
            <?php
		}
	}
?>