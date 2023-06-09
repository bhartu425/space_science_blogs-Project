<?php
include "includes/header.php";
include "includes/navbar.php";
?>


  <div class="slider">
    <ul class="slides">
      <li><img src="img/img1.jpg"></li>
      <li><img src="img/img2.jpg"></li>
      <li><img src="img/img3.jpg"></li>
      <li><img src="img/img4.jpg"></li>
    </ul>
  </div>

  <div class="row">
    <!--Main content area-->
    <div class="col l9 m9 s12">

  <?php
    $sql="select * from posts order by id desc";
    $res=mysqli_query($conn,$sql);

    if (mysqli_num_rows($res)>0) 
    {
      while ($row = mysqli_fetch_assoc($res)) 
      {
     
  ?>
    
      <div class="col l4 m4 s12">
        <div class="card ">
          <div class="card-image">
            <img src="img/<?php echo $row['feature_image'];?>">
            <span class="card-title white-text"><?php echo $row['title'];?> </span>
          </div>
          <div class="card-content truncate">
            <?php echo $row['content'];?> 
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

     <!--sidebar content area-->
    <div class="col l3 m3 s12">
      <?php
        include"includes/sidebar.php";
      ?>
    </div>
    </div>
 


   

    <?php
    include"includes/footer.php";
    ?>