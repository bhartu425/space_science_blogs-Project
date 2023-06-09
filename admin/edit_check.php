<?php
	include"includes/header.php";
	if (isset($_POST['publish'])) 
	{
		$id = $_GET['id'];
		$title = $_POST['title'];
		$data = $_POST['ckeditor'];
		$title = mysqli_real_escape_string($conn,$title);
		$data = mysqli_real_escape_string($conn,$data);
		$title = htmlentities($title);
		$data = htmlentities($data);
		$sql ="update posts set title ='$title', content = '$data' where id = $id ";
		$res = mysqli_query($conn,$sql);
		if ($res) {
			$_SESSION['message']="<div class='chip green white-text'>Post has been Update</div>";
			header("Location:edit.php?id=".$id);
		}
		else{
			$_SESSION['message']="<div class='chip red white-text'>Something Went Wrong</div>";
			header("Location:edit.php?id=".$id);
		}
	}
?>