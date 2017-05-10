<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: dashboard2.php");
 }
 include_once 'config.php';

$nameError = "";
$emailError = "";
$passError = "";
 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysqli_query($db,$query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
   $res = mysqli_query($db,$query);
    
   if ($res) {

    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
    header("Location: login.php");
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
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

        

        <link rel="stylesheet" href="intl/build/css/intlTelInput.css">
		
		
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
							    <h4 class="text-center" ><strong>TRY AppTech FREE FOR 14 DAYS</strong></h4>
							    <div class="text-center" >Let's start to use your time efficiently!</div>
							    <div style="margin-bottom: 10px;" class="loginpage-email-error"></div>
							    <form id="login"  method="post" accept-charset="UTF-8" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
							        <input type="text" name="name" placeholder="Enter full name" >
							        <span class="text-danger" > <?php echo $nameError; ?> </span>
							        <input type="email" name="email" id="loginpage-email" value="" placeholder="E-mail"><span class="text-danger" ><?php echo $emailError; ?></span>
							        <input type="password" name="pass" id="loginpage-password" value="" placeholder="Password"><span class="text-danger" ><?php echo $passError; ?></span>
							        
						            <!-- <input type="tel" id="registerpage-phone" > -->
						            <div style="height:20px;" ></div>
									<div class="col-md-offset-1 col-xs-12 col-md-6 ">
							    		<button name="btn-signup" class="btn">START YOUR FREE TRIAL!</button>
									</div>
								</form>
							</div>
							<hr>
							<div class="row">
							    <div class="col-xs-12 text-center">
							        Do you have a Prisync account? <a href="login.html" >Sign in</a><br>
							       <div id="register-tos-pp" >
							       	By registering, you agree to our <a href="">terms of service</a> and <a href="">privacy policy</a>. We'll occasionally send you account related emails.
							       </div>
							    </div>
							</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</main>


		
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="intl/build/js/intlTelInput.min.js"></script>
<script>
$("#registerpage-phone").intlTelInput({
  initialCountry: "auto",
  geoIpLookup: function(callback) {
    $.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "";
      callback(countryCode);
    });
  },
  utilsScript: "intl/build/js/utils.js",
  	 
});

</script>
</body>
</html>
<?php ob_end_flush(); ?>