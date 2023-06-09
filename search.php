<?php
include"includes/header.php";
include"includes/navbar.php";

if (isset($_GET['submit'])) {
	
	$q=$_GET['search'];
	$q=mysqli_real_escape_string($conn,$q);
	$q=htmlentities($q); 
	$sql="select * from posts where title like  '$q' or   title like '%$q%' ";
	$res=mysqli_query($conn,$sql);
	if (mysqli_num_rows($res)>0) {
		?>
		 <div class="row">
     		<!-- this is main content area-->
   	 	<div class="col l9 m9 s12">
		<?php
		while ($row=mysqli_fetch_assoc($res)) {
      			
      		
      ?>
      <div class="col l4 s12">
        <div class="card ">
          <div class="card-image">
          <img src="img/<?php echo $row['feature_image']?>">
          <span class="card-title white-text truncate"><?php echo $row['title'];?></span>  
          </div>
          <div class="card-content truncate">
           <?php echo $row['content'];?>
          </div>
          <div class="card-action black center">
            <a href="post.php?id=<?php echo $row['id'];?>" class="white-text btn-black">Read more</a>
          </div>
        </div>
      </div>

      	<?php
        }
		?>
		</div>

		  <!-- this is sidebar content area-->
    <div class="col l3 m3 s12">
      
      <?php
      include "includes/sidebar.php";
      ?>

    </div>
		</div>
		<?php
include"includes/footer.php";
?>
		<?php

	}

	else{
		?>
		<h5>sorry no data found in search string</h5>
		<?php
	}
}
else{
	header("Location:index.php");
}

?>
