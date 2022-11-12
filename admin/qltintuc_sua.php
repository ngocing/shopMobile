<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qltintuc'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$_SESSION['pre'] = "tintuc";
	$id = $_GET['id'];
	$query = mysqli_query($conn, "select * from tintuc where id = '".$id."'");
	$row = mysqli_fetch_assoc($query);
	$loi ="";
	$tieude = $row['tieude'];
	$tomtat = $row['tomtat'];
	$noidung = $row['noidung'];
	$hinhanh = $row['hinhanh'];
	if(isset($_POST['submit']))
	{
		$tieude= addslashes($_POST['txttieude']);
        $tomtat= addslashes($_POST['txttomtat']);
        $noidung= addslashes($_POST['txtnoidung']);
		
		if( $_FILES['file']['name'] != NULL)
        {
			$path = "../images/tintuc/";
			$tmp_name = $_FILES['file']['tmp_name'];
			$name = $_FILES['file']['name'];
			$type = $_FILES['file']['type']; 
			$size = $_FILES['file']['size']; 
			move_uploaded_file($tmp_name,$path.$name);
			$hinhanh="images/tintuc/".$name;
		}
			if ($tieude)
			{
				if ($tomtat)
				{	
					if ($noidung)
					{
						mysqli_query($conn,"UPDATE tintuc SET tieude = '".$tieude."', tomtat = '".$tomtat."', noidung ='".$noidung."', hinhanh = '".$hinhanh."' where id = '".$id."'");
						if($hinhanh != $row['hinhanh'])
						{
							$qq = mysqli_query($conn, "select * from tintuc where hinhanh ='".$row['hinhanh']."'");
							$rq = mysqli_num_rows($qq);
							if($rq == 0)
							{
								unlink('../'.$row['hinhanh']);
							}
						}
						$_SESSION['pre'] = "tintuc";
								header("Location:index.php");
							
					}
					else
					{
						$loi ="Vui nhập đầy đủ thông tin";
					}
				}
				else
				{
					$loi ="Vui nhập đầy đủ thông tin";
				}
			}
            else
			{
				$loi ="Vui nhập đầy đủ thông tin";
			}
	    
	}
?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/backend.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    	<!-- InstanceBeginEditable name="ab" -->

        <title>Sửa tin tức</title>
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
				<h4 class="title">Sửa tin tức mới</h4>
				<form action="qltintuc_sua.php?id=<?php echo $id;?>" method="post" name="dangky" enctype="multipart/form-data">
				
					<div >
                        
						<p class="code">Tiêu đề</p>
						<div><input type="text" value="<?php echo $tieude;?>" name = "txttieude"></div>
                        <p class="code">Tóm tắt</p>
						<div><input type="text" value="<?php  echo $tomtat;?>" name = "txttomtat"></div>
                        <p class="code">Nội dung</p>
                        <div class="text"><textarea name="txtnoidung" value="Nội dung"  onblur="if (this.value == '') {this.value = 'Nội dung';}"><?php echo $noidung;?></textarea></div>
                        <p class="code">Hình ảnh</p>
                        <img id="output" src="<?php echo "../".$hinhanh;?>" style="max-height: 100px;"/>
                        <div><input onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"  type="file" name="file" accept="image/jpg, image/jpeg, image/png"/></div><br>
                                        
                        <br>
                        <br>
                        <p class="codeloi"><?php echo $loi;?></p>
					</div>
					
					<div class="clear"></div>
					<br>
					<button name="submit" class="grey">Lưu</button>
					<p class="terms"><a href="index.php">Trở lại</a></p>
					<div class="clear"></div>
				</form>
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