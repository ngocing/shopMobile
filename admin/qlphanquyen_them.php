<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlphanquyen'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$_SESSION['pre'] = "phanquyen";
	$ma = "";
	$ten = "";
	$loima = "";
	$loiten = "";
	if(isset($_POST['submit']))
	{
		$ma = $_POST['txtmaquyen'];
		$ten = $_POST['txttenquyen'];
		if(isset($_POST['qlbanner']))$qlbanner =$_POST['qlbanner']; else $qlbanner ="0";
		if(isset($_POST['qlthacmac']))$qlthacmac = $_POST['qlthacmac'];else $qlthacmac ="0";
		if(isset($_POST['qldonhang']))$qldonhang = $_POST['qldonhang'];else $qldonhang ="0";
		if(isset($_POST['qlhang']))$qlhang = $_POST['qlhang'];else $qlhang ="0";
		if(isset($_POST['qlsanpham']))$qlsanpham = $_POST['qlsanpham'];else $qlsanpham ="0";
		if(isset($_POST['qltintuc']))$qltintuc = $_POST['qltintuc'];else $qltintuc ="0";
		if(isset($_POST['qlkhachhang']))$qlkhachhang = $_POST['qlkhachhang'];else $qlkhachhang ="0";
		if(isset($_POST['qluser']))$qluser = $_POST['qluser'];else $qluser ="0";
		if(isset($_POST['qlphanquyen']))$qlphanquyen = $_POST['qlphanquyen'];else $qlphanquyen ="0";
		if(isset($_POST['qlkhuyenmai']))$qlkhuyenmai = $_POST['qlkhuyenmai'];else $qlkhuyenmai = "0";
		if($ma != "" && $ten != "")
		{
			$query1 = mysqli_query($conn, "select * from phanquyen where maquyen = '$ma'");
			if(mysqli_num_rows($query1) == 0)
			{
				mysqli_query($conn, "INSERT INTO phanquyen (maquyen, tenquyen , qlbanner, qlthacmac, qldonhang, qlhang, qlsanpham, qltintuc, qlkhachhang,  qluser,qlphanquyen, qlkhuyenmai) VALUES ('$ma', '$ten', $qlbanner, $qlthacmac, $qldonhang, $qlhang, $qlsanpham, $qltintuc, $qlkhachhang, $qluser, $qlphanquyen, $qlkhuyenmai );");
				
				header("Location:index.php");
			}
			else
			{
				$loima = "Mã đã tồn tại";
			}
		}
		if($ma == "")
			$loima = "Không được để trống";
		if($ten == "")
			$loiten = "Không được để trông";
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
                <h4 class="title">Thêm quyền</h4>
                <form action="qlphanquyen_them.php" method="post" style="height:510px;">
                    <div class="col_1_of_2 span_1_of_2">
                        <br><br>
                        <p class="code">Mã quyền</p>
                        <div><input type="text" value="<?php echo $ma?>" name = "txtmaquyen"></div>
                        <p class = 'codeloi'><?php echo $loima?></p>
                        <br><br>
                        <p class="code">Quyền quản trị</p><br>
                        <input type="checkbox" name="qlbanner" value="1">Quẩn lý banner<br>
                        <input type="checkbox" name="qlthacmac" value="1">Quản lý thắc mắc<br>
                        <input type="checkbox" name="qldonhang" value="1">Quản lý đơn hàng<br>
                        <input type="checkbox" name="qlhang" value="1">Quản lý hãng<br>
                        <input type="checkbox" name="qlsanpham" value="1">Quản lý sản phẩm<br>
                    </div>
                    <div class="col_1_of_2 span_1_of_2">
                        <br><br>
                        <p class="code">Tên quyền</p>
                        <div><input type="text" value="<?php echo $ten?>" name = "txttenquyen"></div>
                        <p class = 'codeloi'><?php echo $loiten?></p>
                        <br><br><br><br>
                        <input type="checkbox" name="qltintuc" value="1">Quản lý tin tức<br>
                        <input type="checkbox" name="qlkhachhang" value="1">Quản lý khách hàng<br>
                        <input type="checkbox" name="qluser" value="1">Quản lý nhân viên<br>
                        <input type="checkbox" name="qlphanquyen" value="1">Quản lý phân quyền<br>
                        <input type="checkbox" name="qlkhuyenmai" value="1">Quản lý khuyến mại<br>
                    </div>
                    <div class="clear"></div><br><br>
                    <button name="submit" class="grey">Lưu</button>
                    <p class="terms"><a href="index.php">Trở lại</a></p>
                    <div class="clear"></div>
                    <br><br>
                </form>
            </div>
        </div>
		<!-- InstanceEndEditable -->
	    <?php include '../include/footer1.php';?>
    </body>
<!-- InstanceEnd --></html>