<?php
$ten="";
if(isset($_POST["act"]))
{
	$nhomsp=$_POST["nhomsp"];
	$ten=$_POST["ten"];	
	$id=getidl();
	$check=mysql_query("select count(*) from loaihang where tenloaisp='$ten'");
	$r=mysql_fetch_array($check);
	$n=$r[0];
	if($n!=0)
		echo "<script>alert('Lỗi!! Loại Hàng này đã có trong cơ sở dữ liệu!');window.history.go(-1);</script>";
	else{
	$sql="insert into loaihang(id_loai,id_nhom,tenloaisp) values ('$id','$nhomsp','$ten')";
	$kq=mysql_query($sql);	
	if(!$kq)
		echo "<script>alert('Có lỗi xảy ra trong quá trình xử lý');window.history.go(-1);</script>";
	else{
		echo "<script>alert('Đã thêm');window.location='../admin/?m=mn&page=ds-loai-hang'</script>";
		$ten="";
	}
	}
}

?>
<?php include("check-login.php") ?>
<?php
	include("connect.php");
	function print_option($sql)
	{
		$kq=mysql_query($sql);
		while ($r=mysql_fetch_array($kq))
			echo "<option value=$r[0]>$r[1]  </option>";
	}
?>

<table width="735" border="0" cellspacing="0" cellpadding="0">
<form method="POST" onsubmit="return loaisp_insert(ten.value);" id="form" name="form">
  <tr>
    <td colspan="2" class="tieude" align="center">THÊM LOẠI HÀNG</td>
  </tr>  
  <tr class="dau" >
    <td width="250" style="padding-left:80px" height="30">Nhóm Hàng:</td>
    <td width="485">
    <select name="nhomsp" style="width:240px;">
      <?php 
		include("connect.php");
		print_option("select id_nhom,tennhom from nhomhang");
	  ?>
    </select>
    </td>
  </tr> 
  <tr  class="dau" >
    <td width="250" style="padding-left:80px" height="30">Tên loại Hàng:</td>
    <td width="485">
    <input type="text" name="ten" style="width:240px" value="<?php echo "$ten"; ?>" />
    </td>
  </tr> 
  <tr  class="noidung">
  	<td  align="center" colspan="2" height="35">
		<input class="button add" type="submit" value="Thêm">
		<input class="button refresh" type="reset" value="Làm mới">    
  </tr>
  <input type="hidden" name="act">
  </form>
</table>
