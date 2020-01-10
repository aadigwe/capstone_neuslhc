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
    <title>NEU SLHC | LIBRARY </title>

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
 <form action="/hms/accommodations" method="GET"> 
   <div class="row">
    <div class="col-xs-6 col-md-8">
      <p>Search</p>
       </div>
           <div class="col-xs-6 col-md-4">
           <p>Sort By:</p>
       </div>
     </div>
  <div class="row">
    <div class="col-xs-6 col-md-8">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" id="txtSearch"/>
        <div class="input-group-btn">
          <button class="btn btn-primary" type="submit">
            <span><i class="fa fa-search"></i></span>
          </button>
        </div>
      </div>
    </div>

        <div class="col-xs-6 col-md-4">
  <div class="form-group">
    <!--label for="exampleFormControlSelect1"></label-->
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Patient ID</option>
      <option>Date Added</option>
      <option>Duration</option>
      <option>Supervisor</option>
      <option>Semester</option>
    </select>
  </div>
    </div>

    
  </div>
</form>




 
<div class="row">
<?php
require ('mysqli_connect.php'); 
$q = "SELECT video_id, video_name, video_thumbnail, description, date_added FROM video_library ORDER BY video_id ASC";
$result = @mysqli_query ($dbcon, $q);
if ($result) { // If it ran OK, display the records

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 echo
     '<div class="col-sm-3">
    <div class="video-card">
        <video id="myVideo" style="width:100%" >
                             <source src=" '. $row['video_thumbnail'] .' " type="video/mp4">
                              Your browser does not support HTML5 video.
                        </video>
         <div class="video-info-card">
        <p>'. $row['video_name'] .'</p>
        <p>'. $row['date_added'] .'</p>
        <div class="videolist-icon">
        <p>
        
        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Share"><i class="fa fa-share"></i></a>
        
        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Add to Playlist"><i class="fa fa-thumb-tack"></i></a>
        <a href="#" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-info"></i></a>
        
        <a href="expand.php?id=' . $row['video_id'] . '" data-toggle="tooltip" data-placement="bottom" title="Expand Window"><i class="fa fa-expand"></i></a>
        
        </p>
        </div>
        </div>
    </div>
    
    </div>
    
    ';
    }
    
    mysqli_free_result ($result); 
} else 
{
echo '<p>There are currently no videos in the library</p>';
} 
mysqli_close($dbcon); 
?>
    
    
    </div>  

  
  <!--- Paignation --->
      <div class="row page-paignation">
     <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
      </div>


<!-- INFO Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Video Info</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <h4>Video you,s.3/14/19@2:15</h4>
        <p>Superviser: Sarah Young</p>
        <p>Clinician: Jane Doe</p>
        <p>Patient: Amy Van</p>
        <p>Room: 503D</p>
        <p>Date: 2019-03-16 15:55:31</p>
        <p>Description: This is the description for video 4</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</div>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
</html>
