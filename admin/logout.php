<?php
	if(!isset($_SESSION))
		session_start();
		unset($_SESSION["success"]);
		unset($_SESSION["useradmin"]);
		header("location:login.php");
?>