<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlkhuyenmai'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$_SESSION['pre'] = "khuyenmai";
	$masp = "";
	$giakhuyenmai = "";
	$loima = "";
	$loiten = "";
	if(isset($_POST['submit']))
	{
		$masp = $_POST['txtmasp'];
		$giakhuyenmai = $_POST['txtgiakhuyenmai'];
		if($masp != "" && $giakhuyenmai != "")
		{
			mysqli_query($conn, "UPDATE sanpham SET giakhuyenmai = '".$giakhuyenmai."' WHERE masp = '".$masp."'");				
            header("Location:index.php");			
		}
		if($giakhuyenmai == "")
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                            	<h4 class="title">Thêm khuyến mại</h4>
                                <form action="qlkhuyenmai_them.php" method="post" style="height:510px">
                                    <div class="col_1_of_2 span_1_of_2">
                                        <br><br><br><br><br>                                     
                                        <p class="code">Mã sản phẩm</p>
                                        <div>
                                        	<select name="txtmasp" class="frm-field required">
<?php                                            $a=mysqli_query($conn,"select * from sanpham ");
												  	while ($row=mysqli_fetch_assoc($a))
												  	{
?>
                                                         <option value="<?php echo $row['masp'];?>"><?php echo $row['tensp'];?> (<?php echo $row['dongia'];?> VNĐ)</option>
                                                         
<?php
                                                    }
?>
                                            </select>
                                        </div>
                                        <p class = 'codeloi'><?php echo $loima;?></p>
                                        <br><br><br><br><br>
                                    </div>
                                    <div class="col_1_of_2 span_1_of_2">
                                        <br><br><br><br><br>	
                                        <p class="code">Giá khuyến mại</p>
                                        <div><input type="text" name ="txtgiakhuyenmai" value="<?php echo $giakhuyenmai;?>" ></div>
                                        <p class = 'codeloi'> <?php echo $loiten;?></p>
                                        <br><br><br><br><br>
                                    </div>
                                    <div class="clear"></div>
                                    <button name="submit" class="grey">Lưu</button>
                                    <p class="terms"><a href="index.php">Trở lại</a></p>
                                    <div class="clear"></div><br><br>
                                </form>
							</div>
                    	</div>
					<!-- InstanceEndEditable -->
                    <?php include '../include/footer1.php';?>
    </body>
<!-- InstanceEnd --></html>