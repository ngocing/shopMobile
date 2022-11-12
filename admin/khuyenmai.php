<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlkhuyenmai'] == "0")
		{
			header("Location:trong.html");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$page=0;
	if (isset($_GET['page']))
	$page=$_GET['page'];
    $kq=mysqli_query($conn,"select * from sanpham where giakhuyenmai!='0'");
	$num= mysqli_num_rows($kq);
	$sotrang=$num/10;
	$bd=$page*10;
    $kq=mysqli_query($conn,"select * from sanpham where giakhuyenmai!='0' group by masp asc limit $bd,10");
?>
<h2 class="head">Tất cả sản phẩm khuyến mại(<?php echo $num;?>)</h2>
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
						?>
						<li><a style="color: #7cb022"> <?php echo $n?> </a></li>
						<?php
					 }
					 else
					 {
						$n = $page+1; 
						?>
						<li><a href='#' onClick="getkhuyenmai(<?php echo $page?>)"> <?php echo $n?> </a></li>
						<?php
					 }
				  }
			  ?>
                                </ul>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="mens-toolbarbang">
                            <table  class="bang">
                                <tr >
                                    <td>Mã sản phẩm</td>
                                    <td>Tên sản phẩm</td>
								    <td>Giá</td>
                                    <td>Giá khuyến mại</td>
                                    <td><a href="qlkhuyenmai_them.php">Thêm</a></td>
                                </tr>
<?php
							
							while($dong = mysqli_fetch_assoc($kq))
							{	
									$u = mysqli_query($conn, "select * from sanpham where masp = '".$dong['masp']."'");
									$i = mysqli_fetch_assoc($u);
?>
                                <tr>
                                    <td><?php echo $dong['masp']?></td>
                                    <td><?php echo $i['tensp']?></td>
                                    <td><?php echo $i['dongia']?></td>
                                    <td><?php echo $dong['giakhuyenmai']?></td>
                                    
                                    <td> <a href="qlkhuyenmai_xoa.php?masp=<?php echo $dong['masp']?>">Xóa</a></td>
                                </tr>
<?php
    }
?>
                            </table>
                            <div class="clear"></div>
                        </div>