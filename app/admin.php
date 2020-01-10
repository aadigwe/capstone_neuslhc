
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
    <title>NEU SLHC | ADMIN </title>

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
 
<h4><span>Welcome <strong>Admin</strong>,</span></h4>
  <hr> 
  
  <div class="row">
  
   <div class="actionitem-list col-sm-8">
      <h4><span><i class="fa fa-users"></i></span> Users</h4>
         <hr>
      <ul>
          
          <li><a href="view-allusers.php">Return All Users</a></li>
          <li><a href="add-newusers.php">Add new user (Northeastern Community)</a></li>
          <li><a href="view-allpatients.php">Return All Patients</a></li>
          <li><a href="add_newpatients.php">Add new patient</a></li>
          <li><a href="#">Add temporary user (External)</a></li>
          <li><a href="#"> Change Privileges </a></li>
          <li><a href="#"> Delete User Account</a></li>
          <li><a href="#"> Reassign Supervisors and Clinicians</a></li>
          
       </ul>
   </div>
    
   <div class="actionitem-list col-sm-8">
      <h4><span><i class="fa fa-comment"></i></span> Comments</h4>
         <hr>
      <ul>
          <li><a href="view-allcomments.php">Return All Comments</a></li>
          <li><a href="#"> Delete Comments</a></li>

       </ul>
   </div>
   
       
   <div class="actionitem-list col-sm-8">
      <h4><span><i class="fa fa-folder-open"></i></span> Files</h4>
         <hr>
      <ul>
          <li><a href="view-allvideos.php">Return All Videos</a></li>
          <li><a href="#">Return All Reflection Forms </a></li>
          <li><a href="#">Return All Clinical Treatment Plan</a></li>

       </ul>
   </div>
   

    


  </div>
</div>

</body>

</html>
