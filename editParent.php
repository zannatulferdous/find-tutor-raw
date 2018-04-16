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
   $userno=$_SESSION["User_ID"];
   $sql = "SELECT * FROM registration WHERE `User_ID`='$userno' ";
  
         $row = $conn->query($sql);
          $row = $row->fetch_assoc();


  if(isset($_POST['update'])) {
     $Full_Name=$_POST['Full_Name'];
      $Email=$_POST['Email'];
      $Phone_Number=$_POST['Phone_Number'];
      $District=$_POST['District'];
     $Address=$_POST['Address'];
      $Gender=$_POST['Gender'];
     $UserType=$_POST['UserType'];
      if ($_FILES["IMAGE_URL"]["error"] > 0) {
            $IMAGE_URL = $_POST['IMAGE_URL'];
            
        } else {
            $IMAGE_URL = time().$_FILES["IMAGE_URL"]["name"];
            move_uploaded_file($_FILES["IMAGE_URL"]["tmp_name"],"upload/" . $IMAGE_URL);
        }

    $SQL="UPDATE `registration`  SET Full_Name='$Full_Name' , Email='$Email', Phone_Number= '$Phone_Number', District='$District', Address='$Address', Gender='$Gender', UserType='$UserType', IMAGE_URL='$IMAGE_URL' WHERE `User_ID`='$userno'";
      $query=mysqli_query($conn,$SQL);
      header('location:editParent.php');
       $message="successfuly update";
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
          <a class="navbar-brand" href=>FIND TUTOR</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
           <form class="navbar-form navbar-right" role="form"> 
            <div class="form-group">
                <a class="navbar-brand" href="search_tutor.php">TUTORS</a>
            </div>
              <div class="form-group">
                <a class="navbar-brand" href="logout.php">LOGOUT</a>
            </div>
              <div class="form-group">
                  <a class="navbar-brand" href="Parent_homepage.php"><?php echo "<br>Hello!"." ".$_SESSION["Username"];?></a>
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
      <li> <a href="Parent_homepage.php">Tutor Profile</a></li>
     <li><a  href="resetPasswordParent.php">Reset Password</a></li>
     <li><a href="editParent.php">Edit My Profile</a></li>
     <li><a href="edit_circular_parent.php">My Circulars</a></li>
            <li><a href="parentcircularpage.php">Publish new Circular</a></li>
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
<h3> Edit Your Profile Info</h3>
<?php $message=""; ?>
<form style="align:center" method="post" action="" onsubmit="return checkForm(this);" enctype="multipart/form-data">
    <div id="rg">
<table>
<tr ><td >Full Name:</td><td><input type="text" name="Full_Name" size="25px"  value="<?=$row['Full_Name']?>"></td>
 </tr>
<tr> <td>Email Address :</td><td><input type="email" name="Email" size="25px"  value="<?=$row['Email']?>"></td></tr>
<tr> <td>Phone number:</td> <td><input type="text" name="Phone_Number" size="25px"  value="<?=$row['Phone_Number']?>"></td></tr>
<tr><td>District:
    </td><td><select id="select" name="District" required>
<option value="Dhaka" <?php if($row['District'] == 'Dhaka')  echo 'selected'; ?>>Dhaka </option>
<option value="Comilla" <?php if($row['District'] == 'Comilla')  echo 'selected'; ?>> Comilla </option>
<option value="Rajshahi" <?php if($row['District'] == 'Rajshahi')  echo 'selected'; ?>>Rajshahi </option>
<option value="Rangpur" <?php if($row['District'] == 'Rangpur')  echo 'selected'; ?>> Rangpur </option>
<option value="Sylhet" <?php if($row['District'] == 'Sylhet')  echo 'selected'; ?>>Sylhet </option>
<option value="Barisal" <?php if($row['District'] == 'Barisal')  echo 'selected'; ?>> Barisal </option>
<option value="Chittagong" <?php if($row['District'] == 'Chittagong')  echo 'selected'; ?>>Chittagong </option>
<option value="khulna" <?php if($row['District'] == 'khulna')  echo 'selected'; ?>> khulna </option>

</select></td></tr>
<tr><td>Contact Address:</td><td><textarea id="add" name="Address" rows="5" cols="30" required><?=$row['Address']?></textarea></td></tr>
<tr><td>Gender:</td> <td>
<input type="radio" name="Gender" value ="Male"  <?php if($row['Gender'] == 'Male')  echo 'checked'; ?>> Male</td>
<td><input type="radio" name="Gender" value ="Female" <?php if($row['Gender'] == 'Female')  echo 'checked'; ?>> Female <br>
</td>
</tr>
<tr><td>User Type:
 </td><td><select name="UserType" required>
<option> Select User Type</option>
<option value="Parent" <?php if($row['UserType'] == 'Parent')  echo 'selected'; ?>>Parent </option>
<option value="Tutor" <?php if($row['UserType'] == 'Tutor')  echo 'selected'; ?>> Tutor </option>
</select></td></tr>
<tr>
  <td>Upload Photo:</td>
  <td> <input class="" id="" name="IMAGE_URL" type="file"   /> <img src="upload/<?=$row['IMAGE_URL']?>" height="70" width="70" style="margin-top: 12px; border: 2px solid #555;"/></td>
<td><input type="hidden" name="IMAGE_URL" value="<?=$row['IMAGE_URL']?>" /></td>
  
</tr>
<tr><td></td><td><input type="submit" id="submit" name="update" value="Update"></td></tr>

</table>
        </div>
</form>
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
  
    
       
    
    