<?php
	include("../connect.php");
	if(!isset($_POST["user"])){	
		echo "<script>alert('Bạn chưa nhập username');window.location='/?page=dang-nhap';</script>";
		
	}
	else 
	{
		$user=$_POST["user"];
		if (!isset($_POST["pass"])) {
			echo "<script>alert('Bạn chưa nhập mật khẩu');window.location='/?page=dang-nhap';</script>";
						
		}
		else
		{
			$pass=md5($_POST["pass"]);			
			$sql="select * from khachhang where username='$user' and password='$pass'";
			$kq=mysql_query($sql);
			$thanhvien=mysql_fetch_array($kq);
			$n=mysql_num_rows($kq);
			if($n==0)
			{
				echo "<script>alert('Thông tin bạn nhập không chính xác!');window.location='/?page=dang-nhap';</script>";
				
			}	
			else 
			{	if(!isset($_SESSION))
					session_start();
					$_SESSION["user"]=$user;
					echo "<script>alert('Bạn đã đăng nhập thành công !');window.location='/index.php';</script>";
				
				
			}
		}
	}
?>	

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />