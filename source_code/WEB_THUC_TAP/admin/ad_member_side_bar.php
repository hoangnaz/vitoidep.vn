
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
                <a class="navbar-brand" href="mn_member.php"><img src="assert/logo/logo.png" class="img-responsive" alt="Image" width="100px"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    	<?php
                        if($_SESSION["info_staff"]["fullname"]=="")
									{
										header("login.php");
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
                        <a href="mn_member.php"><i class="fa fa-desktop" aria-hidden="true"></i>Danh sách đơn hàng</a>
                    </li >
                    <li >
                        <a href="mn_member_import_bill.php"><i class="fa fa-male" aria-hidden="true"></i> Phiếu nhập</a>
                    </li>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
