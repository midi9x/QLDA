<?php
if(isset($_POST["act"]))
{
	
	$url=$_POST['url'];
	$title=$_POST['title'];
	$description=$_POST['description'];
	$keyword=$_POST['keyword'];
	$logo=$_POST['logo'];
	
		if($url==""||$title==""||$description==""||$keyword==""){
			echo "<script>alert('Vui lòng nhập đầy đủ thông tin'); window.location='../admin/?m=he-thong';</script>";
		}
		else{
			$sql="update cauhinh set url='$url', title='$title', description='$description' , keyword='$keyword' , logo='$logo'";
			$kq=mysql_query($sql);
			if(!$kq) {echo "<script>alert('Lỗi trong quá trình cập nhật!'); window.location='../admin/?m=he-thong';</script>";}
			else {
				echo "<script>alert('Sửa thành công :)'); window.location='../admin/?m=he-thong';</script>";
				// xử lý file hình ảnh tương tự sửa hàng
		}
	}
}
?>

	
<?php 
 $sql2="select * from cauhinh";
 $kq2=mysql_query($sql2);
 $r=mysql_fetch_assoc($kq2);
 $url=$r['url'];
 $title=$r['title'];
 $keyword=$r['keyword'];
 $description=$r['description'];
 $logo=$r['logo'];
?>

<form name="form1" method="post">
<table border="0" width="735" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td colspan="2" class="tieude">Cấu Hình Hệ Thống</td>
	</tr>
	<tr class="noidung" height="30">
		  <td width="150" style="padding-left:20px" height="30">Địa chỉ trang web:</td>
		  <td><input type="link" name="url" style="width: 538px;" value="<?=$url?>" /></td>
    </tr>
	<tr class="noidung" height="30">
		  <td width="150" style="padding-left:20px" height="30">Tiêu đề: </td>
		  <td><textarea name="title" style="width: 530px;height: 50px;padding: 5px;margin: 2px;"><?=$title?></textarea></td>
    </tr>
    <tr class="noidung" height="30">
		  <td width="150" style="padding-left:20px" height="30">Mô tả:</td>
		  <td><textarea name="description" style="width: 530px;height: 50px;padding: 5px;margin: 2px;"><?=$description?></textarea></td>
    </tr>
	<tr  class="noidung" height="30" >
		  <td width="150" style="padding-left:20px" height="30">Từ khóa:</td>
		  <td><textarea name="keyword" style="width: 530px;height: 50px;padding: 5px;margin: 2px;"><?=$keyword?></textarea>   </td>
    </tr>
	<tr  class="noidung" height="30" >
		  <td width="150" style="padding-left:20px" height="30">Logo:</td>
		  <td style="width: 530px;height: 50px;padding: 5px;margin: 2px;">
				<table border=0>
					<tr><td><input name="logo" type="radio" checked/> URL có sẵn: </td><td><input  style="width:280px" name="logo" value="<?=$logo?>" type="text" /></td><td colspan=2 rowspan=2><img align="middle" src="<?=$logo?>" width="145"></td></tr>
					<tr><td><input name="logo" type="radio"/> Từ máy tính: </td><td><input name="logo" type="file"  /> </td></tr>
					
				</table>
		  </td>
           </tr>

    <tr class="dau" height="30">
		<td colspan="2" align="center">
		<input class="button edit" type="submit" value="Sửa">
		<input class="button refresh" type="reset" value="Làm mới">      
		<input name="act" type="hidden" /></td>
    </tr>
  </table>
</form>

