<?php
if(isset($_POST["act"]))
{	 include "connect.php";
	$hoten=$_POST["hoten"];
	$hoten=EncodeSpecialChar($hoten);
	$diachi=$_POST["diachi"];
	$diachi=EncodeSpecialChar($diachi);	
	$email=$_POST["email"];
	$email=EncodeSpecialChar($email);
	$dienthoai=$_POST["dienthoai"];
	$dienthoai=EncodeSpecialChar($dienthoai);	
	$username=$_POST["username"];
	$username=EncodeSpecialChar($username);	
	$ngaysinh=$_POST["ngaysinh"];
	$pass=$_POST['password'];
	$repass=$_POST['repassword'];
	 $quyen=$_POST['quyen'];
	 $sql="select * from nhanvien where username='$username'";
	 $kq=mysql_query($sql);
	 if(mysql_num_rows($kq)==1) echo "<script>alert('Tên người dùng đã tồn tại!'); window.history.go(-1);</script>";
	 else {
	 if($username==""||$pass==""||$repass==""||$hoten==""||$diachi==""||$dienthoai==""||$email=="") 
	 {
		echo "<script>alert('Vui lòng nhập đầy đủ thông tin!'); window.history.go(-1);</script>";
	 }
	 else if($pass!=$repass){echo "<script>alert('Mật khẩu không trùng khớp');</script>";}
	 else {
		$md5pass=md5($pass);	
		$sql1="insert into nhanvien(username,password,hoten,diachi,dienthoai,email,quyen) values('$username','$md5pass','$hoten','$diachi','$dienthoai','$email','$quyen')";
		$kq1=mysql_query($sql1);
		if ($kq1)
		{
			echo "<script>alert('Thêm nhân viên thành công!'); window.location='/admin/?m=nhanvien';</script>";
		}
		else  {echo "<script>alert('Lỗi xử lý $username'); window.history.go(-1);</script>";}
	
	 }
	}
}
?>


<form name="form1" method="post">
<table border="0" width="960" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td colspan="2" class="tieude">Thêm nhân viên</td>
	</tr>
	<tr class="noidung" height="30">
		  <td width="150" style="padding-left:250px" height="30"><strong>Tên người dùng: </strong></td>
		  <td><input type="text" name="username"  style="width:247px"/></td>
    </tr>
	<tr class="noidung" height="30">
		  <td width="150" style="padding-left:250px" height="30"><strong>Mật khẩu: </strong></td>
		  <td><input type="password" name="password" value="" style="width:247px"/></td>
    </tr>
	<tr class="noidung" height="30">
		  <td width="150" style="padding-left:250px" height="30"><strong>Nhập lại mật khẩu : </strong></td>
		  <td><input type="password" name="repassword" value="" style="width:247px"/></td>
    </tr>
    <tr class="noidung" height="30">
		  <td width="150" style="padding-left:250px" height="30"><strong>Họ tên: </strong></td>
		  <td><input type="text" name="hoten"  style="width:247px"/></td>
    </tr>
	<tr  class="noidung" height="30" >
		  <td width="150" style="padding-left:250px" height="30"><strong>Địa chỉ: </strong></td>
		  <td> <input type="text" name="diachi"  style="width:247px"/> </td>
    </tr>
	<tr  class="noidung" height="30" >
		  <td width="150" style="padding-left:250px" height="30"><strong>Điện thoại: </strong></td>
		  <td><input type="text" name="dienthoai" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')"   style="width:247px"/></td>
    </tr>
	<tr  class="noidung" height="30" >
		  <td width="150" style="padding-left:250px" height="30"><strong>Email:</strong> </td>
		  <td><input type="text" name="email"  style="width:247px"/></td>
    </tr>
	<tr  class="noidung" height="30" >
		  <td width="150" style="padding-left:250px" height="30"><strong>Quyền:</strong> </td>
		  <td>
			<select style="width:250px;"name="quyen">
				<option value=1>Quản trị viên</option>
				<option value=2>Nhân viên quản trị</option>
				<option value=3>Nhân viên bán hàng</option>
		  </td>
    </tr>
    <tr class="dau" height="30">
		<td colspan="2" align="center">
		<input class="button edit" type="submit" value="Thêm">
		<input class="button refresh" type="reset" value="Làm mới">      
		<input name="act" type="hidden" /></td>
    </tr>
  </table>
</form>
