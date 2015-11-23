<?php
	$id=$_GET["id"];
	if($id==1){echo "<script>alert('Không thể xóa tài khoản quản trị!!!');window.location='../admin/?m=nhanvien';</script>";}
	else {
	$sql="delete from nhanvien where id_nv='$id'";
	$kq=mysql_query($sql);
	if(!$kq)
		echo "<script>alert('Có lỗi trong khi xóa!!!');window.location='../admin/?m=nhanvien';</script>";
	else
	{
		$n=mysql_affected_rows();
		echo "<script>alert('Ðã xóa nhân viên'); window.history.go(-1);</script>";		
	}
}
?>