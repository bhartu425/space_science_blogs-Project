<?php
	include"includes/header.php";
	if (isset($_SESSION['username'])) 
	{
		unset($_SESSION['username']);
		$_SESSION['message']="<div class='chip close green white-text'>you have been logout successfully </div>";
		header("Location: login_signup.php");
	}
?>