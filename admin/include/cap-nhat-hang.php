<br /><?php 
if(isset($_POST["act"]))
{
	$id=$_POST["id"];
	$loaisp=$_POST["loaisp"];
	$tensp=$_POST["tensp"];
	$mota = $_POST['mota'];
	$gia=$_POST["gia"];
	$ghichu=$_POST["ghichu"];
	$file_name = $_FILES["hinh"]["name"];
	$file_type = $_FILES["hinh"]["type"];
	$file_size = $_FILES["hinh"]["size"];
	$name=$_POST["oldimage"]; $imgInfo=explode('.', $name);
	$kd=khongdau2($_POST["tensp"]);
	$new=$kd.".".$imgInfo[1];
	if($file_name==""&&$file_type==""&&$file_size==0)
	{	
		if($id2!=$id){
			$sql5="UPDATE hang SET id_loai='$loaisp', tenhang='$tensp', mota='$mota', dongia='$gia',ghichu='$ghichu',hinhanh='$new' WHERE id_hang='$id'";
			$kq5=mysql_query($sql5);
			if(!$kq5){
				echo "<script>alert('Lỗi! sản phẩm này đã có');window.history.go(-1);</script>";}
			else{
				 rename("../hinhanh/full/$name","../hinhanh/full/$new");	
				 rename("../hinhanh/thumb/$name","../hinhanh/thumb/$new");
				 $n5=mysql_affected_rows();
				 echo "<script>alert('Đã sửa');window.history.go(-2);</script>";
			}
		}
		else{
			$sql3="UPDATE hang SET id_loai='$loaisp', tenhang='$tensp', mota='$mota', dongia='$gia',ghichu='$ghichu' WHERE id_hang='$id'";
			$kq3=mysql_query($sql3);
			if(!$kq3){
				echo "<script>alert('Có lỗi xảy ra trong quá trình xử lý!!');window.history.go(-1);</script>";}
			else{
				 $n3=mysql_affected_rows();
				 echo "<script>alert('Đã sửa $n3 sản phẩm');window.history.go(-2);</script>";	
			}
		}
	}
	else{			
		$tmp_name = $_FILES['hinh']['tmp_name'];		
		$dirToUpload="../hinhanh/full/";
		$imageInfo = explode('.', $file_name);  //cắt chuỗi ở những nơi có dấu .
		$newName = $kd.".".$imageInfo[1]; 				
		unlink("../hinhanh/full/$name");
				unlink("../hinhanh/thumb/$name");
				switch($imageInfo[1]){
				case "jpg":
					$src = imagecreatefromjpeg($tmp_name);
				break;
								
				case "gif":
					$src = imagecreatefromgif($tmp_name);
				break;
								
				case "png":
					$src = imagecreatefrompng($tmp_name);
				break;
				
				case "jpeg":
					$src = imagecreatefromjpeg($tmp_name);
				break;
				}	
			//********************************resize hinh ********************************
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
			//********************************resize hinh ********************************
		$sql4="UPDATE hang SET id_loai='$loaisp', tenhang='$tensp', mota='$mota',hinhanh='$newName', dongia='$gia',ghichu='$ghichu' WHERE id_hang='$id'";
		$kq4=mysql_query($sql4);
		if(!$kq4)
			echo "<script>alert('Lỗi! sản phẩm này đã có trong cơ sở dữ liệu!');window.history.go(-1);</script>";
		else{				
				 $n4=mysql_affected_rows();
				 echo "<script>alert('Đã sửa');window.history.go(-2);</script>";	
		}		
	}	
}

?>

