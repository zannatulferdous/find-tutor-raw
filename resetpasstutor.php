
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
$dbname="tutor";
$conn =new mysqli($servername,$username,$password,$dbname);
 if($conn->connect_error){
	die("connection failed:".$conn->connect_error); 
 }
 
  
 
  $userno=$_SESSION["User_ID"];
  if(isset($_POST['reset']))
  {
    $OLD_PASS = $_POST['OLD_PASS'];
    $NEW_PASS1 =$_POST['NEW_PASS1'];
    $NEW_PASS2 =$_POST['NEW_PASS2'];
   $sql = "SELECT * FROM `registration` WHERE `Password` = '$OLD_PASS' AND `User_ID` = '$userno'";
 $query = mysqli_query($conn,$sql);
    $row_count = mysqli_num_rows($query);
    
    if($row_count == 1)
    {
      if(strlen($NEW_PASS1) < 6)
      {
        $mgs = "Password too short! Password Length should be at least 6 characters.";
        $class = "red_color";
      } 
      elseif($NEW_PASS1 == $NEW_PASS2)
      {
        $NEW_PASS =$NEW_PASS1;
        $sql = "UPDATE `registration` SET `Password`= '$NEW_PASS' WHERE `User_ID` = '$userno'";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
          $mgs = "Password Change Successfully!";
          $class = "green_color";
        }
        else
        {
          $mgs = "Password Change Faild!";
          $class = "red_color";
        }
      }
      else
      {
        $mgs = "New Password does not match!";
        $class = "red_color";
      }
    }
    else
    {
      $mgs = "Old Password does not match!";
      $class = "red_color"; 
    }
  }
  else
  {
    $class = "";
    $mgs = "";
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
        </div>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" >
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



</div>
<div class="col-2 right" > 
 <?php 
        
         if($_SESSION["User_ID"]==true){ ?>
              
   <h2>  <?php echo "<br>Tutor: "." ".$_SESSION["Username"];?> </h2>
<br> <br>
<?php }
else{
	
header('location:login.php');

}
?> 
    <br>
    <br>
<h3> RESET PASSWORD</h3><br>
    <p><?=$mgs?></p>
     <form class="cmxform form-horizontal "  method="post"  >
         <table>
             <tr><td>Old Password</td>
                 <td> <input type="password" class=" form-control" name="OLD_PASS"  ></td></tr>
             <tr><td>New Password</td>
                 <td> <input type="password" class=" form-control" name="NEW_PASS1"  ></td></tr>
             <tr><td>Confirm Password </td>
                 <td> <input type="password" class=" form-control"  name="NEW_PASS2" ></td></tr>
             <tr><td></td><td><input type="submit" class="btn btn-primary" name="reset" value="Reset Password" />
                </td></tr>
         </table>
    </form>
                                
</div>

      <footer >
        <p align="center">&copy; Find Tutor 2018</p>
      </footer>
     <!-- /container -->        
        
    </body>
</html>
  
    
       
    
    