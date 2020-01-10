
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
    <title>NEU SLHC | USERS </title>

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
 
<h4><span><strong>View All Patients</strong></span></h4>
  <hr> 
    <table class="table table-striped table-hover table-bordered table-condensed">
  <thead>
    <tr>
      <th scope="col">Patient ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Clinician</th>
      <th scope="col">Supervisor</th>
      <th scope="col">Date Addedd</th>
      <th scope="col">Modify</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  
  
  <?php
    require ('mysqli_connect.php'); 
    $query ="SELECT * FROM patients ";
    $select_patients = @mysqli_query ($dbcon, $query);
    
    while($row = mysqli_fetch_assoc($select_patients)){
        $patient_id = $row['patient_id'];
        $firstname = $row['firstname'];
        $lastname= $row['lastname'];
        $email = $row['email'];
        $clinician = $row['clinician'];
        $supervisor = $row['supervisor'];
        $reg_date = $row['reg_date'];
        
        
        echo "<tr>";
        echo "<td>$patient_id</td>";
        echo "<td>$firstname</td>";
        echo "<td>$lastname</td>";
        echo "<td>$email</td>";
        echo "<td>$clinician</td>";
        echo "<td>$supervisor</td>";
        echo "<td>$reg_date</td>";
        echo "<td><a href='comments.php?delete={$patient_id}'>Modify</a></td>";
        echo "<td><a href='comments.php?delete={$patient_id}'>Delete</a></td>";

    }
?>

  

  </tbody>
</table>

</div>

</body>

</html>
