<?php
    session_start();
    if(isset($_GET['masp']))
        {
                unset($_SESSION['giohang'][$_GET['masp']]);
                header("location: cart.php");
        }
        // Xóa tất cả (với dk giỏ hàng phải có)
        if($_GET['del_all'] == "true" && count($_SESSION['giohang']))
        {
                foreach($_SESSION['giohang'] as $masp => $sl)
                {
                        unset($_SESSION['giohang'][$masp]);        
                }
                header("location:cart.php");
				$_SESSION['tongcong'] ="0";
        }        
?>


