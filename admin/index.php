<?php
/*
▒█▀▀█ ░▀░ █▀▀▄ █░░█ 　 ▒█▀▄▀█ ░▀░ █▀▀▄ █░░█ 　 ▒█▀▀█ █▀▀█ █▀▄▀█ █▀▀█ █░░█ ▀▀█▀▀ █▀▀ █▀▀█ 
▒█▀▀▄ ▀█▀ █░░█ █▀▀█ 　 ▒█▒█▒█ ▀█▀ █░░█ █▀▀█ 　 ▒█░░░ █░░█ █░▀░█ █░░█ █░░█ ░░█░░ █▀▀ █▄▄▀ 
▒█▄▄█ ▀▀▀ ▀░░▀ ▀░░▀ 　 ▒█░░▒█ ▀▀▀ ▀░░▀ ▀░░▀ 　 ▒█▄▄█ ▀▀▀▀ ▀░░░▀ █▀▀▀ ░▀▀▀ ░░▀░░ ▀▀▀ ▀░▀▀ 
 * BINH MINH COMPUTER
 * Copyright 2015, All Rights Reserved.
 * @author Nhom 11 HTTT K7 HAUI
 * @email webmaster@binhminhcomputer.com
 * @link http://binhminhcomputer.com
 */
 ?>

<?php 
ini_set('display_errors', 0);
include("check-login.php");
include "connect.php"; ?>
<?php include "function.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8" />
<title>Hệ thống quản trị nội dung  - Bình Minh Store</title>
<link type="text/css" rel="stylesheet" href="/admin/css/main.css" />
<link type="text/css" rel="stylesheet" href="/css/menu.css" />
<script type="text/javascript" src="/kiemtra.js"></script> 
<script language="javascript" src="/admin/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="jquery/jquery-1.11.3.min.js"></script>
<script>
	$(document).ready(function() {
	$('#selectall').click(function(event) { //on click
		if(this.checked) { //Kiểm tra trạng thái đã chọn checkbox có id là selectall hay chưa
		$('.checkbox1').each(function() { //lặp qua từng checkboxcheckbox
		this.checked = true; //chọn tất cả checkbox có class là: "checkbox1"
		});
		}else{
			$('.checkbox1').each(function() { //lặp qua từng checkbox
			this.checked = false; //deselect all checkboxes with class "checkbox1"
			});
			}
	});
	});
</script>
</head>
<body>
<div id="container">
  <div id="header">
	  <?php include "include/header.php";?>
  </div>    
  <div id="menu-quantri">
	  <?php include "menu-top.php";?>
  </div>  
  <br clear="all" />
  <div style="margin-top: -4px;"></div>
    <div id="main">  
    <?php 
		$m=$_REQUEST["m"];
		if($m=="nhanvien")
			include "include/nhanvien.php";		
		if($m=="phan-hoi")
			include "include/phan-hoi.php";		
		else{
			if($m=="xoa-phan-hoi")
				include "include/xoa-phan-hoi.php";
			else{
			if($m=="doi-mat-khau")
				include "include/doi-mat-khau.php";
			else{
			if($m=="khach-hang") 

			  include "include/khach-hang.php";
			else if($m=="sua-nhan-vien")
				include "include/sua-nhan-vien.php";
			else if($m=="them-nhan-vien")
				include "include/them-nhan-vien.php";
					
			else{
 			
			
	?>
    	<div id="content-left">       	 
        <?php
       	  $m=$_REQUEST["m"];  
		  if(isset($m))
		  {
		  switch($m)
		  {
			case "hang":
				include "include/menu-hang.php";
			break;
			case "dh":
				include "include/menu-donhang.php";
			break;
			case "mn":
				include "include/menu-mn.php";
			break;
			case "mtk":
				include "include/menu-thongke.php";
			break;
			case "he-thong":
				include "include/menu-hethong.php";
		  }
		  }
		  
		?>
        </div>
        
        <div id="content-right">
         <?php
         $page=$_REQUEST["page"];
		 if(isset($page))
		 {
		 switch($page)
		 {
			case "cau-hinh":
				include "include/he-thong.php";
				break;
			case "them-hang":
				include "include/them-hang.php";
			break;
			
			case "xoa-hang":
				include "include/xoa-hang.php";
			break;		
			case "cap-nhat-hang":
				include "include/cap-nhat-hang.php";
			break;				
			case "xoa-hang-chon":
				include "include/xoa-hang-chon.php";
			break;	
	       
			case "ds-hang":
				include "include/ds-hang.php";
			break;	
			
			case "don-hang":
				include "include/don-hang.php";
				
			break;	
			
			case "don-hang-ok":
				include "include/don-hang-ok.php";
			break;	
			case "tk":
				include "include/result.php";
			break;	
			case "ds-nhom-hang":
				include "include/ds-nhom-hang.php";
			break;		
			case "them-nhom-hang":
				include "include/them-nhom-hang.php";
			break;	
			case "xoa-nhom-hang":
				include "include/xoa-nhom-hang.php";
			break;
			case "cap-nhat-nhom-hang":
				include "include/cap-nhat-nhom-hang.php";
			break;
			case "nhomsp-xl-del":
				include "include/nhomsp-xl-xoa.php";
			break;
			case "ds-loai-hang":
				include "include/ds-loai-hang.php";
			break;
			case "get-ds-loaihang":
				include "include/get-ds-loaihang.php";
			break;
			case "them-loai-hang":
				include "include/them-loai-hang.php";
			break;
			case "xoa-loai-hang":
				include "include/xoa-loai-hang.php";
			break;
			case "loaisp-xl-del":
				include "include/loaisp-xl-xoa.php";
			break;
			case "update-loai-hang":
				include "include/update-loai-hang.php";
			break;
			case "ctdh":
				include "include/ct-don-hang.php";
			break;
			case "doanh-thu":
				 include "include/doanhthu.php";
			break;
			case "hang-ban-chay":
				 include "include/hangbanchay.php";
			break;
			case "xoa-nhan-vien":
				include "include/xoa-nhan-vien.php";
				break;
			
		 }
		 }
		 
	 	 ?>
        </div>  
     <?php   } } }}?>
    </div>
</div>
	 <div id="footer">
	
	Bình Minh Computer - Siêu thị máy tính hàng đầu Việt Nam <br />
	Copyright 2015, All Rights Reserved. 
	 </div> 
</body>
</html>