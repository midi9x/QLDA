<?php 


// tạo mk ngẫu nhiên
function getmk($length) {
   global $password;
   $possible = '23456789bcdfghjkmnpqrstvwxyz';
   $i = 0;
   while ($i < $length) {

      $password .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
      $i++;
   } 
   return $password;
}
//hàm quên mk - gửi mail mk mới
function quenmk($email)
{	
	include '../connect.php';
	if($email=="") return 'Vui lòng nhập email';
    $sql="select * from  khachhang where email='$email'";
    $sql_query = mysql_query($sql);
    if (!mysql_num_rows($sql_query))
        {
            return "Ko tồn tại email này";
        }
    else
    {
        $truyvan = mysql_fetch_assoc($sql_query);
        $password = getmk(6);
		$setpassword = md5($password);
        $sql_query = mysql_query("update khachhang set password='$setpassword' where email='$email' ");
        $username=$truyvan['username'];
        $from = 'midi9x@gmail.com';
        $to = $email;  
        $subject = 'Mật khẩu mới từ BMC';  
        $message = "Xin chào '$username'. Mật khẩu tại BMC của bạn đã được đặt lại bằng địa chỉ email: '$email' \nUsername: $username \nPassword: '$password'";  
		$header = "From: $from\r\nReply-to: $from";  
		$guimail=mail($to, $subject, $message, $header);
        if ($guimail)
        {
            return "Mật khẩu đã được gửi vào email của bạn!";
        }
        else
        {
            return "Gửi mail ko thành công";
        }
    }
    
}

?>


<div align="center" class="full" id="cart-content" style="  margin-top: -20px;line-height:25px; padding:5px;">
		<div style="margin-top:-15px;background: #16a085!important;font-size: 14px;text-transform: uppercase; color: #fff;line-height: 40px; width: 980px;position: relative;font-weight:bold">Lấy lại mật khẩu
		</div>
	<div style="padding: 15px; box-shadow: 0px 0px 5px rgba(50, 50, 50, 0.5);font-size: 14px;font-family: arial;" align="center">	 
<form method="post">
<table border="0" width="600" >
	<?php
	if(isset($_POST["act"])){	
	$email=$_POST["email"];
	echo $ketqua=quenmk($email);
	}
	?>
 <tr height="30">
      <td style="padding-left:100px" align="left">Nhập địa chỉ email của bạn:</td>
      <td width="300" align="left">  <input type="email" name="email" ></td>
    </tr>
	<tr>
		<td height="35" colspan="2" align="center">
        <input type="submit" value="Gửi" class="button" >
		<input type="reset" value="Nhập lại" class="button" >
        <input name="act" type="hidden" value="act" /></td>
    </tr>
  </table>
</form>
</div></div>

