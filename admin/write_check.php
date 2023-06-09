 <?php
include"includes/header.php";

  if(isset($_POST['publish']))
  {
    $data=$_POST['ckeditor'];
    $data=mysqli_real_escape_string($conn,$data);

    $title=$_POST['title'];
    $title=mysqli_real_escape_string($conn,$title);
    $title=htmlentities($title); 

    # image upload working..
    $image=$_FILES['image'];
    $img_name=$_FILES['image']['name'];
    $img_size=$_FILES['image']['size'];
    $tmp_dir=$_FILES['image']['tmp_name'];
    $type=$_FILES['image']['type'];
    if ($type=="image/jpeg" || $type=="image/png" ||$type=="image/jpg") 
    {
      if ( $img_size<=2097152)
       {
        move_uploaded_file($tmp_dir,"../img/".$img_name);
        $sql="insert into posts (title,content,feature_image) value('$title','$data','$img_name')";
    $res=mysqli_query($conn,$sql);
    if($res)
    {
      $_SESSION['message']="<div class='chip green white-text'> Post is Publish</div>";
      header("Location: write.php");
    }
    else
    {
      $_SESSION['message']="<div class='chip red white-text'>Something Went Wrong</div>";
      header("Location: write.php");

    }
      }
      else{
         $_SESSION['message']="<div class='chip red white-text'>Sorry image size must be less than 2mb.</div>";
      header("Location: write.php");

      }
    }
    else
    {
        $_SESSION['message']="<div class='chip red white-text'>Sorry image format is not supported.</div>";
      header("Location: write.php");

    }
    
  }
  ?> 