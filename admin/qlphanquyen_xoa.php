<?php
	include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlphanquyen'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
    $ma=$_GET['maquyen'];
	mysqli_query($conn,"delete from phanquyen where maquyen='".$ma."'");
	$_SESSION['pre'] = "phanquyen";
	header("Location:index.php");
?>