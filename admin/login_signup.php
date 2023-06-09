<?php
  include "includes/header.php";
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
</head>
<body style="background-color: black;background-image: url(../img/bg.jpg);background-size: cover;">

  <div class="row" >
    <div class="col l6 offset-l3 m8 offset-m2 s12">
      <div class="card-panel center " style=" margin-bottom: 0px;
  background-image: url(../img/bg.jpg);" >
        <ul class="tabs" style="background-image: url(../img/bg.jpg);">
          <li class="tab"><a href="#signup" class="white-text" ><h5>SIGNUP</h5></a></li>
          <li class="tab"><a href="#login" class="white-text" ><h5>LOGIN</h5></a></li>
        </ul>
      </div>
    </div>

     <!--signup area-->
    <div class="col l6 offset-l3 m8 offset-m2 s12" id="signup">
      <div class="card-panel center" style="margin-top: 1px; background-image: url(../img/img1.jpg); background-size: cover; height: 550px;">
        <div style="margin-top: 100px;">
           <?php
            if (isset($_SESSION['message']))
            {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            }

          ?>
          <form action="signup.php" method="POST">
            <div class="input-field white-text">
            <input type="email" name="email" placeholder="Enter Your Email" class="validate white-text">
            <span class="helper-text" data-error="Invalid Email" data-success="Valid Email"></span>
            </div>
            <div class="input-field">
            <input type="text" name="username" placeholder="Enter Your Username" class="white-text">
            </div>

            <div class="input-field">
            <input type="password" name="password" placeholder="Enter Your Password" class="white-text">
            </div>  
            <input type="submit" name="signup" value="signup" class="btn red">
          </form>
        </div>
      </div>
    </div>

    <!--login area-->
    <div class="col l6 offset-l3 m8 offset-m2 s12" id="login">
      <div class="card-panel center" style="margin-top: 1px; background-image: url(../img/img1.jpg); background-size: cover;  height: 550px;">
        <div style="margin-top: 100px;">
          <form action="login.php" method="POST">
          <div class="input-field">
          <input type="text" name="username" placeholder="Enter Your username" class="white-text">
          </div>
          <div class="input-field">
          <input type="password" name="password" placeholder="Enter Your password" class="white-text">
          </div>  
          <input type="submit" name="login" value="LOGIN" class="btn red">
          </form>
          </div>
      </div>
    </div>
   
  </div>

<?php
  include "includes/footer.php";
?>

