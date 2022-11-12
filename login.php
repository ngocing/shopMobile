<?php 
	include("connect.php");
	$taikhoan = "";
	$matkhau = "";
	$_SESSION['admin']=false;
	$loitaikhoan = "";
	$loimatkhau = "";
	if(isset($_POST['Submit']))
	{
		if($_POST['taikhoan']!="")
		{
			$_taikhoan = $_POST['taikhoan'];
			$taikhoan = mysqli_real_escape_string($conn, $_taikhoan);
		}
		else
			$loitaikhoan = "Vui lòng nhập tên tài khoản";
		if($_POST['matkhau']!="")
		{
			$_matkhau = $_POST['matkhau'];
			$matkhau = mysqli_real_escape_string($conn, $_matkhau);
		}
		else
			$loimatkhau = "Vui lòng nhập mật khẩu";
		if($taikhoan != "" &&  $matkhau != "")
		{
			$sql=mysqli_query($conn,"select * from taikhoan where taikhoan='".$taikhoan."' and matkhau='".$matkhau."'");
			if (mysqli_num_rows($sql)>0)
    		{
				while($dong=mysqli_fetch_assoc($sql))
				{
					if($dong['quyen']== 0) // khach hang
					{
						$_SESSION['tk'] = $dong['taikhoan'];
						$_SESSION['tentk'] = $dong['hoten'];
						header("Location:index.php");
					}
					else // nhan vien quan tri
					{
						$_SESSION['tk'] = $dong['taikhoan'];
						$_SESSION['tentk'] = $dong['hoten'];
						$_SESSION['admin'] = true;
						$_SESSION['quyen']= $dong['quyen'];
						header("Location:index.php");
					}
				}
			}
			else
			{
				$sql = mysqli_query($conn,"select * from taikhoan where taikhoan='".$taikhoan."'");
				if(mysqli_num_rows($sql)==1)
				// tìm được 1 tên tk nhưng k đúng mật khẩu
				{
					$loimatkhau = "Sai mật khẩu";
				}
				else
				{
					$loitaikhoan ="Tài khoản không tồn tại";
				}
			}
		}
	}
?>
<!DOCTYPE HTML>

<html><!-- InstanceBegin template="/Templates/form.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    <!-- InstanceBeginEditable name="tieude" -->
        <title>Đăng nhập | G1Mobile</title>
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
		<div class="login">
            <div class="wrap">	
				<div class="col_1_of_login span_1_of_login">
					<h4 class="title">Khách hàng mới</h4>
					<p>Tạo một tài khoản để có thể mua hàng !</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
					<div class="button1">
					    <a href="register.php"><input type="submit" name="Submit" value="Tạo tài khoản"></a>
                    </div>
                    <div class="clear"></div>
				</div>

				<div class="col_1_of_login span_1_of_login">
				    <div class="login-title">
	           		    <h4 class="title">Khách hàng đã đăng ký</h4>
					    <div id="loginbox" class="loginbox">
						    <form action="login.php" method="post" name="login" id="login-form">
                            
						        <fieldset class="input">

						        <p id="login-form-username">

						            <label for="modlgn_username">Tài khoản</label>
                                    <?php if($loitaikhoan!="") echo "<p>".$loitaikhoan."</p>";?>
						            <input id="modlgn_username" type="text" name="taikhoan" value="<?php echo $taikhoan;?>" class="inputbox" size="18" autocomplete="off">
						        </p>
						        <p id="login-form-password">
						            <label for="modlgn_passwd">Mật khẩu</label>
                                    <?php if($loimatkhau!="") echo "<p>".$loimatkhau."</p>";?>
						            <input id="modlgn_passwd" type="password" name="matkhau" class="inputbox" size="18" autocomplete="off">
						        </p>
						        <div class="remember">
							        <p id="login-form-remember">
							            <label for="modlgn_remember"><a href="#">Quên mật khẩu ? </a></label>
							        </p>
							        <input type="submit" name="Submit" class="button" value="Đăng nhập"><div class="clear"></div>
							        </div>
						        </fieldset>
                            </form>
                        </div>
			        </div>
				</div>
                <div class="clear"></div>
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