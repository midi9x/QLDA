<?php
if(isset($_POST["act"]))
{
	if(isset($_POST["giaiquyet"]))
	{
		
		$chon=$_POST["chon"];
		$count=count($chon);
		if($count==0)
			echo "<script>alert('Chưa chọn hàng để giải quyết');</script>";
		else{
			for($i=0;$i<$count;$i++)
			{
				$sql4="update donhang set tinhtrang='damua' where id_donhang='$chon[$i]' and tinhtrang='dathang' ";
				$kq4=mysql_query($sql4);
			
				$sql5="select * from donhang where id_donhang='$chon[$i]'";				
				$kq5=mysql_query($sql5);
				echo "<script>alert('Đã giải quyết đơn hàng');</script>";
			}
				
		}
	}

}

?>
<br />
<table width="735" border="0" cellspacing="0" cellpadding="0">
<form method="post">
  <tr>
    <td colspan="7" class="tieude" align="center">DANH SÁCH ĐƠN ĐẶT HÀNG </td>
  </tr>  
  <tr class="dau">
        <td align="center" width="50"><input id="selectall" type="checkbox"> </td>
        <td align="center" width="100"> Họ tên KH </td>
        <td align="center" width="140">  Địa chỉ </td>
        <td align="center" width="145">  SĐT</td>        
        <td align="center" width="100" > Ngày đặt </td>
        <td align="center" width="100">  Tổng xiền</td>    
	    <td align="center" width="100"> Xem chi tiết </td>		
  </tr>
  <?php
  

  	$sql="select * from donhang where tinhtrang='dathang'";
	$kq=mysql_query($sql);
	if(!$kq)
		echo "không có đơn hàng";
	else{
	while($r=mysql_fetch_array($kq))
	{
		
		$id_donhang=$r["id_donhang"];
		$hoten=$r["hoten"];
		$soluong=$r["soluong"];$ngaydat=ConvertDate_time_db($r["ngaydat"]);
		$diachi=$r["diachi"];$dt=$r["dienthoai"];
		$tongtien=$r['tongtien'];
		
?>
     <tr class="noidung" height="30">
        <td align="center" width="50"> <input class="checkbox1" type="checkbox" name="chon[]" value="<?php echo "$id_donhang"; ?>">    </td>
        <td align="center" width="100"><?php echo "$hoten"; ?> </td>
        <td align="center" width="140"> <?php echo "$diachi";?> </td>
        <td align="center" width="145"> <?php echo "$dt";?> </td>       
        <td align="center" width="100"> <?php echo "$ngaydat"; ?> </td>
        <td align="center" width="150" > <?php echo "$tongtien"; ?> </td>      
		<td align="center" width="100" > <a href="?m=dh&page=ctdh&iddh=<?=$id_donhang?>">Xem chi tiết</a> </td>
      </tr>  
	  
 
    <input type="hidden" name="act">
<?php
	} 
	
	?>
 <tr class="dau">
  <td><input type="submit" class="button" name="giaiquyet" onclick="return chuyenhang();"  value="Chuyển hàng"></td>
  <td colspan="9" style="text-align: center;">
 Trang: <a href='#'><font color='#FF0000'>[1]</font>
</td>
  </tr>
	<?php
	}
  ?>
  
</form>
</table>