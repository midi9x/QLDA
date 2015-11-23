<?php
if(!isset($_REQUEST["m"])) $page="mn";
	else $page=$_REQUEST["m"];
                switch ($page) {
					
                        case 'mn':
                        		$class0="class='current'";
                        		
                              break;
                        case 'hang':
                        		$class1="class='current'";
                        	
                              break;
                        case 'dh':
                        		$class2="class='current'";
                        		
                              break;
                              
                        case 'phan-hoi':
                              	$class3="class='current'";
                        		
                              break;
                        case 'nhanvien':
                             	$class4="class='current'";
                        case 'sua-nhan-vien':
                             	$class4="class='current'";
                        		
						case 'them-nhan-vien':
                             	$class4="class='current'";
                              break;
                        case 'tintuc':
                             	$class5="class='current'";
                        		
                              break;
                        case 'khach-hang':
                             	$class6="class='current'";
                        		
                              break;
						case 'mtk':
                             	$class7="class='current'";
                        		
                              break;
						case 'doi-mat-khau':
                             	$class4="class='current'";
                        		
                              break;
							  
						case 'he-thong':
                             $class8="class='current'";
                        	 break;
						
                        default: 
                             	$class8="class='current'";
                              break;
						 
                  }
				  
?>
<div align="center" class="tdmenu">
<ul class="glossymenu">
	<?php 
	$quyen=$_SESSION['capquyen'];
	if($quyen==1){?>
	<li <?=$class8?>><a href="?m=he-thong&page=cau-hinh" style="text-decoration: none; color:#000;"><b>Tổng quan</b></a></li>
	<?php }?>
	<?php if($quyen==1||$quyen==2){?>
	<li <?=$class0?>><a href="?m=mn&page=ds-nhom-hang" style="text-decoration: none; color:#000;"><b>Danh Mục</b></a></li>
	<?php }?>
	<li <?=$class1?>><a href="?m=hang&page=ds-hang" style="text-decoration: none; color:#000;"><b>Hàng</b></a></li>
	<?php if($quyen==1||$quyen==3){?>
	<?php }?>
	<?php if($quyen==1||$quyen==3){?>
	<li <?=$class2?>><a href="?m=dh&page=don-hang" style="text-decoration: none; color:#000;"><b>Đơn Hàng</b></a></li>
	<?php }?>
	<?php if($quyen==1||$quyen==2){?>
	<li <?=$class3?>><a href="?m=phan-hoi" style="text-decoration: none; color:#000;"><b>Phản hồi</b></a></li>	
	<?php }?>
	<?php if($quyen==1||$quyen==2){?>
	<li <?=$class4?>><a href="?m=nhanvien" style="text-decoration: none; color:#000;"><b>Nhân Viên</b></a></li>	
	<?php }?>
	<li <?=$class6?>><a href="?m=khach-hang" style="text-decoration: none; color:#000;"><b>Khách hàng</b></a></li>	
	<?php if($quyen==1||$quyen==2){?>
	<li <?=$class7?>><a href="?m=mtk&page=doanh-thu" style="text-decoration: none; color:#000;"><b>Thống kê</b></a></li>	
	<?php }?>
	
</ul>
</div>
