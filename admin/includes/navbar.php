<?php
include"header.php";
if (isset($_SESSION['username'])) 
  { 
?>


<!DOCTYPE html>
<html>
<head>

  <!--Font Awesome-->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <!--Import google font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize css-->
  <link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen,projection"/>

  <link rel="stylesheet" type="text/css" href="../css/materialize.css">  
  <style>
    footer,header,.main{
      padding-left: 300px;
    }
      @media (max-width : 992px)
     {
      header,footer,.main{
        padding-left: 0;
      }
    }

  </style>
</head>
<body>

    <nav class="black">
      <div class="nav-wrapper">
        <div class="container">
          <a href="" class="brand-logo center">SPACE BUDDY</a>
          <a href="" class="sidenav-trigger" data-target="sidenav"><i class="material-icons">menu</i></a>
        </div>
      </div>
    </nav>

    <ul class="sidenav sidenav-fixed" id="sidenav">
      <li>
        <div class="user-view">
          <div class="background">
            <img src="../img/bg.jpg" class="responsive-img">
          </div>
           <a href=""><img class="circle" src="../img/admin.jpg"></a>
           <span class="name white-text"><?php echo $_SESSION['username']; ?></span>
           <span class="email white-text">
             <?php
             $user = $_SESSION['username'];
              $sql="select email from users where username = '$user'";
              $res = mysqli_query($conn,$sql);
              $row = mysqli_fetch_assoc($res);
              echo $row['email'];
             ?>
           </span>
        </div>
      </li>
      <li><a href="dashboard.php"><i class="material-icons">dashboard</i>Dashboard</a></li>
      <li><a href="post.php"><i class="material-icons">books</i>Posts</a></li>
      <li><a href="image.php"><i class="material-icons">images</i>Images</a></li>
      <li><a href=""><i class="material-icons">comments</i>Comments</a></li>
      <li><a href="setting.php"><i class="material-icons">settings</i>Account</a></li>
      <div class="divider"></div>  
      <li><a href="logout.php"><i class="material-icons">logout</i>Logout</a></li>      
    </ul>

<?php


}
else{
  $_SESSION['message']="<div class='chip close red black-text'>Please,Login to Continue </div>";
    header("Location: ../login_signup.php");
}
?>