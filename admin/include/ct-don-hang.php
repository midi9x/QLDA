<br /><form method="post">
<table width="735" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="9" class="tieude" align="center">Chi tiết đơn hàng</td>
  </tr>
  <tr class="dau">
    <td align="center" width="50">Chọn</td>
    <td align="center" width="80"> ID đơn hàng</td>
    <td align="center" width="200">Tên hàng </td>
    <td align="center" width="100">Số lượng </td>
    <td align="center" width="100"> Đơn giá </td>
    <td align="center" width="100"> Tổng tiền  </td>
    <td align="center" colspan="2" width="105"> Chức năng </td>
  </tr>  
  <?php
		
		$iddh=$_GET["iddh"];
		$sql3="select * from hang, ctdonhang where hang.id_hang = ctdonhang.id_hang and id_donhang=$iddh";
		$kq3=mysql_query($sql3);
		while($r=mysql_fetch_array($kq3))
		{
		$iddh = $r['id_donhang'];
		$id = $r['id_hang'];
		$tenhang = $r['tenhang'];
		$dongia = $r['dongia'];
		$soluong = $r['soluong'];
		
  ?>
  <tr class="noidung">
  <td width="50"  align="center"> <input type="checkbox" name="chon[]" value="<?php echo $id; ?>"/></td>  
  <td align="center" width="80"><?=$iddh?></td>
    <td align="center" width="200"><?=$tenhang?> </td>
    <td align="center" width="100"><?=$soluong?> </td>
    <td align="center" width="100"><?=$dongia?> </td>
    <td align="center" width="100"> <?=number_format($soluong*$dongia,0,'','.')?>  </td>
    <td align="center" width="50"> Sửa </td>
    <td align="center" width="55"> Xóa </td>
  </tr>
 <?php
	  		
		
		}
 ?>
  
<tr class=dau>
<td>
<input  type="button" class="button del" value='Xóa' >       
</td>
 <td colspan="9" style="text-align: center;">
 Trang: <a href='#'><font color='#FF0000'>[1]</font>
</td>
</tr>
	
</table>
</form>


