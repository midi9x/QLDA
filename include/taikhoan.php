<?php
$user=$_SESSION["user"];
$sql="select * from khachhang where username='$user'";
$kq=mysql_query($sql);
$r=mysql_fetch_array($kq);
$hoten=$r["hoten"];$email=$r["email"];
$diachi=$r["diachi"];$dienthoai=$r["dienthoai"];
$ngaysinh=$r["ngaysinh"];$gioitinh=$r["gioitinh"];
$phanloai=$r["phanloai"];

?>


<div align="center" class="full" id="cart-content" style="  margin-top: -20px;line-height:25px; padding:5px;">
<div style="margin-top:-5px;background: #16a085!important;font-size: 14px;text-transform: uppercase; color: #fff;line-height: 40px; width: 980px;position: relative;font-weight:bold">THÔNG TIN CÁ NHÂN CỦA KHÁCH HÀNG
	</div>
<div style="padding: 15px; box-shadow: 0px 0px 5px rgba(50, 50, 50, 0.5);font-size: 14px;font-family: arial;" align="center">

<table  style="margin-left:150px;" width="550" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30">Tên đăng nhập:</td>
    <td><?=$user?></td>
  </tr>
  
  <tr>
    <td height="30"> Họ tên:</td>
    <td><?=$hoten?></td>
  </tr>
  
  <tr>
    <td height="30"> Địa chỉ:</td>
    <td><?=$diachi?></td>
  </tr>

  <tr>
    <td height="30">  Điện thoại:</td>
    <td><?=$dienthoai?></td>
  </tr>

  <tr>
    <td height="30"> Ngày sinh:</td>
    <td><?=$ngaysinh?></td>
  </tr>  
  <tr>
    <td height="30"> Giới tính: </td>
    <td><?php if($gioitinh==1) echo 'Nam'; else echo 'Nữ';?></td>
  </tr>  
  <tr>
    <td height="30"> Loại KH:</td>
    <td><?php if($phanloai==1) echo 'Khách VIP'; else echo 'Khách thường';?></td>
  </tr>  
  
  <tr>

	
    
</table>

		<div style="margin-left: -60px; margin-top: 10px;">
			<img style="margin: -3px 8px;" src="/images/pass.png"><a href="/?page=doi-mat-khau">Đổi mật khẩu</a> 
			<img style="margin:-3px 8px;" src="/images/info.png"><a href="/?page=doi-thong-tin">Đổi thông tin cá nhân</a> 
			<img style="margin:-3px 8px;" src="/images/cart_icon.png"><a href="/?page=ds-don-hang">Danh sách đơn hàng</a>
		</div>
	</div>
</div>

 



 

