
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
    <title>NEU SLHC | HOME </title>

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
      <a class="navbar-brand" href="#">NEU SLHC</a>
            <ul class="nav navbar-nav navbar-right">
      <li><a href="home.php"><span><i class="fa fa-home"></i></span> Home</a></li>
        </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span><i class="fa fa-user-circle-o"></i></span> Profile</a></li>
      <li><a href="#"><span><i class="fa fa-cog"></i></span> Settings</a></li>
      <li><a href="#"><span><i class="fa fa-sign-in"></i></span> Logout</a></li>
    </ul>
  </div>
</nav>
 
 
  

      
<div class="container homepage">   
 
       <h4><span><strong>Observations</strong></span></h4>
       
  <hr> 
  <div class="row">
    
    <div class="col-sm-4">
     <a href="add_newrecording.php">
      <div class="home-icon">
       <div class = "innerbox">
        <span><i class="fa fa-plus-circle"></i></span>
        <p>Start a new observation</p>
          </div>
      </div>
        </a>
    </div> 
    
    <div class="col-sm-4">
     <a href="recordingrooms.php">
      <div class="home-icon">
       <div class = "innerbox">
        <span><i class="fa fa-arrow-circle-right"></i></span>
        <p>Watch an ongoing session</p>
          </div>
      </div>
        </a>
    </div> 
     
    <div class="col-sm-4">
     <a href="streaming.php">
      <div class="home-icon">
       <div class = "innerbox">
        <span><i class="fa fa-video-camera"></i></span>
        <p>Demo Room (LIVE)</p>
          </div>
      </div>
        </a>
    </div> 
      
    

  </div>
</div>

</body>

</html>
