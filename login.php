<?php
 ob_start();
 session_start();
 require_once 'config.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: dashboard2.php");
  exit;
 }
 
 $nameError = "";
 $passError = "";
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
  
   $res=mysqli_query($db,"SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
   $row=mysqli_fetch_array($res);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: dashboard2.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }
  
 }
?>

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Apptech</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
    ============================================ -->    
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
     
    <!-- Bootstrap CSS
    ============================================ -->    
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font-awesome CSS
    ============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- material-design CSS
    ============================================ -->
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <!-- magnific-popup CSS
    ============================================ -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <!-- venobox CSS
    ============================================ -->
        <link rel="stylesheet" href="css/venobox.css">
    <!-- meanmenu CSS
    ============================================ -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- slick CSS
    ============================================ -->
        <link rel="stylesheet" href="css/slick.css">
    <!-- owl.carousel CSS
    ============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css"> 
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
    ============================================ -->
        <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
    ============================================ -->
        <link rel="stylesheet" href="css/normalize.css">
    <!-- main CSS
    ============================================ -->
        <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
    ============================================ -->
        <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
    ============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        
        <!-- Style customizer (Remove these two lines please) -->
        <link rel="stylesheet" href="css/color/color-5.css">
        
    <!-- modernizr JS
    ============================================ -->    
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

<body class="login" >
      <header>
        <div style="margin: auto;" >
          <a href="#"><img src="img/logo/logo.png"/></a>
        </div>
      </header>
      <main id="main" >
        <div class="container" >
          <div class="row" >
            <div class="col-xs-12 col-md-4 col-md-offset-4" >
              <div class="container-fluid">
                <div class="col-xs-12" id="login-panel" >
                  <h1 class="text-center" ><strong>AppTech Login</strong></h1>
                  <?php if (isset($errMSG)) {
                    ?>
                  <div class="alert-login alert-danger" >
                    <span class="zmdi zmdi-info" ></span> Incorrect Credentials, Try again...
                  </div>
                  <?php
                  } ?>
                  <div class="loginpage-email-error"></div>
                  <form id="login"  method="post" accept-charset="UTF-8">
                      <input type="email" name="email" id="loginpage-email" value="" placeholder="E-mail">
                      <span class="text-danger" ><?php echo $nameError; ?></span>
                      <input type="password" name="pass" id="loginpage-password" value="" placeholder="Password">
                      <span class="text-danger" ><?php echo $passError; ?></span>
                      <div style="height:10px;" ></div>
                  <div class="col-md-offset-4 col-xs-12 col-md-6 right">
                      <button name="btn-login" class="btn"  >Sign In</button>
                  </div>
                </form>
              </div>
              <hr>
              <div class="row">
                  <div class="col-xs-12 text-center">
                      Did you forget your password? <a >Click Here!</a><br>
                      Don't you have a Prisync account? <a href="">Register</a> today.
                  </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </main>
</body>
</html>
<?php ob_end_flush(); ?>
