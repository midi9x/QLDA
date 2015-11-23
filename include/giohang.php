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
//khai bao session
session_start();
if (isset($_SESSION["gh"])) $gh = $_SESSION["gh"];
$id = "";$sl=1;
//session số lượng
if (isset($_GET["sl"]))
{
	$sl = $_GET["sl"];
}
	//nếu kh đã đăng nhập
	$user=$_SESSION["user"];
	if($user){
		$sql="select * from khachhang where username='$user'";
		$kq=mysql_query($sql);
		$r=mysql_fetch_array($kq);
		$id_kh=$r["id_kh"];
		$hoten=$r["hoten"];$email=$r["email"];
		$diachi=$r["diachi"];$dt=$r["dienthoai"];
	}
	else {
		$hoten=$_GET["hoten"];
		$diachi=$_GET["diachi"];
		$email=$_GET["email"];
		$dt=$_GET["dt"];
	}
//ngay hien tai
$now=date("Y-m-d H:i:s");
//get id hang
if (isset($_GET["id"]))
{
	$id=$_GET["id"];	
	//action a: them gh
	$act = "a";
}
//thuc hien yeu cau theo bien act
if (isset($_GET["act"])) $act=$_GET["act"];
//them gh
if ($act=="a"){
	//them gh
	themGH($id, $sl);
}
//cap nhat fh
if ($act=="u") capnhatGH( $id, $sl);
//xoa gh
if ($act=="d")  xoaGH( $id);
//dat hang
if ($act=="tt") dathang($gh,$id_kh,$hoten,$diachi,$email,$dt,$now);

//hien thu gio hang
hienthiGH($gh);

//cac ham thuc hien
function themGH($id, $sl)
{
	global $gh;
	if (isset($gh[$id])) 
	{
		$gh[$id] = $gh[$id]+$sl;
	}
	else
		$gh[$id] = $sl;
		$_SESSION["gh"] =$gh;
}

function hienthiGH($gh)
{
	include "connect.php"; 
?>   		
	<div class="full" id="cart-content">
		<div style="margin-top:-45px;background: #16a085!important;font-size: 14px;text-transform: uppercase; color: #fff;line-height: 40px; width: 980px;position: relative;font-weight:bold">
			Giỏ hàng
		</div>
			<div id="cart-title">
				<div style="color:#fff" class="floatleft item">Sản phẩm</div>
				<div class="floatleft image">Hình ảnh</div>
				<div class="floatleft num">Số lượng</div>
				<div class="floatleft price">Ðơn giá</div>
				<div class="floatleft total-price">Tổng</div>
				<div class="floatleft action">Thao tác</div>
			</div>
		<div class="clear"></div> 
<?php
	global $tongtien;
    foreach($gh as $id=>$sl)
      {
		$count=count($gh);
		if($id!=""){	
		 $sql = "select * from hang where id_hang='$id' ";
         $ketqua = mysql_query($sql); 		 
         $r = mysql_fetch_array($ketqua);
        	$id=$r["id_hang"];
			$tensp=$r["tenhang"];
			$gia=$r["dongia"]; $gia2=number_format($gia,0,'','.');
			$tong=$gia*$sl; $tong2=number_format($tong,0,'','.');
			$tongtien+=$tong; $tongtien2=number_format($tongtien,0,'','.');	
			$hinhanh=$r['hinhanh'];
			
?>
    	<div id="cart-body">
			<div class="box">
				<div class="floatleft item"><br><br><br><?= $tensp;?></div>
				<div class="floatleft image"><img src="hinhanh/thumb/<?=$hinhanh?>" /></div>
				<div class="floatleft num"><br><br><br><br>
					<form id='f<?=$id;?>'>
						<input type=hidden name='act' /><input type=hidden name=id value='<?=$id;?>' />
						<input type=hidden name=page value='gh'>
						<input type="text" name="sl" value='<?=$sl;?>' />  
					</form>
				</div>
				<div class="floatleft price"><br><br><br><br><?=$gia2 ?></div>
				<div class="floatleft total-price"><br><br><br><br><?=$tong2;?> </div>
				<div class="floatleft action">
					<div style="margin:15px 0;border-bottom: 1px solid #C0C0C0;">
						<a href="#" onClick="subMitF('f<?=$id?>', 'u');"><img  src="/images/save.png"/><br>
						Cập nhật<br><br></a>
					</div>
					<div style="margin: 0 0;">
						<a href="#"  onClick="subMitF('f<?=$id?>', 'd');"><img src="/images/remove.png"/><br>
						Xóa</a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
			
			
<?php } }

if($count=="")
{
		echo "<p style=\"font-weight: bold;margin: 0;padding: 10px 0;\">Không có sản phẩm nào trong giỏ hàng </p>";
}
else{
?>
		<p style="font-weight: bold;float: right;margin: 0;padding: 10px 0;">
			Tổng tiền: <span style="font-size:15px;font-weight: bold; color:red;margin-right:25px"><?=$tongtien2;?> VNĐ</span>
		</p>
		
	<p id="cart-handles">	
		<a href="/" class="continue cart-button floatl pointer">Tiếp tục mua sắm</a>
		<a  class="cursor register floatr" onclick="document.getElementById('thanhtoan').style.display='block'">Đặt hàng</a>
		<!--
			Sử dụng getElementById để khi bấm làm sẽ hiện nội dung có id thanh toán
			Truy cập đến một phần tử thông qua thuộc tính id của nó
		-->
	</p>
<?php } ?>
<?php 
	$user=$_SESSION["user"];
	if($user){
		$sql="select * from khachhang where username='$user'";
		$kq=mysql_query($sql);
		$r=mysql_fetch_array($kq);
		$id_kh=$r["id_kh"];
		$hoten=$r["hoten"];$email=$r["email"];
		$diachi=$r["diachi"];$dt=$r["dienthoai"];
	}
?>
    <div id='thanhtoan' style='display:none'>
		<link rel="stylesheet" type="text/css" href="/css/single.css" />
		<div style="font-size: 14px;" id="single-content-1" class="full arial">
				<h2>VUI LÒNG NHẬP THÔNG TIN ĐẶT HÀNG</h2>
				<form name="form" id='k<?=$id?>'>
				<table align="center" border="0">
					<tr>
						<td><strong>Họ và tên:</strong></td>
						<td>
							<input type=hidden name='act' /><input type=hidden name=id value='<?=$id?>' />
							<input type=hidden name=page value='gh'>
							<input name="hoten" type="text" size="35" value="<?=$hoten;?>" maxlength="50" >
						</td>
					</tr>
					<tr>
						<td>	<strong>Địa chỉ nhận hàng:</strong></td>
						<td>	<textarea name="diachi" cols="36" rows="6" type="text" width="111" maxlength="100"><?=$diachi;?> </textarea> </td>
					</tr>
					<tr>
							<td><strong>Email:</strong></td>
							<td><input name="email" value="<?=$email;?>"  type="text" size="35" maxlength="50"> </td>
					</tr>
					<tr>
							<td><strong>Số điện thoại:</strong> </td>
							<td><input name="dt" type="text" value="<?=$dt;?>" size="35" maxlength="50" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')" ></td>
					</tr>
					<tr>
							<td><strong>Phương thức thanh toán:</strong> </td>
							<td>
								<input name="tt" value="tm" type="radio" checked/> Thanh toán khi nhận hàng
								<input name="tt" value="tt" type="radio"/ > Chuyển khoản ngân hàng
								<input name="tt" value="ck" type="radio"/ >  Thanh toán trực tuyến 
							</td>
					</tr>
					<br />
					<br />
					<tr>
							<td><strong>Phương thức nhận hàng: </strong> </td>
							<td>
								<input name="nh" value="tn" type="radio" checked/> Nhận hàng tại nhà (tính phí)
								<input name="nh" value="st" type="radio"/ > Tại siêu thị BMC (miễn phí)
							</td>
					</tr>
					
					<tr>
							<td><strong>Ghi chú từ khách hàng</strong> </td>
							<td>
								<textarea name="ghichu" cols="36" rows="3" type="text" width="111" maxlength="100"></textarea> 
							</td>
					</tr>
					
					<tr>
						<td></td>
						<td><input type="submit" class="button" value="Gửi"  onclick="subMitF('k<?=$id?>', 'tt');">
						<input type="reset" class="button" value="Nhập lại" ></td>
					
						
					</tr> 
					</table>
				</form>
				
	</div></div>
</div>
	

	
<?php
}

