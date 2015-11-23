<?php
 ////////////////////////////
$ss_tendangnhap=$_SESSION['user'];
$idkey=EncodeSpecialChar($ss_tendangnhap);
$result_thanhvien=mysql_query("SELECT * FROM khachhang where username='$idkey'");
$row=mysql_fetch_array($result_thanhvien);
$db_user=$row["username"]; 
?>
<?php
if(isset($_POST["act"])){	
	$user=$_POST["user"];
	$sql="SELECT * FROM khachhang  where username='$user'";
	$result_thanhvien2=mysql_query($sql);
	$row2=mysql_fetch_array($result_thanhvien2);
	$db_matkhau=$row2["password"]; 	  
	$pw=$_POST['pw'];
	$pw=EncodeSpecialChar($pw);
	$pww=md5($pw);
	$pw_old=md5($_POST['pw_old']);	
	if(strlen($pw)<5)
		echo "<script>alert('Mật khẩu mới phải lớn hơn 5 ký tự');</script>";
	else
	{
		if ($pw_old==$db_matkhau)
		{
			$pw=md5($pw);	
			$result_changepw = mysql_query("UPDATE khachhang SET password='$pww' WHERE username='$user'");
			echo "<script>alert('Đổi mật khẩu thành công.'); window.location='index.php';</script>";
		}
		else echo "<script>alert('Đổi mật khẩu thất bại! Kiểm tra lại mật khẩu cũ'); window.history.go(-1);</script>";
	}
}
?>

<div align="center" class="full" id="cart-content" style="  margin-top: -20px;line-height:25px; padding:5px;">
		<div style="margin-top:-5px;background: #16a085!important;font-size: 14px;text-transform: uppercase; color: #fff;line-height: 40px; width: 980px;position: relative;font-weight:bold">ĐỔI MẬT KHẨU
		</div>
	<div style="padding: 15px; box-shadow: 0px 0px 5px rgba(50, 50, 50, 0.5);font-size: 14px;font-family: arial;" align="center">	 
<form method="post" name="formthanhvien" id="formthanhvien" onSubmit="return thanhvien_changepw(pw_old.value,pw.value,cpw.value);">
<table border="0" width="560" style="border:1px solid #CCCCCC ">
 <tr height="30">
      <td style="padding-left:100px" align="left">Tên đăng nhập:</td>
      <td width="300" align="left"><?php echo $db_user; ?>
      <input type="hidden" name="user" value="<?php echo $db_user;?>" />
      </td>
    </tr>
	<tr height="30">
      <td style="padding-left:100px">Mật khẩu cũ: </td>
      <td><input name="pw_old" type="password" id="pw_old" style="width:220px"/></td>
    </tr>
	<tr height="30">
      <td style="padding-left:100px">Mật khẩu mới:</td>
      <td><input name="pw" type="password" id="pw" style="width:220px"/></td>
    </tr>
	<tr height="30">
      <td style="padding-left:100px">Nhập lại mật khẩu:</td>
      <td><input name="cpw" type="password" id="cpw" style="width:220px"/></td>
    </tr>
    <tr>
      <td height="35" colspan="2" align="center">
        <input type="submit" value="Đồng ý" class="button" >
	<input type="reset" value="Nhập lại" class="button" >
        <input name="act" type="hidden" value="act" /></td>
    </tr>
  </table>
</form>
</div></div>
