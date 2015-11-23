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
<link rel="stylesheet" type="text/css" href="/css/single.css" />
<script src="/javascript/js.js"></script>
<?php
	include "connect.php";
	$id=$_GET["id"];
	$sql="SELECT hang.*,loaihang.*,nhomhang.* from hang,loaihang,nhomhang where hang.id_loai=loaihang.id_loai AND loaihang.id_nhom=nhomhang.id_nhom AND hang.id_hang='$id'";
	$kq=mysql_query($sql);
	$r=mysql_fetch_array($kq);	
	$tensp=$r["tenhang"];$tenloaisp=$r["tenloaisp"];$tinhtrang=$r["tinhtrang"];
	$soluong=$r["soluong"];
	$tennhom=$r["tennhom"];$id_nhom=$r["id_nhom"];
	$hinh=$r["hinhanh"];$gia=$r["dongia"];$gia2=number_format($gia,0,'','.');
	$giacu=$gia+250000;$giacu2=number_format($giacu,0,'','.');
    $s2=$giacu2." VND";	
	$id_loai=$r["id_loai"];
	$mota=$r["mota"];
	if($mota=="") $mt='Mô tả của sản phẩm này đang được cập nhật!'; else $mt=$mota;
?>


<div id="wrap-breadcrumb" class="full regular-font uppercase">
	<div id="breadcrumb">
	<a href="/">Trang chủ</a>
	//<a href="/nhom-san-pham/<?=khongdau($tennhom)?>-<?php echo $id_nhom; ?>.html"><?php echo "$tennhom"; ?></a>//
	<a href="/loai-san-pham/<?=khongdau($tenloaisp)?>-<?php echo $id_loai; ?>.html"><?php echo "$tenloaisp"; ?></a> //
	<a href="#"><?php echo "$tensp"; ?></a>
	</div>	
</div>
<div class="clear"></div>
<div id="single-content-1" class="full arial">

    <div id="product-images" class="floatl">
         <div id="startslider-small"> <img src="/hinhanh/thumb/<?php echo $hinh; ?>" width="280" height="300" /></div>
    </div>
    <div class="info floatr">
        <header>
            <h1 class="title"><?php echo $tensp; ?></h1>
          <div style="height:25px;" class="analytics">
							<div class="floatl">Tình trạng: </div>
							<?php if($soluong==0) {  ?>
							<div style="margin-left: 10px;" class="floatl status-no"> Hết hàng</div>
							<?php } else {?>
							<div style="margin-left: 10px;" class="floatl status-yes"> Còn hàng</div>
							<?php }?>
						
            <div class="floatr" id="single-share">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style ">
					<!--<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
					<a class="addthis_button_tweet"></a>
					<a class="addthis_button_google_plusone"></a>-->
						<img src="/images/like.png" />
                </div>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50b24e727b4a1993"></script>
                <!-- AddThis Button END -->
            
            </div>
            </div>
            
        </header>
        <div class="content">
            
            <div class="col1 floatl">
                <ul class="description">
					<?php $mota = explode('<div class="clear"></div>',$mt);
					echo $mota[0];?>                              
                </ul>
                <div style=" margin-top: 10px;" class="floatl">
						<div class="price">Giá bán: <span><?php  echo "$gia2 VND"; ?></span></div>
                </div>
                <div class="col12 floatr">
					<?php if($soluong>=1) {?>
                    <div class="buy">
						<a href="/index.php?page=gh&id=<?=$id?>&g=<?=$gia?>"><img src="/images/single-buynow.png" /></a>
                    </div>
					<?php }?>
                </div>
                
                <div class="info-to-buy">
                    <div class="title">Chính sách mua hàng:</div>			
					<div class="textwidget" style=" font-size: 13px;">
					<p>
					
					<li>Giá bán đã bao gồm VAT</li>
					<li>Bảo hành từ 12 tháng</li>
					<li>Giao hàng toàn quốc</li>
					<li>Nhận tiền sau khi giao hàng</li>
					<li>Hỗ trợ 24/24 kể cả ngày nghỉ</li>
				   <li> Giảm giá 30% khi mua phụ kiện</li>
					</p>
