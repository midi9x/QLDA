<?php
$act=""; $hoten=""; $diachi=""; $email="";$dienthoai="";$user="";;
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
	$user=$_POST["user"];
	$user=EncodeSpecialChar($user);	
	$ngaysinh=$_POST["ngaysinh"];
	$ngaysinh=EncodeSpecialChar($ngaysinh);	
	$gioitinh=$_POST["gioitinh"];
	$gioitinh=EncodeSpecialChar($gioitinh);	
	$pass=md5($_POST["pass"]);
		{    
    	$sql="insert into khachhang(hoten,diachi,email,dienthoai,username,password,ngaysinh,gioitinh) values('$hoten','$diachi','$email','$dienthoai','$user','$pass','$ngaysinh','$gioitinh')";
		$kq=mysql_query($sql);
		if(!$kq)
		{
			echo "<script>alert('Có lỗi SQL! Nhập lại!');</script>";		
		}
		else 
		{
			echo "<script>alert('Chúc mừng $user! Quý khách đã đăng ký thành công! ');window.location='/?page=dang-nhap';</script>";
		}	
	}
}
?>
<script language="javascript">
function createXMLHttp()
    {
        var xmlHttp =false;
        try{
          xmlHttp = new XMLHttpRequest();
        }
        catch(e)
        {
          xmlHttp = new ActiveXObject("Microsoft.XMLHttp");
        }
        if (!xmlHttp)
        {
          alert("Loi ...");
        }
        else
        {
          return xmlHttp;
        
        }
    
    }
    
        
var xmlHttp = new createXMLHttp();
function process()
{
  if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
  { 
    tendangnhap = encodeURIComponent(document.getElementById("user").value);
    xmlHttp.open("GET", "include/kt-user.php?user=" + tendangnhap, true);
    xmlHttp.onreadystatechange = handleServerResponse;
    xmlHttp.send(null);
  }
}

function handleServerResponse()
{
  if (xmlHttp.readyState == 4)
  {
    if (xmlHttp.status == 200)
    {
		ResponseText =xmlHttp.responseText;
		document.getElementById("kqkiemtra").innerHTML = '<i>' + ResponseText + '</i>';
	}
    else
    {
      alert("Lỗi: " + xmlHttp.statusText);
    }
  }
}
</script>
<div align="center" class="full" id="cart-content" style="  margin-top: -20px;line-height:25px; padding:5px;">
	<div style="margin-top:-5px;background: #16a085!important;font-size: 14px;text-transform: uppercase; color: #fff;line-height: 40px; width: 980px;position: relative;font-weight:bold">ĐĂNG KÝ THÀNH VIÊN
	</div>
	<div style="padding: 15px; box-shadow: 0px 0px 5px rgba(50, 50, 50, 0.5);font-size: 14px;font-family: arial;" align="center">	 
	
		<form method="post" onSubmit="return thanhvien_insert(user.value,pass.value,apass.value,hoten.value,email.value,diachi.value,dienthoai.value,ngaysinh.value,gioitinh.value);" id="formthanhvien" name="formthanhvien">
        <table width="560" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
		  <tr>  
            <td height="50" style="padding-left:70px"><div align="left" style="width:120px">Tên đăng nhập:</div></td>
 			<td width="405" style="padding-left:15px" align="left">
                <input type="text" name="user" id="user" style="width:220px" value="<?php echo "$user"; ?>" onBlur="process()" />   
                <font color="#FF0000">* </font>
				<div id="kqkiemtra" style="color:#ff0000;"></div>
              </td>            
          </tr>
		  <tr>            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Mật khẩu:</div></td>
 			<td width="405" style="padding-left:15px">
              <div align="left">
                <input type="password" name="pass" style="width:220px" />
              <font color="#FF0000">*</font></div></td>   			  
          </tr>
		  <tr>  
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Nhập lại mật khẩu:</div></td>
 			<td width="405" style="padding-left:15px">
              <div align="left">
                <input type="password" name="apass" style="width:220px"/>
              <font color="#FF0000">*</font></div></td>     		  
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
              <font color="#FF0000">*           </td>            
          </tr>       
          <tr>            
            <td height="30" style="padding-left:70px">
			<div align="left" style="width:120px">Điện thoại:<span style="padding-left:15px">
            </span></div></td>
 			<td width="405" style="padding-left:15px">
              <div align="left">
                <input type="text" name="dienthoai" style="width:220px" value="<?php echo "$dienthoai"; ?>" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')"/>
              <font color="#FF0000">*</font></div></td>            
          </tr>
		  
		  <tr>            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Ngày sinh:</div></td>
 			<td width="405" style="padding-left:15px">
              <div align="left">
                <input type="date" name="ngaysinh" style="width:220px" value="<?php echo "$ngaysinh"; ?>"/>
              <font color="#FF0000">*</font></div></td>            
          </tr>
		  
		   <tr>            
            <td height="30" style="padding-left:70px"><div align="left" style="width:120px">Giới tính:</div></td>
 			<td width="405" style="padding-left:15px">
              <div align="left">
                <input type="radio" name="gioitinh" value="1" checked /> Nam
				<input type="radio" name="gioitinh" value="0" /> Nữ
          </tr>
		  
          <tr>
            <td height="35" colspan="2" align="center" >
              <div align="center">
                <input type="submit" value="Đăng ký" class="button" >
	<input type="reset" value="Nhập lại" class="button" >	
    		<input type="hidden" name="act"/>
            </div></td>
          </tr>
        </table>
</form>
</div>    