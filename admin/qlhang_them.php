<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlhang'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$_SESSION['pre'] = "hang";
	$ma = "";
	$ten = "";
	$loima = "";
	$loiten = "";
	if(isset($_POST['submit']))
	{
		$ma = $_POST['txtMahang'];
		$ten = $_POST['txtTenhang'];
		if($ma != "" && $ten != "")
		{
			$query1 = mysqli_query($conn, "select * from hang where mahang = '$ma'");
			if(mysqli_num_rows($query1) == 0)
			{
				mysqli_query($conn, "INSERT INTO hang (mahang, tenhang) VALUES ('$ma', '$ten')");
				
				header("Location:index.php");
			}
			else
			{
				$loima = "Mã sản phẩm đã tồn tại";
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

        <title>THêm hãng sản phẩm | G1Mobile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/png" href="../images/G1MobileF.ico"/>
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
                <h4 class="title">Tạo hãng sản xuất</h4>
                <form action="qlhang_them.php" method="post" style="height:510px">
                    <div class="col_1_of_2 span_1_of_2">
                        <br><br><br><br><br>
                        <p class="code">Mã hãng</p>
                        <div><input type="text" value="<?php echo $ma;?>" name = "txtMahang"></div>
                        <p class = 'codeloi'><?php echo $loima;?></p>
                        <br><br><br><br><br>
                    </div>
                    <div class="col_1_of_2 span_1_of_2">
                        <br><br><br><br><br>	
                        <p class="code">Tên hãng</p>
                        <div><input type="text" name ="txtTenhang" value="<?php echo $ten;?>" ></div>
                        <p class = 'codeloi'> <?php echo $loiten;?></p>
                        <br><br><br><br><br>
                    </div>
                    <div class="clear"></div>
                    <button name="submit" class="grey">Lưu</button>
                    <p class="terms"><a href="index.php">Trở lại</a></p>
                    <div class="clear"></div><br><br><br>
                </form>
            </div>
        </div>
		<!-- InstanceEndEditable -->
        <?php include '../include/footer1.php';?>
    </body>
<!-- InstanceEnd --></html>