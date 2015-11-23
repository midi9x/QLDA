<?php
	if(!isset($_SESSION))
		session_start();
	if(!isset($_SESSION["success"])) header("location:login.php");
	$quyen=$_SESSION["capquyen"];
	if($quyen==1||$quyen==2||$quyen==3||$quyen==4) {}
	else echo "<script>alert('Tài khoản này không được quyền truy cập trang quản trị');window.location='login.php';</script>";
	
?>