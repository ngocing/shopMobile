<?php
    include("../connect.php");
   if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlbanner'] == "0")
		{
			header("Location:trong.html");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$kq=mysqli_query($conn,"select * from banner");
?>
<h2 class="head">Quản lý banner</h2>
                        
<div class="mens-toolbarbang">
    <table  class="bang">
        <tr>
            <td>Loại Banner</td>           
            <td>Hình ảnh</td>
            <td><a href="banner_them.php">Thêm banner</a></td>
        </tr>
<?php
    while($dong = mysqli_fetch_assoc($kq))
    {
?>
        <tr> 
            <td><?php echo $dong['loaibanner']?></td>          
            <td><img src="<?php echo "../".$dong['hinhanh']?>" height="200px"></td>
            <td><a href="banner_xoa.php?id=<?php echo $dong['id']?>">Xóa</a></td>
        </tr>
<?php
    }
?>
    </table>
    <div class="clear"></div>
</div>