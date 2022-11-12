<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "hahadatabase");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM chitietdonhang";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   
    <table class="table" bordered="1">  
		<tr>  
			<th>STT</th>  
			<th>Mã đơn hàng</th>  
			<th>Mã sản phẩm</th>  
			<th>Số lượng</th>
			<th>Đơn giá</th>
			<th>Thành tiền</th>
		</tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
		<td>'.$row["stt"].'</td>  
		<td>'.$row["madh"].'</td>  
		<td>'.$row["masp"].'</td>  
		<td>'.$row["soluong"].'</td>  
		<td>'.$row["dongia"].'</td>
		<td>'.$row["thanhtien"].'</td>
	</tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=donhang.xls');
  echo $output;
 }
}
?>
