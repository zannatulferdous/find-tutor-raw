<?php

session_start();

include("functions.php");
if(isset($_SESSION["User_ID"])) {
	if(isLoginSessionExpired()) {
		header("Location:login.php");
	}
}
$servername ="localhost";
$username="root";
$password="";
$dbname="Tutor";
$conn =new mysqli($servername,$username,$password,$dbname);
 if($conn->connect_error){
	die("connection failed:".$conn->connect_error); 
 }
   $user_id =$_SESSION['User_ID'];
 
 $sql = "SELECT * FROM registration WHERE User_ID='$user_id' ";
         $result = $conn->query($sql);
          $row = $result->fetch_assoc();
    
 ?>
<!DOCTYPE html>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            
        
	</style>
        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        
        <link href="css/profile.css" rel="stylesheet" type="text/css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="js/registration.js"></script>
    </head>
    <body>
        
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">FIND TUTOR</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
            
            <div class="form-group">
                <a class="navbar-brand" href="search_tutuion.php">TUITION</a>
            </div>
            <div class="form-group">
              <a class="navbar-brand" href="logout.php">LOGOUT</a>
              
            </div>
              <div class="form-group">
                  <a class="navbar-brand" href="Tutor_homepage.php"><?php echo "<br>Hello!"." ".$_SESSION["Username"];?></a>
            </div>
          </form>
           
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    
    
    <div class="jumbotron">
      <div class="container">
         <!-- parent works -->
         
         <div class="col-1  left" > 

             <ul> <br> <br>
                 <h3><b> Tutor ACCOUNT</b></h3><li> </li>
     <li> <a href="Tutor_homepage.php">Tutor Profile</a></li>
     <li><a  href="resetpasstutor.php">Reset Password</a></li>
     <li><a href="edit_profile_tutor.php">Edit My Profile</a></li>
            <li><a href="edit_circuler_tutor.php">My Circulars</a></li>
            <li><a href="tutorcircularpage.php">Publish new Circular</a></li>
        </ul>
<table>

</table>


</div>

          <div class="col-2 right"> 
            
             <?php 
        
         if($_SESSION["Username"]==true){ ?>
         
             
             <h2>  <?php echo "<br>welcome user: "." ".$_SESSION["Username"];?>
</h2><br> <br>
             
             <ul>
               <li><br>Full Name :<?php echo " "." ".$row["Full_Name"];?></li>
               <li><br>Email address :<?php echo " "." ".$row["Email"]; ?></li>
               <li><br>Phone/Mobile :<?php echo ""." ".$row["Phone_Number"]; ?></li>
               <li><br>District :<?php echo ""." ".$row["District"]; ?></li>
               <li><br>Contact Address :<?php echo ""." ".$row["Address"];?></li>
               <li><br>Gender:<?php echo ""." ".$row["Gender"]; ?></li>
             </ul>
           
             
     

     <?php
       }
else{
	
header('location:login.php');

}
      ?>
         </div>
             
         
    
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      

      <hr>

      <footer >
        <p align="center">&copy; Find Tutor 2018</p>
      </footer>
    </div> <!-- /container -->        
        
    </body>
</html>
  
    
       
    
    