<?php
	include"includes/header.php";
	include"includes/navbar.php";
?>

<div class="row">	
<div class="col l9  s12">
	<!-- content area-->	
		<?php
			if (isset($_GET['id']))
			{
				$id=$_GET['id'];
				$id=mysqli_real_escape_string($conn,$id);
    			$id=htmlentities($id); 
    			$sql="select * from posts where id = $id";
    			$res=mysqli_query($conn,$sql);
    			if (mysqli_num_rows($res)>0)
    			{
    				 	$row = mysqli_fetch_assoc($res);

              $sql2 = "select views from posts where id =$id";
              $res2 = mysqli_query($conn,$sql2);
              
              $row2 = mysqli_fetch_assoc($res2);
              $views = $row2['views'];
              $views = $views+1;
              
              $sql3 = "update posts set views = $views where id = $id";
              mysqli_query($conn,$sql3);
    			?>
    				
    				<div class="card-panel">
    					 <h5 class="center"><?php echo ucwords($row['title']); ?></h5>
               <p class="flow-text"><?php echo ucwords($row['content']); ?></p>
               <div class="card-panel">
               <div class="row">
               <div class="col l8 offset-l2 s12">
                
                  <h5>Post Your Comment</h5>
                  <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                  ?>
                  <form action="post.php?id=<?php echo $id;?>" method="POST">
                    <div class="input-field">
                    <input type="email" name="email" placeholder="Enter Your Email" class="validate">
                    <label for="email" data-error="Email invalid" data-success="Email valid"></label>
                    </div>
      
                    <textarea name="comment" class="materialize-textarea" placeholder="Write Your Commment"></textarea>
                    
                    <div class="center">
                      <input type="submit" name="submit" class="btn black" value="Comment">
                    </div>
                  </form>

                  <ul class="collection"><h5>Comments</h5>
                    <?php
                  $sql4="select * from comment where post_id=$id  order by id DESC";
                  $res4=mysqli_query($conn,$sql4);
                  if (mysqli_num_rows($res4)>0) {
                    while ($row=mysqli_fetch_assoc($res4)) {
                  ?>  
                    
                  <li class="collection-item">
                    <?php echo $row['comment_text']; ?>
                    <span class="secondary-content">
                    <?php echo $row['email']; ?>
                    </span>
                  </li>
                  <?php
                  }
                  }
                  ?>
                  </ul>
                
               </div>
               </div>
    					</div>
              <div class="row">
    					<div class="col l9 s12">
    						<h5>Related Blogs</h5>
    						<?php
    						$sql="select * from posts order by rand() limit 10 ";
						    $res=mysqli_query($conn,$sql);

    						if (mysqli_num_rows($res)>0) 
    						{
      						while ($row = mysqli_fetch_assoc($res)) 
     								 {
     
  							?>
    
      						<div class="col l3 m4 s12">
      						  <div class="card ">
      						    <div class="card-image">
      						      <img src="img/<?php echo $row['feature_image'];?>">
      						      <span class="card-title red-text"><?php echo $row['title'];?> </span>
      						    </div>
      						    <div class="divider">
      						    	
      						    </div>
      						    
      						    <div class="card-action  black center ">
      						      <a href="post.php?id=<?php echo $row['id'];?>" class=" white-text btn-black"> Read More</a>
      						    </div>
      						  </div>
      						</div>
						
     						 <?php
     						   }
     						 }
     						 ?>

    					</div>
    				</div>
    				</div>

    			<?php
    			}
			}
			else
			{
				header("Location:index.php");
			}
		?>
</div>



<div class="col l3 s12">
	<!-- sidebar area-->
<?php
	include"includes/sidebar.php";
?>
</div>


</div>



<!--footer area-->
<?php
	include"includes/footer.php";
?>


<?php
if (isset($_POST['submit'])) {
  $id = $_GET['id'];
  $email = $_POST['email'];
  $comment = $_POST['comment'];

    $id=mysqli_real_escape_string($conn,$id);
    $id=htmlentities($id);

    $email=mysqli_real_escape_string($conn,$email);
    $email=htmlentities($email);

    $comment=mysqli_real_escape_string($conn,$comment);
    $comment=htmlentities($comment);

    $sql="insert into comment (email,comment_text,post_id)value('$email','$comment','$id')";
    $res=mysqli_query($conn,$sql);

    if ($res) {
    $_SESSION['message']="<div class='chip  green white-text'> Comment Added successfully </div>";
      header("Location: post.php?id=$id");
    }
    else{
      $_SESSION['message']="<div class='chip  red black-text'> Sorry, Something Went Wrong </div>";
      header("Location: post.php?id=$id");
    }
    
}

?>