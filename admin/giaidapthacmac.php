<?php
    include("../connect.php");
    if (isset($_SESSION['tentk']) && $_SESSION['admin']==true)
	{
		$tentk=$_SESSION['tentk'];
		$queryquyen = mysqli_query($conn, "select * from phanquyen where maquyen = '".$_SESSION['quyen']."'");
		$rowquyen = mysqli_fetch_assoc($queryquyen);
		if($rowquyen['qlthacmac'] == "0")
		{
			header("Location:trong.html");
		}
	}
	else
	{
		header("Location:../index.php");
	}
	$page=0;
	if (isset($_GET['page']))
	$page=$_GET['page'];
    $kq=mysqli_query($conn,"select * from thacmac where phanhoi = ''");
	$num= mysqli_num_rows($kq);
	$sotrang=$num/10;
	$bd=$page*10;
    $kq=mysqli_query($conn,"select * from thacmac where phanhoi = '' limit $bd,10");
?>
<h2 class="head">Tất cả thắc mắc(<?php echo $num;?>)</h2>
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
												<li><a href='#' onClick="getthacmac(<?php echo $page?>)"> <?php echo $n?> </a></li>
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
                                    <td>Họ Tên</td>
                                    <td>Email</td>
                                    <td>Tiêu đề</td>
                                    <td>Nội Dung</td>
                                    <td>Phản hồi</td>
                                    <td>Lựa Chọn </td>
                                </tr>
<?php
							while($dong = mysqli_fetch_assoc($kq))
							{
?>
                                <tr>
                                    <td><?php echo $dong['hoten']?></td>
                                    <td><?php echo $dong['email']?></td>
								    <td><?php echo $dong['tieude']?></td>
								    <td><?php echo $dong['noidung']?></td>
                                    <td><?php echo $dong['phanhoi']?></td>
                                    <td><a href="qlthacmac_sua.php?id=<?php echo $dong['id']?>">Phản hồi</a> - <a href="qlthacmac_xoa.php?id=<?php echo $dong['id']?>">Xóa</a></td>
                                </tr>
<?php
    						}
?>
                            </table>
                            
                            <div class="clear"></div>
                        </div>