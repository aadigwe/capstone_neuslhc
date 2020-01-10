
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
    <title>NEU SLHC | COMMENTS </title>

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
<a href="admin.php" class ="link-heading-small"><span><i class="fa fa-arrow-left"></i></span> Admin</a>
 
<h4><span><strong>View All Comments</strong></span></h4>
  <hr> 
    <table class="table table-striped table-hover table-bordered table-condensed">
  <thead>
    <tr>
      <th scope="col">Comment ID</th>
      <th scope="col">Author</th>
      <th scope="col">Comment</th>
      <th scope="col">Time from Video (s)</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th scope="col">Video Link</th>
    </tr>
  </thead>
  <tbody>
  
  
  <?php
    require ('mysqli_connect.php'); 
    $query ="SELECT * FROM comments ";
    $select_comments = @mysqli_query ($dbcon, $query);
    
    while($row = mysqli_fetch_assoc($select_comments )){
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author= $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_vidtime = $row['comment_vidtime'];
        $comment_date = $row['comment_date'];
        $time = $row['comment_time'];
        
        echo "<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_content</td>";
        echo "<td>$comment_vidtime</td>";
        echo "<td>$comment_date</td>";
        echo "<td>$time</td>";
        echo "<td><a href='comments.php?source=edit_post&p_id={$comment_id}'>Edit</a></td>";
        echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";

        $query = "SELECT * FROM video_library WHERE video_id = $comment_post_id ";
        $select_video_id_query = @mysqli_query ($dbcon, $query);
        while($row = mysqli_fetch_assoc($select_video_id_query )){
          $video_id = $row['video_id'];
          $video_name = $row['video_name'];
          echo "<td><a href='expand.php?id=$video_id'>$video_name</a></td>";
          
         }
    }
?>

  

  </tbody>
</table>

</div>

</body>

</html>
