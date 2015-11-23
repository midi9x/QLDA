<?php
if(isset($_POST["act"]))
{
	$user=$_POST["user"];
	$sql="SELECT * FROM nhanvien where username='$user'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$db_matkhau=$row["password"]; 	 
	$pw=$_POST['pw'];
	$pw=EncodeSpecialChar($pw);
	$pww=md5($pw);
	
	$pw_old=md5($_POST['pw_old']);	

	if(strlen($pw)<5)

		echo "<script>alert('Mật khẩu mới phải lớn hơn 5 ký tự'); window.location='../admin/?m=doi-mat-khau';</script>";
	else
	{
		if ($pw_old==$db_matkhau)
		{
			$pw=md5($pw);	
			$result_changepw = mysql_query("UPDATE nhanvien SET password='$pww' WHERE username='$user'");
			echo "<script>alert('Đổi mật khẩu thành công.'); window.location='../admin/index.php';</script>";
		}
		else echo "<script>alert('Mật khẩu cũ bị sai'); window.location='../admin/?m=doi-mat-khau';</script>";
	}
}
?>

<?php

$ss_tendangnhap=$_SESSION['useradmin'];

$idkey=EncodeSpecialChar($ss_tendangnhap);

$result_nhanvien=mysql_query("SELECT * FROM nhanvien where username='$idkey'");

$row=mysql_fetch_array($result_nhanvien);


$db_user=$row["username"]; 
?>

<form name="form1" method="post" onSubmit="return admin_changepw(pw_old.value,pw.value,cpw.value);">
<table border="0" width="960" cellpadding="0" cellspacing="0" style="padding-top:5px ">
<tr align="center"><td class="tieude">ĐỔI MẬT KHẨU</td>
</tr>
</table>


   <table width="960" align="center" border="0" cellpadding="5" cellspacing="1">
 <tr class="dau" height="30">
      <td>Tên đăng nhập:</td>
      <td><?php echo $db_user; ?>
      <input type="hidden" name="user" value="<?php echo $db_user;?>" />
      </td>
    </tr>
	<tr  class="dau" height="30">
      <td>Mật khẩu cũ: </td>
      <td><input name="pw_old" type="password" id="pw_old" /></td>
    </tr>
       <tr  class="dau" height="30">
      <td>Mật khẩu mới:</td>
      <td><input name="pw" type="password" id="pw" /></td>
    </tr>
	<tr  class="dau" height="30" >
     <td>Nhập lại mật khẩu mới:</td>
      <td><input name="cpw" type="password" id="cpw" /></td>
    </tr>
    <tr  class="noidung" height="30">
<td colspan="2" align="center">
	<input class="button edit" type="submit" value="Sửa">
		<input class="button refresh" type="reset" value="Làm mới">      

        <input name="act" type="hidden" value="act" /></td>
    </tr>
  </table>
  <input type="hidden" name="act" />
</form>

