<?php
    include("connect.php");
	
?>

<!DOCTYPE HTML>

<html>
    <head>
    	<!-- TemplateBeginEditable name="head" -->
        <title>Trang chủ | HaHaMobile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery1.min.js"></script>
        <!-- start menu -->
        <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="js/megamenu.js"></script>
        <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
        <!--start slider -->
            <link rel="stylesheet" href="css/fwslider.css" media="all">
            <script src="js/jquery-ui.min.js"></script>
            <script src="js/css3-mediaqueries.js"></script>
            <script src="js/fwslider.js"></script>
        <!--end slider -->
        <script src="js/jquery.easydropdown.js"></script>
        <div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
         <!-- TemplateEndEditable -->
       
    </head>

    <body>
    
        <div class="header-top">
            <div class="wrap"> 
                <div class="cssmenu">
                    <ul>
                        <?php
	                        if (isset($_SESSION['tentk']))
		                    {
			                    echo "Xin chào <li><a href='thongtinchitiet.php'> ".$_SESSION['tentk']."</a></li> | <li><a href='logout.php'>Đăng xuất</a></li>";
								if($_SESSION['admin']==true)
								{
									echo " | <li><a href='admin/index.php'>Tới trang quản trị</a></li>";	
								}
		                    }
		                    else
		                    {
								echo "<li><a href='login.php'>Đăng nhập</a></li> | <li><a href='register.php'>Đăng ký</a></li>";
		                    }
                        ?>
				    </ul>
			    </div>
                
                <div class="clear"></div>
            </div>
        </div>

	    <div class="header-bottom">
            <div class="wrap">
                <div class="header-bottom-left">
                    <div class="logo">
                        <a href="index.php"><img src="images/logo.png" alt=""/></a>
				    </div>

				    <div class="menu">
	                    <ul class="megamenu skyblue">
                            <li class="active grid"><a href="index.php">Trang chủ</a></li>
                            <li><a href="dienthoai.php">Điện thoại</a></li>
                            <li><a href="phukien.php">Phụ kiện</a></li>
                            <li><a href="tintuc.php">Tin tức</a></li>
                            <li><a href="khuyenmai.php">Khuyến mại</a></li>
                        </ul>
                    </div>
                </div>

                <div class="header-bottom-right">
                    <div class="search">
                        <form action="timkiem.php" method="get" name="frm">
                            <input type="text" name="keyword" class="textbox" value="Tìm kiếm" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm kiếm';}">
				            <input type="submit" value="Subscribe" id="submit" name="submit">
                        </form>	  
				        <div id="response"> </div>
                    </div>

                    <div class="tag-list">
		                <ul class="icon1 sub-icon1 profile_img">
			                <li><a class="active-icon c2" href="#"> </a>
				                <ul class="sub-icon1 list">
					                <li>
                                        <h3>
                                        <?php
											if(isset($_SESSION['giohang']))
												$count=count($_SESSION['giohang']);
											else $count=0;
											if($count==0)
												echo "Không có sản phẩm nào";
											else
												echo $count." sản phẩm";
										?>
                                        </h3>
                                    </li>
					                <li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
				                </ul>
			                </li>
		                </ul>
	                    <ul class="last">
							<li>
								<a href="cart.php">Giỏ hàng(<?php echo $count;?>)</a>
							</li>
						</ul>
                    </div>
                </div>
                
                <div class="clear"></div>
            </div>
	    </div>
        
        <!-- TemplateBeginEditable name="slide" -->
        <!-- TemplateEndEditable -->
        <!-- TemplateBeginEditable name="duongke" -->
        <div class="mens"></div>
        <!-- TemplateEndEditable -->
        
        <div class="main">
            <div class="wrap">

                <!-- TemplateBeginEditable name="body" -->
		        <div class="cont span_2_of_3">
                    			 						 			    
		        </div>
                <!-- TemplateEndEditable -->

			    <div class="rsidebar span_1_of_left">
                    <h5 class="m_1">Danh mục</h5>
                    <ul class="kids">
                    <?php
						$query = mysqli_query($conn,"select * from hang");
						while($row = mysqli_fetch_array($query))
						{
							echo "<li><a href='sanphamtheohang.php?hang=".$row['mahang']."'>Sản phẩm ".$row['tenhang']."</a></li>";
						} 
						mysqli_free_result($query);
					?>
					</ul>
                        
                    <h5 class="m_1">Giá</h5>
                    <ul class="kids">
						<li><a href="sanphamtheogia.php?dau=0&cuoi=5000000">< 5 triệu đồng</a></li>
                        <li><a href="sanphamtheogia.php?dau=5000000&cuoi=7000000">5 triệu - 7 triệu đồng</a></li>
                        <li><a href="sanphamtheogia.php?dau=7000000&cuoi=10000000">7 triệu - 10 triệu đồng</a></li>
                        <li><a href="sanphamtheogia.php?dau=10000000&cuoi=15000000">10 triệu - 15 triệu đồng</a></li>
                        <li><a href="sanphamtheogia.php?dau=15000000&cuoi=20000000">15 triệu - 20 triệu đồng</a></li>
						<li><a href="sanphamtheogia.php?dau=20000000">> 20 triệu đồng</a></li>
					</ul>
                        
                    <section  class="sky-form">
                        <h4>Colors</h4>
                        <ul class="color-list">
							<li><a href="#"> <span class="color1"> </span><p class="red">Red</p></a></li>
							<li><a href="#"> <span class="color2"> </span><p class="red">Green</p></a></li>
							<li><a href="#"> <span class="color3"> </span><p class="red">Blue</p></a></li>
							<li><a href="#"> <span class="color4"> </span><p class="red">Yellow</p></a></li>
							<li><a href="#"> <span class="color5"> </span><p class="red">Violet</p></a></li>
							<li><a href="#"> <span class="color6"> </span><p class="red">Orange</p></a></li>
							<li><a href="#"> <span class="color7"> </span><p class="red">Gray</p></a></li>
					    </ul>
                    </section>
                        
                    <h5 class="m_1">Tin tức</h5>

                    <?php 
				        $query=mysqli_query($conn,"select * from tintuc order by id desc LIMIT 0,4");
				        while($row=mysqli_fetch_array($query))
				        {
				    ?>
                        <div class="new-1">
                            <a href="tintucchitiet.php?id=<?php echo $row['id']?>">
                                <img src="<?php echo $row['hinhanh'];?>" title="" width="60" height="60">
                                <p><?php echo $row['tieude'];?></p>
                            </a>
                        </div>
                    <?php
                        } 
						mysqli_free_result($query);
                    ?> 
                </div>
	           
                <div class="clear"></div>
                
	        </div>
        </div>
		
        <div class="footer">
            <div class="footer-top">
                <div class="wrap">
                    <div class="section group example">
				        <div class="col_1_of_2 span_1_of_2">
                            <ul class="f-list">
                                <li>
                                    <img src="images/2.png">
                                    <span class="f-text">Miễn phí giao hàng tận nơi</span>
                                    <div class="clear"></div>
                                </li>
					        </ul>
				        </div>

				        <div class="col_1_of_2 span_1_of_2">
                            <ul class="f-list">
                                <li>
                                    <img src="images/3.png">
                                    <span class="f-text">Hotline 01646761576</span>
                                    <div class="clear"></div>
                                </li>
					        </ul>
				        </div>

				        <div class="clear"></div>
                    </div>
			    </div>
		    </div>

		    <div class="footer-middle">
                <div class="wrap">
                    <div class="section group example">
                        <div class="col_1_of_f_1 span_1_of_f_1">
                            <div class="section group example">
                                <div class="col_1_of_f_2 span_1_of_f_2">
                                   
                                    <div class="fb-page"
                                    	data-href="https://www.facebook.com/facebook" 
                                      	data-width="340"
                                      	data-hide-cover="false"
                                      	data-show-facepile="true">
                                    </div>
 				                </div>

                                <div class="col_1_of_f_2 span_1_of_f_2">
                                    <h3>Chính sách</h3>
						            <ul class="f-list1">
						                <li><a href="#">Chính sách giao hàng </a></li>
				                        <li><a href="#">Chính sách đổi sản phẩm </a></li>
				                        <li><a href="#">Chính sách bảo hành</a></li>
				                        <li><a href="#">Chính sách trả góp </a></li>
			         	            </ul>
 				                </div>

                                <div class="clear"></div>
                            </div>
                        </div>

                        <div class="col_1_of_f_1 span_1_of_f_1">
                            <div class="section group example">
                                <div class="col_1_of_f_2 span_1_of_f_2">
                                    <h3>LeoShop.com</h3>
						            <ul class="f-list1">
						                <li><a href="#">Giới thiêu </a></li>
				                        <li><a href="#">Góp ý, khiếu nại </a></li>
				                        <li><a href="#">Hướng dẫn mua hàng</a></li>
				                        <li><a href="#">hướng dẫn thanh toán </a></li>
				                        <li><a href="#">Hệ thống cửa hàng </a></li>
			         	            </ul>
 				                </div>

                                <div class="col_1_of_f_2 span_1_of_f_2">
                                    <h3>Liên hệ</h3>
                                    <div class="company_address">
							   		    <p>Địa chỉ: 20, Hồ Tùng Mậu, Hà Nội</p>
					   		            <p>Điện thoại: 01646761576</p>
					 	 	            <p>Email: <span>infor@leoshop.com</span></p>
                                    </div>

                                    <div class="social-media">
						                 <ul>
						                    <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="Google"><a href="#" target="_blank"> </a></span></li>
						                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Linked in"><a href="#" target="_blank"> </a> </span></li>
						                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Rss"><a href="#" target="_blank"> </a></span></li>
						                    <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Facebook"><a href="#" target="_blank"> </a></span></li>
						                </ul>
                                    </div>
                                </div>
				    
                                <div class="clear"></div>
                            </div>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>
		    </div>

		    <div class="footer-bottom">
                <div class="wrap">
	                <div class="copy">
                        <p>Copyright © 2020 by <a href="#" target="_blank">G1Mobile</a></p>
		            </div>

                    <div class="f-list2">
				        <ul>
					        <li class="active"><a href="about.html">Về chúng tôi</a></li> |
					        <li><a href="delivery.html">Điều khoản</a></li> |
					        <li><a href="lienhe.php">Liên hệ</a></li> 
				        </ul>
                    </div>
				    
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        
    </body>
</html>