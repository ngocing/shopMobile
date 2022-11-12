<?php
    include("connect.php");
	if(isset($_SESSION['tentk']))
    {
        $ten = $_SESSION['tentk'];
    }
	else
	{
		header("location:login.php");
	}
?>

<!DOCTYPE HTML>

<html><!-- InstanceBegin template="/Templates/fontend.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    	<!-- InstanceBeginEditable name="head" -->
        <title>Đặt hàng | G1Mobile</title>
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
        
        <!-- InstanceBeginEditable name="slide" -->
        
        <!-- InstanceEndEditable -->
        <!-- InstanceBeginEditable name="duongke" -->
        <div class="mens"></div>
        <!-- InstanceEndEditable -->
        
        <div class="main">
            <div class="wrap">

                <!-- InstanceBeginEditable name="body" -->
		        <div class="cont span_2_of_3">
                    
<?php
					if(isset($_POST['dathang']))
					{
						if (isset($_SESSION['giohang']))
					   	{
							$a = true;
							$madh = 0;
							while($a)
							{
								$madh++;
								$sp1=mysqli_query($conn,"select * from donhang where madh = '$madh'");
						   		$r=mysqli_num_rows($sp1);
								if($r ==0)
								{
									$a = false;
								}
							}
								
							$tk=$_SESSION['tk'];
						   	$ngaymua=date("Y-m-d");
						   	$tt=0;
							foreach($_SESSION['giohang'] as $masp => $sl)
					   		{
								$soluong=$_SESSION['giohang'][$masp];
							   	$sp=mysqli_query($conn,"select * from sanpham where masp='".$masp."'");
							   	$rows=mysqli_fetch_assoc($sp);
								$q = mysqli_query($conn, "select giakhuyenmai from khuyenmai where masp = '".$masp."'");
								if($r = mysqli_fetch_assoc($q))
									$gia = $r['giakhuyenmai'];
								else 
									$gia = $rows['dongia'];
								$thanhtien = $gia*$soluong;
							   	$tt+=$thanhtien;
								mysqli_query($conn,"INSERT INTO chitietdonhang (madh, masp, soluong, dongia, thanhtien) VALUES ( '".$madh."', '".$masp."', '".$soluong."','".$gia."', '".$thanhtien."')");
						   	}
							// thêm hoa đơn mới
						  	mysqli_query($conn,"insert into donhang (madh, matk, ngaymua, tongtien, trangthai) values('".$madh."','".$tk."','".$ngaymua."','".$tt."','0')");
						   	// thêm chi tiết hóa đơn
							
							
						   	unset($_SESSION['giohang']);
						}
						else
							header("Location:index.php");
?>						
                        <h2 class="head">Đặt hàng thành công</h2>
                        <p class="code">Chúng tôi sẽ liên hệ với bạn sớm nhất để giao hàng.</p><br>

                        <p class="code">Cám ơn bạn đã đặt mua hàng ở G1Mobile</p><br>

<?php
					}
					else
					{
?>						<h2 class="head">Xác nhận thông tin</h2>
						<div class="register_account">
                            <form action="dathang.php" method="post">
                                <p>Họ tên người nhận</p>
                                <input type="text" name="txthoten" value="<?php echo $_SESSION['tentk'];?>">
                                <p>Địa chỉ người nhận</p>
                                <input type="text" name="txtdiachi">
                                <p>Số điện thoại người nhận</p>
                                <input type="text" name="txtsdt">
                                <div class="btn_form">
                                    <input type="submit" name="dathang" value="Đặt hàng" title="">
                                </div>
                            </form>
                        </div>
<?php
					}
?>			 						 			    
		        </div>
                <!-- InstanceEndEditable -->

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
		
        <?php include './include/footer.php';?>
        
    </body>
<!-- InstanceEnd --></html>