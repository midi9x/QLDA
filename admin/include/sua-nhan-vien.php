<?php
if(isset($_POST["act"]))
{	
     $username=$_POST['username'];
	 $pass=$_POST['password'];
	 $repass=$_POST['repassword'];
	 $hoten=$_POST['hoten'];
	 $diachi=$_POST['diachi'];
	 $dienthoai=$_POST['dienthoai'];
	 $email=$_POST['email'];
	 $quyen=$_POST['quyen'];
	 ////
	 $sql2="select * from nhanvien where username='$username'";
	 $kq2=mysql_query($sql2);
	 $r2=mysql_fetch_assoc($kq2);
	 $oldpass=$r2['password'];
	 ///
	 if($hoten==""||$diachi==""||$dienthoai==""||$email=="") 
	 {
		echo "<script>alert('Vui lòng nhập đầy đủ thông tin!'); window.history.go(-1);</script>";
	 }
	 else if($pass!=$repass){echo "<script>alert('Mật khẩu không trùng khớp');</script>";}
	 else {
		$md5pass=md5($pass);	
		//neu kiem tra co thay doi pass ko
		if($pass!="") {$sqlpass="password='$md5pass',";}
		$sql="UPDATE nhanvien SET $sqlpass hoten='$hoten', dienthoai='$dienthoai',email='$email',diachi='$diachi',quyen='$quyen' WHERE username='$username'";
		$kq=mysql_query($sql);
		if ($kq)
		{
			echo "<script>alert('Đổi thông tin thành công.'); window.location='/admin/?m=nhanvien';</script>";
		}
		else echo "<script>alert('Đổi thông tin thất bại!'); window.history.go(-1);</script>";
	
	 }
}
?>

	
<?php 
 $id=$_GET['id'];
 $sql="select * from nhanvien where id_nv='$id'";
 $kq=mysql_query($sql);
 $r=mysql_fetch_assoc($kq);
 $username=$r['username'];
 $password=$r['password'];
 $hoten=$r['hoten'];
 $diachi=$r['diachi'];
 $dienthoai=$r['dienthoai'];
 $email=$r['email'];
 $quyen=$r['quyen'];
?>

<form name="form1" method="post">
<table border="0" width="960" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td colspan="2" class="tieude">Sửa nhân viên</td>
	</tr>
	<tr class="noidung" height="30">
		  <td width="150" style="padding-left:250px" height="30"><strong>Tên người dùng: </strong></td>
		  <td><input type="text" name="username" value="<?=$username?>" readonly style="width:247px"/></td>
    </tr>
	<tr class="noidung" height="30">
		  <td width="150" style="padding-left:250px" height="30"><strong>Mật khẩu mới: </strong></td>
		  <td><input type="password" name="password" value="" style="width:247px"/></td>
    </tr>
	<tr class="noidung" height="30">
		  <td width="150" style="padding-left:250px" height="30"><strong>Nhập lại mật khẩu : </strong></td>
		  <td><input type="password" name="repassword" value="" style="width:247px"/></td>
    </tr>
    <tr class="noidung" height="30">
		  <td width="150" style="padding-left:250px" height="30"><strong>Họ tên: </strong></td>
		  <td><input type="text" name="hoten" value="<?=$hoten?>" style="width:247px"/></td>
    </tr>
	<tr  class="noidung" height="30" >
		  <td width="150" style="padding-left:250px" height="30"><strong>Địa chỉ: </strong></td>
		  <td> <input type="text" name="diachi" value="<?=$diachi?>" style="width:247px"/> </td>
    </tr>
	<tr  class="noidung" height="30" >
		  <td width="150" style="padding-left:250px" height="30"><strong>Điện thoại: </strong></td>
		  <td><input type="text" name="dienthoai" value="<?=$dienthoai?>" style="width:247px"/></td>
    </tr>
	<tr  class="noidung" height="30" >
		  <td width="150" style="padding-left:250px" height="30"><strong>Email:</strong> </td>
		  <td><input type="text" name="email" value="<?=$email?>" style="width:247px"/></td>
    </tr>
	<tr  class="noidung" height="30" >
		  <td width="150" style="padding-left:250px" height="30"><strong>Quyền:</strong> </td>
		  <td>
			<select style="width:250px;"name="quyen">
				<option <?php if($quyen==1) {echo' selected';}?> value=1>Quản trị viên</option>
				<option <?php if($quyen==2) {echo' selected';}?> value=2>Nhân viên quản trị</option>
				<option <?php if($quyen==3) {echo' selected';}?>  value=3>Nhân viên bán hàng</option>
		  </td>
    </tr>
    <tr class="dau" height="30">
		<td colspan="2" align="center">
		<input class="button edit" type="submit" value="Sửa">
		<input class="button refresh" type="reset" value="Làm mới">      
		<input name="act" type="hidden" /></td>
    </tr>
  </table>
</form>

