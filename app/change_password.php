<!-- Copyright: toggle between password visibility: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_toggle_password -->

<?php
session_start() ;
// Redirect the user if not logged in
if ( !isset( $_SESSION[ 'user_id' ] ) ) {
require ( 'login.php' ) ; load() ; }
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- required meta tags -->
    <meta charset="utf-8">

    <meta name="description" content="Northeastern Speech and Hearing Learning Center">
    <meta name="keywords" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- title -->
    <title>NEU SLHC | VIDEOS </title>

    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Parisienne" rel="stylesheet">


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- style CSS -->
    <link rel="stylesheet" href="css/loginpage.css">

    <!-- responsive CSS -->
    <!-- HOME -->
</head>

<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="65">
<nav class="navbar navbar-grey">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">NEU SLHC</a>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="home.php"><span><i class="fa fa-home"></i></span> Home</a></li>
        </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span><i class="fa fa-user-circle-o"></i></span> Profile</a></li>
      <li><a href="settings.php"><span><i class="fa fa-cog"></i></span> Settings</a></li>
      <li><a href="#"><span><i class="fa fa-sign-in"></i></span> Logout</a></li>
    </ul>
  </div>
</nav>
 
 
  

      
<div class="container homepage">   
<a href="profile.php" class ="link-heading-small"><span><i class="fa fa-arrow-left"></i></span>My Profile</a>
 
<h4><span><strong>Change Your Password</strong></span></h4>
  <hr> 
<div class="row">
    <div class="col-sm-8">
<form action="" method="post" role="form">
   
<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label">Email Address</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="email" placeholder="email address" name="email">
    </div>
  </div>
    
<div class="form-group row">
    <label for="curr_password" class="col-sm-4 col-form-label">Current Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="curr_password" placeholder="current password" name="curr_password">
    </div>
  </div>
  
  
  <div class="form-group row">
    <label for="new-password" class="col-sm-4 col-form-label">New Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="new-password" placeholder="new password" name="new-password">
      <input type="checkbox" onclick="myFunction()"> Show Password
    </div>
    
  </div>
  
  
  <div class="form-group row">
    <label for="confirm-password" class="col-sm-4 col-form-label">Confirm New Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="confirm-password" placeholder="confirm new password" name="confirm-password">
    </div>
  </div>
  
   
    <button type="submit" name="create_user" class="btn btn-danger" style="float: right;">Change Password</button>
  </form>
   
    </div>
</div>

<?php
    require ('mysqli_connect.php'); 
    
    if(isset($_POST['create_user'])){
        
        $username= $_POST['username'];
        $lastname= $_POST['lastname'];
        $email= $_POST['email'];
        $password= $_POST['password'];
        $user_level= $_POST['user_level'];
    
    $query = "INSERT INTO users (username, lastname, email, password,reg_date, user_level)";
    $query .= "VALUES ('{$username}', '{$lastname}', '{$email}', '{$password}',now(),'{$user_level}')";
            $create_user_query = mysqli_query($dbcon,$query);
        if(!$create_user_query){
            die('QUERY FAILED' . mysqli_error($dbcon));
        }
    }
    
    
?>

</div>

<script>
function myFunction() {
  var x = document.getElementById("new-password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>

</html>
