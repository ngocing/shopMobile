<?php 
	include("connect.php");
	$taikhoan ="";
	$matkhau="";
	$nhaplaimk="";
	$hoten="";
	$diachi="";
	$email="";
	$sdt="";
	$ngaysinh = "";
	$gioitinh ="";
	$loi = false;		
?>
<!DOCTYPE HTML>

<html><!-- InstanceBegin template="/Templates/form.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    <!-- InstanceBeginEditable name="tieude" -->
        <title>Đăng ký | G1Mobile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery1.min.js"></script>
        <!-- start menu -->
        <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="js/megamenu.js"></script>
        <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
        <!-- dropdown -->
        <script src="js/jquery.easydropdown.js"></script>
        <div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <!-- InstanceEndEditable -->
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
                        <a href="index.php"><img src="./images/logoG1Moblie.png" alt=""/></a>
				    </div>

				    <div class="menu">
	                    <ul class="megamenu skyblue">
                            <li class="active grid"><a href="index.php">Trang chủ</a></li>
                            <li><a href="dienthoai.php">Điện thoại</a></li>
                            <li><a href="phukien.php">Phụ kiện</a></li>
                            <li><a href="phukien.php">Khuyến mại</a></li>
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
					                <li><p>Giỏ hàng đang trống !</p></li>
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
      
      	<!-- InstanceBeginEditable name="body" -->
        <div class="register_account">
			<div class="wrap">
			
				<h4 class="title">Tạo tài khoản</h4>
				<form action="register.php" method="post" name="dangky">
				<?php 
					if(isset($_POST['subdangki']))
					{
				?>
					<div class="col_1_of_2 span_1_of_2">
						<p class="code">Tên tài khoản</p>
                        <?php 
							if($_POST['txttaikhoan'] != "")
							{
								$_taikhoan = $_POST['txttaikhoan'];
								$taikhoan=mysqli_real_escape_string($conn, $_taikhoan);
								if(mysqli_num_rows(mysqli_query($conn,"select * from taikhoan where taikhoan ='$taikhoan'")))
								{	
									$loi = true;
									echo "<p>Tài khoản đã tồn tại</p>";
								}
							}
							else
							{
								$loi = true;
								echo "<p>Không được để trống";
							}
						?>
						<div><input type="text" value="<?php echo $taikhoan;?>" name = "txttaikhoan"></div>
						<p class="code">Mật khẩu</p>
                        <?php 
							if($_POST['txtmatkhau'] != "")
							{
								$_matkhau = $_POST['txtmatkhau'];
								$matkhau = mysqli_real_escape_string($conn, $_matkhau);
								if(strlen($matkhau)<6)
								{
									$loi = true;
									echo  "<p>Mật khẩu phải từ 6 ký tự trở lên</p>";
								}
							}
							else
							{
								$loi = true;
								echo "<p>không được để trống";
							}
						?>
						<div><input type="password" name="txtmatkhau" value="<?php echo $matkhau;?>" ></div>
						<p class="code">Nhập lại mật khẩu</p>
                        <?php 
							if($_POST['txtnhaplaimk'] != "")
							{
								$nhaplaimk = $_POST['txtnhaplaimk'];
								$nhaplaimk = mysqli_real_escape_string($conn, $nhaplaimk);
								if( $matkhau != $nhaplaimk)
								{
									$loi = true;
									echo "<p>Mật khẩu không khớp</p>";
								}
							}
							else
							{
								$loi = true;
								echo "<p>không được để trống";
							}
						?>
						<div><input type="password" name = "txtnhaplaimk" value="<?php echo $nhaplaimk;?>"></div>
						<p class="code">Họ tên</p>
                        <?php 
							if($_POST['txthoten'] != "")
							{
								$hoten = $_POST['txthoten'];
								$hoten = mysqli_real_escape_string($conn, $hoten);
							}
							else
							{
								$loi = true;
								echo "<p>Không được để trống";
							}
						?>
						<div><input type="text" value="<?php echo $hoten;?>" name = "txthoten"></div>
						<p class="code">Giới tính</p>
                        <?php 
							$gioitinh = $_POST['txtgioitinh'];
						?>
						<div>
							<select name="txtgioitinh" value="<?php echo $gioitinh;?>" onchange="change_country(this.value)" class="frm-field required">
								<option value="1">Nam</option>         
								<option value="0">Nữ</option>
							</select>
						</div>	
					</div>
					<div class="col_1_of_2 span_1_of_2">	
						<p class="code">E-Mail</p>
                        <?php 
							if($_POST['txtemail'] != "")
							{
								$email = $_POST['txtemail'];
								$email = mysqli_real_escape_string($conn, $email);
								if(mysqli_num_rows(mysqli_query($conn,"select * from taikhoan where email ='$email'")))
								{
									$loi = true;
									echo "<p>Địa chỉ email đã được đăng ký</p>";
								}
								if(filter_var($email,FILTER_VALIDATE_EMAIL))
								{}
								else
								{
									$loi = true;
									echo "<p>Địa chỉ email không hợp lệ</p>";
								}
							}
							else
							{
								$loi = true;
								echo "<p>không được để trống";
							}
						?>
						<div><input type="text" value="<?php echo $email;?>" name = "txtemail"></div>
						<p class="code">Địa chỉ</p>
                        <?php 
							if($_POST['txtdiachi'] != "")
							{
								$diachi = $_POST['txtdiachi'];
								$diachi = mysqli_real_escape_string($conn, $diachi);
							}
							else
							{
								$loi = true;
								echo "<p>không được để trống";
							}
						?>
						<div><input type="text" name ="txtdiachi" value="<?php echo $diachi;?>" ></div>
						<p class="code">Số điện thoại</p>
                        <?php 
							if($_POST['txtdienthoai'] != "")
							{
								$sdt = $_POST['txtdienthoai'];
								$sdt = mysqli_real_escape_string($conn, $sdt);
							}
							else
							{
								$loi = true;
								echo "<p>không được để trống";
							}
						?>
						<div><input type="text" name = "txtdienthoai" value="<?php echo $sdt;?>" ></div>
						<p class="code">Ngày sinh</p>
                        <?php 
							if($_POST['txtngaysinh'] != "")
							{
								$ngaysinh = $_POST['txtngaysinh'];
							}
							else
							{
								$loi = true;
								echo "<p>không được để trống";
							}
						?>
						<div><input type="date" name = "txtngaysinh" value="<?php echo $ngaysinh;?>" ></div>											
					</div>
                	<div class="clear"></div>
<?php 
						if(!$loi)
						{
							mysqli_query($conn,"INSERT INTO taikhoan(taikhoan, matkhau,hoten,ngaysinh,gioitinh,diachi,email,sdt,quyen) values('$taikhoan','$matkhau','$hoten','$ngaysinh','$gioitinh','$diachi','$email','$sdt',0)");
							if(mysqli_num_rows(mysqli_query($conn,"select * from taikhoan where taikhoan ='$taikhoan'")))
								echo "<p>Chúc mừng !! Bạn đã đăng ký thành công. <a href='login.php'> Đăng nhập</a></p>";
						}
					}
					else
					{
?>
						<div class="col_1_of_2 span_1_of_2">
							<p class="code">Tên tài khoản</p>
                            <div><input type="text" value="" name = "txttaikhoan"></div>
                            <p class="code">Mật khẩu</p>
                            <div><input type="password" name="txtmatkhau" value="" ></div>
                            <p class="code">Nhập lại mật khẩu</p>
                            <div><input type="password" name = "txtnhaplaimk" value=""></div>
                            <p class="code">Họ tên</p>
                            <div><input type="text" value="" name = "txthoten"></div>
							<p class="code">Giới tính</p>
                            <div>
                                <select name="txtgioitinh" value="" onchange="change_country(this.value)" class="frm-field required">
                                    <option value="1">Nam</option>         
                                    <option value="0">Nữ</option>
                                </select>
                            </div>	   
                        </div>
                        <div class="col_1_of_2 span_1_of_2">	
                            <p class="code">E-Mail</p>
                            <div><input type="text" value="" name = "txtemail"></div>
                            <p class="code">Địa chỉ</p>
                            <div><input type="text" name ="txtdiachi" value="" ></div>
                            <p class="code">Số điện thoại</p>
                            <div><input type="text" name = "txtdienthoai" value="" ></div>
                            <p class="code">Ngày sinh</p>
                            <div><input type="date" name = "txtngaysinh" value="" ></div>                                                                              
                        </div>
                        <div class="clear"></div>
<?php
					}
					?>
                    
					<br>
					<button name="subdangki" class="grey">Tạo tài khoản</button>
					<p class="terms">Khi bạn click 'Tạo tài khoản' thì bạn đã đồng ý với <a href="#">Điều khoản &amp; điều kiện</a> của chúng tôi.</p>
					<div class="clear"></div>
				</form>
				
			</div>
		</div>
		<!-- InstanceEndEditable -->	
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
                                    <span class="f-text">Hotline 01234567890</span>
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
                                    <h3>Tin tức</h3>
						            <ul class="f-list1">
						                <li><a href="tintuc.php">Tin mới </a></li>
				                        <li><a href="khuyenmai.php">Khuyễn mại </a></li>
			         	            </ul>
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
                                    <h3>G1Mobile.com</h3>
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
									<p>Địa chỉ: 123 Cầu Diễn, Hà Nội</p>
					   		            <p>Điện thoại: 01234567890</p>
					 	 	            <p>Email: <span>infor@g1mobile.com</span></p>
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
<!-- InstanceEnd --></html>