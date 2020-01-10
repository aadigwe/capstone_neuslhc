
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
    <title>NEU SLHC | Profile </title>

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
      <li><a href="profile.php"><span><i class="fa fa-user-circle-o"></i></span> Profile</a></li>
      <li><a href="settings.php"><span><i class="fa fa-cog"></i></span> Settings</a></li>
      <li><a href="#"><span><i class="fa fa-sign-in"></i></span> Logout</a></li>
    </ul>
  </div>
</nav>
 
 
  

      
<div class="container homepage">   
 
<h4><span><i class="fa fa-user-circle-o"></i></span> <strong>My Profile</strong></h4>
  <hr> 
  
  <div class="row">
  
   <div class="actionitem-list col-md-8">

      <ul>
       
<?php
    require ('mysqli_connect.php'); 
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE user_id = $user_id ";
        $select_username = @mysqli_query ($dbcon, $query);
        while($row = mysqli_fetch_assoc($select_username)){
          $comment_author = $row['username'] . ' ' . $row['lastname'];
          echo '<li><span>Name: <strong>' .$comment_author. '</strong></span></li>';
            
            echo '<li><span>Supervisor: <strong>' .$comment_author. '</strong></span></li>';
            
            echo '<li><span>Patient: <strong>' .$comment_author. '</strong></span></li>';
         }
          ?>

       </ul>
   </div>
    
   <div class="actionitem-list col-md-8">
      <h4><span><i class="fa fa-th-list"></i></span> My Playlists</h4>
         <hr>
      <ul>
          <li><a href="view-allcomments.php">My Playlists</a></li>
          <li><a href="#">Create new playlist</a></li>

       </ul>
   </div>
   
       
   <div class="actionitem-list col-md-8">
      <h4><span><i class="fa fa-folder-open"></i></span> Files</h4>
         <hr>
      <ul>
          <li><a href="#">My Reflection Forms </a></li>
          <li><a href="#">My Clinical Treatment Plan</a></li>
          
       </ul>
   </div>
   
   
   
      <div class="actionitem-list col-md-8">
      <h4><span><i class="fa fa-cog"></i></span> Settings</h4>
         <hr>
      <ul>
          <li><a href="change_password.php" style="color:#C92F2B;"> Change Password </a></li>

       </ul>
   </div>
   

    


  </div>
</div>

</body>

</html>
