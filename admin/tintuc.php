<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qltintuc'] == "0")
		{
			header("Location:trong.html");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$page=0;
	$page=$_GET['page'];
    $kq=mysqli_query($conn,"select * from tintuc");
	$num= mysqli_num_rows($kq);
	$sotrang=$num/10;
	$bd=$page*10;
    $kq=mysqli_query($conn,"select * from tintuc order by ngaydang desc limit $bd,10");
?>
<h2 class="head">Tất cả tin tức(<?php echo $num;?>)</h2>
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
						<li><a href='#' onClick="gettintuc(<?php echo $page?>)"> <?php echo $n?> </a></li>
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
                                    <td>Tiêu đề tin</td>
                                    <td>Tóm tắt tin</td>  
                                    <td>Nội dung</td>
                                    <td>Hình ảnh</td>  
                                    <td>Ngày đăng</td>
                                    <td><a href="qltintuc_them.php">Thêm tin mới</a></td>
                                </tr>
<?php
								while($dong = mysqli_fetch_assoc($kq))
								{
?>
                                <tr>
                                    <td><?php echo $dong['tieude']?></td>
								    <td><?php echo substr($dong['tomtat'], 0, 150)."..."?></td>
                                    <td><?php echo substr($dong['noidung'],0, 150)."..."?></td>
                                    <td><img src=<?php echo "../".$dong['hinhanh']?> width='50px' height='50px' /></td>
                                    <td><?php echo $dong['ngaydang']?></td>
                                    <td><a href="qltintuc_sua.php?id=<?php echo $dong['id']?>">Sửa</a> <a href="qltintuc_xoa.php?id=<?php echo $dong['id']?>">Xóa</a></td>
                                </tr>
<?php
    							}
?>
                            </table>
                            
                            <div class="clear"></div>
                        </div>