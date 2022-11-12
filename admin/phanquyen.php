<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlphanquyen'] == "0")
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
    $kq=mysqli_query($conn,"select * from phanquyen");
	$num= mysqli_num_rows($kq);
	$sotrang=$num/10;
	$bd=$page*10;
    $kq=mysqli_query($conn,"select * from phanquyen order by maquyen ASC limit $bd,10");
?>
<h2 class="head">Phân quyền</h2>
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
												<li><a href='#' onClick="getphanquyen(<?php echo $page?>)"> <?php echo $n?> </a></li>
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
            <td>Mã quyền</td>
            <td>Tên quyền</td> 
            <td>ql banner</td>  
            <td>ql thăc mắc</td>
            <td>ql đơn hàng</td>
            <td>ql hãng</td>
            <td>ql sản phẩm</td> 
            <td>ql tin tức</td>
            <td>ql khách hàng</td>
            <td>ql user</td> 
            <td>ql phan quyen</td>
            <td>ql khuyến mại</td>                                 
            <td>
                <a href="qlphanquyen_them.php">Thêm</a>
            </td>
        </tr>
<?php
while($dong = mysqli_fetch_assoc($kq))
{
?>
        <tr>
            <td><?php echo $dong['maquyen']?></td>
            <td><?php echo $dong['tenquyen']?></td>
            <td><?php if($dong['qlbanner'] == "0") echo "không"; else echo "có";?></td>
            <td><?php if($dong['qlthacmac'] == "0") echo "không"; else echo "có";?></td>
            <td><?php if($dong['qldonhang'] == "0") echo "không"; else echo "có";?></td>
            <td><?php if($dong['qlhang'] == "0") echo "không"; else echo "có";?></td>
            <td><?php if($dong['qlsanpham'] == "0") echo "không"; else echo "có";?></td>
            <td><?php if($dong['qltintuc'] == "0") echo "không"; else echo "có";?></td>
            <td><?php if($dong['qlkhachhang'] == "0") echo "không"; else echo "có";?></td>
            <td><?php if($dong['qluser'] == "0") echo "không"; else echo "có";?></td>
            <td><?php if($dong['qlphanquyen'] == "0") echo "không"; else echo "có";?></td>
            <td><?php if($dong['qlkhuyenmai'] == "0") echo "không"; else echo "có";?></td>
            <td><a href="qlphanquyen_sua.php?maquyen=<?php echo $dong['maquyen']?>">Sửa</a> <a href="qlphanquyen_xoa.php?maquyen=<?php echo $dong['maquyen']?>">Xóa</a></td>
        </tr>
<?php
}
?>
    </table>
    
    <div class="clear"></div>
</div>