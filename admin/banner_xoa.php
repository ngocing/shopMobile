<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlbanner'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
    $id=$_GET['id'];
    $banner = mysqli_fetch_assoc(mysqli_query($conn,"select * from banner where id = '".$id."'"));
    unlink('../'.$banner['hinhanh']);
	mysqli_query($conn,"delete from banner where id='".$id."'");
	$_SESSION['pre'] = "banner";
	header("Location:index.php");
?>
