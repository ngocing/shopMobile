<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlsanpham'] == "0")
		{
			header("Location:trong.html");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	
	$key= $_GET['keyword']; 
	$page=$_GET['page'];
    $kq=mysqli_query($conn,"select * from sanpham where tensp LIKE '%".$key."%'");
	$num= mysqli_num_rows($kq);
	$sotrang=$num/10;
	$bd=$page*10;
    $kq=mysqli_query($conn,"select * from sanpham  where tensp LIKE '%".$key."%' order by tensp asc limit $bd,10");
?>

                        <h2 class="head">Tất cả sản phẩm(<?php echo $num;?>)</h2>
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
												<li><a href='#' onClick="getsanpham(<?php echo $page?>, <?php echo "'".$key."'"?>)"> <?php echo $n?> </a></li>
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
								    <td>Số lượng</td>
                                    <td>Đơn giá</td>
                                    <td>Gia khuyen mai</td>
                                    <td>Hình ảnh</td>
                                    <td>Ngày nhập</td>
                                    <td>Mã hãng sản xuất</td>
                                    <td>View</td>
                                    <td>Loại</td>
                                    <td><a href="qlsanpham_them.php">Thêm SP</a></td>
                                </tr>
<?php
							while($dong = mysqli_fetch_assoc($kq))
							{
?>
                                <tr>
                                    <td><?php echo $dong['masp']?></td>
                                    <td><?php echo $dong['tensp']?></td>
								    <td><?php echo $dong['soluong']?></td>
                                    <td><?php echo $dong['dongia']?></td>
                                    
                                    <td><?php echo $dong['giakhuyenmai']?></td>
                                    <td><img src=<?php echo "../".$dong['hinhanh']?> width='50px' height='50px' /></td>
                                    <td><?php echo $dong['ngaynhap']?></td>
                                    <td><?php echo $dong['hang']?></td>
                                    <td><?php echo $dong['view']?></td>
                                    <td><?php if ($dong['loai']=="1") echo "Điện thoại"; else echo "Phụ kiện";?></td>
                                    
                                    <td><a href="qlsanpham_sua.php?masp=<?php echo $dong['masp']?>">Sửa</a> <a href="qlsanpham_xoa.php?masp=<?php echo $dong['masp']?>">Xóa</a></td>
                                </tr>
<?php
    }
?>
                            </table>
                            <div class="clear"></div>
                        </div>
                        