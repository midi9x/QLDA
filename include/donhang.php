<?php 
		session_start();
		if (isset($_SESSION["dh"]))  
		$iddh=$_SESSION["dh"];
		$s="select * from donhang where id_donhang=$iddh";
		$k=mysql_query($s);
		$rr=mysql_fetch_array($k);
		$tt=$rr['tinhtrang'];
		$hoten=$rr['hoten'];
		$diachi=$rr['diachi'];
		$dt=$rr['dienthoai'];

?>
<div class="full" id="cart-content">
			  <div style="margin-top:-15px;background: #16a085!important;font-size: 14px;text-transform: uppercase; color: #fff;line-height: 40px; width: 980px;position: relative;font-weight:bold">
			 Thông tin đơn hàng đã đặt
			  </div>
			  <div style="text-align: left;  line-height: 30px;  padding: 15px;  box-shadow: 0px 0px 5px rgba(50, 50, 50, 0.5);  font-size: 14px;  font-family: arial;">
				Họ tên: <?=$hoten?><br />
			Địa chỉ: <?=$diachi?><br />
			Điện thoại: <?='0'.$dt?> <br />
			Số hóa đơn: <?=$iddh;?><br />
			Thanh toán: <a href="/ho-tro.html">Hướng dẫn thanh toán</a>
			</div>
					<div id="cart-title">
						<div style="color:#fff" class="floatleft item">Sản phẩm</div>
						<div class="floatleft image">Hình ảnh</div>
						<div class="floatleft num">Số lượng</div>
						<div class="floatleft price">Ðơn giá</div>
						<div class="floatleft total-price">Tổng</div>
						<div class="floatleft action">Tình trạng</div>
					</div>
					<div class="clear"></div> 
<?php
		$sql3="select * from hang, ctdonhang where hang.id_hang = ctdonhang.id_hang and id_donhang=$iddh";
		$kq3=mysql_query($sql3);
		while($r=mysql_fetch_array($kq3))
		{
			$iddh = $r['id_donhang'];
			$id=$r["id_hang"];
			$tensp=$r["tenhang"];
			$sl=$r["soluong"];
			$gia=$r["dongia"]; $gia2=number_format($gia,0,'','.');
			$tong=$gia*$sl; $tong2=number_format($tong,0,'','.');
			$tongtien+=$tong; $tongtien2=number_format($tongtien,0,'','.');	
			$hinhanh=$r['hinhanh'];
?>	
				<div id="cart-body">
				<div class="box"">
					<div class="floatleft item"><br><br><br><?= $tensp;?></div>
					<div class="floatleft image"><img src="hinhanh/thumb/<?=$hinhanh?>" /></div>
					<div class="floatleft num"><br><br><br><br>
						<form id='f<?=$id;?>'>
						<input type=hidden name='act' /><input type=hidden name=id value='<?=$id;?>' />
						<input type=hidden name=b value='gh'>
						<input type="text" name="sl" value='<?=$sl;?>' />  
						</form>
					</div>
					<div class="floatleft price"><br><br><br><br><?=$gia2 ?></div>
					<div class="floatleft total-price"><br><br><br><br><?=$tong2;?> </div>
					
					<div class="floatleft action">
    					<div style="margin:55px">
    						<?php
							if($tt="dathang") echo "Đang xử lý";
							else echo "Đã chuyển hàng";
							?>
    					</div>
    				</div><div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			<?php }?>
			
			<p style="font-weight: bold;float: right;margin: 0;padding: 10px 0;">
				Tổng tiền: <span style="font-size:15px;font-weight: bold; color:red;margin-right:25px"><?=$tongtien2;?> VNĐ</span>
			</p>
			
				
				
		
		<p id="cart-handles">	
<a href="/" class="continue cart-button floatl pointer">Tiếp tục mua sắm</a>
	</p>