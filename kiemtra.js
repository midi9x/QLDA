/*
▒█▀▀█ ░▀░ █▀▀▄ █░░█ 　 ▒█▀▄▀█ ░▀░ █▀▀▄ █░░█ 　 ▒█▀▀█ █▀▀█ █▀▄▀█ █▀▀█ █░░█ ▀▀█▀▀ █▀▀ █▀▀█ 
▒█▀▀▄ ▀█▀ █░░█ █▀▀█ 　 ▒█▒█▒█ ▀█▀ █░░█ █▀▀█ 　 ▒█░░░ █░░█ █░▀░█ █░░█ █░░█ ░░█░░ █▀▀ █▄▄▀ 
▒█▄▄█ ▀▀▀ ▀░░▀ ▀░░▀ 　 ▒█░░▒█ ▀▀▀ ▀░░▀ ▀░░▀ 　 ▒█▄▄█ ▀▀▀▀ ▀░░░▀ █▀▀▀ ░▀▀▀ ░░▀░░ ▀▀▀ ▀░▀▀ 
 * BINH MINH COMPUTER
 * Copyright 2015, All Rights Reserved.
 * @author Nhom 11 HTTT K7 HAUI
 * @email webmaster@binhminhcomputer.com
 * @link http://binhminhcomputer.com
 */
 //hàm kiểm tra 
