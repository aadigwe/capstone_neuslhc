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
    <title>NEU SLHC | LOGIN </title>

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


    

    <!--HOME-->
    <section id="home">
        <div id="home-cover" class="bg-parallax">

            <div id="home-content-box">
                <div id="home-content-box-inner">
                    <div class="container">
                        <div class="row content-title">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4 col-md-offset-4 login-container">

                                <div class="login-title">
                                    <h2>NEU SLHC PORTAL</h2>
                                </div>
                                 <div class="row login-content">
                                <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
require ('mysqli_connect.php'); 
if (!empty($_POST['email'])) {
        $e = mysqli_real_escape_string($dbcon, $_POST['email']);
    } else {
    $e = FALSE;
        echo '<p class="error">You forgot to enter your email address.</p>';
    }
    if (!empty($_POST['psword'])) {
            $p = mysqli_real_escape_string($dbcon, $_POST['psword']);
    } else {
    $p = FALSE;
        echo '<p class="error">You forgot to enter your password.</p>';
}
if ($e && $p){
$q = "SELECT user_id, username, user_level FROM users WHERE (email='$e' AND password='$p')"; #(email='$e' AND password=SHA1('$p'))"; 
$result = mysqli_query ($dbcon, $q);
if (@mysqli_num_rows($result) == 1) {
    session_start();
    $_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
    $_SESSION['user_level'] = (int) $_SESSION['user_level'];
    $_SESSION[ 'user_id' ] = $_SESSION['user_id'] ;
    $_SESSION[ 'username' ] = $_SESSION['username'] ;
    $url = ($_SESSION['user_level'] === 1) ? 'home.php' : 'members-page.php'; #? 'admin-page.php' : 'members-page.php';
    header('Location: ' . $url);
    exit();
    mysqli_free_result($result);
    mysqli_close($dbcon);
    
    } else { 
echo '<div class="alert alert-danger"><p class="error">The e-mail address and password entered do not match our records.</p></div>';
    }
    } else { 
    echo '<p class="error">Please try again.</p>';
    }
    mysqli_close($dbcon);
    } 
?>
                                
                                <form action="login.php" method="post">
                                    <div >
                                        <div class="col-md-12">
                                            <h4><span><i class="fa fa-user-circle-o"></i></span> Email Adress</h4>
                                            <input id="email" type="text" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email']))
echo $_POST['email']; ?>" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <h4><span><i class="fa fa-lock"></i></span> Password</h4>
                                            <input id="psword" type="password" name="psword" size="16" maxlength="16" value="<?php if
(isset($_POST['psword'])) echo $_POST['psword']; ?>" class="form-control">
                                        </div>
                                                                                
                                        <div class="col-md-12">
                                            <div id="login-form-btn">
                                                <p><button class="btn-login">Login</button>
                                                </p>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-12">
                                            <div id="login-form-btn">
                                                <p><button class="btn-login"><a href="safer-register-page.php">Sign-Up</a></button></p>
                                            </div>
                                            <div class="col-md-12 formlinks">
                                            <p><a href="#">Forgot password</a></p>
                                            <p><a href="mailto:adigwe.a@husky.neu.edu?subject=Issues loging into the Northeastern SLHC portal">Having Issues Loging in?</a></p>
                                            <p><a href="https://bouve.northeastern.edu/csd/clinic/">About</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </body>

</html>
