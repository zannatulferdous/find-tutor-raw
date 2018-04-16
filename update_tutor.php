

    
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
     $sql="SELECT * FROM `parentcircular`  WHERE `User_ID`='$userno'";
       $row = $conn->query($sql);
          $row = $row->fetch_assoc();
 $mgs='';  
if(isset($_POST['update'])) {
     $id = $_GET['update'];
         $Circular_Title=$_POST['Circular_Title'];
 	 $student_Subject=$_POST['student_Subject'];
         $Area=$_POST['Area'];
         $Tuition_Schedule=$_POST['Tuition_Schedule'];
	 $week=$_POST['week'];
	  $Student_number=$_POST['Student_number'];
	   $salary=$_POST['salary'];
	    $Details=$_POST['Details'];
            
 echo $SQL="UPDATE `parentcircular`  SET Circular_Title='$Circular_Title',Area='$Area',student_Subject='$student_Subject',Tuition_Schedule='$Tuition_Schedule',week='$week',Student_number='$Student_number',salary='$salary',Details='$Details' WHERE `ID`='$id'";
      $query=mysqli_query($conn,$SQL);
      header('location:edit_circular_parent.php');
      
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
                <a class="navbar-brand" href="search_tutor.php">TUITION</a>
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



</div>
<div class="col-2 right" >
<?php 
        
         if($_SESSION["User_ID"]==true){ ?>
         
             
             <h2>  <?php echo "<br>Tutor: "." ".$_SESSION["Username"];?>
</h2>
<br> <br>
<?php } ?> 
<h3> Edit Your Profile Info</h3>
<form style="align:center" method="post" action="" onsubmit="return checkForm(this);" enctype="multipart/form-data">
<p <?php if($mgs=='')echo "style='display:none;'" ?>><?php echo $mgs ;?></p>

    <div style="padding: 40px;border: 1px solid;width: 800px;">
        <table>
              <tr><td>Circular Title:
    </td><td><select id="select" name="Circular_Title" required>
<option value="Home tutor wanted" <?php if($row['Circular_Title'] == 'Home tutor wanted')  echo 'selected'; ?>>Home tutor wanted </option>
<option value="Urgent Tutor Wanted "<?php if($row['Circular_Title'] == 'Urgent Tutor Wanted')  echo 'selected'; ?>>Urgent Tutor Wanted </option>
<option value="Lady Tutor wanted"<?php if($row['Circular_Title'] == 'Lady Tutor wanted')  echo 'selected'; ?>> Lady Tutor wanted</option>
</select></td></tr>
 <td>Prefered Subject :</td><td><input type="text" name="student_Subject" size="25px"  value="<?=$row['student_Subject']?>"></td></tr>              
            <tr><td>Area:
    </td><td><select id="select" name="Area" required>
<option value="Dhanmondi" <?php if($row['Area'] == 'Dhanmondi')  echo 'selected'; ?>>Dhanmondi </option>
<option value="Gulshan" <?php if($row['Area'] == 'Gulshan')  echo 'selected'; ?>> Gulshan </option>
<option value="Uttara" <?php if($row['Area'] == 'Uttara')  echo 'selected'; ?>>Uttara </option>
<option value="Mirpur" <?php if($row['Area'] == 'Mirpur')  echo 'selected'; ?>> Mirpur </option>
<option value="Badda" <?php if($row['Area'] == 'Badda')  echo 'selected'; ?>>Badda </option>
<option value="Ajimpur" <?php if($row['Area'] == 'Ajimpur')  echo 'selected'; ?>> Ajimpur </option>
<option value="Mohammadpur" <?php if($row['Area'] == 'Mohammadpur')  echo 'selected'; ?>>Mohammadpur </option>
<option value="Tejgaon" <?php if($row['Area'] == 'Tejgaon')  echo 'selected'; ?>> Tejgaon </option>
<option value="Motijeel"<?php if($row['Area'] == 'Motijeel')  echo 'selected'; ?>>Motijeel</option>
<option value="Shahbag"<?php if($row['Area'] == 'Shahbag')  echo 'selected'; ?>>Shahbag</option>
<option value="Banani"<?php if($row['Area'] == 'Banani')  echo 'selected'; ?>>Banani  </option>
<option value="Lalbag"<?php if($row['Area'] == 'Lalbag')  echo 'selected'; ?>>Lalbag</option>
</select></td></tr>
     <tr><td>Available Schedule:
    </td><td><select id="select" name="Tuition_Schedule" required>
<option value="All Schedule" <?php if($row['Tuition_Schedule'] == 'All Schedule')  echo 'selected'; ?>>All Schedule </option>
<option value="Morning"<?php if($row['Tuition_Schedule'] == 'Morning')  echo 'selected'; ?>>Morning </option>
<option value="Afternoon"<?php if($row['Tuition_Schedule'] == 'Afternoon')  echo 'selected'; ?>>Afternoon </option>
<option value="Evening"<?php if($row['Tuition_Schedule'] == 'Evening')  echo 'selected'; ?>>Evening</option>
<option value="Night"<?php if($row['Tuition_Schedule'] == 'Night')  echo 'selected'; ?>>Night</option>
<option value="Morning & Afternoon"<?php if($row['Tuition_Schedule'] == 'Morning & Afternoon')  echo 'selected'; ?>>Morning & Afternoon</option>
<option value="Morning & Evening"<?php if($row['Tuition_Schedule'] == 'Morning & Evening')  echo 'selected'; ?>>Morning & Evening </option>
<option value="Morning & Night"<?php if($row['Tuition_Schedule'] == 'Morning & Night')  echo 'selected'; ?>>Morning & Night </option>
<option value="Afternoon & Evening "<?php if($row['Tuition_Schedule'] == 'Afternoon & Evening')  echo 'selected'; ?>>Afternoon & Evening</option>
<option value="Afternoon & Night"<?php if($row['Tuition_Schedule'] == 'Afternoon & Night')  echo 'selected'; ?>>Afternoon & Night </option>
<option value="Evening & Night"<?php if($row['Tuition_Schedule'] == 'Evening & Night')  echo 'selected'; ?>>Evening & Night </option>
</select></td></tr>  
            
      <tr><td> Number of Students:
    </td><td><select id="select" name="week" required>
<option value="1Day/Week"<?php if($row['week'] == '1Day/Week')  echo 'selected'; ?>>1Day/Week</option>
<option value="2Day/Week"<?php if($row['week'] == '2Day/Week')  echo 'selected'; ?>>2Day/Week </option>
<option value="3Day/Week"<?php if($row['week'] == '3Day/Week')  echo 'selected'; ?>>3Day/Week</option>
<option value="4Day/Week"<?php if($row['week'] == '4Day/Week')  echo 'selected'; ?>>4Day/Week</option>
<option value="5Day/Week"<?php if($row['week'] == '5Day/Week')  echo 'selected'; ?>>5Day/Week</option>
<option value="6Day/Week"<?php if($row['week'] == '6Day/Week')  echo 'selected'; ?>>6Day/Week</option>
<option value="7Day/Week"<?php if($row['week'] == '7Day/Week')  echo 'selected'; ?>>7Day/Week</option>
    </select></td></tr> 
    <tr><td>Expected Student Level:
    </td><td><select id="select" name="Student_number" required>
<option value="1"<?php if($row['Student_number'] == '1')  echo 'selected'; ?>>1</option>
<option value="2"<?php if($row['Student_number'] == '2')  echo 'selected'; ?>>2 </option>
<option value="3"<?php if($row['Student_number'] == '3')  echo 'selected'; ?>>3</option>
<option value="4"<?php if($row['Student_number'] == '4')  echo 'selected'; ?>>4</option>
<option value="5"<?php if($row['Student_number'] == '5')  echo 'selected'; ?>>5</option>
<option value="6"<?php if($row['Student_number'] == '6')  echo 'selected'; ?>>6</option>
<option value="7"<?php if($row['Student_number'] == '7')  echo 'selected'; ?>>7</option>
<option value="8"<?php if($row['Student_number'] == '8')  echo 'selected'; ?>>8</option>
<option value="9"<?php if($row['Student_number'] == '9')  echo 'selected'; ?>>9</option>
<option value="Batch"<?php if($row['Student_number'] == 'Batch')  echo 'selected'; ?>>Batch</option>

    </select></td></tr>   
       
       <tr><td> Offered Salary :
    </td><td><select id="select" name="salary" required>
<option value="1000-2000"<?php if($row['salary'] == '1000-2000')  echo 'selected'; ?>>1000-2000</option>
<option value="2000-3000"<?php if($row['salary'] == '2000-3000')  echo 'selected'; ?>>2000-3000 </option>
<option value="3000-4000"<?php if($row['salary'] == '3000-4000')  echo 'selected'; ?>>3000-4000</option>
<option value="4000-5000"<?php if($row['salary'] == '4000-5000')  echo 'selected'; ?>>4000-5000</option>
<option value="5000-6000"<?php if($row['salary'] == '5000-6000')  echo 'selected'; ?>>5000-6000</option>
<option value="6000-7000"<?php if($row['salary'] == '6000-7000')  echo 'selected'; ?>>6000-7000</option>
<option value="7000-8000"<?php if($row['salary'] == '7000-8000')  echo 'selected'; ?>>7000-8000</option>
<option value="8000-9000"<?php if($row['salary'] == '8000-9000')  echo 'selected'; ?>>8000-9000</option>
<option value="9000-10000"<?php if($row['salary'] == '9000-10000')  echo 'selected'; ?>>9000-10000</option>
<option value="Negotiable"<?php if($row['salary'] == 'Negotiable')  echo 'selected'; ?>>Negotiable</option>
    </select></td></tr> 
<tr><td>Short Information:</td><td><textarea id="add" name="Details" rows="5" cols="30" required><?=$row['Details']?></textarea></td></tr>
<tr><td></td><td><input type="submit" id="submit" name="update" value="Update"<?=$row['ID']?>></td></tr>        
        </table>
    </div>
</form>
  <br>

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
  
    
       