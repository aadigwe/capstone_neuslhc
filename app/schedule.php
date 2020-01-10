
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

 
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">NEU SLHC </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span><i class="fa fa-user-circle-o"></i></span> Profile</a></li>
      <li><a href="settings.php"><span><i class="fa fa-cog"></i></span> Settings</a></li>
      <li><a href="#"><span><i class="fa fa-sign-in"></i></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
      
<div class="container homepage"> 
<a href="home.php" class ="link-heading-small"><span><i class="fa fa-arrow-left"></i></span> Home</a>
<h4><i class="fa fa-calendar-plus-o"></i> Add new schedule</h4>
  <hr>
       <p>Create new schedule</p>
       <div class="row">
<form action="" method="post" role="form">
  <div class="form-row">
       <div class="form-group col-md-4">
      <label for="inputState">Supervisor</label>
      <select id="supervisor" class="form-control" name="supervisor">
        <option value="select">--select--</option>
	
    	<?php
        require ('mysqli_connect.php'); 

        $sql = "SELECT * FROM users WHERE user_level = 2 ORDER BY username, lastname, user_id";
        $result = mysqli_query($dbcon,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value=\"" . $row['user_id'] . "\">" . $row['lastname'] . ", " . $row['username'] . "</option>";
        }
	   ?>
      </select>
    </div>
    
        <div class="form-group col-md-4">
      <label for="inputState">Clinician</label>
      <select id="clinician" class="form-control" name="clinician">
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
    
<div class="form-group col-md-4">
      <label for="inputState">Patient</label>
      <select id="patient" class="form-control" name="patient">
        	<option value="select">--select--</option>
	
            <?php

            $sql = "SELECT * FROM patients ORDER BY firstname, lastname, patient_id";
            $result = mysqli_query($dbcon,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=\"" . $row['patient_id'] . "\">" . $row['lastname'] . ", " . $row['firstname'] . "</option>";
            }
            ?>
	
      </select>
    </div>

<div class="form-group col-md-4">
      <label for="inputState">Room</label>
    <select class="form-control" id="room" name="room">
     <option selected>--select--</option>
      <option value=1>502A</option>
      <option value=2>502B</option>
      <option value=3>502C</option>
      <option value=4>502D</option>
      <option value=5>503A</option>
      <option value=6>503B</option>
      <option value=7>503C</option>
      <option value=8>503D</option>
    </select>
    </div>
    
    
    <div class="form-group col-md-4">
      <label for="inputState">Date</label>
        <input type="date" name="date" class="form-control">
    </div>
   
       <div class="form-group col-md-4">
      <label for="inputState">Time</label>
        <input type="time" name="time" class="form-control">
    </div>
   

   <div class="form-group col-md-4">
      <label for="inputState">Occurence</label>
    <select class="form-control" id="recurring" name="recurring">
     <option selected>--select--</option>
      <option value=Once>Once</option>
      <option value=Weekly>Weekly</option>
      <option value=Monthly>Monthly</option>
    </select>
    </div>
    
    <div class="row">
    <div class="form-group col-md-12">
      <button type="submit" name="create_schedule" class="btn btn-primary" style="float: right;">Add new schedule</button>
      </div>
      </div>

  </div>


</form>




</div>
 <br>


  <h4><i class="fa fa-calendar"></i> Existing Schedules</h4> 
  <hr> 
    <table class="table table-striped table-hover table-bordered table-condensed">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Room</th>
      <th scope="col">Patient</th>
      <th scope="col">Clinician</th>
      <th scope="col">Supervisor</th>
      <th scope="col">Occurence</th>
      <th scope="col">Modify</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  
  
  <?php
    $query ="SELECT schedule.schedule_id, schedule.room, schedule.date, schedule.time, patients.lastname, users.username FROM schedule 
    JOIN patients 
        ON schedule.patient_id=patients.patient_id
    JOIN users 
        ON schedule.clinican_id=users.user_id    
        ";
    $select_schedule = @mysqli_query ($dbcon, $query);
    
    while($row = mysqli_fetch_assoc($select_schedule)){
        $schedule_id = $row['schedule_id'];
        $lastname = $row['lastname'];
        $username  = $row['username'];
        $room = $row['room'];
        $date = $row['date'];
        $time = $row['time'];
        
        echo "<tr>";
        echo "<td>$date</td>";
        echo "<td>$time</td>";
        echo "<td>$room</td>";
        echo "<td>$lastname</td>";
        echo "<td>$username</td>";

        echo "<td><a href='comments.php?delete={$schedule_id }'>Modify</a></td>";
        echo "<td><a href='comments.php?delete={$schedule_id }'>Delete</a></td>";

    }
      
?>
  

  </tbody>
</table>


<?php
    
    if(isset($_POST['create_schedule'])){        

        $supervisor= $_POST['supervisor'];
        $clinician= $_POST['clinician'];
        $patient= $_POST['patient'];
        $room= $_POST['room'];
        $date= $_POST['date'];
        $time= $_POST['time'];
        //$recurring= $_POST['$recurring'];
    
    $query = "INSERT INTO schedule (supervisor_id, clinican_id, patient_id, room, date, time)";
    $query .= "VALUES ('{$supervisor}', '{$clinician}', '{$patient}','{$room}', '{$date}','{$time}')";
        
            $create_schedule_query = mysqli_query($dbcon,$query);
        if(!$create_schedule_query){
            die('QUERY FAILED' . mysqli_error($dbcon));
        }
    }
    
    
?>

</div>

</body>


</html>
