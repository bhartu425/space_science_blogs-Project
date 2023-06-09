<?php
include"includes/header.php";

if (isset($_POST['signup'])) 
{
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$email = mysqli_real_escape_string($conn,$email);
	$username = mysqli_real_escape_string($conn,$username);
	$password = mysqli_real_escape_string($conn,$password);

	$email =htmlentities($email);
	$username =htmlentities($username);
	$password =htmlentities($password);
	$password =password_hash($password, PASSWORD_BCRYPT);

	$sql2="select * from users where email = '$email' or username ='$username'";
	$res2=mysqli_query($conn,$sql2);
	if (mysqli_num_rows($res2)>1)
	 {
		header("Location:login_signup.php");
		$_SESSION['message']="<div class='chip red white-text'>Account already exist</div>";
	}
	else{

	$sql = "insert into users(email,username,password) values('$email','$username','$password')";
	$res = mysqli_query($conn,$sql);

	if ($res) {
		header("Location: login_signup.php");
		$_SESSION['message']="<div class='chip  green white-text'>  you have been successfully register, Login to continue </div>";
	}
	else
	{
		header("Location: login_signup.php");
		$_SESSION['message']="<div class='chip red white-text'>  Something Went Wrong</div>";
	}
	
	}

}
?>