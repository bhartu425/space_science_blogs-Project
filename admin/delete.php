<?php
	include"includes/header.php";
	if (isset($_GET['id']))
	 {
		$id = $_GET['id'];
		$id = mysqli_real_escape_string($conn,$id);
		$id = htmlentities($id);
		$sql="delete from posts where id =$id";
		$res=mysqli_query($conn,$sql);
		if ($res)
		 {
			 $_SESSION['delete']="<div class='chip green white-text'>Successfully Delete </div>";
			 header("Location: dashboard.php");
		}
		else{

			$_SESSION['delete']="<div class='chip red white-text'>Something Went Wrong</div>";
			 header("Location: dashboard.php");
		}
	}
?>