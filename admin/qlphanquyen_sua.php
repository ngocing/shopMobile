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
	$key = $_GET['maquyen'];
	$qqq = mysqli_query($conn,"select * from phanquyen where maquyen = '".$key."'");
	$rrr = mysqli_fetch_assoc($qqq);
	$ma = $key;
	$ten = $rrr['tenquyen'];
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
			$query1 = mysqli_query($conn, "select * from phanquyen where maquyen = '$ma' and maquyen != '$key'");
			if(mysqli_num_rows($query1) == 0)
			{
				mysqli_query($conn, "update phanquyen set maquyen = '$ma', tenquyen  ='$ten', qlbanner = '$qlbanner' , qlthacmac= '$qlthacmac', qldonhang='$qldonhang', qlhang='$qlhang', qlsanpham='$qlsanpham', qltintuc='$qltintuc', qlkhachhang='$qlkhachhang',  qluser='$qluser',qlphanquyen='$qlphanquyen', qlkhuyenmai='$qlkhuyenmai' where maquyen = '$key'");
				
				header("Location:index.php");
			}
			else
			{
				$loima = "M?? ???? t???n t???i";
			}
		}
		if($ma == "")
			$loima = "Kh??ng ???????c ????? tr???ng";
		if($ten == "")
			$loiten = "Kh??ng ???????c ????? tr??ng";
	}
?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/backend.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    	<!-- InstanceBeginEditable name="ab" -->

        <title>Trang qu???n tr??? | G1Mobile</title>
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
                    	Xin ch??o 
                        <li><a href="../thongtinchitiet.php"><?php echo $tentk;?></a></li> | 
                        <li><a href="../logout.php">????ng xu???t</a></li> | 
                        <li><a href='../index.php'>Quay l???i trang ch???</a></li>
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
                            <li class="active grid"><a href="index.php">Trang ch??? admin</a></li>
                        </ul>
                    </div>
                </div>

                <div class="header-bottom-right">
                <!-- InstanceBeginEditable name="head" -->
                    <div class="search">	  
                        <input type="text" name="keyword" class="textbox" value="T??m ki???m" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'T??m ki???m';}">
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
                <h4 class="title">T???o h??ng s???n xu???t</h4>
                <form action="qlphanquyen_sua.php" method="post" style="height:510px">
                    <div class="col_1_of_2 span_1_of_2">
                        <br><br>
                        <p class="code">M?? quy???n</p>
                        <div><input type="text" value="<?php echo $ma?>" name = "txtmaquyen"></div>
                        <p class = 'codeloi'><?php echo $loima?></p>
                        <br><br>
                        <p class="code">Quy???n qu???n tr???</p><br>
                        <input type="checkbox" name="qlbanner" value="1">Qu???n l?? banner<br>
                        <input type="checkbox" name="qlthacmac" value="1">Qu???n l?? th???c m???c<br>
                        <input type="checkbox" name="qldonhang" value="1">Qu???n l?? ????n h??ng<br>
                        <input type="checkbox" name="qlhang" value="1">Qu???n l?? h??ng<br>
                        <input type="checkbox" name="qlsanpham" value="1">Qu???n l?? s???n ph???m<br>
                    </div>
                    <div class="col_1_of_2 span_1_of_2">
                        <br><br>
                        <p class="code">T??n quy???n</p>
                        <div><input type="text" value="<?php echo $ten?>" name = "txttenquyen"></div>
                        <p class = 'codeloi'><?php echo $loiten?></p>
                        <br><br><br><br>
                        <input type="checkbox" name="qltintuc" value="1">Qu???n l?? tin t???c<br>
                        <input type="checkbox" name="qlkhachhang" value="1">Qu???n l?? kh??ch h??ng<br>
                        <input type="checkbox" name="qluser" value="1">Qu???n l?? nh??n vi??n<br>
                        <input type="checkbox" name="qlphanquyen" value="1">Qu???n l?? ph??n quy???n<br>
                        <input type="checkbox" name="qlkhuyenmai" value="1">Qu???n l?? khuy???n m???i<br>
                    </div>
                    <div class="clear"></div><br><br>
                    <button name="submit" class="grey">L??u</button>
                    <p class="terms"><a href="index.php">Tr??? l???i</a></p>
                    <div class="clear"></div><br><br>
                </form>
            </div>
        </div>
		<!-- InstanceEndEditable -->
        <?php include '../include/footer1.php';?>
    </body>
<!-- InstanceEnd --></html>