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

<div style="margin-top:-30px;"></div>
<link rel="stylesheet" type="text/css" href="css/home-category.css" />
<div class="full" id="home-category">
	<article class="wrap-home-category">
		<header class="title">
			<h3 class="title bold-font"><b>Máy tính xách tay</b></h3> <a href="#" class="regular-font view-all">Xem thêm  »</a>
		</header>
		<section class="home-category">
		<?php	
		$sql="select * from hang where id_loai in (1,2,3,5) order by id_hang DESC limit 10";
		$kq=mysql_query($sql);
		while($r=mysql_fetch_array($kq))
		{
		$id=$r["id_hang"];
		$tensp=$r["tenhang"];
		$link=khongdau($tensp);
		$hinh=$r["hinhanh"];$mt=$r["mota"];
		$gia=$r["dongia"];$gia2=number_format($gia,0,'','.');
		$s=$gia2." VND";	
		$giacu=$gia+250000;$giacu2=number_format($giacu,0,'','.');
		$s2=$giacu2." VND";	
		?>
			<div class="box floatl">
						<p class="center">
							<a href="/san-pham/<?=$link;?>-<?=$id?>.html"><img src="/hinhanh/thumb/<?=$hinh?>" width="190" /></a>
						</p>
				<div class="info center">
					<p class="first-info">
						<a class="regular-font product-title" href="/san-pham/<?=$link;?>-<?=$id?>.html"><?=$tensp?></a>
						<span class="price bold-font"><b><?=$s?></b></span>
					</p>
				    <div class="regular-font more-info">
						<a href="/san-pham/<?=$link;?>-<?=$id?>.html" class="click-link"></a>
						<p class="sale"><s><?=$s2?></s></p>
						<p class="description"><br />Giao hàng toàn quốc<br />Bảo hành từ 12 tháng
						</p>
						<a href="/index.php?page=gh&id=<?=$id?>&g=<?=$gia?>"><span class="vmz-add-to-cart pointer"></span>        </a>                        
					</div>
				</div>
			</div>     
		<?php } ?>
		</section>
	</article>
	
	
	 <div class="clear"></div>
	 	<article class="wrap-home-category">
		<header class="title">
			<h3 class="title bold-font"><b>Phụ kiện máy tính</b></h3> <a href="#" class="regular-font view-all">Xem thêm  »</a>
		</header>
		<section class="home-category">
		<?php	
		$sql="select * from hang where id_loai in (13,14,16,17) order by id_hang DESC limit 10";
		$kq=mysql_query($sql);
		while($r=mysql_fetch_array($kq))
		{
		$id=$r["id_hang"];
		$tensp=$r["tenhang"];
		$link=khongdau($tensp);
		$hinh=$r["hinhanh"];$mt=$r["mota"];
		$gia=$r["dongia"];$gia2=number_format($gia,0,'','.');
		$s=$gia2." VND";	
		$giacu=$gia+250000;$giacu2=number_format($giacu,0,'','.');
		$s2=$giacu2." VND";	
		?>
			<div class="box floatl">
						<p class="center">
							<a href="/san-pham/<?=$link;?>-<?=$id?>.html"><img src="/hinhanh/thumb/<?=$hinh?>" width="190" /></a>
						</p>
				<div class="info center">
					<p class="first-info">
						<a class="regular-font product-title" href="/san-pham/<?=$link;?>-<?=$id?>.html"><?=$tensp?></a>
						<span class="price bold-font"><b><?=$s?></b></span>
					</p>
				    <div class="regular-font more-info">
						<a href="/san-pham/<?=$link;?>-<?=$id?>.html" class="click-link"></a>
						<p class="sale"><s><?=$s2?></s></p>
						<p class="description"><br />Giao hàng toàn quốc<br />Bảo hành từ 12 tháng
						</p>
						<a href="/index.php?page=gh&id=<?=$id?>&g=<?=$gia?>"><span class="vmz-add-to-cart pointer"></span>        </a>                        
					</div>
				</div>
			</div>     
		<?php } ?>
		</section>
	</article>
	 <div class="clear"></div>
	 </div>
	 
	 