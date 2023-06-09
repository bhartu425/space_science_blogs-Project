<?php
 
  include"includes/navbar.php";
  if (isset($_SESSION['username'])) 
  { 
  
?>

    <!--main content area-->
    <div class="main">
      <div class="row">
        <div class="col l6 m6 s12">

          <!-- recent post area-->
          <ul class="collection with-header">
            <li class="collection-header black">
              <h5 class="white-text">Recent Post</h5>
            </li>
            <?php
            if (isset($_SESSION['delete']))
             {
              echo $_SESSION['delete'];
              unset($_SESSION['delete']);
            }
          ?>
            <?php
            $sql="select * from posts order by id desc";
            $res=mysqli_query($conn,$sql);
            if (mysqli_num_rows($res)>0)
             {
              while ($row=mysqli_fetch_assoc($res)) 
              { 
            ?>
            <li class="collection-item">
             <a href=""><?php echo $row['title'];?></a><br>
             <span>
              <a href="edit.php?id=<?php echo $row['id'];?>"><i class="material-icons tiny">edit</i>Edit |</a>
              <a href="delete.php?id=<?php echo $row['id'];?>"><i class="material-icons tiny red-text">delete</i>Delete |</a>
              <a href=""><i class="material-icons tiny green-text">share</i>Share</a>
            </span> 
            </li>
            <?php
          }
        }
          else{
                echo"<div class='chip red white-text'>THERE IS NO POST IN DATABASE</div>";
              }
            ?>
          </ul>
        </div>

        <div class="col l6 m6 s12">
          <!-- recent comments area-->
          <ul class="collection with-header">
            <li class="collection-header black">
              <h5 class="white-text">Recent Comments</h5>
            </li>
            <li class="collection-item">
             <a href=""> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</a><br>
             <span>
              <a href=""><i class="material-icons tiny">done</i>Approve |</a>
              <a href=""><i class="material-icons tiny red-text">clear</i>Remove |</a>
            </span> 
            </li>
          </ul>  
        </div>
      </div>    
    </div>
    <div class="fixed-action-btn">
      <a href="write.php" class="btn btn-floating btn-large white-text pulse"><i class="material-icons">edit</i></a>
    </div>

    <?php
    include"includes/footer.php";
    ?>

  <?php
  }
  else{
    $_SESSION['message']="<div class='chip close red black-text'>Please,Login to Continue </div>";
    header("Location: login_signup.php");
  }
?>