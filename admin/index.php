<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
	}
	else
	{
		header("Location:../index.php");
	}
	
?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/backend.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    	<!-- InstanceBeginEditable name="ab" -->

        <title>Trang quản trị | G1Mobile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/png" href="../images/G1MobileF.ico"/>
        <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <script src="../js/jquery1.min.js"></script>
        <link href="../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="../js/megamenu.js"></script>
        <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
        <script>
        window.onload = function()
		{
			<?php if(isset($_SESSION['pre']))
			{
				$pre = $_SESSION['pre'];
				if($pre == "banner")
					echo "getbanner(0)";
				if($pre == "phanquyen")
					echo "getphanquyen(0)";
				if($pre == "donhang")
					echo "getdonhang(0)";
				if($pre == "hang")
					echo "gethang(0, '')";
				if($pre == "thacmac")
					echo "getthacmac(0)";
				if($pre == "sanpham")
					echo "getsanpham(0,'')";
				if($pre == "khuyenmai")
					echo "getkhuyenmai(0)";
				if($pre == "tintuc")
					echo "gettintuc(0)";
				if($pre == "nhanvien")
					echo "getnhanvien(0,'')";
				if($pre == "khachhang")
					echo "getkhachhang(0,'')";
				
			}
			$_SESSION['pre'] = "";
			?>  
		};
        </script>
        
        <!-- InstanceEndEditable -->
        <script type="text/javascript" src="../js/ajax.js"></script>
    </head>
    <body>
        <div class="header-top">
            <div class="wrap"> 
                <div class="cssmenu">
                    <ul>
                    	Xin chào 
                        <li><a href="../thongtinchitiet.php"><?php echo $tentk;?></a></li> | 
                        <li><a href="../logout.php">Đăng xuất</a></li> | 
                        <li><a href='../index.php'>Quay lại trang chủ</a></li>
				    </ul>
			    </div>
                <div class="clear"></div>
            </div>
        </div>

	    <div class="header-bottom">
            <div class="wrap">
                <div class="header-bottom-left">
                    <div class="logo">
                        <a href="index.php"><img src="../images/logoG1Moblie.png" alt=""/></a>
				    </div>

				    <div class="menu">
	                    <ul class="megamenu skyblue">
                            <li class="active grid"><a href="index.php">Trang chủ admin</a></li>
                        </ul>
                    </div>
                </div>

                <div class="header-bottom-right">
                <!-- InstanceBeginEditable name="head" -->

                    <div class="search">	  
                        <input id="timkiem" type="text" name="keyword" onChange="" class="textbox" value="Tìm kiếm" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm kiếm';}">
				        <input type="submit" value="Subscribe"  id="submit" name="submit">
				        <div id="response"> </div>
                    </div>
                    
                <!-- InstanceEndEditable -->
                </div>
                
                <div class="clear"></div>
            </div>
	    </div>

		<!-- InstanceBeginEditable name="body" -->
        <div class="mens">  
            <div class="main">
                <div class="wrap">
                
                    <div class="cont span_2_of_3" id="noidung">
                    
                    </div>
                    
                    <div class="rsidebar span_1_of_left">
                        <h5 class="m_1">Chọn nhanh</h5>
                        
                        <ul class="kids">
                            <li><a href="#" onClick="getbanner(0)">Cài đặt banner</a></li>
                            <li><a href="#" onClick="getgiaidapthacmac(0)">Thắc mắc của khách hàng</a></li>
                            <li><a href="../index.php">Quay lại trang chủ</a></li>
                            <li><a href="../logout.php">Đăng xuất</a></li>
					    </ul>
                        <h5 class="m_1">Quản lý</h5>
                        
                        <ul class="kids">
						    <li><a href="#" onClick="getphanquyen(0)">Phân quyền</a></li>
                            <li><a href="#" onClick="getdonhang(0)">Đơn hàng</a></li>
                            <li><a href="#" onClick="gethang(0, '')">Hãng điện thoại</a></li>
                            <li><a href="#" onClick="getthacmac(0)">Quản lý thắc mắc</a></li>
                            <li><a href="#" onClick="getsanpham(0, '')">Sản phẩm</a></li>
                            <li><a href="#" onClick="getkhuyenmai(0)">Khuyến mại</a></li>
                            <li><a href="#" onClick="gettintuc(0)">Tin tức</a></li>
                            <li><a href="#" onClick="getnhanvien(0, '')">Nhân viên</a></li>
                            <li><a href="#" onClick="getkhachhang(0, '')">Khách hàng</a></li>
                            
					    </ul>
                    </div>
        			<div class="clear"></div>
                </div>
            </div>
		</div>
        
		<!-- InstanceEndEditable -->
        <?php include '../include/footer1.php';?>
    </body>
<!-- InstanceEnd --></html>