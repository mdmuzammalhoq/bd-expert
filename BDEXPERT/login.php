<?php
  include '../lib/session.php';
    Session::checkLogin();
  include '../lib/config.php';
  include '../lib/database.php';
  include '../lib/helpers.php';

  $db = new Database();
  $fm = new Format();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>BD Expert</title>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $email = $fm -> validation($_POST['email']);
      $password = $fm -> validation(md5($_POST['password']));

      $email = mysqli_real_escape_string($db->link, $email);
      $password = mysqli_real_escape_string($db->link, $password);

      $query = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'";
      $result = $db->select($query);
      if($result){
        $value = mysqli_fetch_array($result);
        $row = mysqli_num_rows($result);
        if($row > 0){

          Session::set("login", true);
          Session::set("email", $value['email']);
          Session::set("password", $value['password']);
          header("Location:index.php");
          
        }else{
          echo "<span style ='color: red; font-size=18px; '>No Result Found !!</span>";
        } 
        }else{
          echo "<span style ='color: red; font-size=18px; '>Username or Password Not Matched !!</span>";
      }
    }
  ?>

  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>BD EXPERT</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" name="email" type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" name="password" type="password" placeholder="Password">
          </div>
          
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
       
      </div>
    </section>
  </body>
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/pace.min.js"></script>
  <script src="js/main.js"></script>
</html>