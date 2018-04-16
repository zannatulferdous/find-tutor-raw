<?php

 if($_SERVER['REQUEST_METHOD'] == 'POST') {
 	   $Full_Name=$_POST['Full_Name'];
 	 $Email=$_POST['Email'];
         $Phone_Number=$_POST['Phone_Number'];
         $District=$_POST['District'];
	 $Address=$_POST['Address'];
	  $Gender=$_POST['Gender'];
	   $Username=$_POST['Username'];
	    $Password=$_POST['Password1'];
            $UserType=$_POST['UserType'];
      if ($_FILES["IMAGE_URL"]["error"] > 0) {
            $IMAGE_URL = "No .jpg";
            
        } else {
            $IMAGE_URL = time().$_FILES["IMAGE_URL"]["name"];
            move_uploaded_file($_FILES["IMAGE_URL"]["tmp_name"],"upload/" . $IMAGE_URL);
        }
$servername ="localhost";
$username="root";
$password="";
$dbname="Tutor";
$conn =new mysqli($servername,$username,$password,$dbname);
 if($conn->connect_error){
	die("connection failed:".$conn->connect_error); 
 }

 
 $sql="INSERT INTO registration(Full_Name,Email,Phone_Number,District,Address,Gender,Username,Password,UserType,IMAGE_URL) 
 
 VALUES('$Full_Name','$Email','$Phone_Number','$District','$Address','$Gender','$Username','$Password','$UserType','$IMAGE_URL')";
 
 if($conn->query($sql)===TRUE){
	 $message = "Registration complete "; 
         header('location:login.php');
 }
 else{
	 echo "error connecting database:" .$conn->error;
 } 
 
 $conn->close();
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
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link href="css/registration.css" rel="stylesheet" type="text/css">
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
        
<div id="reg">
<form style="align:center" method="post" action="" enctype="multipart/form-data" onsubmit="return checkForm(this);">
    <div id="rg">
<table>
<h2>Registration </h2> 

<?php $message=""; ?>
<tr ><td >Full Name:</td><td><input type="text" name="Full_Name" size="25px" required></td>
 </tr>
<tr> <td>Email Address :</td><td><input type="email" name="Email" size="25px" required></td></tr>
<tr> <td>Phone number:</td> <td><input type="text" name="Phone_Number" size="25px" required></td></tr>
<tr><td>District:
    </td><td><select id="select" name="District" required>
<option> Select District</option>
<option value="Dhaka">Dhaka</option>
<option value="Comilla">Comilla </option>
<option value="Rajshahi">Rajshahi </option>
<option value="Rangpur">Rangpur </option>
<option value="Sylhet"> Sylhet</option>
<option value="Barisal"> Barisal </option>
<option value="Chittagong">Chittagong </option>
<option value="khulna"> khulna </option>
</select></td></tr>
<tr><td>Contact Address:</td><td><textarea id="add" name="Address" rows="5" cols="30" required></textarea></td></tr>
<tr><td>Gender:</td> <td>
<input type="radio" name="Gender" value ="Male" required>Male<br>
<input type="radio" name="Gender" value ="Female" required>Female <br>
</td>
</tr>
<tr><td>Username:</td><td> <input type="text" name="Username"size="25px" required></td></tr>
<tr><td>Password:</td><td><input type="password" name="Password1"size="25px" required></td></tr> 
<tr><td>Confirm Password:</td><td> <input type="password" name="Password2"size="25px" required></td></tr>
<tr><td>User:
 </td><td><select name="UserType" required>
<option> Select User Type</option>
<option value="Parent">Parent </option>
<option value="Tutor"> Tutor </option>
</select></td></tr>
<tr>
  <td>Upload Photo:</td>
  <td> <input class="" id="file" name="IMAGE_URL" type="file"   /></td>
</tr>
<tr><td></td><td><input type="submit" id="submit" name="submit" value="Submit"></td></tr>

</table>
        </div>
</form>
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

