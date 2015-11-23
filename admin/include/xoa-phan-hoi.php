<?php
	$idlh=$_GET["idlh"];
	
	$sql="delete FROM phanhoi where id_phanhoi='$idlh'";
	$kq=mysql_query($sql);
	if(!$kq)
		echo "<script>alert('Có lỗi trong khi xóa!!!');window.location='../admin/?m=phan-hoi';</script>";
	else
	{
		$n=mysql_affected_rows();
		echo "<script>alert('Đã xóa'); window.history.go(-1);</script>";		
	}

?>