</div>
		                </div>
            </div>
        
            <div class="col2 floatr">
				<div id="wrap-" class="support-online-1 box">
            	    <div class="content">
            		    <div class="box">  
								<div class="title"><h3>Tư vấn mua hàng</h3></div>	
									<table border="0">
										<tr>
											<td>Điện thoại:
											</td>
											<td class="row2"> <span class="phone-number"><span class="phone">0210.999.999</span></span>
											</td>
										</tr>
										<tr>
											<td>Yahoo:
											</td>
												<td><a class="yahoo" href="ymsgr:sendIM?bmc" rel="nofollow">
												<img src="/images/yahoo.gif"/>
												</a>
											</td>
										</tr>
										<tr>
											<td>Skype: 
											</td>
											<td><a class="skype" href="skype:bmc?chat">
											<img src="/images/skype.png" alt="">
											</a> 
											</td>
										</tr>
									</table>
									
									<BR /><BR /><div class="clear"></div>
									
									<div class="title"><h3>Hỗ trợ thanh toán</h3></div>	
									<table border="0">
										<tr>
											<td>Điện thoại:
											</td>
											<td class="row2"> <span class="phone-number"><span class="phone">0210.999.999</span></span>
											</td>
										</tr>
										<tr>
											<td>Yahoo:
											</td>
												<td><a class="yahoo" href="ymsgr:sendIM?bmc" rel="nofollow">
												<img src="/images/yahoo.gif"/>
												</a>
											</td>
										</tr>
										<tr>
											<td>Skype: 
											</td>
											<td><a class="skype" href="skype:bmc?chat">
											<img src="/images/skype.png" alt="">
											</a> 
											</td>
										</tr>
									</table>
						</div>     
								<div class="clear"></div>
								
						</div>
				</div>
			</div>
		
        </div>
    </div>
    <div class="clear"></div> 
</div>

<div id="single-content-2" class="full arial">
    <div class="col1 floatl">
        <ul class="nav">
            <li class="tab active"  id="detail-info">Mô tả sản phẩm</li>
			<li class="tab"  id="ttkt">Thông số kỹ thuật</li>
            <li  class="tab" id="review">Nhận xét đánh giá</li>
            <div class="clear"></div>
        </ul>
        
        <div id="content-detail-info" class="content">
		
		<?php 
			echo $mota[1];
		?>
		
		 
		</div>
        
        <div id="content-review" class="content">
		
		<!--<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=1421078901492699";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-comments" data-href="<?=URL();?>" data-width="730" data-numposts="5" data-colorscheme="light"></div>-->
			<img src="/images/cmt.png" />
		</div>
		
		<div id="content-ttkt" style="display:none;" class="content">
		<?php 
			if($mota[2]) echo $mota[2];
			else echo '<p align="center">Đang cập nhật</p>';
		?>
		</div>
		
		
    </div>
        <aside id="relative" class="floatr">
                <h3 class="title">Sản phẩm liên quan</h3> 
                <div style="padding: 10px;">
                
				
				<?php
				include "connect.php";
				//$sql2="select * from hang where id_loai=$id_loai and id_hang<>'$id' limit 0,27";
				$sql2="select * from hang order by rand() limit 0,5";
				$kq2=mysql_query($sql2);			
				while($r2=mysql_fetch_array($kq2))
				{
					$id2=$r2["id_hang"];
					$tensp2=$r2["tenhang"];	
					$link=khongdau($tensp2);
					$hinh2=$r2["hinhanh"];		
					$gia2=$r2["dongia"];$gia3=number_format($gia2,0,'','.');
					if($gia2==0) $s2="(liên hệ)"; else { $s2=$gia3; }				
					if($id2==$id) echo "";
					else {
				?>	
				
				<div class="box">
                    <div class="floatl wrap-image">
                        <a href="/san-pham/<?=$link;?>-<?=$id2?>.html"><img src="/hinhanh/thumb/<?=$hinh2?>" width="80" height="50"/></a>
                    </div>
                    <div class="info">
                        <h4 class="product-name"> <a href="/san-pham/<?=$link;?>-<?=$id2?>.html"><?=$tensp2?></a></h4><br />
                        <p class="price">Giá : <?=$s2?></p>
                        
                    </div>
                    <div class="clear"></div>
                </div>
			
					
				<?php	
					}
				}
			?>
					
				
				
                   
                
                              
                 </div>
    </aside>

<div class="clear"></div>
</div>
