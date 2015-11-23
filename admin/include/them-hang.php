
<?php
	include("connect.php");
	function print_option($sql)
	{
		$kq=mysql_query($sql);
		while ($r=mysql_fetch_array($kq))
			echo "<option value=$r[0]> $r[1] </option>";
	}
?>

<br />

<table width="735" border="0" cellspacing="0" cellpadding="0">
 <tr>
    <td colspan="2" class="tieude" align="center">THÊM HÀNG MỚI</td>
  </tr>

<form method="post" enctype="multipart/form-data" onsubmit="return themhang(loaisp.value,tensp.value,mota.value,hinh.value,gia.value,soluong.value);" name="forminsert">

  <tr class=noidung>
	<td style="padding-left:80px" height="30">Nhóm hàng</td> 
	<td>
	<select name="nhomsp" onChange="comboChange(this.value)" style="width:240px;">
        
			<?php print_option("select id_nhom,tennhom from nhomhang"); ?>
	</select>
	</td>
	</tr>
	  
  <tr class=noidung>
    <td width="200" style="padding-left:80px" height="30">Loại hàng:</td>
    <td width="535">
			<div id=loaisanpham>
			<select name="loaisp" style="width:240px;" id='loaisp'>
									
				<?php print_option("select id_loai,tenloaisp from loaihang order by id_nhom ASC"); ?>
			
			</select>
			</div>
    </td>
  </tr>
  <tr class=noidung>
    <td style="padding-left:80px" height="30">Tên hàng:</td>
    <td><input type="text" name="tensp" style="width:240px" value="<?php echo "$tensp"; ?>"></td>
  </tr>
  <tr class=noidung>
    <td style="padding-left:80px" height="30">Mô tả:</td>  
    <td><textarea id="mota" name="mota" cols="27" rows="5"  style="width:240px"></textarea> </td>
	<script type="text/javascript">//CKEDITOR.replace("mota"); </script>
  </tr>
  
  <tr class=noidung>
    <td style="padding-left:80px" height="30">Hình ảnh:</td>
    <td><input name="hinh" type="file" size="30"></td>
  </tr>
  <tr class=noidung>
    <td style="padding-left:80px" height="30">Giá:</td>
    <td><input name="gia" type="text" maxlength="20" style="width:240px" value="<?php echo "$gia"; ?>" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')"> VNĐ</td>
  </tr>
  <tr class=noidung>
    <td style="padding-left:80px" height="30">Số lượng:</td>
    <td><input name="soluong" type="text" maxlength="20" style="width:240px" value="<?php echo "$soluong"; ?>" onkeyup="valid(this,'numbers')" onblur="valid(this,'numbers')"></td>
  </tr>
  <tr class=noidung>
    <td style="padding-left:80px" height="30">Ghi chú:</td>
    <td> 
    <select name="ghichu" style="width:240x" >
  	<option value="new">Hàng mới</option>
	<option value="old">Hàng cũ</option>
    </select>
    </td>
  </tr>  
  <tr class=dau>
  	<td align="center" colspan="2" height="35">
		<input class="button add" type="submit" value="Thêm">
		<input class="button refresh" type="reset" value="Làm mới">   
    </td>
  </tr>
  <input type="hidden" name="act">
  </form>
</table>
<?php 
$mota="";$gia="";$tensp="";$ghichu="";
if(isset($_POST["act"]))
{
	$loaisp=$_POST["loaisp"];
	$tensp=$_POST["tensp"];
	$mota = $_POST['mota'];
	$gia=$_POST["gia"];
	$sl=$_POST["soluong"];
	$ghichu=$_POST["ghichu"];
	$kt="select count(*) from hang where tenhang='$tensp'";
	$kd=khongdau2($_POST["tensp"]);
	$kq_kt=mysql_query($kt);
	$r_kt=mysql_fetch_array($kq_kt);
	$n_kt=$r_kt[0];
	if($n_kt!=0){
		echo "<script>alert('Sản phẩm này đã có trong cơ sỡ dữ liệu');</script>";}
	else{//(2)	
	$file_name = $_FILES["hinh"]["name"];
	$tmp_name = $_FILES['hinh']['tmp_name'];	
	$imageInfo = explode('.', $file_name);  //cắt chuỗi ở những nơi có dấu .		
	$newName = $kd.".".$imageInfo[1]; 			

	switch($imageInfo[1]){
	case "jpg":
		$src = imagecreatefromjpeg($tmp_name);
	break;
			
	case "jpeg":
		$src = imagecreatefromjpeg($tmp_name);
	break;
	
	case "gif":
		$src = imagecreatefromgif($tmp_name);
	break;
					
	case "png":
		$src = imagecreatefrompng($tmp_name);
	break;	
		
	}
	$sql="insert into hang(id_loai,tenhang,mota,hinhanh,dongia,ghichu,soluong) values ('$loaisp','$tensp','$mota','$newName','$gia','$ghichu','$sl')";
	$kq=mysql_query($sql);
	if(!$kq){
	echo "<script>alert('Có lỗi SQL! Nhập lại!');</script>";	
	
	}
	else {
		
//********************************resize hinh ********************************//
	list($width,$height)=getimagesize($tmp_name);  //lấy kích thước của file
	$newwidth=170;
	$newheight=170;
	$tmp=imagecreatetruecolor($newwidth,$newheight); //tạo kíck thước mới rồi gán vào 1 file hình
	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); //chép hình từ file src ( ng ta gửi ) sang khung hình kíck thước mới
	$pathfile="../hinhanh/full/".$newName;	
	$pathfull="../hinhanh/thumb/".$newName;	
	move_uploaded_file($_FILES["hinh"]["tmp_name"], $pathfile);
	imagejpeg($tmp,$pathfull,100);		   //lưu hình tmp với đường dẫn là pathfull
	imagedestroy($src); imagedestroy($tmp); //xóa hình tạm khỏi bộ nhớ
//********************************resize hinh ********************************//	
		
		$n=mysql_affected_rows();
		echo "<script>alert('Đã thêm!');window.location='?m=hang&page=them-hang'</script>";
		$loaisp="";$mota="";$gia="";$tensp="";$ghichu="";
	}//(4)

	}//(2)
}//(1)

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
          alert("Lỗi ...");
        }
        else
        {
          return xmlHttp;
        
        }
    
    }   
        
var xmlHttp = new createXMLHttp();

function comboChange(v)
{
  var url = "../admin/include/get-loai-hang.php?idn="+v;
 if (xmlHttp.readyState==4 || xmlHttp.readyState==0)
      {
        xmlHttp.open("GET", url, true);
        xmlHttp.onreadystatechange=Func;
        xmlHttp.send(null);
      }
  }
    
 function Func()
    {
   		
        if (xmlHttp.readyState==4)
        {
            if (xmlHttp.status==200)
            {
             
				var s="";
				
				s += xmlHttp.responseText;
				var oXml = xmlHttp.responseXML.documentElement;
				
				var select = document.getElementById("loaisp");
				select.innerHTML="";				
				
				var arrLoai = oXml.getElementsByTagName("value");
				var arrTextLoai=oXml.getElementsByTagName("text");
				for(i=0; i<arrLoai.length; i++)
				{
				  var opt = document.createElement("option");
				  
				  opt.setAttribute("value", arrLoai[i].firstChild.data);
				  var text = document.createTextNode(arrTextLoai[i].firstChild.data);
				   opt.appendChild(text);
				   select.appendChild(opt);
				}				
       		}
			else
			 alert("Lỗi"+xmlHttp.statusText);
		}
		
}
</script>