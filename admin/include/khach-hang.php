<?php
if(isset($_POST["act"]))
{
	if(isset($_POST["xoa"]))
	{
		$chon=$_POST["chon"];
		$count=count($chon);
		if($count==0)
			echo "<script>alert('Chưa chọn khách hàng cần xóa');</script>";
		else{
			for ($j=0;$j<$count;$j++)
			{	
				
				$SQL_xoa= "DELETE FROM khachhang WHERE username='$chon[$j]'";
				$kq_xoa=mysql_query($SQL_xoa);
				$n+=mysql_affected_rows();
				echo "<script>alert('Đã xóa $n khách hàng');</script>";

			}					
		}		
	
	}
}
?>

<form method="post">
<table width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="9" class="tieude" align="center">DANH SÁCH KHÁCH HÀNG</td>
  </tr>
  <tr height="30" class="dau">
    <td align="center" width="50" ><input id="selectall" type="checkbox"></td>
    <td align="center" width="150">Tên đăng nhập</strong></td>
    <td width="150" align="center"><strong>Họ tên</strong></td>
    <td align="center" width="130"><strong>Địa chỉ</strong></td>
    <td align="center" width="100"><strong>Email</strong></td>
    <td align="center" width="120"> <strong>Điện thoại</strong></td>
    <td align="center" width="80" ><strong>Phân loại</strong></td>
    <td align="center" colspan="2" width="155" ><strong>Chức năng</strong></td>
  </tr>  
<?php
    

		$sql="select * from khachhang";
		$kq=mysql_query($sql);
		if(!$kq)
			echo "Không có người dùng nào";
		else{
		while($r=mysql_fetch_array($kq))
		{
			$user=$r["username"];
			$hoten=$r["hoten"];
			$diachi=$r["diachi"];
			$email=$r["email"];
			$dienthoai=$r["dienthoai"];
			$pl=$r["phanloai"];
			$str_dt=strlen($dienthoai);
  ?>
  <tr class=noidung>
  <td width="50" class="noidung" align="center">
  <input type="checkbox" name="chon[]" class="checkbox1"  value="<?php echo $user; ?>"/></td>  
    <td width="150" height="30" align="center"><?php echo "$user"; ?></td>
    <td width="150" align="center"><?php echo "$hoten"; ?> </a> </td>
    <td width="180" align="center"><?php echo "$diachi"; ?></td>
    <td width="100" align="center"><?php echo "$email"; ?></td>
    <td width="120" align="center"><?php echo "$dienthoai"; ?></td>
    <td width="80" align="center">	
	<?php if($pl==0)
			echo "Khách BT"; 
		else 
			echo "Khách VIP";
		echo "</a>";
		?></td>
		
	<td align="center" width="80" ><a  onclick="return ht();" href="#">Sửa</a></td>
	<td align="center" width="75" ><a  onclick="return ht();" href="#">Xóa</a></td>
  </tr>
 <?php
		}
		}
 ?>
<tr class=dau>
<td>
 <input type="submit" class="button del" name="xoa" value='Xóa' onClick="return checktv();document.form.submit();"/> 
</td>
<td colspan="7" style="text-align: center;">
		Trang: <a href='#'><font color='#FF0000'>[1]</font>
	</td>
<td  colspan="9"  style="text-align: right;">
  <input type="button" class="button add"  onclick="return ht();" value='Thêm'/> 
</td>
</tr>
</table>
  <input type="hidden" name="act">
</form>