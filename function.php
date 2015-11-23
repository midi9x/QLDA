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
function EncodeSpecialChar($content) {  //insert table
	//cat khoang trang
	$content = trim($content);
	//them \' tranh loi sql +
	$content = addslashes($content);
	//chuyen html sang dang dac biet
	$content = htmlspecialchars($content);
	return $content;
}

function ConvertDate_time_db($predate) // datetime chen vao table
{
	$arr1=explode(" ",$predate);
	$arr=substr($arr1[0],0,10);
	$date=explode("-",$arr);
	return $date[2]."-".$date[1]."-".$date[0]." ".$arr1[1] ;
}

function ConvertDate_time_load($predate) // datetime de load
{
	$arr1=explode(" ",$predate);
	$arr=substr($arr1[0],0,10);
	$date=explode("-",$arr);
	return $date[2]."/".$date[1]."/".$date[0]." ".$arr1[1] ;
}
	
function khongdau($text)
{
	$text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
	$text=str_replace(" ","-", $text);$text=str_replace("--","-", $text);
	$text=str_replace("@","-",$text);$text=str_replace("/","-",$text);
	$text=str_replace("\\","-",$text);$text=str_replace(":","",$text);
	$text=str_replace("\"","",$text);$text=str_replace("'","",$text);
	$text=str_replace("<","",$text);$text=str_replace(">","",$text);
	$text=str_replace(",","",$text);$text=str_replace("?","",$text);
	$text=str_replace(";","",$text);$text=str_replace(".","",$text);
	$text=str_replace("[","",$text);$text=str_replace("]","",$text);
	$text=str_replace("(","",$text);$text=str_replace(")","",$text);
	$text=str_replace("́","", $text);
	$text=str_replace("̀","", $text);
	$text=str_replace("̃","", $text);
	$text=str_replace("̣","", $text);
	$text=str_replace("̉","", $text);
	$text=str_replace("*","",$text);$text=str_replace("!","",$text);
	$text=str_replace("$","-",$text);$text=str_replace("&","-and-",$text);
	$text=str_replace("%","",$text);$text=str_replace("#","",$text);
	$text=str_replace("^","",$text);$text=str_replace("=","",$text);
	$text=str_replace("+","",$text);$text=str_replace("~","",$text);
	$text=str_replace("`","",$text);$text=str_replace("--","-",$text);
	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);
	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);
	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $text);
	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $text);
	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'e', $text);
	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'e', $text);
	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $text);
	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $text);
	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'u', $text);
	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'u', $text);
	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);
	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);
	$text=strtolower($text);
	
	return $text;
}
?>