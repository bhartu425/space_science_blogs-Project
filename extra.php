<?php
  include"includes/header.php";
  if (isset($_POST['publish'])) 
  {
    $title = $_POST['title'];
    $data = $_POST['ckeditor'];
    $title = mysqli_real_escape_string($conn,$title);
    $data = mysqli_real_escape_string($conn,$data);
    $title = htmlentities($title);
    $data = htmlentities($data);

    #upload image working..
    $image = $_FILES['image'];
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $img_size = $_FILES['image']['size'];
    $img_tmp = $_FILES['image']['tmp_name'];
    if ($img_type=="image/jpeg" || $img_type=="image/jpg" || $img_type=="image/png") 
    { 
      if ($img_size<=2097152) 
      {
        move_uploaded_file($img_tmp, "../img".$img_name);

    $sql ="insert into posts  (title,content,feature_image) values('$title','$data',$img_name)";
    $res = mysqli_query($conn,$sql);
    if ($res) {
      $_SESSION['message']="<div class='chip green white-text'>Post has been Publish</div>";
      header("Location:write.php");
    }
    else{
      $_SESSION['message']="<div class='chip red white-text'>Something Went Wrong</div>";
      header("Location:write.php");
    }
  }
  else{
         $_SESSION['message']="<div class='chip red white-text'>Sorry image size must be less than 2mb.</div>";
      header("Location: write.php");

      }
  }
  
  }
?>