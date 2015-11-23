<?php
if(isset($_POST["act"]))
{
	if(isset($_POST["xoa"]))
	{
		$chon=$_POST["chon"];
		$count=count($chon);
		if($count==0)
			echo "<script>alert('Chưa chọn phản hồi cần xóa');</script>";
		else{
			for ($j=0;$j<$count;$j++)
			{	
				$SQL_xoagiohang = "DELETE FROM phanhoi WHERE id_phanhoi='$chon[$j]'";
			//	echo "$SQL_xoagiohang";
				$kq_xoagiohang=mysql_query($SQL_xoagiohang);
				$n+=mysql_affected_rows();
			}					
			echo "<script>alert('Đã xóa $n liên hệ');</script>";
		}		
	
	}
}
?>
    
<form method="post">

<table width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" class="tieude" align="center">DANH SÁCH KHÁCH HÀNG PHẢN HỒI</td>
  </tr>
  <tr class=dau height="30">
    <td align="center" width="50"><input id="selectall" type="checkbox"> </td>
    <td align="center" width="200">Ngày Phản Hồi</td>
    <td width="200" align="center"> Khách Hàng </td>
    <td align="center" width="460"> Nội dung </td>
    <td align="center" width="50">Xóa</td>
    
  </tr>  
<?php
	
		$sql3="select * FROM phanhoi order by ngayphanhoi";
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "ko có phản hồi";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$idlh=$r3["id_phanhoi"];
			$ngaylh=ConvertDate_time_db($r3["ngayphanhoi"]);
			$hoten=$r3["hoten"];$noidung=$r3["noidung"];
			
  ?>
  <tr class="noidung">
  <td width="50" align="center">
  <input type="checkbox" name="chon[]" class="checkbox1" value="<?=$idlh;?>"/></td>  
    <td width="200" height="30" align="center" ><?=$ngaylh; ?></td>
    <td width="200" align="center"><?=$hoten?></td>
    <td width="460" align="center"><?=$noidung; ?></td>
    <td width="50" align="center"><a href="?m=xoa-phan-hoi&idlh=<?=$idlh; ?>" onclick="return checklh()">Xóa</a></td>   
  </tr>
 <?php
		}
		}
 ?>
  <tr class=dau>
	<td>
	<input type="submit" class="button del" name="xoa" value='Xóa' onClick="return checklh();document.form.submit();">       
    </td>
	<td colspan="9" style="text-align: center;">
		Trang: <a href='#'><font color='#FF0000'>[1]</font>
	</td>
  </tr> 
</table>
  <input type="hidden" name="act">
</form>