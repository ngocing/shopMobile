<?php
include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qluser'] == "0")
		{
			header("Location:trong.html");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$key = $_GET['keyword'];
	$page=0;
	$page=$_GET['page'];
    $kq=mysqli_query($conn,"select * from taikhoan where quyen != '0' and (taikhoan LIKE '%".$key."%' OR hoten LIKE '%".$key."%')");
	$num= mysqli_num_rows($kq);
	$sotrang=$num/20;
	$bd=$page*20;
    $kq=mysqli_query($conn,"select * from taikhoan where quyen != '0' and (taikhoan LIKE '%".$key."%' OR hoten LIKE '%".$key."%') order by hoten asc limit $bd,20");
?>
<h2 class="head"><?php if($key == "") echo "Tất cả nhân viên(".$num.")"; else echo "Kết quả cho'$key'($num)"?></h2>
                        <div class="mens-toolbar">
						
                            <div class="pager">
                                <ul class="dc_pagination dc_paginationA dc_paginationA06">
                                    <li><a href="#" class="previous" >Pages</a></li>
                                   <?php
								      $k=$page;
									   for($page=0;$page<$sotrang;$page++)
									     {
											 if ($page==$k)
											 {
										        $n = $page+1;
												?>
												<li><a style="color: #7cb022"> <?php echo $n?> </a></li>
												<?php
											 }
											 else
											 {
				                                $n = $page+1; 
												?>
												<li><a href='#' onClick="getnhanvien(<?php echo $page?>, <?php echo "'".$key."'"?>)"> <?php echo $n?> </a></li>
												<?php
											 }
                                          }
									  ?>
                                </ul>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="mens-toolbarbang">
                            <table  class="bang">
                                <tr >
                                    <td>Tên tài khoản</td>
                                    <td>Họ và tên</td>
                                    <td>Địa chỉ E-mail</td>
                                    <td>Ngày sinh</td>
                                    <td>Giới tính</td>   
                                    <td>Địa chỉ</td>
                                    <td>Số điện thoại</td>
                                    <td>Quyền</td>
                                    <td><a href="qluser_them.php">Thêm user</a></td>
                                </tr>
<?php
    while($dong = mysqli_fetch_assoc($kq))
    {
?>
                                <tr>
                                    <td><?php echo $dong['taikhoan']?></td>
                                    <td><?php echo $dong['hoten']?></td>
                                    <td><?php echo $dong['email']?></td>
								    <td><?php echo $dong['ngaysinh']?></td>
                                    <td><?php if ($dong['gioitinh']=="1") echo "Nam"; else echo "Nữ";?></td>
                                    <td><?php echo $dong['diachi']?></td>
                                    <td><?php echo $dong['sdt']?></td>
                                    <td><?php echo $dong['quyen']?></td>
                                    <td><a href="qluser_sua.php?matk=<?php echo $dong['taikhoan']?>">Sửa</a> <a href="qluser_xoa.php?matk=<?php echo $dong['taikhoan']?>">Xóa</a></td>
                                </tr>
<?php
    }
?>
                            </table>
                            
                            <div class="clear"></div>
                        </div>