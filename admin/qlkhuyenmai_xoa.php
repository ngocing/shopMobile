<?php
	include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlkhuyenmai'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
    $ma=$_GET['masp'];
	mysqli_query($conn,"UPDATE sanpham set giakhuyenmai='0' where masp='".$ma."'");
	$_SESSION['pre'] = "khuyenmai";
								header("Location:index.php");
?>