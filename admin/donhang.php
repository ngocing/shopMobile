<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qldonhang'] == "0")
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
    $kq=mysqli_query($conn,"select * from donhang");
	$num= mysqli_num_rows($kq);
	$sotrang=$num/10;
	$bd=$page*10;
    $kq=mysqli_query($conn,"select * from donhang limit $bd,10");
?>
<h2 class="head">Tất cả đơn hàng(<?php echo $num;?>)</h2>
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
												<li><a href='#' onClick="getdonhang(<?php echo $page?>)"> <?php echo $n?> </a></li>
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
            <td>Mã đơn hàng</td>
            <td>Tài khoản</td>
            <td>Ngày mua</td>
            <td>Tổng tiền</td>
            <td>Trạng thái</td>
            <td>Chi tiết</td>
        </tr>
<?php
    while($dong = mysqli_fetch_assoc($kq))
    {
?>
        <tr>
            <td><?php echo $dong['madh']?></td>
            <td><?php echo $dong['matk']?> (<a href="chitietkh.php?matk=<?php echo $dong['matk']?>">Chi tiết</a>)</td>
            <td><?php echo $dong['ngaymua']?></td>
            <td><?php echo $dong['tongtien']?></td>
            <td><?php if($dong['trangthai'] == 0) echo "Chưa giao hàng (<a href='giaohang.php?madh=".$dong['madh']."'>giao hàng</a>)"; else echo "Đã giao hàng";?></td>
            <td><a href="chitietdonhang.php?madh=<?php echo $dong['madh']?>&matk=<?php echo $dong['matk']?>">Xem </a> <a href="qldonhang_xoa.php?madh=<?php echo $dong['madh']?>">Xóa</a></td> 
        </tr>
<?php
    }
?>
    </table>
    
    <div class="clear"></div>
</div>