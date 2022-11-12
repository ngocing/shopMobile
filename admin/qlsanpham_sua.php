<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlsanpham'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$_SESSION['pre'] = "sanpham";
	$loi = "Điền đầy đủ các thông tin bắt buộc";
	$masanpham = $_GET['masp'];
	$query = mysqli_query($conn, "select * from sanpham where masp='$masanpham'");
	$row = mysqli_fetch_assoc($query);
	$masp = $row['masp'];
	$tensp = $row['tensp'];
	$soluong = $row['soluong'];
	$dongia = $row['dongia'];
	$ngaynhap = $row['ngaynhap'];
	$manhinh = $row['manhinh'];
	$hedieuhanh = $row['hedieuhanh'];
	$cameratruoc = $row['cameratruoc'];
	$camerasau = $row['camerasau'];
	$cpu = $row['CPU'];
	$ram = $row['ram'];
	$bonhotrong = $row['bonhotrong'];
	$dungluongpin = $row['dungluongpin'];
	$ketnoi = $row['ketnoi'];
	$baohanh = $row['baohanh'];
	$thongtin =$row['thongtin'];
	$hinhanh = $row['hinhanh'];
	$hinhanh1 = $row['hinhanh1'];
	$hinhanh2 = $row['hinhanh2'];
	if(isset($_POST['submit']))
	{
		$masp = $_POST['txtmasp'];
		$tensp = $_POST['txttensp'];
		$soluong = $_POST['txtsoluong'];
		$dongia = $_POST['txtdongia'];
		$thongtin = $_POST['txtthongtin'];
		$ngaynhap = $_POST['txtngaynhap'];
		$hang = $_POST['txthang'];
		$loai = $_POST['txtloai'];
		$manhinh = $_POST['txtmanhinh'];
		$hedieuhanh = $_POST['txthedieuhanh'];
		$cameratruoc = $_POST['txtcameratruoc'];
		$camerasau = $_POST['txtcamerasau'];
		$cpu = $_POST['txtcpu'];
		$ram = $_POST['txtram'];
		$bonhotrong = $_POST['txtbonhotrong'];
		$dungluongpin = $_POST['txtdungluongpin'];
		$ketnoi = $_POST['txtketnoi'];
		$baohanh = $_POST['txtbaohanh'];
		
		if($_FILES['anh']['name'] != NULL)
        {
			$path = "../images/sanpham/"; 
			$tmp_name = $_FILES['anh']['tmp_name'];
			$name = $_FILES['anh']['name'];
			$type = $_FILES['anh']['type']; 
			$size = $_FILES['anh']['size']; 
			move_uploaded_file($tmp_name,$path.$name);
			$hinhanh = "images/sanpham/".$name;
       	}
		if($_FILES['anh1']['name'] != NULL)
        {
			$path = "../images/sanpham/"; 
			$tmp_name = $_FILES['anh1']['tmp_name'];
			$name = $_FILES['anh1']['name'];
			$type = $_FILES['anh1']['type']; 
			$size = $_FILES['anh1']['size']; 
			move_uploaded_file($tmp_name,$path.$name);
			$hinhanh1 = "images/sanpham/".$name;
       	}
		if($_FILES['anh2']['name'] != NULL)
        {
			$path = "../images/sanpham/"; 
			$tmp_name = $_FILES['anh2']['tmp_name'];
			$name = $_FILES['anh2']['name'];
			$type = $_FILES['anh2']['type']; 
			$size = $_FILES['anh2']['size']; 
			move_uploaded_file($tmp_name,$path.$name);
			$hinhanh2 = "images/sanpham/".$name;
       	}
		
		if($masp != "Bắt buộc")
		{
			if($tensp != "Bắt buộc")
			{
				if($tensp != "Bắt buộc")
				{
					if($soluong != "Bắt buộc")
					{
						if($dongia != "Bắt buộc")
						{
							$q = mysqli_query($conn, "select * from sanpham where masp ='$masp' and masp!='$masanpham'");
							$r = mysqli_num_rows($q);
							if($r == 0)
							{
								mysqli_query($conn, "UPDATE sanpham SET masp = '$masp', tensp = '$tensp' , soluong='$soluong' , dongia='$dongia', thongtin='$thongtin',  hinhanh='$hinhanh', hinhanh1='$hinhanh1', hinhanh2='$hinhanh2', ngaynhap='$ngaynhap', hang='$hang', loai='$loai', manhinh='$manhinh', hedieuhanh='$hedieuhanh', cameratruoc='$cameratruoc', camerasau='$camerasau', CPU='$cpu', ram='$ram', bonhotrong='$bonhotrong', dungluongpin= '$dungluongpin', ketnoi='$ketnoi', baohanh= '$baohanh' where sanpham.masp = '".$masanpham."'");
								if($hinhanh != $row['hinhanh'])
								{
									$qq = mysqli_query($conn, "select * from sanpham where hinhanh ='".$row['hinhanh']."' or hinhanh1 ='".$row['hinhanh']."' or hinhanh2 ='".$row['hinhanh']."'");
									$rq = mysqli_num_rows($qq);
									if($rq == 0)
									{
										unlink('../'.$row['hinhanh']);
									}
								}
								if($hinhanh1 != $row['hinhanh1'])
								{
									$qq = mysqli_query($conn, "select * from sanpham where hinhanh ='".$row['hinhanh1']."' or hinhanh1 ='".$row['hinhanh1']."' or hinhanh2 ='".$row['hinhanh1']."'");
									$rq = mysqli_num_rows($qq);
									if($rq == 0)
									{
										unlink('../'.$row['hinhanh1']);
									}
								}
								if($hinhanh2 != $row['hinhanh2'])
								{
									$qq = mysqli_query($conn, "select * from sanpham where hinhanh ='".$row['hinhanh2']."' or hinhanh1 ='".$row['hinhanh2']."' or hinhanh2 ='".$row['hinhanh2']."'");
									$rq = mysqli_num_rows($qq);
									if($rq == 0)
									{
										unlink('../'.$row['hinhanh2']);
									}
								}
								
								header("Location:index.php");
							}
							else
							{
								$loi ="Mã sản phẩm đã tồn tại";
							}
						}
						else
            				$loi = "Điền đầy đủ các thông tin bắt buộc";
					}
					else
            			$loi = "Điền đầy đủ các thông tin bắt buộc";
				}
				else
            		$loi = "Điền đầy đủ các thông tin bắt buộc";
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

        <title>Sửa sản phẩm | G1Mobile</title>
        <script language='javascript'>
		 <!--
		 function isNumberKey(evt)
		 {
		 var charCode = (evt.which) ? evt.which : event.keyCode
		 if (charCode > 31 && (charCode < 48 || charCode > 57))
		 return false;
		 return true;
		 }
		 //-->
		 </script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/png" href="../images/G1MobileF.ico"/>
        <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <script src="../js/jquery1.min.js"></script>
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
                                <h4 class="title">Sửa sản phẩm</h4>
                                <form action="qlsanpham_sua.php?masp=<?php echo $masp;?>" method="post" name="themsp" enctype="multipart/form-data">
                                    <div class="col_1_of_2 span_1_of_2">
                                        <p class="code">Mã sản phẩm</p>
                                        <div><input type="text" name = "txtmasp" value="<?php echo $masp;?>" onfocus="if (this.value == 'Bắt buộc') this.value = '';" onblur="if (this.value == '') {this.value = 'Bắt buộc';}"></div>
                                        <p class="code">Tên sản phẩm</p>
                                        <div><input type="text" name = "txttensp" value="<?php echo $tensp;?>" onfocus="if (this.value == 'Bắt buộc') this.value = '';" onblur="if (this.value == '') {this.value = 'Bắt buộc';}"></div>
                                        <p class="code">Số lượng</p>
                                        <div><input onKeyPress="return isNumberKey(event)" type="text" name="txtsoluong" value="<?php echo $soluong;?>" onfocus="if (this.value == 'Bắt buộc') this.value = '';" onblur="if (this.value == '') {this.value = 'Bắt buộc';}"></div>
                                        <p class="code">Đơn giá</p>
                                        <div><input onKeyPress="return isNumberKey(event)" type="text" name ="txtdongia" value="<?php echo $dongia;?>" onfocus="if (this.value == 'Bắt buộc') this.value = '';" onblur="if (this.value == '') {this.value = 'Bắt buộc';}"></div>
                                        <p class="code">Ngày nhập</p>
                                        <div><input type="date" value="<?php echo $ngaynhap;?>" name="txtngaynhap"></div>
                                        <p class="code">Hãng sản xuất</p>
                                        <div>
                                            <select name="txthang" class="frm-field required">
<?php
												if(isset($_POST['submit']))
												{
													$aa=mysqli_query($conn,"select * from hang where mahang ='".$hang."'");
                                                    $rr=mysqli_fetch_assoc($aa);
?>
                                                    <option value="<?php echo $hang;?>"><?php echo $rr['tenhang']; ?></option>
<?php
												
												  	$a=mysqli_query($conn,"select * from hang where mahang!='".$hang."'");
												  	while ($row=mysqli_fetch_assoc($a))
												  	{
?>
                                                     	<option value="<?php echo $row['mahang'];?>"><?php echo $row['tenhang']; ?></option>
<?php
                                                    }
												}
												else
												{
													$as=mysqli_query($conn,"select * from hang where mahang = '".$row['hang']."'");
													$rs=mysqli_fetch_assoc($as);
?>
                                                    <option value="<?php echo $rs['mahang'];?>"><?php echo $rs['tenhang']; ?></option>
<?php
													$a=mysqli_query($conn,"select * from hang where mahang != '".$row['hang']."'");
                                                    while ($r=mysqli_fetch_assoc($a))
                                                    {
?>
                                                          <option value="<?php echo $r['mahang'];?>"><?php echo $r['tenhang']; ?></option>
                                                              
<?php
                                                    }
												}
 ?>
                                            </select>
                                        </div>	
                                        
                                        <p class="code">Loại</p>
                                        <div>
                                        	<select  name="txtloai" onchange="change_country(this.value)" class="frm-field required">
                                                
<?php
											if(isset($_POST['submit']))
											{
												if($loai == 1)
												{
?>
                                                <option value="1">Điện thoại</option>         
                                                <option value="0">Phụ kiện</option>
<?php 
												}
												else
												{
?>
                                                <option value="0">Phụ kiện</option>
                                                <option value="1">Điện thoại</option> 
<?php
												}
											}
											else
											{
												if($row['loai']==1)
												{
?>
                                                <option value="1">Điện thoại</option>         
                                                <option value="0">Phụ kiện</option>
<?php
												}
												else
												{
?>        
                                                <option value="0">Phụ kiện</option>
                                                <option value="1">Điện thoại</option> 
<?php 
												}
											}
?>
                                        	</select>
                                        </div>                                                                             
                                        <p class="code">Thông tin</p>
                                        <div class="text"><textarea name="txtthongtin" value="Thông tin" onfocus="if (this.value == 'Thông tin') this.value = '';" onblur="if (this.value == '') {this.value = 'Thông tin';}"><?php echo $thongtin;?></textarea></div>                                                                  
                                    </div>
                
                                    <div class="col_1_of_2 span_1_of_2">
                                        <p class="code">Màn hình</p>
                                        <div><input type="text" name ="txtmanhinh" value="<?php echo $manhinh;?>" ></div>
                                        <p class="code">Hệ điều hành</p>
                                        <div><input type="text" name ="txthedieuhanh" value="<?php echo $hedieuhanh;?>" ></div>
                                        <p class="code">Camera trước</p>
                                        <div><input type="text" name ="txtcameratruoc" value="<?php echo $cameratruoc;?>" ></div>
                                        <p class="code">Camera sau</p>
                                        <div><input type="text" name ="txtcamerasau" value="<?php echo $camerasau;?>" ></div>
                                        <p class="code">Ram</p>
                                        <div><input type="text" name = "txtram" value="<?php echo $ram;?>" ></div>
                                        <p class="code">CPU</p>
                                        <div><input type="text" name = "txtcpu" value="<?php echo $cpu;?>" ></div>
                                        <p class="code">Bộ nhớ trong</p>
                                        <div><input type="text" name = "txtbonhotrong" value="<?php echo $bonhotrong;?>" ></div>
                                        <p class="code">Dung lượng pin</p>
                                        <div><input type="text" name = "txtdungluongpin" value="<?php echo $dungluongpin;?>" ></div>
                                        <p class="code">Kết nối</p>
                                        <div><input type="text" name ="txtketnoi" value="<?php echo $ketnoi;?>" ></div>
                                        <p class="code">Bảo hành</p>
                                        <div><input type="text" name = "txtbaohanh" value="<?php echo $baohanh;?>" ></div>
                                    </div>
                                    
                                    <div class="clear"></div>
                                    
                                    <div class="col_1_of_2 span_1_of_2" style="width:48%;">
                                    	<p class="code">Hình ảnh 1</p>
                                        <img id="output" src="<?php echo "../".$row['hinhanh'];?>" style="height: 100px;"/>
                                        <div><span>Đổi ảnh </span><input onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"  type="file" name="anh" accept="image/jpg, image/jpeg, image/png"/></div><br>
                                        
                                        <p class="code">Hình ảnh 2</p>
                                        <img id="output1" src="<?php echo "../".$row['hinhanh1'];?>" style="height:100px;"/>
                                        <div><span>Đổi ảnh </span><input onchange="document.getElementById('output1').src = window.URL.createObjectURL(this.files[0])" type="file" name="anh1" accept="image/jpg, image/jpeg, image/png"/></div><br>
                                   	</div> 
                                    <div class="col_1_of_2 span_1_of_2" style="width:48%;">
                                    	<p class="code">Hình ảnh 3</p>
                                        <img id="output2" src="<?php echo "../".$row['hinhanh2'];?>" style="height: 100px;"/>
                                        <div><span>Đổi ảnh </span><input onchange="document.getElementById('output2').src = window.URL.createObjectURL(this.files[0])" type="file" name="anh2" accept="image/jpg, image/jpeg, image/png"/></div><br>
                                   	</div> 
                                    
                                    <div class="clear"></div><br>
                                    
                                    <p class="codeloi"><?php if(isset($_POST['submit'])) echo $loi?></p>
                                    <br>
                                    <button name="submit" class="grey">Lưu</button>
                                    <p class="terms"><a href="index.php">Trở lại</a></p>
                                    <div class="clear"></div>
                                </form>
                            </div>
                        </div>
					<!-- InstanceEndEditable -->
					<?php include '../include/footer1.php';?>
    </body>
<!-- InstanceEnd --></html>