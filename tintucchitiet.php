<?php
    include("connect.php");
	$id = $_GET['id'];
	$query = mysqli_query($conn, "SELECT * FROM tintuc WHERE id = '".$id."'");
	$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE HTML>

<html><!-- InstanceBegin template="/Templates/fontend.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    	<!-- InstanceBeginEditable name="head" -->
        <title><?php echo $row['tieude']?> | G1Mobile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="shortcut icon" type="image/png" href="./images/G1MobileF.ico"/>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <script type="text/javascript" src="js/jquery1.min.js"></script>
        <!-- start menu -->
        <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="js/megamenu.js"></script>
        <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
        <!--start slider -->
            <link rel="stylesheet" href="css/fwslider.css" media="all">
            <script src="js/jquery-ui.min.js"></script>
            <script src="js/css3-mediaqueries.js"></script>
            <script src="js/fwslider.js"></script>
        <!--end slider -->
        <script src="js/jquery.easydropdown.js"></script>
        <div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- InstanceEndEditable -->
       
    </head>

    <body>
    
        <div class="header-top">
            <div class="wrap"> 
                <div class="cssmenu">
                    <ul>
                        <?php
	                        if (isset($_SESSION['tentk']))
		                    {
			                    echo "Xin ch??o <li><a href='thongtinchitiet.php'> ".$_SESSION['tentk']."</a></li> | <li><a href='logout.php'>????ng xu???t</a></li>";
								if($_SESSION['admin']==true)
								{
									echo " | <li><a href='admin/index.php'>T???i trang qu???n tr???</a></li>";	
								}
		                    }
		                    else
		                    {
								echo "<li><a href='login.php'>????ng nh???p</a></li> | <li><a href='register.php'>????ng k??</a></li>";
		                    }
                        ?>
				    </ul>
			    </div>
                
                <div class="clear"></div>
            </div>
        </div>

	    <div class="header-bottom">
            <div class="wrap">
                <div class="header-bottom-left">
                    <div class="logo">
                        <a href="index.php"><img src="./images/logoG1Moblie.png" alt=""/></a>
				    </div>

				    <div class="menu">
	                    <ul class="megamenu skyblue">
                            <li class="active grid"><a href="index.php">Trang ch???</a></li>
                            <li><a href="dienthoai.php">??i???n tho???i</a></li>
                            <li><a href="phukien.php">Ph??? ki???n</a></li>
                            <li><a href="tintuc.php">Tin t???c</a></li>
                            <li><a href="khuyenmai.php">Khuy???n m???i</a></li>
                        </ul>
                    </div>
                </div>

                <div class="header-bottom-right">
                    <div class="search">
                        <form action="timkiem.php" method="get" name="frm">
                            <input type="text" name="keyword" class="textbox" value="T??m ki???m" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'T??m ki???m';}">
				            <input type="submit" value="Subscribe" id="submit" name="submit">
                        </form>	  
				        <div id="response"> </div>
                    </div>

                    <div class="tag-list">
		                <ul class="icon1 sub-icon1 profile_img">
			                <li><a class="active-icon c2" href="#"> </a>
				                <ul class="sub-icon1 list">
					                <li>
                                        <h3>
                                        <?php
											if(isset($_SESSION['giohang']))
												$count=count($_SESSION['giohang']);
											else $count=0;
											if($count==0)
												echo "Kh??ng c?? s???n ph???m n??o";
											else
												echo $count." s???n ph???m";
										?>
                                        </h3>
                                    </li>
					                <li><p>Gi??? h??ng ??ang tr???ng !</p></li>
				                </ul>
			                </li>
		                </ul>
	                    <ul class="last">
							<li>
								<a href="cart.php">Gi??? h??ng(<?php echo $count;?>)</a>
							</li>
						</ul>
                    </div>
                </div>
                
                <div class="clear"></div>
            </div>
	    </div>
        
        <!-- InstanceBeginEditable name="slide" -->
        <!-- InstanceEndEditable -->
        <!-- InstanceBeginEditable name="duongke" -->
        <div class="mens"></div>
        <!-- InstanceEndEditable -->
        
        <div class="main">
        <a id="button"></a>
            <script>
                var btn = $('#button');

                $(window).scroll(function() {
                if ($(window).scrollTop() > 100) {
                    btn.addClass('show');
                } else {
                    btn.removeClass('show');
                }
                });

                btn.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({scrollTop:0}, '300');
                });
            </script>
            <div class="wrap">

                <!-- InstanceBeginEditable name="body" -->
		        <div class="cont span_2_of_3">
                  <div class="login1">
                     <div class="wrap">
                     
                        
                        <h5 class="m_6"><?php echo $row['tieude']?></h5>
                        	<p class="m_text"><?php echo date("d-m-Y", strtotime($row['ngaydang']));?></p>
                        <p class="m_text1"><?php echo $row['tomtat']?>s</p>
                        
                       		 	<img src="<?php echo $row['hinhanh']?>"/>
                                <p class="m_text"><?php echo $row['noidung']?></p>
                </div>
                </div>	 						 			    
		        </div>
                <!-- InstanceEndEditable -->

			    <div class="rsidebar span_1_of_left">
                    <h5 class="m_1">Danh m???c</h5>
                    <ul class="kids">
                    <?php
						$query = mysqli_query($conn,"select * from hang");
						while($row = mysqli_fetch_array($query))
						{
							echo "<li><a href='sanphamtheohang.php?hang=".$row['mahang']."'>S???n ph???m ".$row['tenhang']."</a></li>";
						} 
						mysqli_free_result($query);
					?>
					</ul>
                        
                    <h5 class="m_1">Gi??</h5>
                    <ul class="kids">
						<li><a href="sanphamtheogia.php?dau=0&cuoi=5000000">< 5 tri???u ?????ng</a></li>
                        <li><a href="sanphamtheogia.php?dau=5000000&cuoi=7000000">5 tri???u - 7 tri???u ?????ng</a></li>
                        <li><a href="sanphamtheogia.php?dau=7000000&cuoi=10000000">7 tri???u - 10 tri???u ?????ng</a></li>
                        <li><a href="sanphamtheogia.php?dau=10000000&cuoi=15000000">10 tri???u - 15 tri???u ?????ng</a></li>
                        <li><a href="sanphamtheogia.php?dau=15000000&cuoi=20000000">15 tri???u - 20 tri???u ?????ng</a></li>
						<li><a href="sanphamtheogia.php?dau=20000000">> 20 tri???u ?????ng</a></li>
					</ul>
                        
                    <section  class="sky-form">
                        
                        
                    </section>
                        
                    <h5 class="m_1">Tin t???c</h5>

                    <?php 
				        $query=mysqli_query($conn,"select * from tintuc order by id desc LIMIT 0,4");
				        while($row=mysqli_fetch_array($query))
				        {
				    ?>
                        <div class="new-1">
                            <a href="tintucchitiet.php?id=<?php echo $row['id']?>">
                                <img src="<?php echo $row['hinhanh'];?>" title="" width="60" height="60">
                                <p><?php echo $row['tieude'];?></p>
                            </a>
                        </div>
                    <?php
                        } 
						mysqli_free_result($query);
                    ?> 
                </div>
	           
                <div class="clear"></div>
                
	        </div>
        </div>
		
        <?php include './include/footer.php';?>
        
    </body>
<!-- InstanceEnd --></html>