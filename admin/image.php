<?php
  include"includes/navbar.php";
  $dir="../img/";
  $files=scandir($dir);
  if ($files) 
  {

  	?>
  	<div class="main">
  	<div class="row">
  		
  	
  	<?php
  	foreach ($files as $file)  
  	{
  		if (strlen($file)>2) 
      {
  		
    ?>
  	<div class="col l2 m3 s6">
  		<div class="card">
  			<div class="card-image">
  				<img src="../img/<?php echo $file;?>" style="height: 150px; width: 200px;">
  				<span class="card-title"><?php echo $file;?></span>
  			</div>
  		</div>
  		</div>	

  <?php	
   }
   }    
  }
?>
</div>	
</div>
  <?php
  include"includes/footer.php";
 ?>