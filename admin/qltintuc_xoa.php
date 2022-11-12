<?php
	include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qltintuc'] == "0")
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:../index.php");
	}
    $id=$_GET['id'];
    $row = mysqli_fetch_assoc(mysqli_query($conn,"select * from tintuc where id = '".$id."'"));
	mysqli_query($conn,"delete from tintuc where id = '".$id."'");
	$qq = mysqli_query($conn, "select * from tintuc where hinhanh ='".$row['hinhanh']."'");
	$rq = mysqli_num_rows($qq);
	if($rq == 0)
	{
		unlink('../'.$row['hinhanh']);
	}
	$_SESSION['pre'] = "tintuc";
								header("Location:index.php");
?>