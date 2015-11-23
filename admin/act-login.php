<?php include "function.php"; ?>
<?php
	include("connect.php");
	if(!isset($_POST["user"])){	
		echo "<script>alert('Bạn chưa nhập tên đăng nhập');window.history.go(-1);</script>";
		//header("location:login.php");
	}
	else 
	{
		$user=EncodeSpecialChar($_POST["user"]);
		if (!isset($_POST["pass"])) {
			echo "<script>alert('Bạn chưa nhập mật khẩu');window.history.go(-1);</script>";
			//header("location:login.php");					
		}
		else
		{
			$pass=md5($_POST["pass"]);			
			$sql="select * from nhanvien where username='$user' and password='$pass'";
			$kq=mysql_query($sql);
			$nhanvien=mysql_fetch_array($kq);
			$quyen=$nhanvien["quyen"];
			$n=mysql_num_rows($kq);
			if($n==0)
			{
				echo "<script>alert('Thông tin bạn nhập không chính xác!');window.history.go(-1);</script>";
				//header("location: login.php");
			}	
			else 
			{	
				if($quyen==1||$quyen==2||$quyen==3||$quyen==4){
					if(!isset($_SESSION))
					session_start();
					$_SESSION["useradmin"]=$user;
					$_SESSION["success"]=true;
					$_SESSION['hotenadmin']=$nhanvien['hoten'];	
					$_SESSION['capquyen']=$nhanvien["quyen"];
					if($quyen==1) header("location:/admin/?m=he-thong&page=cau-hinh");
					if($quyen==2) header("location:/admin/?m=mn&page=ds-nhom-hang");
					if($quyen==3) header("location:/admin/?m=hang&page=ds-hang");
					if($quyen==4) header("location:");
				}
				else echo"<script>alert('Bạn không có quyền truy cập!');window.location='login.php'</script>";
			}
		}
	}
?>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />