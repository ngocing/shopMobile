<?php 
	include("connect.php");
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
<?php
			if(isset($_POST['submit']))
			{
				$hoten = $_POST['txthoten'];$hoten= mysqli_real_escape_string($conn, $hoten);
				$email = $_POST['txtemail'];$email= mysqli_real_escape_string($conn, $email);
				$tieude = $_POST['txttieude'];$tieude= mysqli_real_escape_string($conn, $tieude);
				$noidung = $_POST['txtnoidung'];$noidung= mysqli_real_escape_string($conn, $noidung);
				mysqli_query($conn, "INSERT INTO thacmac (hoten, email,tieude, noidung, phanhoi) VALUES ('$hoten', '$email','$tieude', '$noidung', '')");
?>
			<h2 class="head">Thắc mắc của bạn đã được gửi đi.</h2>
            <p>Cám ơn bạn đã đóng góp ý kiến</p>
<?php
			}
			else
			{
?>
       		<h2 class="head">Thắc mắc</h2>
		   <div class="content-top">
			   <form method="post" action="lienhe.php">
					<div class="to">
                     	<input name="txthoten" type="text" class="text" value="Họ Tên" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Họ Tên';}">			 	
					</div>
					<div class="to">
						<input name="txtemail" type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">	
					</div>
                    <div class="to1">
                     	<input name="txttieude" type="text" class="text" value="Tiêu đề" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tiêu đề';}">
					</div>
					<div class="text">
	                   <textarea name="txtnoidung" value="Nội dung:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nội dung:';}">Nội dung:</textarea>
	                </div>
	                <div class="submit">
	               		<input type="submit" name ="submit" value="Gửi">
	                </div>
               </form>
            </div>
<?php
			}
?>
       </div> 
    </div>
		<!-- InstanceEndEditable -->	
        <?php include './include/footer.php';?>
    </body>
<!-- InstanceEnd --></html>