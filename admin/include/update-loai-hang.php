<br /><?php
$ten="";
if(isset($_POST["act"]))
{
	$ten=$_POST["ten"];	
	$idl=$_POST["idl"];$nhomsp=$_POST["nhomsp"];
	$sql="update loaihang SET id_nhom='$nhomsp',tenloaisp='$ten' where id_loai='$idl'";
	$kq=mysql_query($sql);	
	if(!$kq)
		echo "<script>alert('Có lỗi xảy ra trong quá trình xử lý');window.history.go(-1);</script>";
	else{
		echo "<script>alert('Đã sửa');window.location='../admin/?m=mn&page=ds-loai-hang'</script>";
		$ten="";	
	}
}

?>
<?php
	function Getnhomsp($idn)
	{
		$sql2 = "SELECT * from nhomhang order by id_nhom ASC";
		$kq2 = mysql_query($sql2);
		$s2="";
		$n2=mysql_num_rows($kq2);
		if($n2>0){
		while($r2=mysql_fetch_array($kq2))
		{
			if($r2["id_nhom"]==$idn)
				$s2.="<option value='".$r2["id_nhom"]."' selected>";			
			else
				$s2.="<option value='".$r2["id_nhom"]."'>";
			$s2.=$r2["tennhom"]."</option>";
		}
		}
		return $s2;
	}
?>	
<?php
	$idl=$_GET["idl"];
	$sql=mysql_query("select nhomhang.*,loaihang.* from nhomhang,loaihang where nhomhang.id_nhom=loaihang.id_nhom and loaihang.id_loai=$idl");
	$r=mysql_fetch_array($sql);
	$ten=$r["tenloaisp"];$idn=$r["id_nhom"];
?>
<table width="735" border="0" cellspacing="0" cellpadding="0">
<form method="POST">
  <tr>
    <td colspan="2" class="tieude" align="center">SỬA LOẠI HÀNG</td>
  </tr> 
   <tr class="dau">
    <td width="250" style="padding-left:80px" height="30">Nhóm hàng:</td>
    <td width="485">
    <select name="nhomsp" style="width:240px;">
      <?php 
		include("connect.php");
		echo Getnhomsp($idn);
	  ?>
    </select>
    </td>
  </tr>  
  <tr class="dau">
    <td width="250" style="padding-left:80px" height="30">Tên nhóm hàng:</td>
    <td width="485">
    <input type="text" name="ten" style="width:240px" value="<?php echo "$ten"; ?>" />
    </td>
  </tr> 
  <tr class="noidung">
  	<td  align="center" colspan="2" height="35">
		<input class="button edit" type="submit" value="Sửa">
		<input class="button refresh" type="reset" value="Làm mới">      
    </td>
  </tr>
  <input type="hidden" name="act">
  <input type="hidden" name="idl" value="<?php echo "$idl"; ?>" />
  </form>
</table>
