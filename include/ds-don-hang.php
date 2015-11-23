
<?php
	include("../connect.php");
  	$user=$_SESSION["user"];	
	$s="select * from khachhang where username = '$user'";
	$k=mysql_query($s);
	$r=mysql_fetch_assoc($k);
    $id_kh=$r["id_kh"];
?>

<div class="full" id="cart-content">
			  <div style="margin-top:-15px;background: #16a085!important;font-size: 14px;text-transform: uppercase; color: #fff;line-height: 40px; width: 980px;position: relative;font-weight:bold">
			Danh sách đơn hàng
			  </div>
					
					<div id="cart-title">
						<div style="color:#fff" class="floatleft item">Số hóa đơn</div>
						<div class="floatleft image">Địa chỉ nhận hàng</div>
						<div class="floatleft num">Tổng tiền</div>
						<div class="floatleft price">Ngày đặt</div>
						<div class="floatleft total-price">Tình trạng</div>
						<div class="floatleft action">Xem chi tiết</div>
					</div>
					<div class="clear"></div> 
  
  <?php
  	$sql="select * from donhang where id_kh='$id_kh'";
	$kq=mysql_query($sql);
	if(mysql_num_rows($kq)==0){	echo "  <p style=\"font-weight: bold;margin: 0;padding: 10px 0;\">Hiện tại quý khách chưa đặt mua sản phẩm nào! </p>";}
	else {
	while($r=mysql_fetch_assoc($kq))
	{
		$id_donhang=$r["id_donhang"];
		$diachi=$r["diachi"];
		$tongtien=$r["tongtien"];
		$ngaydat=$r["ngaydat"];
		$tinhtrang=$r["tinhtrang"];
		
?>    
		
				<div id="cart-body">
					<div class="box">
						<div class="floatleft item"><br><br><br><?=$id_donhang;?></div>
						<div class="floatleft image"><br><br><br><br><?=$diachi;?></div>
						<div class="floatleft num"><br><br><br><br>
							<?=$tongtien?>
						</div>
						<div class="floatleft price"><br><br><br><br><?=$ngaydat ?></div>
						<div class="floatleft total-price"><br><br><br><br>
						<div>
								<?php
								if($tinhtrang=="dathang") echo "Đang xử lý";
								else echo "Đã mua";
								?>
						</div>
						</div>
						
						<div class="floatleft action">
							<br><br><br><br><a href="#">Xem chi tiết</a>
						</div><div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>		
<?php			
}
	}
  ?>  
</div>