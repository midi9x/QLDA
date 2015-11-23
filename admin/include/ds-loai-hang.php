<br /><form method="post" id="frm" name="form">
<table width="735" cellspacing="0" cellpadding="0">  
 <tr>
    <td colspan="9" class="tieude" align="center">DÁNH SÁCH LOẠI HÀNG</td>
  </tr>
  <tr class="dau" height="30">
    <td align="center" width="50" ><input id="selectall" type="checkbox"> </td>
    <td align="center" width="235">Nhóm hàng </td>
    <td align="center" width="250"> Loại hàng</td>    
    <td colspan="2" align="center" width="300"> Chức năng </td>
  </tr>  
<?php
		$sql3="select nhomhang.tennhom,loaihang.* from nhomhang,loaihang where nhomhang.id_nhom=loaihang.id_nhom order by nhomhang.id_nhom ASC";
//	echo "$sql3";
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$id_nhom=$r3["id_nhom"];$tennhom=$r3["tennhom"];	
			$id_loai=$r3["id_loai"];$tenloai=$r3["tenloaisp"];
  ?>
  <tr class="noidung">
  <td width="50" align="center">
  <input type="checkbox" name="chon[]" class="checkbox1" value="<?php echo $id_loai; ?>"/></td>  
    <td width="235" height="30" align="center" ><?php echo "$tennhom"; ?></td>
    <td width="250" align="center"  ><?php echo "$tenloai"; ?></td>    
    <td width="100" align="center"><a href="?m=mn&page=update-loai-hang&idl=<?php echo "$id_loai"; ?>">Sửa</a></td>
    <td width="100" align="center"><a href="?m=mn&page=xoa-loai-hang&idl=<?php echo "$id_loai"; ?>" onclick="return check()">Xóa</a>
    </td>
  </tr>
 <?php	 			
		}
		}
 ?>  
<tr class="dau">
<td>
<input type="submit" class="button del" onClick="return ht();" value="Xóa" />
</td>
<td colspan="9" style="text-align: center;">
 Trang: <a href='#'><font color='#FF0000'>[1]</font>
</td>
</tr>
     
</table> 
</form>