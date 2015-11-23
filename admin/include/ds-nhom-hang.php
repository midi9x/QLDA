 <form method="post" id="frm" name="form">  
<table width="735" cellspacing="0" cellpadding="0">  
 <tr>
    <td colspan="9" class="tieude" align="center">DANH SÁCH NHÓM HÀNG</td>
  </tr>
  <tr class="dau" height="30" class="dau">
    <td align="center" width="10">
		<input id="selectall" type="checkbox">
	</td>
    <td align="center" width="485">Tên nhóm hàng</td>    
    <td colspan="2" align="center" width="200">Chức năng</td>
   
  </tr>  
<?php
		$sql3="select * from nhomhang";
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "nothing";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$id_nhom=$r3["id_nhom"];$tennhom=$r3["tennhom"];	
  ?>
  
  <tr class="noidung">
  <td align="center" width="10" >
  <input type="checkbox" name="chon[]" class="checkbox1" value="<?php echo $id_nhom; ?>"/>
  </td>  
    <td width="485" height="30" align="center"><?php echo "$tennhom"; ?></td>    
    <td width="100" align="center"><a href="?m=mn&page=cap-nhat-nhom-hang&amp;idn=<?php echo "$id_nhom"; ?>">Sửa</a></td>
    <td width="100" align="center"><a href="?m=mn&page=xoa-nhom-hang&idn=<?php echo "$id_nhom"; ?>" onclick="return check()">Xóa</a>
    </td>
  
 <?php	 			
		}
		}
 ?>  
</tr>
<tr class="dau">
<td>
<input type="submit" class="button del" onClick="return check();document.form.action='../admin/?m=mn&page=nhomsp-xl-del';" value="Xóa" />
</td>
<td colspan="9" style="text-align: center;">
 Trang: <a href='#'><font color='#FF0000'>[1]</font>
</td>
</tr>
</table> 
</form>