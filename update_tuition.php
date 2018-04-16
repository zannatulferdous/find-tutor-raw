
    
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
     $sql="SELECT * FROM `tutorcircular`  WHERE `User_ID`='$userno'";
       $row = $conn->query($sql);
          $row = $row->fetch_assoc();
 $mgs='';  
if(isset($_POST['update'])) {
     $id = $_GET['update'];
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
                    $file_name = $_POST['file_name'];
                    
                } else {
                    $file_name = time().$_FILES["file_name"]["name"];
                    move_uploaded_file($_FILES["file_name"]["tmp_name"],"uploads/" . $file_name);
                }

  $SQL="UPDATE `tutorcircular`  SET file_name='$file_name',Area='$Area',Date='$Date',Nationality='$Nationality',National_ID_No='$National_ID_No',Short_Information='$Short_Information',Educational_Level='$Educational_Level',Subject='$Subject',Institute='$Institute',Schedule='$Schedule',Student_Level='$Student_Level',student_Subject='$student_Subject',salary='$salary' WHERE `T_ID`='$id'";
      $query=mysqli_query($conn,$SQL);
      header('location:edit_circuler_tutor.php');
      
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
                <a class="navbar-brand" href="search_tutor.php">TUTORS</a>
            </div>
              <div class="form-group">
                <a class="navbar-brand" href="logout.php">LOGOUT</a>
            </div>
              <div class="form-group">
                  <a class="navbar-brand" href="Parent_homepage.php"><?php echo "<br>Hello!"." ".$_SESSION["Username"];?></a>
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
              
   <h2>  <?php echo "<br>Tutor: "." ".$_SESSION["Username"];?> </h2>
<br> <br>
<?php }
else{
	
header('location:login.php');

}
?> 
<h3> Edit Your Profile Info</h3>
<form style="align:center" method="post" action="" onsubmit="return checkForm(this);" enctype="multipart/form-data">
<p <?php if($mgs=='')echo "style='display:none;'" ?>><?php echo $mgs ;?></p>

    <div style="padding: 40px;border: 1px solid;width: 800px;">
        <table>
            <tr>
               <td>Edit Photo:</td>
  <td> <input class="" id="" name="file_name" type="file"  /> <img src="uploads/<?=$row['file_name']?>" height="70" width="70" style="margin-top: 12px; border: 2px solid #555;"/></td>
<td><input type="hidden" name="file_name" value="<?=$row['file_name']?>" /></td>
            </tr>  
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
            
<tr> <td>Date of Birth :</td><td><input type="date" name="Date" size="25px"  value="<?=$row['Date']?>"></td></tr>
 <tr><td>Nationality:
    </td><td><select id="select" name="Nationality" required>
<option value="Bangladeshi" <?php if($row['Area'] == 'Bangladeshi')  echo 'selected'; ?>>Bangladeshi </option>
</select></td></tr>
<tr> <td>National ID No :</td><td><input type="text" name="National_ID_No" size="25px"  value="<?=$row['National_ID_No']?>"></td></tr>
<tr><td>Short Information:</td><td><textarea id="add" name="Short_Information" rows="5" cols="30" required><?=$row['Short_Information']?></textarea></td></tr>            
        <tr><td>Educational Level:
    </td><td><select id="select" name="Educational_Level" required>
<option value="Doctorate" <?php if($row['Educational_Level'] == 'Doctorate')  echo 'selected'; ?>>Doctorate </option>
<option value="Doctorate(running)"<?php if($row['Educational_Level'] == 'Doctorate(running)')  echo 'selected'; ?>>Doctorate(Running) </option>
<option value="Graduate"<?php if($row['Educational_Level'] == 'Graduate')  echo 'selected'; ?>> Graduate </option>
<option value="Graduation(running)"<?php if($row['Educational_Level'] == 'Graduation(running)')  echo 'selected'; ?>>Graduation(Running)</option>
<option value="Diploma"<?php if($row['Educational_Level'] == 'Diploma')  echo 'selected'; ?>>Diploma</option>
<option value=" Diploma(Running)"<?php if($row['Educational_Level'] == 'Diploma(Running)')  echo 'selected'; ?>>Diploma(Running)</option>
<option value="Higher Secondary"<?php if($row['Educational_Level'] == 'Higher Secondary')  echo 'selected'; ?>>Higher Secondary  </option>
<option value="Secondary"<?php if($row['Educational_Level'] == 'Secondary')  echo 'selected'; ?>>Secondary </option>
</select></td></tr>
<tr> <td>Subject :</td><td><input type="text" name="Subject" size="25px"  value="<?=$row['Subject']?>"></td></tr>        
<tr> <td>Institute :</td><td><input type="text" name="Institute" size="25px"  value="<?=$row['Institute']?>"></td></tr>       
      <tr><td>Available Schedule:
    </td><td><select id="select" name="Schedule" required>
