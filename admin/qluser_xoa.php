<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qluser'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$matk=$_GET['matk'];
    $dong=mysqli_fetch_assoc(mysqli_query($conn,"select * from taikhoan where taikhoan='".$matk."'"));
	mysqli_query($conn,"delete from taikhoan where taikhoan='".$matk."'");
	$_SESSION['pre'] = "nhanvien";
								header("Location:index.php");
?>
