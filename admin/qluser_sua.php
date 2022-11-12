<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qluser'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$_SESSION['pre'] = "nhanvien";
	$loi = "";
	$tk = $_GET['matk'];
	$query = mysqli_query($conn, "select * from taikhoan where taikhoan='$tk'");
	$row = mysqli_fetch_assoc($query);
	$taikhoan =$tk;
	$hoten=$row['hoten'];
	$diachi=$row['diachi'];
	$email=$row['email'];
	$sdt=$row['sdt'];
	$ngaysinh = $row['ngaysinh'];
	$gioitinh = $row['gioitinh'];
	$quyen = $row['quyen'];
	if(isset($_POST['submit']))
	{
		$taikhoan =$_POST['txttaikhoan'];
		$hoten=$_POST['txthoten'];
		$diachi=$_POST['txtdiachi'];
		$email=$_POST['txtemail'];
		$sdt=$_POST['txtsdt'];
		$ngaysinh = $_POST['txtngaysinh'];
		$gioitinh = $_POST['txtgioitinh'];
		$quyen = $_POST['txtquyen'];
		
		if($taikhoan != "Bắt buộc")
		{
			if($hoten != "Bắt buộc")
			{
				if($loi == "")
				{
					$q = mysqli_query($conn, "select * from taikhoan where taikhoan ='$taikhoan' and taikhoan !='$tk'");
					$r = mysqli_num_rows($q);
					if($r == 0)
					{
						mysqli_query($conn, "UPDATE taikhoan SET taikhoan = '$taikhoan', hoten = '$hoten' , diachi='$diachi' , email='$email',  sdt='$sdt', ngaysinh='$ngaysinh', gioitinh='$gioitinh', quyen='$quyen'  where taikhoan.taikhoan = '".$tk."'");
						
								header("Location:index.php");
					}
					else
					{
						$loi ="Mã sản phẩm đã tồn tại";
					}
				}
			}
			else
				$loi = "Điền đầy đủ các thông tin bắt buộc";
		
		}
		else
            $loi = "Điền đầy đủ các thông tin bắt buộc";
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
                                <h4 class="title">Thêm Người dùng</h4>
                                <form action="qluser_sua.php?matk=<?php echo $tk;?>" method="post" name="themsp" enctype="multipart/form-data" style="height:510px">
                                    <div class="col_1_of_2 span_1_of_2">
                                        <p class="code">Tên tài khoản</p>
                                        <div><input type="text" name = "txttaikhoan" value="<?php echo $taikhoan;?>" onfocus="if (this.value == 'Bắt buộc') this.value = '';" onblur="if (this.value == '') {this.value = 'Bắt buộc';}"></div>
                                        <p class="code">Họ tên</p>
                                        <div><input type="text" name = "txthoten" value="<?php echo $hoten;?>" onfocus="if (this.value == 'Bắt buộc') this.value = '';" onblur="if (this.value == '') {this.value = 'Bắt buộc';}"></div>
                                        <p class="code">Email</p>
                                        <div><input type="text" name ="txtemail" value="<?php echo $email;?>" ></div>
                                        
                                        <p class="code">Quyền</p>
                                        <div>
                                            <select name="txtquyen" class="frm-field required">
<?php
												
													$aa=mysqli_query($conn,"select * from phanquyen where maquyen ='".$quyen."'");
                                                    $rr=mysqli_fetch_assoc($aa);
?>
                                                    <option value="<?php echo $quyen;?>"><?php echo $rr['tenquyen']; ?></option>
<?php
												
												  	$a=mysqli_query($conn,"select * from phanquyen where maquyen!='".$quyen."'");
												  	while ($row=mysqli_fetch_assoc($a))
												  	{
?>
                                                     	<option value="<?php echo $row['maquyen'];?>"><?php echo $row['tenquyen']; ?></option>
<?php
                                                    }
 ?>
                                            </select>
                                        </div>	
                                    </div>
                                    <div class="col_1_of_2 span_1_of_2">
                                        <p class="code">Địa chỉ</p>
                                        <div><input type="text" name ="txtdiachi" value="<?php echo $diachi;?>" ></div>
                                        <p class="code">Số điện thoại</p>
                                        <div><input type="text" name ="txtsdt" value="<?php echo $sdt;?>" ></div>
                                        <p class="code">Ngày sinh</p>
                                        <div><input type="date" value="<?php echo $ngaysinh;?>" name="txtngaysinh"></div>
                                        <p class="code">Giới tính</p>
                                        <div>
<?php
												if($gioitinh == 1)
												{
?>
                                                <select  name="txtgioitinh" onchange="change_country(this.value)" class="frm-field required">
                                                    <option value="1">Nam</option>         
                                                    <option value="0">Nữ</option>
                                                </select>
<?php 
												}
												else
												{
?>
                                                <select  name="txtgioitinh" onchange="change_country(this.value)" class="frm-field required">
                                                    <option value="0">Nữ</option>
                                                	<option value="1">Nam</option>         
                                                </select>
<?php
												}
?>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    
                                    <p class="codeloi"><?php if(isset($_POST['submit'])) echo $loi;?></p>
                                    <br>
                                    <button name="submit" class="grey">Submit</button>
                                    <p class="terms"><a href="index.php">Trở lại</a></p>
                                    <div class="clear"></div>
                                </form>
                            </div>
                        </div>
					<!-- InstanceEndEditable -->
                    <?php include '../include/footer1.php';?>
    </body>
<!-- InstanceEnd --></html>