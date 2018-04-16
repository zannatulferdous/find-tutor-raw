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
if(isset($_REQUEST["Submit"]))
{
$Username=$_REQUEST["Username"];	
$Password=$_REQUEST["Password"];	
$sql="select * from registration where Username='$Username' && Password='$Password'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($row['Username']==$Username&&$row['Password']==$Password){
	$_SESSION["Username"]=$Username;
        $_SESSION["User_ID"] =$row[User_ID];
        
	$_SESSION['last_activity'] = time();  
        if($row['UserType']=='Tutor'){
        header('location:Tutor_homepage.php');}
        else if($row['UserType']=='Parent') {
             header('location:Parent_homepage.php');}
            else if($row['UserType']=='admin') {
             header('location:admin.php');}
             
 }
 else{
	$message = "Invalid Username or Password!"; 
	 
 }
 
}
if(isset($_SESSION["User_ID"])) {
    
}

if(isset($_GET["session_expired"])) {
	$message = "Login Session is Expired. Please Login Again";
}
?>
<!DOCTYPE html>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link href="css/login.css" rel="stylesheet" type="text/css">
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
              <a class="navbar-brand" href="index.html">HOME</a>
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

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
           
<div id="main">
<div id="login">
<h2 text-align="center">LOGIN</h2>
<form action="" method="post" >

<label>UserName :</label>
<input type="text" name="Username"size="25px" required >
<label>Password :</label>
<input type="password" name="Password"size="25px" required>
<input style="width:25px;height:14px;padding:5px;" type="checkbox" name="remember" value="1"><b style="color:black;">Remember Me</b>
      
<input type="submit" id="submit" name="Submit" value="Submit">
<label>Not yet registered?</label> <a href="registration.php">Register Now</a></a>
</form>
</div>
</div>
   
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      

      <hr>

      <footer>
        <p>&copy; Find Tutor 2018</p>
      </footer>
    </div> <!-- /container -->        <
        
    </body>
</html>

