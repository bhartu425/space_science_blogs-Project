      <div class="collection">
        
        <div class="collection-item">
          <h5>Search</h5>
          <form action="search.php" method="GET">
          <input type="text" name="search" id="search" placeholder="Search Anything..">
          
          <input type="submit" class="btn grey darken-4" value="search" name="submit">
          
          </form>
        </div>
      </div>

      <div class="collection ">
          <h5 class="collection-item grey darken-4 white-text">Trending Blogs</h5>
          <?php
            $sql = "select * from posts order by views desc limit 7";
            $res = mysqli_query($conn,$sql);
            if (mysqli_num_rows($res)>0)
             {
            while ($row=mysqli_fetch_assoc($res))
             {
                  
          ?>
          <div class="row">
          <a href="post.php?id=<?php echo $row['id'] ?>" class="collection-item center grey lighten-4 ">
  
          <div class="col l6 s12 ">
          <div class="card ">
          <div class="card-image small ">
            <img src="img/<?php echo $row['feature_image'];?>">
            <span class="card-title white-text"><?php echo $row['title'];?> </span>
          </div>
          </div>
          </div>
        </a>
          <div class="col l6 s12 ">
            <?php $string = $row['content'];
            if (strlen($string) > 100) {
            $trimstring = substr($string, 0, 100);
            }

            echo $trimstring;
            ?>
         </div>
    
         </div>
          <?php 
        }
        }
        ?>
          
        </div>