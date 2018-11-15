
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="assert/logo/logo.png" class="img-responsive" alt="Image" width="100px"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    	<?php
                        if($_SESSION["info_staff"]["fullname"]=="")
									{
                                        echo "<script>window.location='login.php'</script>";
                                    }
                                    else
                                    {
                                ?>
	                       			Xin chào !<?php echo $_SESSION["info_staff"]["fullname"]?>
                                    	
                                
								<?php
                                }
                                ?>
                    
                    
                    
                     <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      
                        <li>
                            <a href="ad_manipulation/ad_logout.php"><i class="fa fa-fw fa-power-off"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   <li >
                        <a href="index.php"><i class="fa fa-desktop" aria-hidden="true"></i> Trang quản trị</a>
                    </li >
                    <li >
                        <a href="mn_staff.php"><i class="fa fa-male" aria-hidden="true"></i> Tài khoản quản trị</a>
                    </li>
                    <li>
                        <a href="mn_customer.php"><i class="fa fa-fw fa-table"></i>Quản lý khách hàng</a>
                    </li>
                    <li>
                        <a href="mn_catalog.php"><i class="fa fa-fw fa-edit"></i> Quản lý danh mục</a>
                    </li>
                    <li>
                        <a href="mn_sub_catalog.php"><i class="fa fa-fw fa-edit"></i> Danh mục con sản phẩm</a>
                    </li>
                      <li>
                        <a href="mn_supplier.php"><i class="fa fa-fw fa-edit"></i> Nhà sản xuất, xuất bản</a>
                    </li>
                  
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Thống kê <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="mn_bill_import.php">Phiếu nhập</a>
                            </li>
                           
                            <li>
                                <a href="mn_order.php">Đơn đặt hàng</a>
                            </li>
                            <li>
                                <a href="mn_statistic.php">Thống kê </a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="mn_product.php"><i class="fa fa-fw fa-file"></i> Sản phẩm</a>
                    </li>
                    <li>
                        <a href="mn_feedback.php"><i class="fa fa-fw fa-dashboard"></i> Phản hồi</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
