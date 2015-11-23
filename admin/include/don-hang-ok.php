<table width="735" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="5" class="tieude" align="center">DANH SÁCH ĐƠN HÀNG ĐÃ MUA</td>
  </tr>  
  <tr class="dau" height="30">    
	    <td align="center" width="200"> Họ tên </td>     
        <td align="center" width="300"> Địa chỉ </td>   
		<td align="center" width="100"> SĐT </td>   
		<td align="center" width="200"> Ngày đặt </td>   
        <td align="center" width="200"> Tổng tiền </td>
  </tr>  
 
  <?php

  		$sql="select * from donhang where tinhtrang='damua'";
		$kq=mysql_query($sql);
		if(!$kq)
			echo "Không có hàng đã mua";
		else{
		while($r=mysql_fetch_array($kq))
		{
			$ngaydat=$r["ngaydat"];$day=ConvertDate_time_db($ngaydat);
			$hoten=$r["hoten"];
			$tongtien=$r["tongtien"];
			$tt=number_format($tongtien,0,'','.');
			$diachi=$r["diachi"];
			$sdt=$r["dienthoai"];
?>
     <tr class="noidung" height="30">        
        <td align="center" width="200"> <?php echo $hoten; ?> </td>     
        <td align="center" width="300"> <?php echo $diachi; ?> </td>   
		<td align="center" width="100"> <?php echo $sdt; ?> </td>   
		<td align="center" width="200"> <?php echo $ngaydat; ?> </td>   
        <td align="center" width="200"> <?php echo $tt.' VNĐ'; ?> </td>
	</tr>  
	
<?php }
	}
  ?>  
   <tr class="dau">
  <td colspan="9" style="text-align: center;">
 Trang: <a href='#'><font color='#FF0000'>[1]</font>
</td>
  </tr>
</table>