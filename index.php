<?php
/*
▒█▀▀█ ░▀░ █▀▀▄ █░░█ 　 ▒█▀▄▀█ ░▀░ █▀▀▄ █░░█ 　 ▒█▀▀█ █▀▀█ █▀▄▀█ █▀▀█ █░░█ ▀▀█▀▀ █▀▀ █▀▀█ 
▒█▀▀▄ ▀█▀ █░░█ █▀▀█ 　 ▒█▒█▒█ ▀█▀ █░░█ █▀▀█ 　 ▒█░░░ █░░█ █░▀░█ █░░█ █░░█ ░░█░░ █▀▀ █▄▄▀ 
▒█▄▄█ ▀▀▀ ▀░░▀ ▀░░▀ 　 ▒█░░▒█ ▀▀▀ ▀░░▀ ▀░░▀ 　 ▒█▄▄█ ▀▀▀▀ ▀░░░▀ █▀▀▀ ░▀▀▀ ░░▀░░ ▀▀▀ ▀░▀▀ 
 * Siêu thị máy tính BINH MINH COMPUTER
 * Copyright 2015, All Rights Reserved.
 * @author Nhom 11 HTTT K7 HAUI
 * @email webmaster@binhminhcomputer.com
 * @link http://binhminhcomputer.com
 */
?>
<?php 
ini_set('display_errors', 0);
if(!isset($_SESSION))
	session_start();
	include "connect.php";
	$sql2="select * from cauhinh";
	$kq2=mysql_query($sql2);
	$r=mysql_fetch_assoc($kq2);
		$title=$r['title'];
		$keyword=$r['keyword'];
		$description=$r['description'];
	if(isset($_GET['page'])) {
		$page=$_GET['page'];
			if($page=='ct'){
				$id=$_GET["id"];
				$sql="SELECT * from hang where id_hang='$id'";
				$kq=mysql_query($sql);
				$r=mysql_fetch_array($kq);	
				$title=$r["tenhang"].' - Bình Minh Computer';
			}
			if($page=='nsp'){
				$id=$_GET["idn"];
				$sql="SELECT * from nhomhang where id_nhom='$id'";
				$kq=mysql_query($sql);
				$r=mysql_fetch_array($kq);	
				$title=$r["tennhom"].' - Bình Minh Computer';
			}
			if($page=='lsp'){
				$id=$_GET["idl"];
				$sql="SELECT * from loaihang where id_loai='$id'";
				$kq=mysql_query($sql);
				$r=mysql_fetch_array($kq);	
				$title=$r["tenloaisp"].' - Bình Minh Computer';
			}
			if($page=='gioi-thieu'){
				$title='Giới thiệu - Bình Minh Computer';
			}
			if($page=='khuyen-mai'){
				$title='Khuyến mãi - Bình Minh Computer';
			}
			if($page=='lien-he'){
				$title='Liên hệ với chúng tôi - Bình Minh Computer';
			}
			if($page=='gh'){
				$title='Giỏ hàng - Bình Minh Computer';
			}
			if($page=='tin-tuc'){
				$title='Tin tức - Bình Minh Computer';
			}
			if($page=='tuyen-dung'){
				$title='Tuyển dụng - Bình Minh Computer';
			}
			if($page=='ho-tro'){
				$title='Hỗ trợ khách hàng- Bình Minh Computer';
			}
			if($page=='tim-kiem'){
				$title='Tìm kiếm sản phẩm - Bình Minh Computer';
			}
			
	}
?>
<?php include "function.php"; ?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8" />
	<title><?php echo $title;?></title>
	<meta name="description" content="<?=$description?>"/>
	<meta name="keyword" content="<?=$keyword?>"/>
    <link rel="stylesheet" type="text/css" href="/style.css" />
	<link rel="stylesheet" type="text/css" href="/css/css.css" />
    <link rel="stylesheet" type="text/css" href="/css/sidebar-home.css" />
    <link rel="stylesheet" type="text/css" href="/css/hide-galery.css" />
    <link rel="stylesheet" type="text/css" href="/css/cart.css" />
	<link rel="shortcut icon" href="/favicon.ico" />	
	<script language="javascript" type="text/javascript" src="/kiemtra.js"></script>
</head>
<body>
<?php include 'include/header.php';?>
	<div id="content">
		<?php
		$file="include/content.php";
		if(isset($_REQUEST["page"]))
		{
			$page=$_REQUEST["page"];
			if($page=="gioi-thieu")
				$file="include/gioithieu.php";
			if($page=="lien-he")
				$file="include/lienhe.php";		
			if($page=="ct")
				$file="include/chitiet.php";
			if($page=="nsp")
				$file="include/nhomsp.php";
			if($page=="lsp")
				$file="include/loaisp.php";
			if($page=="tim-kiem")
				$file="include/timkiem.php";
			if($page=="dang-ky")
				$file="include/dangky.php";
			if($page=="doi-mat-khau")
				$file="include/doimatkhau.php";
			if($page=="doi-thong-tin")
				$file="include/doithongtin.php";
			if($page=="gh")
				$file="include/giohang.php";	
			if($page=="ds-don-hang")
				$file="include/ds-don-hang.php";
			if($page=="ho-tro")
				$file="include/hotro.php";				
			if($page=="tai-khoan")
				$file="include/taikhoan.php";					
			if($page=="change")
				$file="include/change.php";			
			if($page=="khuyen-mai")
				$file="include/khuyenmai.php";
			if($page=="tin-tuc")
				$file="include/tintuc.php";
			if($page=="tuyen-dung")
				$file="include/tuyendung.php";
			if($page=="don-hang")
				$file="include/donhang.php";
			if($page=="dang-nhap")
				$file="include/login.php";	
			if($page=="quen-mat-khau")
				$file="include/quenmatkhau.php";	
		}
		include "$file";
		?>
    </div>	
	<div id="footer">
		<?php include "include/footer.php"; ?>   
	</div>
</body>
</html>