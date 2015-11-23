<?php
	$id=$_GET["id"];
	$sql2="select * from hang where id_hang='$id'";
	$kq2=mysql_query($sql2);
	$r2=mysql_fetch_array($kq2);
	$hinhanh=$r2["hinhanh"];$tenhang=$r2["tenhang"];
	unlink("../hinhanh/full/$hinhanh");
	unlink("../hinhanh/thumb/$hinhanh");
	
	$sql="delete from hang where id_hang='$id'";
	$kq=mysql_query($sql);
	if(!$kq)
		echo "<script>alert('Có lỗi trong khi xóa!!!');window.location='../admin/?page=ds-hang';</script>";
	else
	{
		$n=mysql_affected_rows();
		echo "<script>alert('Đã xóa $tenhang & hình ảnh'); window.history.go(-1);</script>";		
	}

?>