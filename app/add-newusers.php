
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
<a href="admin.php" class ="link-heading-small"><span><i class="fa fa-arrow-left"></i></span> Admin</a>
 
<h4><span><strong>Add new user</strong></span></h4>
  <hr> 
<div class="row">
    <div class="col-sm-8">
<form action="" method="post" role="form">
    
<div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">First Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" placeholder="First Name" name="username">
    </div>
  </div>
   
   <div class="form-group row">
    <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname">
    </div>
  </div>
   
    <div class="form-group row">
    <label for="emailaddress" class="col-sm-2 col-form-label">Email Address</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="emailaddress" placeholder="username@husky.neu.edu" name="email">
    </div>
  </div>
    
    <div class="form-group row">
    <label for="genPassword" class="col-sm-2 col-form-label"><button onclick="passwordGen()" type="button" class="btn btn-default">Generate </button></label>
    <div class="col-sm-10">
      <input type="text" id='genPassword' class="form-control" name="genPassword" placeholder="password" >
    </div>
  </div>
   
<div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Select User Level</label>
    <div class="col-sm-10">
    <select class="form-control" id="exampleFormControlSelect1" name="user_level">
      <option value=4>Undergrad</option>
      <option value=3>Graduate Student</option>
      <option value=2>Supervisor</option>
      <option value=1>Admin</option>
      <option value=5>Visitor</option>
    </select>
        </div>
  </div>
   
    <button type="submit" name="create_user" class="btn btn-primary" style="float: right;">Add new user</button>
  </form>
   
   


<?php
    require ('mysqli_connect.php'); 
    
    if(isset($_POST['create_user'])){
        
        $username= $_POST['username'];
        $lastname= $_POST['lastname'];
        $email= $_POST['email'];
        $password= $_POST['genPassword'];
        $user_level= $_POST['user_level'];
    
    $query = "INSERT INTO users (username, lastname, email, password,reg_date, user_level)";
    $query .= "VALUES ('{$username}', '{$lastname}', '{$email}', SHA1('$password'),now(),'{$user_level}')";
            $create_user_query = mysqli_query($dbcon,$query);
        echo '<div class="alert alert-success col-sm-6"><p class="error">Successfully added user!</p></div>';
        if(!$create_user_query){
            die('QUERY FAILED' . mysqli_error($dbcon));
            echo '<div class="alert alert-danger col-sm-6"><p class="error">Sorry, There was a error in your request.</p></div>';
        }
    }
    
    
?>
    </div>
</div>
<!-- Source Random Password generator: https://stackoverflow.com/questions/9719570/generate-random-password-string-with-requirements-in-javascript/9719815
 -->
<script>
function passwordGen() { 
    var randomstring = Math.random().toString(36).slice(-8);
    document.getElementById("genPassword").value = randomstring;
}    
    
</script>

</div>

</body>

</html>
