<?php

session_start();
$message="";
$servername ="localhost";
$username="root";
$password="";
$dbname="Tutor";
$conn =new mysqli($servername,$username,$password,$dbname);
 if($conn->connect_error){
	die("connection failed:".$conn->connect_error); 
 }

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?php

include("functions.php");
if(isset($_SESSION["User_ID"])) {
	if(isLoginSessionExpired()) {
		header("Location:tuitionsearch.php");
	} ?>
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">FIND TUTOR</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <a class="navbar-brand" href="index.php">HOME</a>
            </div>
              <div class="form-group">
              <a class="navbar-brand" href="searchtutor.php">TUTOR</a>
            </div>
            <div class="form-group">
                <a class="navbar-brand" href="tuitionsearch.php">TUITION</a>
            </div>
            <div class="form-group">
              <a class="navbar-brand" href="logout.php">LOGOUT</a>
              
            </div>
              <div class="form-group">
                  <?php
                 
         //$user_id=$_SESSION['UserType'];
                  $sql = "SELECT * FROM registration ";
                  $result = $conn->query($sql);
          $row = $result->fetch_assoc();
         $user_id ="  "." ".$row["UserType"];
         
         $SQL= "SELECT * FROM registration WHERE UserType='$user_id' ";
         $Result = $conn->query($SQL);
          $Row = $Result->fetch_assoc();
                  if( '$user_id'==$Row['UserType']){ 
               ?>
                  <a class="navbar-brand" href="Tutor_homepage.php"><?php echo "<br>Hello!"." ".$_SESSION["Username"];?></a>
      
             <?php } 
              else {
             ?>
         <a class="navbar-brand" href="Parent_homepage.php "><?php echo "<br>Hello!"." ".$_SESSION["Username"];?></a>
       
       <?php }
             ?>
                  
                  
            </div>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
       
        <?php
}
 else {
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">FIND TUTOR</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <a class="navbar-brand" href="index.php">HOME</a>
            </div>
              <div class="form-group">
              <a class="navbar-brand" href="searchtutor.php">TUTOR</a>
            </div>
            <div class="form-group">
                <a class="navbar-brand" href="tuitionsearch.php">TUITION</a>
            </div>
              
              <div class="form-group">
              <a class="navbar-brand" href="registration.php">REGISTER</a>
            </div>
            <div class="form-group">
              <a class="navbar-brand" href="login.php">LOGIN</a>
              
            </div>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
  <?php  }    ?>
        
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Looking for a  tutor??</h1>
        <img src="img/tutor.jpg" alt=" " class="img-responsive">
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Are you looking for a home tutor?</h2>
          <p>Just publish a circular and wait for the applications from our listed tutors. 
              You may also search for a qualified tutor directly from our Tutors directory. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Why home tutors?</h2>
          <p>Home tuitions helps students to prepare ahead for their lessons before they start classes.
            Weak students usually suffer because the are nor able to get considerable attention and care from their teachers. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Are you a registered tutor?</h2>
          <p>You are on the way of getting a tuition job.
              Please view our latest circulars regularly and apply for the tuition jobs that match with your skills.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Find Tutor 2018</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
