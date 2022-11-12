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
	$madh = $_GET['madh'];
	mysqli_query($conn, "update donhang set trangthai = '$madh' where madh = '$madh'");
	$_SESSION['pre'] = "donhang";
	header("Location:index.php");
?>