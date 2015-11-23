<?php
$act=""; $hoten=""; $diachi=""; $email="";$dienthoai="";
if(isset($_POST["act"]))
{
	include "connect.php";
	$hoten=$_POST["hoten"];
	$hoten=EncodeSpecialChar($hoten);
	$diachi=$_POST["diachi"];
	$diachi=EncodeSpecialChar($diachi);	
	$email=$_POST["email"];
	$email=EncodeSpecialChar($email);
	$dienthoai=$_POST["dienthoai"];
	$dienthoai=EncodeSpecialChar($dienthoai);		
	$ngaysinh=$_POST["ngaysinh"];
	$ngaysinh=EncodeSpecialChar($ngaysinh);	
	$gioitinh=$_POST["gioitinh"];
	$gioitinh=EncodeSpecialChar($gioitinh);	
	{    
    		
		$sql="update khachhang set hoten='$hoten',email='$email',dienthoai='$dienthoai',diachi='$diachi', gioitinh='$gioitinh', ngaysinh='$ngaysinh' where username='$user'";
		$kq=mysql_query($sql);
		if(!$kq)
		{
			echo "<script>alert('Có lỗi SQL! Nhập lại!');</script>";		
		}
		else 
		{
			echo "<script>alert('Quý khách đã thay đổi thông tin cá nhân thành công! ');window.location='index.php?page=ttcn';</script>";
		}	
	}
}
?>

<?php
$user=$_SESSION["user"];
$sql="select * from khachhang where username='$user'";
$kq=mysql_query($sql);
$r=mysql_fetch_array($kq);
$hoten=$r["hoten"];$email=$r["email"];$diachi=$r["diachi"];$dienthoai=$r["dienthoai"];
$gioitinh=$r["gioitinh"];$ngaysinh=$r["ngaysinh"]
?>
<div align="center" class="full" id="cart-content" style="  margin-top: -20px;line-height:25px; padding:5px;">
		<div style="margin-top:-5px;background: #16a085!important;font-size: 14px;text-transform: uppercase; color: #fff;line-height: 40px; width: 980px;position: relative;font-weight:bold">THAY ĐỔI THÔNG TIN CÁ NHÂN
		</div>
	<div style="padding: 15px; box-shadow: 0px 0px 5px rgba(50, 50, 50, 0.5);font-size: 14px;font-family: arial;" align="center">	 
<form method="post" onSubmit="return thanhvien_change(hoten.value,email.value,diachi.value,anti.value);" id="formthanhvien" name="formthanhvien">
        <table width="560">

		  <tr>  
            <td height="50" style="padding-left:70px"><div align="left" style="width:120px">Tên đăng nhập:</div></td>
 			<td width="405" style="padding-left:15px" align="left">
                <?php echo "$user"; ?>
				<div id="kqkiemtra"></div>
              </td>            
          </tr>		  
          <tr>            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Họ tên:</div></td>
     		<td width="405" style="padding-left:15px">
       		  <div align="left">
       		    <input type="text" name="hoten" style="width:220px" value="<?php echo "$hoten"; ?>"/>
   		      <font color="#FF0000">*</font></div></td>            
          </tr>
          <tr>            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Email:</div></td>
 			<td width="405" style="padding-left:15px">
              <div align="left">
                <input type="text" name="email" style="width:220px" value="<?php echo "$email"; ?>"/>
              <font color="#FF0000">*</font></div></td>            
          </tr>
          <tr>   
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Địa chỉ:</div></td>
 			<td width="405" style="padding-left:15px" valign="top" align="left">              
                <textarea name="diachi" rows="6" style="width:220px"><?php echo "$diachi"; ?></textarea>
              <font color="#FF0000">*</font></td>            
          </tr>       
          <tr>            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Điện thoại:</div></td>
 			<td width="405" style="padding-left:15px">
              <div align="left">
                <input type="text" name="dienthoai" style="width:220px" value="<?php echo "$dienthoai"; ?>" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')"/>
              <font color="#FF0000">*</font></div></td>            
          </tr>
 
          <tr>            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Ngày sinh:</div></td>
 			<td width="405" style="padding-left:15px">
              <div align="left">
                <input type="date" name="ngaysinh" style="width:220px" value="<?php echo "$ngaysinh"; ?>" />
              <font color="#FF0000">*</font></div></td>            
          </tr>

          <tr>            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Điện thoại:</div></td>
 			<td width="405" style="padding-left:15px">
              <div align="left">
			  
                <input type="radio" name="gioitinh" value="1" <?php if($gioitinh==1) echo "checked"; ?>/>Nam
                <input type="radio" name="gioitinh" value="0" <?php if($gioitinh==0) echo "checked"; ?>/>Nữ
				
                        
          </tr>
		  
          <tr>
            <td height="35" colspan="2" align="center" bgcolor="#fff">
              <div align="center">
                <input type="submit" value="Sửa" class="button" >
				<input type="reset" value="Nhập lại" class="button" >	
    		<input type="hidden" name="act"/>
            </div></td>
          </tr>
        </table>
</form>
</div>    