<?php
	function Getloaisp($idl)
	{
		$sql2 = "SELECT * from loaihang order by id_nhom ASC";
		$kq2 = mysql_query($sql2);
		$s2="";
		$n2=mysql_num_rows($kq2);
		if($n2>0){
		while($r2=mysql_fetch_array($kq2))
		{
			if($r2["id_loai"]==$idl)
				$s2.="<option value='".$r2["id_loai"]."' selected>";			
			else
				$s2.="<option value='".$r2["id_loai"]."'>";
			$s2.=$r2["tenloaisp"]."</option>";
		}
		}
		return $s2;
	}
	
	
	function GetGhichu($id)
	{
		$sql2 = "SELECT * from hang where id_hang='$id'";
		$kq2 = mysql_query($sql2);
		$s2="";
		$n2=mysql_num_rows($kq2);
		if($n2>0){
		while($r2=mysql_fetch_array($kq2))
		{
			if($r2["ghichu"]=="new"){
				$s2.="<option value='new' selected>";			
				$s2.="Hàng mới";				
				$s2.="<option value='old'>";
				$s2.="Hàng cũ";
			}
			else{
				if($r2["ghichu"]=="old"){
					$s2.="<option value='old'>";			
					$s2.="Mặt hàng cũ";				
					$s2.="<option value='new' selected>";
					$s2.="Mặt hàng mới";
					
				}
				
			}

		}
		}
		return $s2;
		
	}	
?>


<?php
	$id=$_GET["id"];
	$sql="select * from hang where id_hang='$id'";
	$kq=mysql_query($sql);
	$n=mysql_num_rows($kq);
	if($n==0)
		echo "";
	else 
	{
		$r=mysql_fetch_array($kq);$id_loai=$r["id_loai"];$id_nhom=$r["id_nhom"];
		$tensp=$r["tenhang"];$mota=$r["mota"];$hinh=$r["hinhanh"];
		$gia=$r["dongia"];$ghichu=$r["ghichu"];
	//	echo "$id_loai";
?>

<table width="740" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" class="tieude" align="center">CẬP NHẬT HÀNG</td>
  </tr>
  <form method="post" enctype="multipart/form-data">
    <tr class=noidung>
    <td width="200" style="padding-left:80px" height="30">Loại HÀNG:</td>
    <td width="519">
    <?php
    if($id_loai!=0){
		echo "<select name=\"loaisp\" style=\"width:240px;\">"; 
		echo Getloaisp($id_loai);
		echo "</select>";
	}
	
    ?>
    </td>
  </tr>
    <tr class=noidung>
    <td style="padding-left:80px" height="30">Tên HÀNG:</td>
    <td><input type="text" name="tensp" style="width:240px" value="<?php echo "$tensp"; ?>"></td>
  </tr>

    <tr class=noidung>
    <td style="padding-left:80px" height="30">Mô tả:</td>  
    <td><textarea id="mota" name="mota" cols="27" rows="5"  style="width:240px"><?php echo "$mota" ?></textarea> </td>
	<script type="text/javascript">//CKEDITOR.replace("mota"); </script>
  </tr>
  <tr>
  	  </tr>
    <tr class=noidung>
    <td  style="padding-left:80px" height="30">Ảnh đại:</td>
    <td height="80">    <input name="hinh" type="file" size="30">
<img align="middle" src="/hinhanh/thumb/<?php echo "$hinh"; ?>" width="80" height="80">
 <input type="hidden" name="oldimage" value="<?php echo "$hinh"; ?>"> 
    </td>
  </tr>
    <tr class=noidung>
    <td style="padding-left:80px" height="30">Giá:</td>
    <td><input name="gia" type="text" maxlength="20" style="width:240px" value="<?php echo "$gia"; ?>"></td>
  </tr>
    <tr class=noidung>
    <td style="padding-left:80px" height="30">Ghi chú:</td>
    <td>
    <select name="ghichu" style="width:240px">
	<?php echo GetGhichu($id); ?>
    </select>
    </td>
  </tr>  
<tr class=dau>
	<td></td>
  	<td>
		<input class="button edit" type="submit" value="Sửa">
		<input class="button refresh" type="reset" value="Làm mới">      
    </td>
  </tr>
  <input type="hidden" name="act">
  <input type="hidden" name="id" value="<?php echo "$id"; ?>" />
  </form>
</table>
<?php 
	}
?>