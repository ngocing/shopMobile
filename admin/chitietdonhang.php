<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qldonhang'] == "0")
		{
			header("Location:trong.html");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$madh=$_GET['madh'];$matk= $_GET['matk'];
	$kq=mysqli_query($conn,"select * from chitietdonhang where madh='".$madh."'");
	$_SESSION['pre'] = "donhang";
	
	$matk= $_GET['matk'];
	$fkq=mysqli_query($conn,"select * from taikhoan where taikhoan='".$matk."'");
	$fdong=mysqli_fetch_assoc($fkq);
?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/backend.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    	<!-- InstanceBeginEditable name="ab" -->

        <title>Chi tiết đơn hàng<?php echo $madh;?> | G1Mobile</title>
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
        <div class="mens">  
            <div class="main">
                <div class="wrap">
                    <div class="cont span_2_of_3">
                    	<p class="code">Họ tên: <?php echo $fdong['hoten'];?></p>
                        <p class="code">Ngày sinh: <?php echo $fdong['ngaysinh'];?></p>
                        <p class="code">Giới tính: <?php if($fdong['gioitinh'] == "0") echo "Nữ"; else echo "Nam";?></p>
                        <p class="code">Địa chỉ: <?php echo $fdong['diachi'];?></p>
                        <p class="code">Email: <?php echo $fdong['email'];?></p>
                        <p class="code">Số điện thoại: <?php echo $fdong['sdt'];?></p><br>
                        <h2 class="head">Chi tiết hóa đơn <?php echo $madh;?></h2>
                        <div class="mens-toolbarbang">
                            <table  class="bang">
                                <tr >
                                    <td>Mã sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td>Đơn giá</td>
                                    <td>Thành tiền</td>
                                </tr>
<?php
                            $tong=0;
                            while($dong = mysqli_fetch_assoc($kq))
                            {
?>
                                <tr>
                                    <td><?php echo $dong['masp']?></td>
<?php 
                                    $qrrr = mysqli_query($conn, "select * from sanpham where masp='".$dong['masp']."'");
                                    $tensp = mysqli_fetch_assoc($qrrr);
?>
                                    <td><?php echo $tensp['tensp'];?></td>
                                    <td><?php echo $dong['soluong']?></td>
                                    <td><?php echo $dong['dongia']?></td>
                                    <td><?php echo $dong['thanhtien']; $tong += $dong['thanhtien'];?></td>
                                </tr>
<?php
                            }
?>
                                <tr >
                                    <td colspan="4">Tổng tiền: </td>
                                    <td><?php echo $tong;?></td>
                                </tr>
                            </table>
                            <div class="clear"></div>
                            
                        </div>
                        <form method="post" action="xuatdonhang.php">
                            <input style="float: right; margin-right:13px;" type="submit" name="export" class="btn btn-success" value="Xuất" />
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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