<option value="All Schedule" <?php if($row['Schedule'] == 'All Schedule')  echo 'selected'; ?>>All Schedule </option>
<option value="Morning"<?php if($row['Schedule'] == 'Morning')  echo 'selected'; ?>>Morning </option>
<option value="Afternoon"<?php if($row['Schedule'] == 'Afternoon')  echo 'selected'; ?>>Afternoon </option>
<option value="Evening"<?php if($row['Schedule'] == 'Evening')  echo 'selected'; ?>>Evening</option>
<option value="Night"<?php if($row['Schedule'] == 'Night')  echo 'selected'; ?>>Night</option>
<option value="Morning & Afternoon"<?php if($row['Schedule'] == 'Morning & Afternoon')  echo 'selected'; ?>>Morning & Afternoon</option>
<option value="Morning & Evening"<?php if($row['Schedule'] == 'Morning & Evening')  echo 'selected'; ?>>Morning & Evening </option>
<option value="Morning & Night"<?php if($row['Schedule'] == 'Morning & Night')  echo 'selected'; ?>>Morning & Night </option>
<option value="Afternoon & Evening "<?php if($row['Schedule'] == 'Afternoon & Evening')  echo 'selected'; ?>>Afternoon & Evening</option>
<option value="Afternoon & Night"<?php if($row['Schedule'] == 'Afternoon & Night')  echo 'selected'; ?>>Afternoon & Night </option>
<option value="Evening & Night"<?php if($row['Schedule'] == 'Evening & Night')  echo 'selected'; ?>>Evening & Night </option>
</select></td></tr>  
      <tr><td>Expected Student Level:
    </td><td><select id="select" name="Student_Level" required>
<option value="Level 0-Level 5"<?php if($row['Student_Level'] == 'Level 0-Level 5')  echo 'selected'; ?>>Level 0-Level 5</option>
<option value="Level 5-Level 10"<?php if($row['Student_Level'] == 'Level 5-Level 10')  echo 'selected'; ?>>Level 5-Level 10 </option>
<option value="Level 10-Level 12"<?php if($row['Student_Level'] == 'Level 10-Level 12')  echo 'selected'; ?>> Level 10-Level 12</option>
<option value="Level 0-Level 10"<?php if($row['Student_Level'] == 'Level 0-Level 10')  echo 'selected'; ?>>Level 0-Level 10</option>
<option value="Level 0-Level 12"<?php if($row['Student_Level'] == 'Level 0-Level 12')  echo 'selected'; ?>>Level 0-Level 12</option>
<option value="Level 5-Level 12"<?php if($row['Student_Level'] == 'Level 5-Level 12')  echo 'selected'; ?>>Level 5-Level 12</option>
<option value="Any Upper Level"<?php if($row['Student_Level'] == 'Any Upper Level')  echo 'selected'; ?>>Any Upper Level </option>
<option value="Others"<?php if($row['Student_Level'] == 'Others')  echo 'selected'; ?>>Others </option>
    </select></td></tr> 
      
 <tr> <td>Prefered Subject :</td><td><input type="text" name="student_Subject" size="25px"  value="<?=$row['student_Subject']?>"></td></tr>      
       
       <tr><td>salary:
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
<tr><td></td><td><input type="submit" id="submit" name="update" value="Update "<?=$row['T_ID']?>></td></tr>        
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
  
    
       