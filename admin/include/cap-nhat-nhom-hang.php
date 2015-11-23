<?php
$ten="";
if(isset($_POST["act"]))
{
	$ten=$_POST["ten"];	
	$idn=$_POST["idn"];
	$check=mysql_query("select count(*) from nhomhang where tennhom='$ten'");
	$r=mysql_fetch_array($check);
	$n=$r[0];
	if($n!=0)
		echo "<script>alert('Lỗi!! Nhóm Hàng này đã có trong cơ sở dữ liệu!');window.history.go(-1);</script>";
	else{
	$sql="update nhomhang SET tennhom='$ten' where id_nhom='$idn'";
///	echo "$sql";
	$kq=mysql_query($sql);	
	if(!$kq)
		echo "<script>alert('Có lỗi xảy ra trong quá trình xử lý');window.history.go(-1);</script>";
	else{
		echo "<script>alert('Đã sửa');window.location='../admin/?m=mn&page=ds-nhom-hang'</script>";
		$ten="";
	}
	}
}

?>
<?php
	$idn=$_GET["idn"];
	$sql=mysql_query("select * from nhomhang where id_nhom=$idn");
	$r=mysql_fetch_array($sql);
	$ten=$r["tennhom"];
?>
<table width="735" border="0" cellspacing="0" cellpadding="0">
<form method="POST">
  <tr>
    <td colspan="2" class="tieude" align="center">SỬA NHÓM HÀNG</td>
  </tr>  
  <tr class="dau">
    <td width="250" style="padding-left:80px" height="30">Tên nhóm Hàng:</td>
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
  <input type="hidden" name="idn" value="<?php echo "$idn"; ?>" />
  </form>
</table>
