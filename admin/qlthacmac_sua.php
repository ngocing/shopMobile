<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlthacmac'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$_SESSION['pre'] = "thacmac";
	$id = $_GET['id'];
	$query = mysqli_query($conn, "select * from thacmac where id = '$id'");
	$row = mysqli_fetch_assoc($query);
	if(isset($_POST['submit']))
	{
		$phanhoi = $_POST['noidung'];
		mysqli_query($conn, "UPDATE thacmac SET phanhoi = '$phanhoi' WHERE id = '$id'");
		
		header("Location:index.php");
	}
?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/backend.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    	<!-- InstanceBeginEditable name="ab" -->

        <title>Trả lời thắc mắc | G1Mobile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                <div class="col_1_of_2 span_1_of_2">
                    <h4 class="title">Thắc mắc</h4>
                    <p class="code">Họ tên: <?php echo $row['hoten'];?></p><br>
                    <p class="code">Email: <?php echo $row['email'];?></p><br>
                    <p class="code">Tiêu đề: <?php echo $row['tieude'];?></p><br>
                    <p class="code">Nội dung: <?php  echo $row['noidung'];?></p><br>
                    <p class="code">Phản hồi trước đó: <?php  echo $row['phanhoi'];?></p><br>
                </div>
                <div class="col_1_of_2 span_1_of_2">
                    <h4 class="title">Trả lời</h4>
                    <form method="post" action="qlthacmac_sua.php?id=<?php echo $id?>">
                        <div class="to1">
                        	<input name="tieude" type="text" class="text" value="Tiêu đề mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tiêu đề';}">
                        </div>
                        <div class="text">
                        	<textarea name="noidung" value="Nội dung" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nội dung:';}">Nội dung:</textarea>
                        </div>
                        <br><br>
                        <div class="submit">
                        	<input name="submit" type="submit" value="Gửi">
                        </div>
                    </form>
                </div>
                <div class="clear"></div>
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