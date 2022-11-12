<?php
    include("connect.php");
	$masp = $_GET["masp"];
	$masp =  mysqli_real_escape_string($conn, $masp);
    $viewsql=mysqli_query($conn,"select * from sanpham where masp='".$masp."'");
	$row=mysqli_fetch_assoc($viewsql);
	$view= $row['view']+1;
	mysqli_query($conn,"UPDATE sanpham SET view=$view WHERE masp = '$masp'");
?>

<!DOCTYPE HTML>

<html><!-- InstanceBegin template="/Templates/fontend.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
    	<!-- InstanceBeginEditable name="head" -->
        <title>Chi tiết sản phẩm | G1Mobile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="js/jquery1.min.js"></script>
    <!-- start menu -->
    <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/megamenu.js"></script>
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		    <script type="text/javascript" id="sourcecode">
			    $(function()
			    {
				    $('.scroll-pane').jScrollPane();
			    });
		    </script>
    <!-- start details -->
    <script src="js/slides.min.jquery.js"></script>
       <script>
		    $(function(){
			    $('#products').slides({
				    preload: true,
				    preloadImage: 'img/loading.gif',
				    effect: 'slide, fade',
				    crossfade: true,
				    slideSpeed: 350,
				    fadeSpeed: 500,
				    generateNextPrev: true,
				    generatePagination: false
			    });
		    });
	    </script>
    <link rel="stylesheet" href="css/etalage.css">
    <script src="js/jquery.etalage.min.js"></script>
    <script>
			    jQuery(document).ready(function($){

				    $('#etalage').etalage({
					    thumb_image_width: 360,
					    thumb_image_height: 360,
					    source_image_width: 900,
					    source_image_height: 900,
					    show_hint: true,
					    click_callback: function(image_anchor, instance_id){
						    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					    }
				    });
			    });
		    </script>	
        <!--facebook-->    
        <div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!--facebook-->  
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
                
                <ul class="breadcrumb breadcrumb__t"><a class="home" href="index.php">Trang chủ</a> / <a href="dienthoai.php">Điện thoại</a> / <?php
						{
							echo "<a href='sanphamtheohang.php?hang=".$row['hang']."'>".$row['hang']."</a>";
						} 					
					?></ul>
		            <div class="cont span_2_of_3">
		  	            <div class="grid images_3_of_2">
						    <ul id="etalage">
							   	<li>
                                	<img class="etalage_thumb_image" src="<?php echo $row['hinhanh'];?>" class="img-responsive" />
                                	<img class="etalage_source_image" src="<?php echo $row['hinhanh'];?>" class="img-responsive" title="" />
                            	</li>
                                <li>
                                	<img class="etalage_thumb_image" src="<?php echo $row['hinhanh1'];?>" class="img-responsive" />
                                	<img class="etalage_source_image" src="<?php echo $row['hinhanh1'];?>" class="img-responsive" title="" />
                            	</li>
                                <li>
                                	<img class="etalage_thumb_image" src="<?php echo $row['hinhanh2'];?>" class="img-responsive" />
                                	<img class="etalage_source_image" src="<?php echo $row['hinhanh2'];?>" class="img-responsive" title="" />
                            	</li>
						    </ul>
						    <div class="clearfix"></div>
	                    </div>

		                <div class="desc1 span_3_of_2">
		         	        <h3 class="m_3"><?php echo $row['tensp']?></h3>
                            <?php								
                                    if ($row['giakhuyenmai'] == '0'){
                                        $gia = $row['dongia'];
                                    }
									else {
                                        $gia = $row['giakhuyenmai'];
                                    }
							?>
		                    <p class="m_5"><?php echo number_format($gia,"0",",",".");?> VNĐ</p>
		         	        <div class="btn_form">
                                <a href="addcart.php?masp=<?php echo $row['masp'];?>">Thêm vào giỏ hàng</a>
					        </div>
				            <p class="m_text2">Màn hình: <?php echo $row['manhinh'];?></p>
                            <p class="m_text2">HĐH: <?php echo $row['hedieuhanh'];?></p>
                            <p class="m_text2">Camera trước: <?php echo $row['cameratruoc'];?></p>
                            <p class="m_text2">Camera sau: <?php echo $row['camerasau'];?></p>
                            <p class="m_text2">CPU: <?php echo $row['CPU'];?></p>
                            <p class="m_text2">Bộ nhớ trong: <?php echo $row['bonhotrong'];?></p>
                            <p class="m_text2">Ram: <?php echo $row['ram'];?></p>
                            <p class="m_text2">Dung lượng pin: <?php echo $row['dungluongpin'];?></p>
                            <p class="m_text2">Kết nối: <?php echo $row['ketnoi'];?></p>
                            <p class="m_text2">Bảo hành: <?php echo $row['baohanh'];?></p>
                            <br>
                            <!--nut like facebook-->
							<div class="fb-like" data-href="http://www.g1mobile.tk/chitietsanpham.php?masp=<?php echo $masp?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
			            
			            </div>
                        <div class="clear"></div>	
                        <div class="toogle">
                        	<h3 class="m_3">Thông tin sản phẩm</h3>
     	                    <p class="m_text"><?php echo $row['thongtin'];?></p>
                        </div>
                        	<div class="clients">
                            	<h3 class="m_3">Sản phẩm liên quan</h3>
                                	<ul id="flexiselDemo3">
<?php
										$qe = mysqli_query($conn, "select * from sanpham where loai = '".$row['loai']."' and hang = '".$row['hang']."' and masp != '".$masp."' limit 0, 10");
										while($ro = mysqli_fetch_assoc($qe))
										{
?>
                            			<li><img src="<?php echo $ro['hinhanh']?>" /><a href="chitietsanpham.php?masp=<?php echo $ro['masp']?>"><?php echo $ro['tensp']?></a><p><?php echo number_format($ro['dongia'],"0",",","."); ?>đ</p></li>
<?php
										}
?>
                            		</ul>
                                <script type="text/javascript">
                                    $(window).load(function() {
                                        $("#flexiselDemo3").flexisel({
                                            visibleItems: 5,
                                            animationSpeed: 1000,
                                            autoPlay: false,
                                            autoPlaySpeed: 3000,    		
                                            pauseOnHover: true,
                                            enableResponsiveBreakpoints: true,
                                            responsiveBreakpoints: { 
                                                portrait: { 
                                                    changePoint:480,
                                                    visibleItems: 1
                                                }, 
                                                landscape: { 
                                                    changePoint:640,
                                                    visibleItems: 2
                                                },
                                                tablet: { 
                                                    changePoint:768,
                                                    visibleItems: 3
                                                }
                                            }
                                        });
                                        
                                    });
                                </script>
                                <script type="text/javascript" src="js/jquery.flexisel.js"></script>
                        	</div>
                        <!--comment facebook-->
                        <div class="fb-comments" data-href="http://www.g1mobile.tk/chitietsanpham.php?masp=<?php echo $masp?>" data-width="100%" data-numposts="5"></div>
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