function dathang($gh,$id_kh,$hoten,$diachi,$email,$dt,$now)
{
	include 'connect.php';
	//lay id hang lon nhat
	$s1="SELECT *  FROM  donhang ORDER BY  id_donhang DESC  LIMIT 1";
	$k1 = mysql_query($s1); 		 
	$r1=mysql_fetch_array($k1);
	$i=$r1['id_donhang'];
	$i=$i+1;
	if($hoten==""||$diachi==""||$email==""||$dt=="")
		echo "<script>alert('Quý khách phải nhập đầy đủ thông tin');</script>";
	else{
  
	foreach($gh as $id=>$sl)
		{
			$sql = "select * from hang where id_hang='$id' ";
			$ketqua = mysql_query($sql); 		 
			$r=mysql_fetch_array($ketqua);
			$gia=$r["dongia"]; 
			$tong=$gia*$sl; 
			$tongtien+=$tong; 
			$s="insert into ctdonhang(id_donhang, id_hang,soluong,dongia) values ('$i','$id','$sl','$gia')";
			$kq = mysql_query($s);
		}
		$sql2="insert into donhang(id_donhang,id_kh,hoten,diachi,email,dienthoai,tongtien,ngaydat,tinhtrang) values ('$i','$id_kh','$hoten','$diachi','$email','$dt','$tongtien','$now','dathang')";
		$ketqua2 = mysql_query($sql2);
		//lay id don hang de hien don hang da dat
		$_SESSION["dh"]=$i;
		if($ketqua2)
		echo "<script>alert('Quý khách đã gửi đơn hàng thành công! BMC sẽ liên hệ với quý khách trong thời gian sớm nhất.');window.location='/don-hang.html '</script>";
		else echo "<script>alert('Lỗi!');return false;</script>";
		unset($_SESSION['gh']);  
		
  }
}

function xoaGH( $item)
{
	global $gh;
    if (isset($gh[$item])) 
    {
		unset($gh[$item]);
   		$_SESSION["gh"]=$gh;
	}
}

function capnhatGH( $id, $sl)
{
	global $gh;
	if (isset($gh[$id])) 
    {
		$gh[$id] = $sl;
		if ($sl<1)
		{
			unset($gh[$id]);
		    echo "Xoa...";
		}
		$_SESSION["gh"]=$gh;
	}
   		
}

?>
<script language="javascript">
function subMitF(fn, type)
{
	var a=document.getElementById(fn);
	//truy cập đến một phần tử thông qua thuộc tính id của nó
	b=a.getElementsByTagName('input')[0];
	//truy cập đến phần tử HTML thông qua tên gọi của phần tử đó
	b.value=type;
	a.submit();
}
</script>
