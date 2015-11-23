<div id="wrap-top-header" class="wrap-full regular-font">
    <div id="top-header" class="full">
		<div class="floatl">
			<div class="menu-top-menu-container">
				<ul id="menu-top-menu" class="menu">
					<?php 
						include("connect.php");
						$user=$_SESSION["user"];
						if($user){
					?>
					
					<li>Xin chào: <a href="/?page=tai-khoan"><?=$user;?></a></li>
					<li><a href="/include/logout.php" >Thoát</a></li>
					<?php } else{?>
					<li><a href="/?page=dang-nhap">Đăng nhập</a></li>
					<li><a href="/?page=dang-ky" >Đăng kí</a></li>
					<?php }?>
				</ul>
			</div>
		</div>
		
		
		<div class="floatl">			
			<div class="textwidget">
				<ul class="phone">
					<li>Tổng đài 1800.9999</li>
				</ul>
			</div>
		</div>    
		
		<div class="floatl">			
			<div class="textwidget">
				<ul class="phone">
					<li>Hotline 0999.999.999</li>
				</ul>
			</div>
		</div>  
		
		<div class="floatl box">			
			<div class="cart" style="color:#fff;"><a style="font-weight: bold;color:#fff;"href="/?page=gh"> Giỏ hàng
			<img src="/images/cart_icon_1.png" style="  position: relative;top: 5px;margin: 0 5px;"width="18" height="18"/></a> 
			<?php 
			$gh=$_SESSION["gh"];
			$count=count($gh);
		 	echo "(".$count.")";?>  
			</div>
			
		</div>
		
		
    </div>
	<div class="clear"></div>
</div>
<header id="header" class="wrap-full">
    <div class="full">
     <a style="margin-top:-25px;" href="/" class="floatl"><img width="250" height="94" src="/images/logo.png"></a>
	 
		<div class="filter" style="margin-top: 5px;">
					<form action="/?page=tim-kiem" method="GET" onsubmit="return tk(text_content.value);">
						<input type="hidden" name="page" value="tim-kiem" />
						<input type="text" name="text_content" class="floatl" placeholder="Nhập từ khóa cần tìm">
						<input type="submit" style="border: none; background: url(../images/search_icon_1.png) no-repeat center #FFFFFF; height: 30px; width: 32px;border-radius: 0 5px 5px 0;" class="floatl" value="">
					</form>
        </div>
		
	 <div>
		<img style="float:right;" class="pointer" src="/images/Giao-hang.png" /> 
	 </div>
           
     
    
    </div>

	
   <div class="clear"></div>
<!-- nếu là tràng chủ -> hiện danh mục và slider --> 
<?php
function URL() {
	return "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
}
?>
<?php
	if(URL()=='http://binhminhcomputer.com/'||URL()=='http://binhminhcomputer.com/index.php' ) echo '<style>.wrap-category-galery .content {display:block;}.wrap-category-galery .slide {display:block;}</style>';
	else echo '<style>.wrap-category-galery .content {display:none;}.wrap-category-galery .slide {display:none;}</style>';
?>

   <div class="wrap-full" id="wrap-home-top"> 
        <div class="full" id="home-top">
            <div id="sidebar" class="floatl">
    			<div class="wrap-category-galery">
				<h2 class="best-title bold-font uppercase color-ffffff"><span>Danh mục sản phẩm</span></h2>				
					<div class="content">
							<div class="wrap-box">
								<div class="box MyriadPro-Regular">
									<div class="inner-box">
										<a title="Máy tính xách tay" href="/nhom-san-pham/maytinh-xach-tay-1.html">
										<h3 class="title">Máy tính xách tay</h3>
										<p>Máy tính xách tay - laptop</p>
										</a>
									</div>
								</div>
							</div>
							<div class="wrap-box">
								<div class="box MyriadPro-Regular">
									<div class="inner-box">
										<a title="Máy tính bảng" href="/nhom-san-pham/maytinh-bang-2.html">
										<h3 class="title">Máy tính bảng</h3>
										<p>Máy tính bảng, Tablet pc</p>
										</a>
									</div>
								</div>
							</div>
							<div class="wrap-box">
								<div class="box MyriadPro-Regular">
									<div class="inner-box">
										<a title="Máy tính để bàn" href="/nhom-san-pham/maytinh-de-ban-3.html">
										<h3 class="title">Máy tính để bàn</h3>
										<p>Máy tính để bàn, PC</p>
										</a>
									</div>
								</div>
							</div>
							<div class="wrap-box">
								<div class="box MyriadPro-Regular">
									<div class="inner-box">
										<a title="Phụ kiện máy tính" href="/nhom-san-pham/pk-may-tinh-4.html">
										<h3 class="title">Phụ kiện máy tính</h3>
										<p>Phụ kiện máy tính, USB, loa</p>
										</a>
									</div>
								</div>
							</div>
					</div><!--end contnet-->
<!--slider trang chủ -->
					
<div class="slide" style="float:left;margin:2px 2px 2px 234px;">				
  <link rel="stylesheet" type="text/css" href="/javascript/slider/themes/carbono/jquery.slider.css" />
  <script type="text/javascript" src="/javascript/jquery.min.js"></script>
  <script type="text/javascript" src="/javascript/slider/jquery.slider.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".slider").slideshow({
        width      : 745,
        height     : 204,
        transition : ['barLeft', 'barRight']
      });
    });
  </script>
    <div class="slider">
      <div class="slider">
        <img src="/banner/1.jpg" alt=""/>
      </div>
      <div>
       <img src="/banner/2.jpg" alt=""/>
      </div>
	  <div>
       <img src="/banner/3.gif" alt=""/>
      </div>
	  <div>
       <img src="/banner/4.jpg" alt=""/>
      </div>
    </div>
<!--end slider--->
					
                </div>
			</div>
		</div>      
		<div class="menu-thong-tin-container">
			<ul id="menu-thong-tin" class="menu">
				<li><a href="/" >Trang chủ</a></li>
				<li><a href="/gioi-thieu.html" >Giới thiệu</a></li>
				<li><a href="/khuyen-mai.html" >Khuyến mãi</a></li>
				<li><a href="/lien-he.html" >Liên hệ</a></li>
				<li><a href="/ho-tro.html" >Hỗ trợ</a></li>
				<li><a href="/tin-tuc.html" >Tin tức</a></li>
				<li><a href="/tuyen-dung.html" >Tuyển dụng</a></li>
			</ul>
		</div>            
        <div class="clear"></div>
    </div> 
</header>
<div class="clear"></div>