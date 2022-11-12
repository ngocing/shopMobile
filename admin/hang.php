<?php
include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlhang'] == "0")
		{
			header("Location:trong.html");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$key = $_GET['keyword'];
	$page=0;
	$page=$_GET['page'];
    $kq=mysqli_query($conn,"select * from hang where tenhang like '%".$key."%' or mahang like '%".$key."%'");
	$num= mysqli_num_rows($kq);
	$sotrang=$num/10;
	$bd=$page*10;
    $kq=mysqli_query($conn,"select * from hang where tenhang like '%".$key."%' or mahang like '%".$key."%' order by tenhang ASC limit $bd,10");
?>
<h2 class="head"><?php if($key == "") echo "Hãng sản phẩm"; else echo "Kết quả cho'$key'($num)"?></h2>
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
						<li><a href='#' onClick="gethang(<?php echo $page?>)"> <?php echo $n?> </a></li>
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
            <td>Mã hãng sản xuất</td>
            <td>Tên hãng sản xuất</td>                                     
            <td>
                <a href="qlhang_them.php">Thêm hãng</a>
            </td>
        </tr>
<?php
while($dong = mysqli_fetch_assoc($kq))
{
?>
        <tr>
            <td><?php echo $dong['mahang']?></td>
            <td><?php echo $dong['tenhang']?></td>
            <td><a href="qlhang_sua.php?mahang=<?php echo $dong['mahang']?>">Sửa</a> <a href="qlhang_xoa.php?mahang=<?php echo $dong['mahang']?>">Xóa</a></td>
        </tr>
<?php
}
?>
    </table>
    
    <div class="clear"></div>
</div>