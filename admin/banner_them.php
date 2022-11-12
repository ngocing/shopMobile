<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlbanner'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$_SESSION['pre'] = "banner";
	if(isset($_POST['submit']))
    { 
        if($_FILES['anh']['name'] != NULL)
		{
            // Tiến hành code upload file
            if($_FILES['anh']['type'] == "image/jpeg"
            || $_FILES['anh']['type'] == "image/png")
			{
            	// là file ảnh
            	// Tiến hành code upload  
				$path = "../images/banner/"; // file sẽ lưu vào thư mục slide
				$tmp_name = $_FILES['anh']['tmp_name'];
				$name = $_FILES['anh']['name'];
				$type = $_FILES['anh']['type']; 
				$size = $_FILES['anh']['size']; 
				// Upload file
				move_uploaded_file($tmp_name,$path.$name);
				$hinhanh = "images/banner/".$name;
                $tieude1 = $_POST['txttieude1'];
                $loaibanner = $_POST['loaibanner'];
                $linkweb = $_POST['linkweb'];
				$chen=mysqli_query($conn,"insert into banner(tieude1, tieude2, hinhanh, loaibanner, linkweb) values ('$tieude1','$tieude2','$hinhanh','$loaibanner','$linkweb')");
				
				header("Location:index.php");
            }
			else
			{
               // không phải file ảnh
               $_SESSION['loi'] = "Kiểu file không hợp lệ";
			}
       }
	   else
	   {
            $_SESSION['loi'] = "Vui lòng chọn file";
       }
    }
?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/backend.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    	<!-- InstanceBeginEditable name="ab" -->

        <title>Thêm banner | G1Mobile</title>
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
            
                <h4 class="title">Thêm banner</h4>
                <form action="banner_them.php" method="post" name="thembanner" enctype="multipart/form-data" style="height:510px">
                    <div class="col_1_of_2 span_1_of_2">
                        <p class="code">Loại banner</p>
                        <div>
                            <select name="loaibanner" value="<?php if(isset($_POST['submit'])){echo addslashes($_POST['loaibanner']);}?>" onchange="change_country(this.value)" class="frm-field required">
                                <option value="ThanhTruot">Thanh trượt</option>         
                                <option value="BenCanh">Bên cạnh</option>
                            </select>
                        </div>
                        <p class="code">Link Web</p>
                        <div><input type="text" name = "linkweb" value="<?php if(isset($_POST['submit'])){echo addslashes($_POST['linkweb']);}?>"></div>
                        <p class="code">Tiêu đề</p>
                        <div><input type="text" name = "txttieude1" value="<?php if(isset($_POST['submit'])){echo addslashes($_POST['txttieude1']);}?>"></div>
                        <br><p class="code">Hình ảnh</p>
                        <br><div><input  type="file" name="anh" /></div>
                    </div>
                    <div class="clear"></div>
                    
                    <p><?php if(isset($_POST['submit'])) echo $_SESSION['loi'];?></p>
                    <br><br>
                    <button name="submit" class="grey">Thêm</button>
                    <p class="terms"><a href="index.php">Trở lại</a></p>
                    <div class="clear"></div><br><br><br><br>
                </form>
            </div>
        </div>
		<!-- InstanceEndEditable -->
	    <?php include '../include/footer1.php';?>
    </body>
<!-- InstanceEnd --></html>