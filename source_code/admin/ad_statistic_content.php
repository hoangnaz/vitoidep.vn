 			
                <div class="row">
                 
	                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                    	<h3 class="text-uppercase text-center">THỐNG KÊ ĐƠN ĐẶT HÀNG</h3>
	                    </div>
                    
           		 		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               		 	<div class="alert alert-success alert-dismissable" style="height:60px;">
	                    	 <form action="sub_day_order.php" method="POST" role="form">
	                    	
	                    
	                    	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
	                    		Thống kê theo khoảng thời gian
	                    	</div>
		                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
			                    	Bắt đầu:
			                    </div>
			                     <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
			                    	<input type="date"  id="input" name="start_day_order" class="form-control" value="" required="required" title="" max="<?php echo date("Y-m-d");?>">
			                    </div>
		                    </div>
		                    	 
		                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		                    	<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
			                    	Kết thúc:
			                    </div>
			                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
			                    	<input type="date" id="input" name="end_day_order" class="form-control"  required="required" title="" max="<?php echo date("Y-m-d");?>">
			                    </div>
		                    </div>
	                      	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
	                      			<button type="submit" name="sub_day_order" class="btn btn-primary">Xác nhận</button>
	                    		</form>
                    		</div>
                   		</div>
                     
                      
                    </div>
                 </div>
                 <div class="row">
            	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               		 	<div class="alert alert-danger alert-dismissable" style="height:60px;">
	                    	 <form action="sub_week_order.php" method="POST" role="form">
	                    	
	                    
	                    	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                    		Thống kê đơn hàng theo tuần
	                    	</div>
		                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    	Chọn tuần mà bạn muốn thống kê
			                    </div>
			                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    	<input type="week" name="week_order" id="input" class="form-control" value="" required="required" title="" max="<?php echo date("W-Y");?>">
			                    </div>
		                    </div>
		                    	 
		                    
	                      	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                      			<button type="submit" name="sub_week_order" class="btn btn-primary">Xác nhận</button>
	                    		</form>
                    		</div>
                   
                     
                      
                    </div>
   
                    <div class="row">
                      
                 
                   
                    
           		 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               		 	<div class="alert alert-info alert-dismissable" style="height:60px;">
	                    	 <form action="sub_month_order.php" method="POST" role="form">
	                    	
	                    
	                    	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                    		Thống kê đơn hàng theo tháng
	                    	</div>
		                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    	Chọn tháng mà bạn muốn thống kê
			                    </div>
			                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    	<input type="month" name="month_order" id="input" class="form-control" value="" required="required" title="" max="<?php echo date("Y-m");?>">
			                    </div>
		                    </div>
		                    	 
		                    
	                      	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                      			<button type="submit" name="sub_month_order" class="btn btn-primary">Xác nhận</button>
	                    		</form>
                    		</div>
                   		</div>
                     
                      
              
               
             </div>    


                 <div class="row">
                      
                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 	
           
                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               		 	<div class="alert alert-warning alert-dismissable" style="height:60px;">
	                    	 <form action="sub_year_order.php" method="POST" role="form">
	                    	
	                    
	                    	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                    		Thống kê  đơn hàng theo năm
	                    	</div>
		                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    	Chọn năm mà bạn muốn thống kê
			                    </div>
			                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    	<select name="year" id="input" class="form-control" required="required">
			                    	<?php
			                    	$date=date('Y');
			                    	$minyear=2015;
			                    	for($i=$date;$i>=$minyear;$i--) {
			                    	?>	
			                    		<option value="<?php echo $i?>"><?php echo $i?></option>
			                    	<?php
			                    	}
			                    	?>
			                    	</select>
			                    </div>
		                    </div>
		                    	 
		                    
	                      	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                      			<button type="submit" name="sub_year_order" class="btn btn-primary">Xác nhận</button>
	                    		</form>
                    		</div>
                   		</div>
              
                     </div>
             </div>    


      <div class="row">
                 
	                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                    	<h3 class="text-uppercase text-center">THỐNG KÊ PHIẾU NHẬP</h3>
	                    </div>
                    
           		 		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               		 	<div class="alert alert-success alert-dismissable" style="height:60px;">
	                    	 <form action="sub_day_im.php" method="POST" role="form">
	                    	
	                    
	                    	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                    		Thống kê theo khoảng thời gian
	                    	</div>
		                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
			                    	Bắt đầu:
			                    </div>
			                     <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
			                    	<input type="date" name="import_start_day" id="input" class="form-control" value="" required="required" title="" max="<?php echo date("Y-m-d");?>">
			                    </div>
		                    </div>
		                    	 
		                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		                    	<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
			                    	Kết thúc:
			                    </div>
			                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
			                    	<input type="date" name="import_end_day" id="input" class="form-control" value="" required="required" max="<?php echo date("Y-m-d");?>">
			                    </div>
		                    </div>
	                      	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
	                      			<button type="submit" name="sub_day_import" class="btn btn-primary">Xác nhận</button>
	                    		</form>
                    		</div>
                   		</div>
                     
                      
                    </div>
                 </div>
                 <div class="row">
            	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               		 	<div class="alert alert-danger alert-dismissable" style="height:60px;">
	                    	 <form action="sub_week_im.php" method="POST" role="form">
	                    	
	                    
	                    	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                    		Thống kê phiếu nhập theo tuần
	                    	</div>
		                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    	Chọn tuần mà bạn muốn thống kê
			                    </div>
			                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    	<input type="week" name="week_import" id="input" class="form-control" value="" required="required" title="">
			                    </div>
		                    </div>
		                    	 
		                    
	                      	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                      			<button type="submit" name="sub_week_import" class="btn btn-primary">Xác nhận</button>
	                    		</form>
                    		</div>
                   
                     
                      
                    </div>
   
                    <div class="row">
                      
                 
                   
                    
           		 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               		 	<div class="alert alert-info alert-dismissable" style="height:60px;">
	                    	 <form action="sub_month_im.php" method="POST" role="form">
	                    	
	                    
	                    	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                    		Thống kê phiếu nhập theo tháng
	                    	</div>
		                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    	Chọn tháng mà bạn muốn thống kê
			                    </div>
			                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    	<input type="month" name="month_import" id="input" class="form-control" value="" required="required" title=""  max="<?php echo date("Y-m");?>">
			                    </div>
		                    </div>
		                    	 
		                    
	                      	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                      			<button type="submit" name="sub_month" class="btn btn-primary">Xác nhận</button>
	                    		</form>
                    		</div>
                   		</div>
                     
                      
              
               
             </div>    


                 <div class="row">
                      
                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 	
           
                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               		 	<div class="alert alert-warning alert-dismissable" style="height:60px;">
	                    	 <form action="sub_year_im.php" method="POST" role="form">
	                    	
	                    
	                    	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                    		Thống kê phiếu nhập theo năm
	                    	</div>
		                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    	Chọn năm mà bạn muốn thống kê
			                    </div>
			                     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			                    	<select name="year_im" id="input" class="form-control" required="required">
			                    	<?php
			                    	$date=date('Y');
			                    	$minyear=2015;
			                    	for($i=$date;$i>=$minyear;$i--) {
			                    	?>	
			                    		<option value="<?php echo $i?>"><?php echo $i?></option>
			                    	<?php
			                    	}
			                    	?>
			                    	</select>
			                    </div>
		                    </div>
		                    	 
		                    
	                      	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
	                      			<button type="submit" name="year_import" class="btn btn-primary">Xác nhận</button>
	                    		</form>
                    		</div>
                   		</div>
              
                     </div>
             </div>    

