<?php
$servername ="localhost";
$username="root";
$password="";
$dbname="tutor";
$conn = mysqli_connect($servername,$username,$password,$dbname);
 
  
  ?>
<?php

session_start();

include("functions.php");
if(isset($_SESSION["User_ID"])) {
	if(isLoginSessionExpired()) {
		header("Location:login.php");
	}
   
}
 $userno=$_SESSION["User_ID"];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
 	   $Area=$_POST['Area'];
 	 $Date=$_POST['Date'];
         $Nationality=$_POST['Nationality'];
         $National_ID_No=$_POST['National_ID_No'];
         $Short_Information=$_POST['Short_Information'];
	 $Educational_Level=$_POST['Educational_Level'];
	  $Subject=$_POST['Subject'];
	   $Institute=$_POST['Institute'];
	    $Schedule=$_POST['Schedule'];
            $Student_Level=$_POST['Student_Level'];
            $student_Subject=$_POST['student_Subject'];
            $salary=$_POST['salary'];
        if ($_FILES["file_name"]["error"] > 0) {
                    $file_name = "No.jpg";
                    
                } else {
                    $file_name = time().$_FILES["file_name"]["name"];
                    move_uploaded_file($_FILES["file_name"]["tmp_name"],"uploads/" . $file_name);
                }

 
  $sql="INSERT INTO tutorcircular(User_ID,file_name,Area,Date,Nationality,National_ID_No,Short_Information,Educational_Level,Subject,Institute,Schedule,Student_Level,student_Subject,salary) 
 
 VALUES('$userno','$file_name','$Area','$Date','$Nationality','$National_ID_No','$Short_Information','$Educational_Level','$Subject','$Institute','$Schedule','$Student_Level','$student_Subject','$salary')";
 $query=mysqli_query($conn,$sql);
 if($query){
    $mgs="Circular Given Successfully";
 }else{
    $mgs="Circular Fail";
 }
 
}else{
    $mgs="";
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

    
      <div class="container">
         <!-- parent works -->

            
         
         
         
         <div class="col-1  left" > 
             <<ul> <br> <br>
                 <h3><b> Tutor ACCOUNT</b></h3><li> </li>
     <li> <a href="Tutor_homepage.php">Tutor Profile</a></li>
     <li><a  href="resetpasstutor.php">Reset Password</a></li>
     <li><a href="edit_profile_tutor.php">Edit My Profile</a></li>
     <li><a href="edit_circuler_tutor.php">My Circulars</a></li>
            <li><a href="tutorcircularpage.php">Publish new Circular</a></li>
          
        </ul>

</div>
<div class="col-2 right" > 
    <form style="align:center" method="post" action="tutorcircularpage.php" enctype="multipart/form-data">
        <br>
<h2> PUBLISH Tutor CIRCULAR</h2>

<?php 
        
         if($_SESSION["Username"]==true){ ?>
         
             
             <h2>  <?php echo "<br>welcome user: "." ".$_SESSION["Username"];?>
       
       <?php
       }
else{
	
header('location:login.php');

}
   ?> 
<br>
<br>
<h5> All fields are required, please fill all information and submit the form.</h5><br>
<h4>PERSONAL DETAILS</h4>
                National ID card Picture : <br>
                <input type="file" id="file" name="file_name" />  <br>
                
                Prefered Tuition Area : <br>
    <select id="select" name=" Area" required>
<option> Select  Area</option>
<option value="Dhanmondi">Dhanmondi</option>
<option value="Gulshan">Gulshan </option>
<option value="Uttara"> Uttara </option>
<option value="Mirpur">Mirpur</option>
<option value="Badda">Badda</option>
<option value="Ajimpur">Ajimpur</option>
<option value="Mohammadpur">Mohammadpur  </option>
<option value="Tejgaon">Tejgaon</option>
<option value="Motijeel">Motijeel</option>
<option value="Shahbag">Shahbag</option>
<option value="Banani">Banani  </option>
<option value="Lalbag">Lalbag</option>
    </select> <br>
               
				Date of Birth :<br>
                                <input type="date" id="Date" name="Date"/><br>
                                
                                Nationality :<br>
                                <select id="select" name=" Nationality" required>
                                <option> Select Nationality</option>
                                  <option value="Bangladeshi">Bangladeshi</option>
                                  </select> <br>
                                National ID No :<br>
                                <input type="text"  name="National_ID_No"/><br>
                             Short Profile About You :<br>
                             <textarea id="add" name="Short_Information" rows="5" cols="30" required></textarea>
                             <h4> CURRENT/HIGHEST EDUCATION DETAILS</h4>
                             Educational Level :<br>
    <select id="select" name=" Educational_Level" required>
<option> Select  Educational Level</option>
<option value="Doctorate">Doctorate</option>
<option value="Doctorate(running)">Doctorate(Running) </option>
<option value="Graduate"> Graduate </option>
<option value="Graduation(running)">Graduation(Running)</option>
<option value="Diploma">Diploma</option>
<option value=" Diploma(Running)">Diploma(Running)</option>
<option value="Higher Secondary">Higher Secondary  </option>
<option value="Secondary">Secondary </option>
    </select> <br>
    
                             Major/ Group/ Subject :<br>
                             <input type="text" id="Subject" name="Subject"/><br>
                             Institute:<br>
                             <input type="text" id="Institute" name="Institute"/><br>
                             
                             <h4> OTHER DETAILS</h4>
                             Available Schedule :<br>
                            <select id="select" name="Schedule" required>
<option> Select  Schedule</option>
<option value="All Schedule">All Schedule</option>
<option value="Morning">Morning </option>
<option value="Afternoon">Afternoon </option>
<option value="Evening">Evening</option>
<option value="Night">Night</option>
<option value=" Morning & Afternoon">Morning & Afternoon</option>
<option value="Morning & Evening">Morning & Evening </option>
<option value="Morning & Night">Morning & Night </option>
<option value=" Afternoon & Evening ">Afternoon & Evening</option>
<option value="Afternoon & Night">Afternoon & Night </option>
<option value="Evening & Night">Evening & Night </option>
    </select> <br>
    
                             Expected Student Level : <br>
                            <select id="select" name="Student_Level" required>
<option> Select  Educational Level</option>
<option value="Level 0-Level 5">Level 0-Level 5</option>
<option value="Level 5-Level 10">Level 5-Level 10 </option>
<option value="Level 10-Level 12"> Level 10-Level 12</option>
<option value="Level 0-Level 10">Level 0-Level 10</option>
<option value="Level 0-Level 12">Level 0-Level 12</option>
<option value="Level 5-Level 12">Level 5-Level 12</option>
<option value="Any Upper Level">Any Upper Level </option>
<option value="Others">Others </option>
    </select> <br>
    
                      
                             Prefered Subject : (eg. English, Math, Computer, Dance, Music, etc.)<br>
                             <input type="text" id="studentSubject" name="student_Subject"/><br>
                             Expected Tuition Fee/Month : <br>
                            <select id="select" name="salary" required>
<option> Select  Salary</option>
<option value="1000-2000">1000-2000</option>
<option value="2000-3000">2000-3000 </option>
<option value="3000-4000">3000-4000</option>
<option value="4000-5000">4000-5000</option>
<option value="5000-6000">5000-6000</option>
<option value="6000-7000">6000-7000</option>
<option value="7000-8000">7000-8000</option>
<option value="8000-9000">8000-9000</option>
<option value="9000-10000">9000-10000</option>
<option value="Negotiable">Negotiable</option>
    </select> <br>
               
                             
                <input type="submit" name="submit" id="submit" value="Publish Circular"/>
                <br>
                <br>
                <br>
            </form>    
                
                

</div>


     
      <hr>

      
    </div>        
<div class="container">

      <footer >
        <p align="center">&copy; Find Tutor 2018</p>
      </footer>
    </div> 
        
    </body>
</html>
  
    
       
    
    