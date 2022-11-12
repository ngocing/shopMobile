<?php
	include("../connect.php");
	if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlthacmac'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$id = $_GET['id'];
	mysqli_query($conn, "delete from thacmac where id = '$id'");
	$_SESSION['pre'] = "thacmac";
				header("Location:index.php");
?>