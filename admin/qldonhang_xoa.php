<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qldonhang'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
    $madh=$_GET['madh'];
	mysqli_query($conn,"delete from donhang where madh='".$madh."'");
	mysqli_query($conn,"delete from chitietdonhang where madh='".$madh."'");
	$_SESSION['pre'] = "donhang";
	header("Location:index.php");
?>
