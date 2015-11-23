<?php
	$HOST = "localhost";
	$USER = "root";
	$PASS = "";
	$DB = "bhmt";
	$ERROR1 = "Lỗi kết nối";
	$ERROR2 = "Lỗi database";
	
mysql_connect($HOST, $USER, $PASS) or die($ERROR1);

mysql_select_db($DB) or die($ERROR2);

mysql_query("SET NAMES 'utf8'");
?>