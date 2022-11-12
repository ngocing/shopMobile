<?php
	include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlsanpham'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
    $masp=$_GET['masp'];
    $row = mysqli_fetch_assoc(mysqli_query($conn,"select * from sanpham where masp = '".$masp."'"));
	mysqli_query($conn,"delete from sanpham where masp = '".$masp."'");
	$qq = mysqli_query($conn, "select * from sanpham where hinhanh ='".$row['hinhanh']."' or hinhanh1 ='".$row['hinhanh']."' or hinhanh2 ='".$row['hinhanh']."' or hinhanh3 ='".$row['hinhanh']."'");
	$rq = mysqli_num_rows($qq);
	if($rq == 0)
	{
		unlink('../'.$row['hinhanh']);
	}
						
	$qq = mysqli_query($conn, "select * from sanpham where hinhanh ='".$row['hinhanh1']."' or hinhanh1 ='".$row['hinhanh1']."' or hinhanh2 ='".$row['hinhanh1']."' or hinhanh3 ='".$row['hinhanh1']."'");
	$rq = mysqli_num_rows($qq);
	if($rq == 0)
	{
		unlink('../'.$row['hinhanh1']);
	}

	$qq = mysqli_query($conn, "select * from sanpham where hinhanh ='".$row['hinhanh2']."' or hinhanh1 ='".$row['hinhanh2']."' or hinhanh2 ='".$row['hinhanh2']."' or hinhanh3 ='".$row['hinhanh2']."'");
	$rq = mysqli_num_rows($qq);
	if($rq == 0)
	{
		unlink('../'.$row['hinhanh2']);
	}

	$qq = mysqli_query($conn, "select * from sanpham where hinhanh ='".$row['hinhanh3']."' or hinhanh1 ='".$row['hinhanh3']."' or hinhanh2 ='".$row['hinhanh3']."' or hinhanh3 ='".$row['hinhanh3']."'");
	$rq = mysqli_num_rows($qq);
	if($rq == 0)
	{
		unlink('../'.$row['hinhanh3']);
	}
								
	$_SESSION['pre'] = "sanpham";
								header("Location:index.php");
?>