<?php
    include("Connect.php");
	if(isset($_SESSION['tentk']))
    {
        $ten = $_SESSION['tentk'];
        $masp = $_GET['masp'];
		$masp =  mysqli_real_escape_string($conn, $masp);
        if($masp != "")
        { 	//  Nếu có masp truyền vào
            // Kiểm tra xem san pham này có trong CSDL hay k?
			$sql="Select masp from sanpham where masp ='".$masp."'";
            $kq = mysqli_query($conn,$sql);
            $dong = mysqli_num_rows($kq);
            // Nếu tồn tại
            if($dong == 1)
			{
                //session_register("giohang");
                //  nếu id này có trong giỏ hàng rồi
                if(isset($_SESSION['giohang'][$masp]))
                {
                        // Tăng số lượng nó lên
                        $_SESSION['giohang'][$masp] ++;
                }
                else // Chưa có trong giỏ hàng (mới chọn)
                {
                        $_SESSION['giohang'][$masp] = 1; // Số lượng mặc định là 1
                }
                // Chuyển tức khắc qua trang giỏ hàng
               // header("location: cart.php");
			   	header("location: chitietsanpham.php?masp=$masp");
            }
        }
    }
	else
	{
		header("location:login.php");
	}
?>