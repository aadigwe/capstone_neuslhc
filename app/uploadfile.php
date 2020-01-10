
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
    <title>NEU SLHC | UPLOAD </title>

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
<a href="home.php" class ="link-heading-small"><span><i class="fa fa-arrow-left"></i></span> Home</a>
 
<h4><span><strong>Upload File</strong></span></h4>
  <hr> 
<div class="row">
    <div class="col-sm-8">
<form action="upload.php" method="post" role="form" enctype="multipart/form-data">
    
<div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Select Session</label>
    <div class="col-sm-10">
        <select class="form-control" id="exampleFormControlSelect1" name="user_level">
        <option value="select">--select--</option>
        
          	<?php
        require ('mysqli_connect.php'); 

        $sql = "SELECT * FROM video_library ORDER BY video_id";
        $result = mysqli_query($dbcon,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value=\"" . $row['video_id'] . "\">" . $row['video_name'] . "</option>";
        }
	   ?>
      
    </select>
    </div>
</div>
  
<div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Type of File</label>
    <div class="col-sm-10">
        <select class="form-control" id="exampleFormControlSelect1" name="user_level">
      <option value=1>Video</option>
      <option value=2>Recorded Session</option>
      <option value=3>Reflection</option>
    </select>
    </div>
</div>
 
 <div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Select File</label>
    <div class="col-sm-10">
        <button type="submit" class="btn btn-default">Select File</button>
    </div>
</div>
  

   
    <button type="submit" name="create_user" class="btn btn-danger" style="float: right;">Upload File</button>
  </form>
   
   
    </div>
</div>

<?php
    
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

</body>

</html>
