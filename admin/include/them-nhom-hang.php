<?php
$ten="";
if(isset($_POST["act"]))
{
	$ten=$_POST["ten"];	
	$id=getid();
	$check=mysql_query("select count(*) from nhomhang where tennhom='$ten'");
	$r=mysql_fetch_array($check);
	$n=$r[0];
	if($n!=0)
		echo "<script>alert('Nhóm Hàng này đã có trong cơ sở dữ liệu!');window.history.go(-1);</script>";
	else{
	$sql="insert into nhomhang(id_nhom,tennhom) values ('$id','$ten')";
	$kq=mysql_query($sql);	
	if(!$kq)
		echo "<script>alert('Có lỗi xảy ra trong quá trình xử lý');window.history.go(-1);</script>";
	else{
		echo "<script>alert('Đã thêm');window.location='../admin/?m=mn&page=ds-nhom-hang'</script>";
		$ten="";
	}
	}
}

?>

<table width="735"  border="0" cellspacing="0" cellpadding="0">
 <tr>
    <td colspan="9" class="tieude" align="center">THÊM NHÓM HÀNG</td>
  </tr>
<form method="POST" onsubmit="return nhomsp_insert(ten.value);" name="form">
  <tr>
  <tr height="30" class="dau">
    <td width="250" style="  padding-left: 100px;">Tên nhóm Hàng:</td>
    <td>
    <input type="text" name="ten" value="<?php echo "$ten"; ?>" />
    </td>
	<tr class="noidung">
  		<td  align="center" colspan="2" height="35">
		<input class="button add" type="submit" value="Thêm">
		<input class="button refresh" type="reset" value="Làm mới">    
		</td>
	</tr>
  </tr>
  <input type="hidden" name="act">
  </form>
</table>
