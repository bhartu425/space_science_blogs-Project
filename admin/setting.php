<?php
	include"includes/navbar.php";
	if (isset($_SESSION['username']))
	 {
?>

<div class="main">
	<div class="card-panel">
		<?php
  			if (isset($_SESSION['message']))
  			 {
  				echo $_SESSION['message'];
  				unset($_SESSION['message']);
  			}
  		?>
		<h5>Change Password</h5>
		<form action="setting.php" method="POST">
			<div class="input-field">
				<input type="password" name="password" placeholder="New Password">
			</div>
			<div class="input-field">
				<input type="password" name="con_password" placeholder="Confirm Password">
			</div>
			<div class="center">
				<input type="submit" name="update" value="Update" class="btn">
			</div>
		</form>
	</div>
</div>



<?php
	include"includes/footer.php";
?>


 <?php
  	if (isset($_POST['password'])) {
  		$password=$_POST['password'];
  		$password=mysqli_real_escape_string($conn,$password);
		$password=htmlentities($password);

		$con_password=$_POST['con_password'];
  		$con_password=mysqli_real_escape_string($conn,$con_password);
		$con_password=htmlentities($con_password);

		if ($con_password===$password) {
			
			$username=$_SESSION['username'];
			$password=password_hash($password, PASSWORD_BCRYPT);
			$sql="update users set password ='$password' where username='$username'";
			$res=mysqli_query($conn,$sql);
			if ($res) {
				
			
			$_SESSION['message']="<div class='chip green white-text'>Password Successfully Change. </div>";
				header("Location:setting.php");
			}
		else
		{
			$_SESSION['message']="<div class='chip red black-text'Something Went Wrong, please try again. </div>";
			header("Location:setting.php");
		}
		}
		else{
			$_SESSION['message']="<div class='chip red black-text'>Password Do Not Match. </div>";
			header("Location:setting.php");
		}
}
}
else{
			$_SESSION['message']="<div class='chip red black-text'login to continue. </div>";
			header("Location:login_signup.php");
  }
  ?>  
