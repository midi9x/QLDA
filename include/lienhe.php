
<?php
include "connect.php";
$act=""; $hoten=""; $cty=""; $email="";$dienthoai="";$fax="";$diachi=""; $noidung="";
if (isset($_POST["act"]))
{
$act=$_POST["act"];
$hoten=$_POST["hoten"];
$email=$_POST["email"];
$dienthoai=$_POST["dt"];
$diachi=$_POST["diachi"];
$noidung=$_POST["noidung"];
$now=date("Y-m-d H:i:s");
if(isset($act))
{    
		$sql="insert into phanhoi(hoten,email,dienthoai,diachi,noidung,ngayphanhoi) values ('$hoten','$email','$dienthoai','$diachi','$noidung','$now')";
		$kq=mysql_query($sql);	
		if(!$kq)
			{
				echo "<script>alert('Có lỗi SQL! Nhập lại!');</script>";		
			}
			else 
			{
				$n=mysql_affected_rows();
				echo "<script>alert('Cám ơn quý khách đã liên hệ với chúng tôi!');</script>";
			$act=""; $hoten=""; $cty=""; $email="";$dienthoai="";$fax="";$diachi=""; $noidung="";
				
			}
    }
}

?>

<div align="center" class="full" id="cart-content" style="  margin-top: -20px;line-height:25px; padding:5px;">
<div style="margin-top:-15px;background: #16a085!important;font-size: 14px;text-transform: uppercase; color: #fff;line-height: 40px; width: 980px;position: relative;font-weight:bold">Liên hệ với chúng tôi
	</div>
<div style="padding: 15px; box-shadow: 0px 0px 5px rgba(50, 50, 50, 0.5);font-size: 14px;font-family: arial;" align="center">	
Quý khách có thể liên hệ với chúng tôi bằng cách soạn thông tin theo mẫu sau. <br />
Rất mong những ý kiến đóng góp của quý khách để chúng tôi có thể phục vụ tốt hơn.<br ><br >
  
  <form method="post" onSubmit="return lienhe(hoten.value,email.value,noidung.value);" name="formlienhe" id="formlienhe">
  <table width="550" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30"><div style="padding-center:70px">Họ và tên:</div></td>
    <td><input name="hoten" type="text" size="35" maxlength="50" value="<?php echo $hoten;?>"><span style="color:red;font-weight:bold;">*</span>
  </tr>
  <tr>
    <td height="30"><div style="padding-center:70px">Công ty:</div></td>
    <td><input name="cty" type="text" size="35" maxlength="50" value="<?php echo $cty;?>"></td>
  </tr>
  <tr>
    <td height="30"><div style="padding-center:70px">Email:</div></td>
    <td><input name="email" type="text" size="35" maxlength="50" value="<?php echo $email;?>"><span style="color:red;font-weight:bold;">*</span></td>
  </tr>
  <tr>
    <td height="30"><div style="padding-center:70px">Số điện thoại:</div></td>
    <td><input name="dt" type="text" size="35" maxlength="50" value="<?php echo $dienthoai;?>" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')"></td>
  </tr>
  <tr>
    <td height="30"><div style="padding-center:70px">Fax:</div></td>
    <td><input name="fax" type="text" size="35" maxlength="50" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')"></td>
  </tr>
  <tr>
    <td height="30"><div style="padding-center:70px">Địa chỉ:</div></td>
    <td><input name="diachi" type="text" size="35" maxlength="50" value="<?php echo $diachi;?>"></td>
  </tr>
  <tr>
    <td height="120"><div style="padding-center:70px">Nội dung:</div></td>
    <td width="350" height="120"><textarea name="noidung" cols="35" rows="6" ><?php echo $noidung;?></textarea><span style="color:red;font-weight:bold;">*</span></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center" height="30">
    <input type="submit" value="Gửi" class="button" onclick="";>
	<input type="reset" value="Nhập lại" class="button" >
	<input type="hidden" name="act">
	</td>
  </tr>
</table>
</form>
</div>
</div>
