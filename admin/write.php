<?php
	include"includes/navbar.php";
	if (isset($_SESSION['username'])) 
  { 
?>

<div class="main">
	<div class="card-panel">
		<form action="write_check.php" method="POSt" enctype="multipart/form-data">
			<?php
			if(isset($_SESSION['message']))
			{
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			}
			?>
			<h5>Title</h5>
			<textarea class="materialize-textarea" name="title" placeholder="Title For Post"></textarea>
			<h5>Featured Image</h5>
			<div class="input-field file-field">
				<div class="btn">
				Upload File
				<input type="file" name="image">
				</div>
				<div class="file-path-wrapper">
					<input type="text" class="file-path">
				</div>
			</div>
			<h5>Content For Post</h5>
			<textarea class="materialize-textarea" name="ckeditor" id="ckeditor"></textarea>
			<div class="center" style="padding-top: 10px;">
			<input type="submit" name="publish" class="btn" value="Publish">
			</div>
		</form>
	</div>
	
</div>

	<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
     CKEDITOR.replace( 'ckeditor' );
     </script>

<?php
	include"includes/footer.php";
}
else{
	$_SESSION['message']="<div class='chip close red black-text'>Please,Login to Continue </div>";
    header("Location: login_signup.php");
}
?>