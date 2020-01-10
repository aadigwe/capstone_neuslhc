
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
    <title>NEU SLHC | Add new patient </title>

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
<a href="admin.php" class ="link-heading-small"><span><i class="fa fa-arrow-left"></i></span>Admin</a>
 
<h4><span><strong>Add New Patient</strong></span></h4>
  <hr> 
<div class="row">
    <div class="col-sm-8">
<form action="" method="post" role="form">
    
<div class="form-group row">
    <label for="firstname" class="col-sm-4 col-form-label">First Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname">
    </div>
  </div>
   
   <div class="form-group row">
    <label for="lastname" class="col-sm-4 col-form-label">Last Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname">
    </div>
  </div>
   
    <div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label">Email Address</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="email" placeholder="patient@gmail.com" name="email">
    </div>
  </div>
    

   

 <div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-sm-4 col-form-label">Select Clinician</label>
    <div class="col-sm-8">
        <select class="form-control" id="clinician" name="clinician">
	<option value="select">--select--</option>
	
	<?php
    require ('mysqli_connect.php'); 

	$sql = "SELECT * FROM users WHERE user_level = 3 ORDER BY username, lastname, user_id";
	$result = mysqli_query($dbcon,$sql);
	while ($row = mysqli_fetch_assoc($result)) {
	    echo "<option value=\"" . $row['user_id'] . "\">" . $row['lastname'] . ", " . $row['username'] . "</option>";
	}
	?>
	
	</select>
    </div>
</div> 
   
<div class="form-group row">
    <label for="exampleFormControlSelect1" class="col-sm-4 col-form-label">Select Supervisor</label>
    <div class="col-sm-8">
        <select class="form-control" id="supervisor" name="supervisor">
	<option value="select">--select--</option>
	
	<?php
    require ('mysqli_connect.php'); 

	$sql = "SELECT * FROM users ORDER BY username, lastname, user_id";
	$result = mysqli_query($dbcon,$sql);
	while ($row = mysqli_fetch_assoc($result)) {
	    echo "<option value=\"" . $row['user_id'] . "\">" . $row['lastname'] . ", " . $row['username'] . "</option>";
	}
	?>
	
	</select>
    </div>
</div>
   
    <button type="submit" name="create_patient" class="btn btn-primary" style="float: right;">Add new patient</button>
  </form>
   
   
    </div>
</div>

<?php
    
    if(isset($_POST['create_patient'])){
        
        $firstname= $_POST['firstname'];
        $lastname= $_POST['lastname'];
        $email= $_POST['email'];
        $clinician= $_POST['clinician'];
        $supervisor= $_POST['supervisor'];
    
    $query = "INSERT INTO patients (firstname, lastname, email, clinician, supervisor, reg_date)";
    $query .= "VALUES ('{$firstname}', '{$lastname}', '{$email}','{$clinician}', '{$supervisor}', now())";
            $create_user_query = mysqli_query($dbcon,$query);
        echo '<div class="alert alert-success col-sm-6"><p class="error">Successfully added user!</p></div>';
        if(!$create_user_query){
            die('QUERY FAILED' . mysqli_error($dbcon));
            echo '<div class="alert alert-danger col-sm-6"><p class="error">Sorry, There was an error in your request. ". mysqli_error($dbcon). "</p></div>';
        }
    }
    
    
?>


</div>

</body>

</html>
