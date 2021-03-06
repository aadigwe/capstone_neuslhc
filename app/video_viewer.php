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
    <title>NEU SLHC | VIEWER </title>

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
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="65">

<!--Video Navbar -->
<nav class="navbar navbar-inverse containerfluid">
    <div class="container-fluid">
           <div class="navbar-header">
      <a class="navbar-brand" href="#">NEU SLHC</a>
            <ul class="nav navbar-nav navbar-right">
      <li><a href="home.php"><span><i class="fa fa-home topbar-icon"></i></span>Home</a></li>
        </ul>
    </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span><i class="fa fa-file-text topbar-icon"></i></span>Information</a></li>

        <li><a href="#" data-toggle="modal" data-target="#addcommentModalLong"><span><i class="fa fa-bookmark topbar-icon"></i></span>Markers</a></li>
            <li><a href="#"><span><i class="fa fa-file-pdf-o topbar-icon"></i></span>Export</a></li>
            <li><a href="#"><span><i class="fa fa-link topbar-icon"></i></span>Share</a></li>
            <li><a href="#"><span><i class="fa fa-download topbar-icon"></i></span>Download</a></li>
        </ul>
        
    </div>
</nav>

<div class="container-fluid">

<div class="row">
   <!-- VIDEO SECTION -->
    <div class="col-xs-12 col-md-8">
      <h3>Video Section</h3>
          <div>
        <video id="myVideo" style="width:100%; height:100%" controls>
                <?php
        if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;
        require ( 'mysqli_connect.php' ) ;
        $q = "SELECT * FROM video_library WHERE video_id = $id" ;
        $result = mysqli_query($dbcon, $q);
        if ( mysqli_num_rows( $result ) == 1 )
        {
           $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
             echo
     '<source src=" '. $row['video_thumbnail'] .' " type="video/mp4"> Your browser does not support HTML5 video.';
        }else
        {
        echo '<p>Apologies, Video is currently unavailable</p>';
        }     
        mysqli_close($dbcon);
        ?>
                        </video>
    </div>
    </div>
    
    <!-- COMMENT SECTION -->
    <div class="col-xs-12 col-md-4">
      <h3>Comment Section</h3>
    <div class="container-comment">
    <a href="#" class="span-right"><span><i class="fa fa-pencil-square-o topbar-icon"></i></span>Edit</a>
    <h5>Supervisor Amy</h5>      
     <p>Pay close attention to his head gestures</p>
      <span class="span-left">Posted on 03/12/19 by 11:01a.m </span>
    <a href="#" class="span-right"><span><i class="fa fa-reply topbar-icon"></i></span>Reply</a>
    </div>
     
    <div class="container-comment">
    <a href="#" class="span-right"><span><i class="fa fa-cog topbar-icon"></i></span>Edit</a>
    <h5>Student Nate</h5>      
     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      <span class="span-left">Posted on 03/18/19 by 2:01p.m </span>
        <a href="#" class="span-right"><span><i class="fa fa-reply topbar-icon"></i></span>Reply</a>
        
    </div>
     
             <!--    NEW  COMMENT  -->
        <form action="action_page.php">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="New Comment" name="search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                    <i class="fa fa-plus"></i></button>
                </div>
            </div>
            
       
        </form>
        <!--    text -area NEW  COMMENT  
        <form action="action_page.php">
            <div class="input-group">
                <textarea class="form-control" aria-label="With textarea"></textarea>
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                    <i class="fa fa-plus"></i></button>
                </div>
            </div>
            
       
        </form>
        
        * -->

      
    </div>
    
</div>
<h1>Hi Test!</h1>
     
     
<!-- ADD COMMENT Modal -->
<div class="modal fade" id="addcommentModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Add new comment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <h4>Video you,s.3/14/19@2:15</h4>
        <p>Time from video: 10:14</p>
        <div class="form-group">
          <label for="comment">Comment:</label>
          <textarea class="form-control" rows="3" id="comment"></textarea>
        </div>
      </div>
      <div class="modal-footer">
       <button class="btn btn-default" type="submit">Add comment</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      
</div> 
</body>


</html>
