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
	$matk= $_GET['matk'];
	$kq=mysqli_query($conn,"select * from taikhoan where taikhoan='".$matk."'");
	$dong=mysqli_fetch_assoc($kq);
	$_SESSION['pre'] = "donhang";
?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/backend.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    	<!-- InstanceBeginEditable name="ab" -->

        <title>Chi tiết khách hàng | G1Mobile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <script src="js/jquery1.min.js"></script>
        <!-- start menu -->
        <link href="../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="../js/megamenu.js"></script>
        <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
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
                        <a href="index.php"><img src="/../images/logoG1Moblie.png" alt=""/></a>
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
                        <input type="text" name="keyword" class="textbox" value="Tìm kiếm" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm kiếm';}">
				        <input type="submit" value="Subscribe" id="submit" name="submit">
				        <div id="response"> </div>
                    </div>
                <!-- InstanceEndEditable -->
                </div>
                
                <div class="clear"></div>
            </div>
	    </div>

		<!-- InstanceBeginEditable name="body" -->
        <div class="register_account">
            <div class="wrap">
                <h4 class="title">Chi tiết khách hàng</h4>
                <div class="col_1_of_2 span_1_of_2">
                    <p class="code">Họ tên: <?php echo $dong['hoten'];?></p>
                    <p class="code">Ngày sinh: <?php echo $dong['ngaysinh'];?></p>
                    <p class="code">Giới tính: <?php if($dong['gioitinh'] == "0") echo "Nữ"; else echo "Nam";?></p>
                    <p class="code">Địa chỉ: <?php echo $dong['diachi'];?></p>
                    <p class="code">Email: <?php echo $dong['email'];?></p>
                    <p class="code">Số điện thoại: <?php echo $dong['sdt'];?></p>
                </div>
                <div class="clear"></div>
                <p class="terms"><a href="index.php">Trở lại</a></p>
                <div class="clear"></div>
                <br><br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>
		<!-- InstanceEndEditable -->
	    <div class="footer">
		    <div class="footer-bottom">
                <div class="wrap">
	                <div class="copy">
                        <p>Copyright © 2016 by <a href="http://facebook.com/nhatnd.hnue" target="_blank">Công ty trách nhiệm vô hạn HaHa</a></p>
		            </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </body>
<!-- InstanceEnd --></html>