<?php

session_start();

include("functions.php");
if(isset($_SESSION["User_ID"])) {
	if(isLoginSessionExpired()) {
		header("Location:login.php");
	}
}
 else {
    
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
 	   $Circular_Title=$_POST['Circular_Title'];
 	 $student_Subject=$_POST['student_Subject'];
         $Area=$_POST['Area'];
         $Tuition_Schedule=$_POST['Tuition_Schedule'];
	 $week=$_POST['week'];
	  $Student_number=$_POST['Student_number'];
	   $salary=$_POST['salary'];
	    $Details=$_POST['Details'];
        
$servername ="localhost";
$username="root";
$password="";
$dbname="Tutor";
$conn =new mysqli($servername,$username,$password,$dbname);
 if($conn->connect_error){
	die("connection failed:".$conn->connect_error); 
 }

$User_ID =$_SESSION['User_ID'];
 $sql = "SELECT * FROM parentcircular LEFT JOIN `registration` ON `registration`.`User_ID`=`parentcircular`.`User_ID`  ";
 $sql="INSERT INTO parentcircular(User_ID,Circular_Title,student_Subject,Area,Tuition_Schedule,week,Student_number,salary,Details) 
 
 VALUES('$User_ID','$Circular_Title','$student_Subject','$Area','$Tuition_Schedule','$week','$Student_number','$salary','$Details')";
 
 if($conn->query($sql)===TRUE){
	 $message = "Registration complete "; 
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
   

        <div class="jumbotron">
      <div class="container">
         
         
         
         <div class="col-1  left" > 

             <ul> <br> <br>
                 <h3><b> Tutor ACCOUNT</b></h3><li> </li>
      <li> <a href="Parent_homepage.php">Tutor Profile</a></li>
     <li><a  href="resetPasswordParent.php">Reset Password</a></li>
     <li><a href="editParent.php">Edit My Profile</a></li>
     <li><a href="edit_circular_parent.php">My Circulars</a></li>
            <li><a href="parentcircularpage.php">Publish new Circular</a></li>
        </ul>

<table>

</table>


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
    <form style="align:center" method="post" action="">
        <br>
<h2> PUBLISH TUITION CIRCULAR</h2>


<br>
<br>
<h5> All fields are required, please fill all information and submit the form.</h5><br>

Circular Title :<br>
    <select id="select" name=" Circular_Title" required>
<option> Select Circular</option>
<option value="Home tutor wanted">Home tutor wanted</option>
<option value="Urgent Tutor Wanted ">Urgent Tutor Wanted </option>
<option value="Lady Tutor wanted"> Lady Tutor wanted</option>
    </select> <br>
                Prefered Subject : (eg. English, Math, Computer, Dance, Music, etc.)<br>
                             <input type="text" id="studentSubject" name="student_Subject"/><br>
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
                              
                             Tuition Schedule :<br>
                            <select id="select" name="Tuition_Schedule" required>
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
    
 Days per week:  <br>
 <select id="select" name="week" required>
<option> Days per week</option>
<option value="1Day/Week">1Day/Week</option>
<option value="2Day/Week">2Day/Week </option>
<option value="3Day/Week">3Day/Week</option>
<option value="4Day/Week">4Day/Week</option>
<option value="5Day/Week">5Day/Week</option>
<option value="6Day/Week">6Day/Week</option>
<option value="7Day/Week">7Day/Week</option>

 </select> <br>
 Number of Students:  <br>
                            <select id="select" name="Student_number" required>
<option>   Number </option>
<option value="1">1</option>
<option value="2">2 </option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="Batch">Batch</option>
    </select> <br>
    
                      
                             
    Offered Salary :  <br>
 <select id="select" name="salary" required>
<option>   Salary Range </option>
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
               
                      Circular Details:<br>
                             <textarea id="add" name="Details" rows="5" cols="30" required></textarea>       
                <input type="submit" name="submit" id="submit" value="Publish Circular"/>
                
            </form>       

</div>
 </div>
    </div>

      <div>
      <footer >
        <p align="center">&copy; Find Tutor 2018</p>
      </footer>
      </div>
           

        
    </body>
</html>
  
    
       
    
    