function isEmpty(ten)
{
	if (ten=="")
		return false;
	return true;
}
//email
function isEmail(string) {
	if (string.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
		return true;
	else
		return false;
}

//kiem tra do dai user
function checklengthuser(user)
{
	p=document.formthanhvien.user.value;
	if(p.length<6)
		return false;
	else
		return true;
}

//kiem tra do dai pass
function checklengthpass(pass)
{
	p=document.formthanhvien.pass.value;
	if(p.length<6)
		return false;
	else
		return true;
}

function checklengthpass2(pass)
{
	p=document.changepw.pass.value;
	if(p.length<6)
		return false;
	else
		return true;
}

//kiem tra quen
function checkquyen(quyen)
{
	if(quyen==""||quyen=="chonquyen")
		return false;
	return true;
}

//kiem tra nguoi dung
function checkuser(user)
{
	if(user=="administrator"||user=="admin"||user=="quantrivien")
		return false;
	return true;
}

function checkloaisp(loaisp)
{
	if(loaisp=="chonlsp")
		return false;
	return true;
}


function valid(o,w){
o.value = o.value.replace(valid.r[w],'');
}
valid.r={
'numbers':/[^\d]/g
}


function Checkimage(hinhanh)
{
	var filename = hinhanh;	
	var dotpos;
	filename = filename.substring(filename.lastIndexOf("\\")+1,filename.length);
	dotpos=filename.lastIndexOf('.');
	ext=filename.substr(dotpos+1,3);
	ext=ext.toLowerCase();
	fname=filename.substr(0,dotpos);	
	if(dotpos==-1||dotpos==0){
		alert("Chưa chọn hình ảnh");
		return false;
	}	
	if (ext!="")
		if ((ext!="gif") && (ext!="jpg") && (ext!="png") && (ext!="jpeg") ){
			alert("File hình không hợp lệ - Chỉ upload được các kiểu hình .jpg - .jpeg - .gif - .png");
			return false;
		}
	
	return true;
}

//*********************************************************************************
function Checkimage2(hinhanh)
{
	var filename = hinhanh;	
	var dotpos;
	filename = filename.substring(filename.lastIndexOf("\\")+1,filename.length);
	dotpos=filename.lastIndexOf('.');
	ext=filename.substr(dotpos+1,3);
	ext=ext.toLowerCase();
	fname=filename.substr(0,dotpos);	
	if (ext!="")
		if ((ext!="gif") && (ext!="jpg") && (ext!="png") && (ext!="jpeg") ){
			alert("File hình không hợp lệ - Chỉ upload được các kiểu hình .jpg - .jpeg - .gif - .png");
			return false;
		}
	
	return true;
}

//**********************************************************************************
function lienhe(hoten,email,noidung)
{
	if(isEmpty(hoten)==false)
	{
		alert("Quý khách chưa nhập họ tên");
		return false;
	}
	if(isEmail(email)==false)
	{
		alert("Email không hợp lệ!");
		return false;
		
	}	
	if(isEmpty(noidung)==false)
	{
		alert("Quý khách chưa nhập nội dung");
		return false;
	}	
}


//**********************************************************************************
function onlyNumbers(e)
{
	var keynum;
	var keychar;
	var numcheck;
	
	if(window.event) // IE
	keynum = e.keyCode;
	else if(e.which) // Netscape/Firefox/Opera
	keynum = e.which;
	keychar = String.fromCharCode(keynum);
	numcheck = /\d/;
	return numcheck.test(keychar);
	onkeydown="return onlyNumbers(event)"
}

//**********************************************************************************
function thanhvien_insert(user,pass,apass,hoten,email,diachi,dienthoai,ngaysinh,gioitinh)
{
	if (isEmpty(user)==false)
    {
		alert("Tên đăng nhập không được rỗng!");
		return false;
	}
	
	if(checkuser(user)==false)
	{
		alert("Quý khách không thể đăng ký tên đăng nhập này!");
		return false;	
	}
	
	if(checklengthuser(user)==false)
	{
		alert("Chiều dài của tên đăng nhập phải lớn hơn 6 ký tự!");
		return false;		
	}
	
	if(isNaN(user)==false)
	{
		alert("Tên đăng nhập phải là chữ! không được là số!");
		return false;
	}
	
	if (isEmpty(pass)==false)
   	 {
  	   alert("Mật khẩu không được rỗng!");	
		 return false;
		}
	else 
		if (isEmpty(apass)==false)
    	{
	  	   alert("Mật khẩu không được rỗng!");	
			 return false;
		}
		else
			if (pass!=apass)
    		{
	  		   alert("Mật khẩu không giống nhau! Nhập lại!");	
				 return false;
			}
	
	if(checklengthpass(pass)==false)
	{
		alert("Chiều dài mật khẩu phải lớn hơn 6!");
		return false;
	}
	
	if (isEmpty(hoten)==false)
    {
		alert("Họ tên không được rỗng!");
		return false;
	}	
	
	if (isEmail(email)==false)
    {
		alert("Email không hợp lệ!");
		return false;
	}

	if (isEmpty(diachi)==false)
    {
		alert("Địa chỉ không được rỗng!");
		return false;
	}
	
	if (isEmpty(dienthoai)==false)
    {
		alert("Điện thoại không được rỗng!");
		return false;
	}	
	if (isEmpty(ngaysinh)==false)
    {
		alert("Ngày sinh không được rỗng!");
		return false;
	}	
return true;
}

//**********************************************************************************
function thanhvien_change(hoten,email,diachi,anti)
{	
	if (isEmpty(hoten)==false)
    {
		alert("Họ tên không được rỗng!");
		return false;
	}	
	
	if (isEmail(email)==false)
    {
		alert("Email không hợp lệ!");
		return false;
	}

	if (isEmpty(diachi)==false)
    {
		alert("Địa chỉ không được rỗng!");
		return false;
	}		
	
	if (isEmpty(anti)==false)
    {
		alert("Mã an toàn không được rỗng!");
		return false;
	}
return true;
}

//********************************************************************************
function thanhvien_changepw(pw_old,pw,cpw)
{
	if (isEmpty(pw_old)==false)
    {
		alert("Mật khẩu cũ không được rỗng");
		return false;
	}
	
	if (isEmpty(pw)==false)
   	 {
  	   alert("Mật khẩu mới không được rỗng");	
		 return false;
		}
	else 
	{
		if (isEmpty(cpw)==false)
    	{
	  	   alert("Viết lại Mật khẩu không được rỗng");	
			 return false;
		}
		else
		{
			if (pw!=cpw)
    		{
	  		   alert("Viết lại Mật khẩu bị sai");	
				 return false;
			}
		}
	}	
	
	if(checklengthpass(pw)==false)
	{
		alert("Chiều dài mật khẩu phải lớn hơn 6!");
		return false;
	}
return true;
}

//*******************************************************************************
function thanhvien_resetpw(users,email)
{
	if (isEmpty(users)==false)
    {
		alert("Tên đăng nhập không được phép rỗng");
		return false;
	}
	if(checkuser(users)==false)
	{
		alert("Quý khách không được quyền lấy lại mật khẩu của tài khoản quản trị");
		return false;
	}
	if (isEmail(email)==false)
   	 {
  	   alert("Email không hợp lệ");	
		 return false;
	}
	

return true;
}

//*******************************************************************************
function thanhtoan(hoten,diachi,email,dt)
{
	if (isEmpty(hoten)==false)
    {
		alert("Quý khách phải nhập Họ tên");
		return false;
	}
	
	if (isEmpty(diachi)==false)
    {
		alert("Quý khách phải nhập địa chỉ !");
		return false;
	}
	
	if (isEmail(email)==false)
   	 {
  	   alert("Email không hợp lệ");	
		 return false;
	}
	
	if(isEmpty(dt)==false)
	{
		alert("Quý khách chưa nhập điện thoại!");
		return false;
	}
	
return true;
}

//*******************************************************************************

function themhang(loaisp,tensp,mota,hinh,gia,soluong)
{
	if (isEmpty(mota)==false)
   	 {
  	   alert("Chưa nhập mô tả");	
		 return false;
	}
	if (isEmpty(gia)==false)
   	 {
  	   alert("Chưa nhập giá");	
		return false;
	}	
	if (isEmpty(soluong)==false)
   	{
  	   alert("Chưa nhập số lượng");	
	 return false;
	}
	
	if(checkloaisp(loaisp)==false)
	{
		alert("Chưa chọn loại hàng!");
		return false;
	}
	
	if (isEmpty(tensp)==false)
   	 {
  	   alert("Chưa nhập tên hàng");	
		 return false;
	}
	
	if (Checkimage(hinh)==false)
    {
		return false;
	}
	
return true;
}

//*******************************************************************************
function sp_insert_m(menu,tensp,hinh,ghichu)
{
	if(checkmenu(menu)==false)
	{
		alert("Chưa chọn loại sản phẩm!");
		return false;
	}
	
	if (isEmpty(tensp)==false)
   	 {
  	   alert("Chưa nhập tên sản phẩm");	
		 return false;
	}
	
	if (Checkimage(hinh)==false)
    {
		return false;
	}
	if(checkmenu(ghichu)==false)
	{
  	   alert("Chưa chọn ghi chú");	
		return false;			
	}
return true;
}

//*******************************************************************************
function check()
{
	var thongbao=window.confirm("Bạn có chắc chắn muốn xóa");
  if (thongbao==true)
  		return true;
  else 
		return false;
}

//*******************************************************************************
function checklh()
{
	var thongbao=window.confirm("Bạn chắc chắn muốn xóa phản hồi này?");
  if (thongbao==true)
  		return true;
  else 
		return false;
}

//*******************************************************************************
function checktv()
{
	var thongbao=window.confirm("Bạn chắc chắn muốn xóa thành viên này?");
  if (thongbao==true)
  		return true;
  else 
		return false;
}
//*******************************************************************************
function tk(text_content)
{
	if (isEmpty(text_content)==false)
    {
		alert("Chưa nhập từ khóa cần tìm!");
		return false;
	}	
return true;
}

//*******************************************************************************
function admin_changepw(pw_old,pw,cpw)
{
	if (isEmpty(pw_old)==false)
    {
		alert("Mật khẩu cũ không được rỗng");
		return false;
	}
	
	if (isEmpty(pw)==false)
   	 {
  	   alert("Mật khẩu mới không được rỗng");	
		 return false;
		}
	else 
	{
		if (isEmpty(cpw)==false)
    	{
	  	   alert("Viết lại Mật khẩu không được rỗng");	
			 return false;
		}
		else
		{
			if (pw!=cpw)
    		{
	  		   alert("Viết lại Mật khẩu bị sai");	
				 return false;
			}
		}
	}	
return true;
}


//*******************************************************************************
function nhomsp_insert(ten)
{
	if (isEmpty(ten)==false)
    {
		alert("Chưa nhập tên nhóm!");
		return false;
	}	
return true;
}

//*******************************************************************************
function loaisp_insert(ten)
{

	if (isEmpty(ten)==false)
    {
		alert("Chưa nhập tên loại!");
		return false;
	}	
return true;
}
function ht()
{
	alert("Chức năng đang hoàn thiện");
	return false;
}
function checktim(){
	if(document.Form.timkiem.value=="")
	{
		alert('Nhập từ khóa cần tìm');
		return false;
	}
}
function chuyenhang()
{
	var thongbao=window.confirm("Bạn có chắc chắn muốn chuyển hàng?");
  if (thongbao==true)
  		return true;
  else 
		return false;
}