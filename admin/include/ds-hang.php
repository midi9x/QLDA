<?php
	include("connect.php");
	function print_option($sql4)
	{
		$kq4=mysql_query($sql4);
		while ($r4=mysql_fetch_array($kq4))
			echo "<option value=$r4[0]> $r4[0] - $r4[1] </option>";
	}
?>

<form method="post" id="frm" name="Form">
<table width="735" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="9" class="tieude" align="center">DANH SÁCH HÀNG</td>
  </tr>
  
  <tr class="dau">
    <td style="border-bottom:1px solid white;"  align="center" colspan="9">Nhập tên hàng cần tìm: <input type="text" name="timkiem" /><input onclick ="return checktim();" type="submit" value="Tìm"/> </td>
  </tr>  

  <tr class="dau">
    <td align="center" width="50"><input id="selectall" type="checkbox"></td>
    <td align="center" width="80"> Tên hàng </td>
    <td align="center" width="135"> Loại hàng </td>
    <td align="center" width="100"> Mô tả </td>
    <td align="center" width="100"> Hình ảnh </td>
    <td align="center" width="100"> Đơn giá  </td>
    <td align="center" width="80"> Ghi Chú </td>
    <td align="center" colspan="2" width="100" > Chức năng </td>
  </tr>  
  <?php
		$timkiem = $_POST['timkiem'];
		$idl=$_GET["idl"];
		if(isset($_REQUEST["timkiem"])){
			$kq="select count(*) from hang where hinhanh like '%".$timkiem."%' OR tenhang like '%".$timkiem."%' OR mota like '%".$timkiem."%' ";
		}
		else  if(isset($_REQUEST["idl"])){
	        $kq=mysql_query("select count(*) from hang,loaihang where hang.id_loai=loaihang.id_loai and hang.id_loai=$idl"); }
		
		else{
	        $kq=mysql_query("select count(*) from hang"); }
        $r=mysql_fetch_array($kq);
        $numrow=$r[0];		
        //số record cho 1 trang
        $pagesize=4;
        //Tính tổng số trang
        $pagecount=ceil($numrow/$pagesize);			
        //Xác định số trang cho mỗi lần hiển thị
        $segsize=5;
        //Thiết lập trang hiện hành
        if(!isset($_GET["p"]))
			 $curpage=1;
        else	
        	 $curpage=$_GET["p"];
        if($curpage<1)
			 $curpage=1;
        if($curpage>$pagecount) $curpage=$pagecount;
        //Xác định số phân đoạn của trang
        $numseg=($pagecount % $segsize==0)?($pagecount/$segsize):(int)($pagecount/$segsize+1);
        //Xác định phân đoạn hiện hành của trang
        $curseg=($curpage % $segsize==0)?($curpage/$segsize):(int)($curpage/$segsize+1);   
		$k=($curpage-1)*$pagesize;
		//////////////////----------
		
		if(isset($_REQUEST["timkiem"])){
			$sql3="select * from hang where hinhanh like '%".$timkiem."%' OR tenhang like '%".$timkiem."%' OR mota like '%".$timkiem."%' order by id_hang desc ";
	
		}
		else  if(isset($_REQUEST["idl"])){
		    
			$sql3="select hang.*,loaihang.id_loai,loaihang.tenloaisp from hang,loaihang where hang.id_loai=loaihang.id_loai and hang.id_loai=$idl order by id_hang desc limit $k,$pagesize";
			}
	
		else{
			$sql3="select * from hang order by id_hang desc limit $k,$pagesize";}
		$kq3=mysql_query($sql3);

		if(!$kq3)
			echo "<center>Không có sản phẩm nào</center>";
		else{
		while($r3=mysql_fetch_array($kq3))
		{
			$tensp=$r3['tenhang']; $mota=$r3['mota'] ; $ghichu=$r3["ghichu"];
			$mota=$r3["mota"];
			$hinh=$r3['hinhanh'] ; $gia=number_format($r3['dongia'],0,'','.') ;$id=$r3["id_hang"];

			$sql2="select * from loaihang,hang where loaihang.id_loai=hang.id_loai and hang.id_hang='$id'";
			$kq2=mysql_query($sql2);
			while($r2=mysql_fetch_array($kq2))
			{
				$tenloaisp=$r2["tenloaisp"];
				$mota=$r2["mota"];
  ?>
  <tr class="noidung">
  <td width="50"  align="center">
  
  <input type="checkbox" name="chon[]" class="checkbox1" value="<?php echo $id; ?>"/></td>  
    <td width="80" align="center"><b><?php echo "$tensp"; ?></b></td>
    <td width="135" align="center"><?php echo "$tenloaisp"; ?></td>
    <td width="100"><?php echo substr($mota,0,40).'[...]'; ?></td>
    <td width="100" align="center"><img src="../hinhanh/thumb/<?php echo "$hinh"; ?>" width="90" height="90"></div></td>
	<td width="100" align="center"><?php echo "$gia"; ?></td>
	<td width="80" align="center" ><?php echo "$ghichu"; ?></td>    
    <td width="50" align="center"><a href="?m=hang&page=cap-nhat-hang&id=<?php echo $id; ?>">Sửa</a></td>
    <td width="50" align="center" ><a href="?m=hang&page=xoa-hang&id=<?php echo $id; ?>" onclick="return check();">Xóa</a>
    </td>
  </tr>
 <?php
	  		}
		}
		}
 ?>
  

		
		
<tr class=dau>
<td>
<input type="button" class="button del" onclick="return ht();" value="Xóa" />
  </td>
  <td colspan="9" style="text-align: center;">
 <?php
    if($numrow==0)
		echo "";
	else{ 
	 echo 'Trang: ';
	if(isset($_REQUEST["idl"])){
		if($curseg>1)
			echo "<a href='?m=h&page=ds-hang&idl=$idl&p=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;";
			$n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
			for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
			{
				if($curpage==$i)
					echo "<a href='?m=hang&page=ds-hang&idl=$idl&p=".$i."'><font color='#FF0000'>[".$i."]</font></a> &nbsp;";
				else
					echo "<a href='?m=hang&page=ds-hang&idl=$idl&p=".$i."'><font color='#000'>[".$i."]</font></a> &nbsp;";
			}
			if($curseg<$numseg)
			echo "<a href='?m=hang&page=ds-hang&idl=$idl&p=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;";				
	}
	else{
		if($curseg>1)
			echo "<a href='?m=hang&page=ds-hang&p=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;";
			$n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
			for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
			{
				if($curpage==$i)
					echo "<a href='?m=hang&page=ds-hang&p=".$i."'><font color='#FF0000'>[".$i."]</font></a> &nbsp;";
				else
					echo "<a href='?m=hang&page=ds-hang&p=".$i."'><font color='#FFF'>[".$i."]</font></a> &nbsp;";
			}
			if($curseg<$numseg)
			echo "<a href='?m=hang&page=ds-hang&p=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;";				
	}
	}
?>
    </td>
  </tr> 
  
		
</table>



</form>


