<?php
    include("connect.php");
	$page=0;
	if (isset($_GET['page']))
		$page = $_GET['page'];$page= mysqli_real_escape_string($conn, $page);
	$mahang = "";
	if (isset($_GET['hang']))
		$mahang = $_GET['hang'];$mahang= mysqli_real_escape_string($conn, $mahang);
	$query = mysqli_query($conn,"select * from sanpham where hang = '".$mahang."'");
	$num = mysqli_num_rows($query);
	$query1 = mysqli_query($conn,"SELECT * FROM `hang` WHERE mahang = '".$mahang."'");
	$num1 = mysqli_fetch_assoc($query1);
	$sotrang = $num/9;
	$bd = $page*9;
?>

<!DOCTYPE HTML>

<html><!-- InstanceBegin template="/Templates/fontend.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    	<!-- InstanceBeginEditable name="head" -->
        <title>Sản phẩm của hãng <?php echo $num1['tenhang'];?> | G1Mobile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
			                    echo "Xin chào <li><a href='thongtinchitiet.php'> ".$_SESSION['tentk']."</a></li> | <li><a href='logout.php'>Đăng xuất</a></li>";
								if($_SESSION['admin']==true)
								{
									echo " | <li><a href='admin/index.php'>Tới trang quản trị</a></li>";	
								}
		                    }
		                    else
		                    {
								echo "<li><a href='login.php'>Đăng nhập</a></li> | <li><a href='register.php'>Đăng ký</a></li>";
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
                            <li class="active grid"><a href="index.php">Trang chủ</a></li>
                            <li><a href="dienthoai.php">Điện thoại</a></li>
                            <li><a href="phukien.php">Phụ kiện</a></li>
                            <li><a href="tintuc.php">Tin tức</a></li>
                            <li><a href="khuyenmai.php">Khuyến mại</a></li>
                        </ul>
                    </div>
                </div>

                <div class="header-bottom-right">
                    <div class="search">
                        <form action="timkiem.php" method="get" name="frm">
                            <input type="text" name="keyword" class="textbox" value="Tìm kiếm" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm kiếm';}">
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
												echo "Không có sản phẩm nào";
											else
												echo $count." sản phẩm";
										?>
                                        </h3>
                                    </li>
					                <li><p>Giỏ hàng đang trống !</p></li>
				                </ul>
			                </li>
		                </ul>
	                    <ul class="last">
							<li>
								<a href="cart.php">Giỏ hàng(<?php echo $count;?>)</a>
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
                    <h2 class="head">Sản phẩm của hãng <?php echo $num1['tenhang'];?></h2>
                    <div class="mens-toolbar">
                        <div class="pager">
                            <ul class="dc_pagination dc_paginationA dc_paginationA06">
                                <li><a href="#" class="previous" >Pages</a></li>
                                <?php
                                  $k=$page;
                                   for($page=0;$page<$sotrang;$page++)
                                     {
                                         if ($page==$k)
                                         {
                                            $n = $page+1;
                                            echo "<li><a href='sanphamtheohang.php?hang=$mahang&page=$page' style='color: #7cb022'> $n </a></li>";
                                         }
                                         else
                                         {
                                            $n = $page+1;
                                            echo "<li><a href='sanphamtheohang.php?hang=$mahang&page=$page'> $n </a></li>"; 
                                         }
                                      }
                                  ?>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>			
                    
                    <div class="top-box">
                    <?php
					$query=mysqli_query($conn,"select * from sanpham where hang = '".$mahang."' order by tensp limit ".$bd.", 3");
					while($row = mysqli_fetch_assoc($query))
					{
						$q = mysqli_query($conn,"select giakhuyenmai from khuyenmai where masp ='".$row['masp']."'");
						$r = mysqli_fetch_assoc($q);
						$qnew = mysqli_query($conn,"select * from sanphammoi where masp ='".$row['masp']."'");
						$rnew = mysqli_fetch_assoc($qnew);
                    ?>
			 			<div class="col_1_of_3 span_1_of_3"> 
                        	<a href="chitietsanpham.php?masp=<?php echo $row['masp'];?>">
                                <div class="inner_content clearfix">
                                    <div class="product_image">
                                        <img src="<?php echo $row["hinhanh"];?>" alt=""/>
                                    </div>
                                    <?php
										if($r)
										{
											echo "<div class='sale-box1'><span class='on_sale title_shop'>Sale</span></div>";
										}
										if($rnew)
										{
											echo "<div class='sale-box'><span class='on_sale title_shop'>New</span></div>";
										}
                                    ?>
                                    <div class="price">
                                       	<div class="cart-left">
                                            <p class="title"><?php echo $row["tensp"];?></p>
                                            <div class="price1">
                                            	<?php
                                                	if($r)
													{
														?>
                                                        <span class="reducedfrom"><?php echo number_format($row['dongia'],"0",",","."); ?>đ</span>
                                                        <span class="actual"><?php echo number_format($r['giakhuyenmai'],"0",",","."); ?>đ</span>
                                                        <?php
													}
													else
													{
												?>
                                              			<span class="actual"><?php echo number_format($row['dongia'],"0",",","."); ?> VND</span>
                                                <?php }?>
                                            </div>
                                       	</div>
                                       	
                                    	<div class="clear"></div>
                                    </div>				
                                </div>
                            </a>
                        </div>
                    <?php
					}
					mysqli_free_result($query);
                    ?> 
                    	<div class="clear"></div>						 			    
                    </div> 	
                    <div class="top-box">
                    <?php
					$bd = $bd + 3;
					$query=mysqli_query($conn,"select * from sanpham where hang = '".$mahang."' order by tensp limit ".$bd.", 3");
					while($row = mysqli_fetch_assoc($query))
					{
						$q = mysqli_query($conn,"select giakhuyenmai from khuyenmai where masp ='".$row['masp']."'");
						$r = mysqli_fetch_assoc($q);
						$qnew = mysqli_query($conn,"select * from sanphammoi where masp ='".$row['masp']."'");
						$rnew = mysqli_fetch_assoc($qnew);
                    ?>
			 			<div class="col_1_of_3 span_1_of_3"> 
                        	<a href="chitietsanpham.php?masp=<?php echo $row['masp'];?>">
                                <div class="inner_content clearfix">
                                    <div class="product_image">
                                        <img src="<?php echo $row["hinhanh"];?>" alt=""/>
                                    </div>
                                    <?php
										if($r)
										{
											echo "<div class='sale-box1'><span class='on_sale title_shop'>Sale</span></div>";
										}
										if($rnew)
										{
											echo "<div class='sale-box'><span class='on_sale title_shop'>New</span></div>";
										}
                                    ?>
                                    <div class="price">
                                       	<div class="cart-left">
                                            <p class="title"><?php echo $row["tensp"];?></p>
                                            <div class="price1">
                                            	<?php
                                                	if($r)
													{
														?>
                                                        <span class="reducedfrom"><?php echo number_format($row['dongia'],"0",",","."); ?>đ</span>
                                                        <span class="actual"><?php echo number_format($r['giakhuyenmai'],"0",",","."); ?>đ</span>
                                                        <?php
													}
													else
													{
												?>
                                              			<span class="actual"><?php echo number_format($row['dongia'],"0",",","."); ?> VND</span>
                                                <?php }?>
                                            </div>
                                       	</div>
                                       	
                                    	<div class="clear"></div>
                                    </div>				
                                </div>
                            </a>
                        </div>
                    <?php
					}
					mysqli_free_result($query);
                    ?> 
                    	<div class="clear"></div>						 			    
                    </div>
                    <div class="top-box">
                    <?php
					$bd = $bd + 3;
					$query=mysqli_query($conn,"select * from sanpham where hang = '".$mahang."' order by tensp limit ".$bd.", 3");
					while($row = mysqli_fetch_assoc($query))
					{
						$q = mysqli_query($conn,"select giakhuyenmai from khuyenmai where masp ='".$row['masp']."'");
						$r = mysqli_fetch_assoc($q);
						$qnew = mysqli_query($conn,"select * from sanphammoi where masp ='".$row['masp']."'");
						$rnew = mysqli_fetch_assoc($qnew);
                    ?>
			 			<div class="col_1_of_3 span_1_of_3"> 
                        	<a href="chitietsanpham.php?masp=<?php echo $row['masp'];?>">
                                <div class="inner_content clearfix">
                                    <div class="product_image">
                                        <img src="<?php echo $row["hinhanh"];?>" alt=""/>
                                    </div>
                                    <?php
										if($r)
										{
											echo "<div class='sale-box1'><span class='on_sale title_shop'>Sale</span></div>";
										}
										if($rnew)
										{
											echo "<div class='sale-box'><span class='on_sale title_shop'>New</span></div>";
										}
                                    ?>
                                    <div class="price">
                                       	<div class="cart-left">
                                            <p class="title"><?php echo $row["tensp"];?></p>
                                            <div class="price1">
                                            	<?php
                                                	if($r)
													{
														?>
                                                        <span class="reducedfrom"><?php echo number_format($row['dongia'],"0",",","."); ?>đ</span>
                                                        <span class="actual"><?php echo number_format($r['giakhuyenmai'],"0",",","."); ?>đ</span>
                                                        <?php
													}
													else
													{
												?>
                                              			<span class="actual"><?php echo number_format($row['dongia'],"0",",","."); ?> VND</span>
                                                <?php }?>
                                            </div>
                                       	</div>
                                       	
                                    	<div class="clear"></div>
                                    </div>				
                                </div>
                            </a>
                        </div>
                    <?php
					}
					mysqli_free_result($query);
                    ?> 
                    	<div class="clear"></div>						 			    
                    </div>				 			    
		        </div>
                <!-- InstanceEndEditable -->

			    <div class="rsidebar span_1_of_left">
                    <h5 class="m_1">Danh mục</h5>
                    <ul class="kids">
                    <?php
						$query = mysqli_query($conn,"select * from hang");
						while($row = mysqli_fetch_array($query))
						{
							echo "<li><a href='sanphamtheohang.php?hang=".$row['mahang']."'>Sản phẩm ".$row['tenhang']."</a></li>";
						} 
						mysqli_free_result($query);
					?>
					</ul>
                        
                    <h5 class="m_1">Giá</h5>
                    <ul class="kids">
						<li><a href="sanphamtheogia.php?dau=0&cuoi=5000000">< 5 triệu đồng</a></li>
                        <li><a href="sanphamtheogia.php?dau=5000000&cuoi=7000000">5 triệu - 7 triệu đồng</a></li>
                        <li><a href="sanphamtheogia.php?dau=7000000&cuoi=10000000">7 triệu - 10 triệu đồng</a></li>
                        <li><a href="sanphamtheogia.php?dau=10000000&cuoi=15000000">10 triệu - 15 triệu đồng</a></li>
                        <li><a href="sanphamtheogia.php?dau=15000000&cuoi=20000000">15 triệu - 20 triệu đồng</a></li>
						<li><a href="sanphamtheogia.php?dau=20000000">> 20 triệu đồng</a></li>
					</ul>
                        
                    <section  class="sky-form">
                        
                        
                    </section>
                        
                    <h5 class="m_1">Tin tức</h5>

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