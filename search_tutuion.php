
<?php
session_start();

include("functions.php");
if(isset($_SESSION["User_ID"])) {
	if(isLoginSessionExpired()) {
		header("Location:login.php");
	}
}
if(isset($_REQUEST["search"])){
        $Area=$_POST['Area'];
        $week = $_POST['week'];
        $salary = $_POST['salary'];
      $sql = "SELECT * FROM `parentcircular` LEFT JOIN `registration` ON `registration`.`User_ID`=`parentcircular`.`User_ID` WHERE  `Area` = '$Area' OR `week`='$week'  OR `salary` = '$salary' ";
        $result = filterTable($sql);
}
 else {
    
   $sql = "SELECT * FROM parentcircular LEFT JOIN `registration` ON `registration`.`User_ID`=`parentcircular`.`User_ID` ";
         $result = filterTable($sql);
         
}
function filterTable($sql){
    $servername ="localhost";
$username="root";
$password="";
$dbname="Tutor";
$conn =new mysqli($servername,$username,$password,$dbname);
 if($conn->connect_error){
	die("connection failed:".$conn->connect_error); 
 }
  $filter_result = $conn->query($sql);
 return $filter_result;
 
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
                table {
	
	float:top;
    
            }
            
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
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
    
<!--      <div>    -->
<div class="jumbotron">
      <div class="container">
          <div>  <?php 
        
         if($_SESSION["User_ID"]==true){ ?>
              
              <h4> <?php echo "<br>Tutor: "." ".$_SESSION["Username"];?> </h4>
<?php }
else{
	
header('location:login.php');

}
?> 
</div>
          <h3>LATEST TUITIONS</h3>
          <form action="search_tutuion.php" method="post">
        
<table  class="col-1" cellpadding="20px"  >
<tr>
<td colspan="2" height="200px" width="2000px" >
<?php
for($i=1;$i<=$result->num_rows;$i++)
{
	
	$row = $result->fetch_assoc();
?> 
<table class="col-1" cellpadding="20px"  border="1px">
<tr>
 <td height="200px" width="2000px">
 
<table class="col-3" cellpadding="20px">
   
    <h3>  <?php echo " "." ".$row["Circular_Title"];?></h3>
  
<tr>
          <td> <img src="upload/<?=$row['IMAGE_URL']?>" height="70" width="70" style="margin-top: 12px; border: 2px solid #555;">
          <br><br>
          </td>     
 </tr>
 <tr >
<td>Name: </td> <td><?php echo " "." ".$row["Full_Name"];?></td>   </tr>
<tr >
<tr >
<td> Tuition Subject :</td> <td><?php echo " "." ".$row["student_Subject"];?></td>   </tr>
<tr >
<td>Tuition Schedule:</td> <td><?php echo " "." ".$row["Tuition_Schedule"];?></td>   </tr>
<tr><td> Number of Students: </td> <td><?php echo "  "." ".$row["Student_number"]; ?></td></tr>
<tr><td>Tuition Area  :</td> <td><?php echo " "." ".$row["Area"]; ?></td>
</tr>
<tr><td> Days per week :</td> <td><?php echo ""." ".$row["week"]; ?></td></tr>
<tr><td>  Salary Range  :</td> <td><?php echo ""." ".$row["salary"];?></td>
</tr>
<tr><td>  Circular Details  :</td> <td><?php echo ""." ".$row["Details"];?></td>
</tr>
</table>
   
</td>

</tr>
  <?php
}

?>

</table>
</td>



<td valign="top" cellpaddin="20px" colspan="2" height="200px" width="1000px" >
<h3>SEARCH TUITIONS</h3>
   Prefered  Area : <br>
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
Days per week:  <br>
 <select id="select" name="week" >
<option> Days per week</option>
<option value="1Day/Week">1Day/Week</option>
<option value="2Day/Week">2Day/Week </option>
<option value="3Day/Week">3Day/Week</option>
<option value="4Day/Week">4Day/Week</option>
<option value="5Day/Week">5Day/Week</option>
<option value="6Day/Week">6Day/Week</option>
<option value="7Day/Week">7Day/Week</option>

 </select> <br>
 Salary Range : <br>
 <select id="select" name="salary" >
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

<input type="submit" name="search" value="search tuition"><br>
          
          
</td>
</tr>
</table>
</form>
 </div>
    </div>
      <div>
      <footer >
        <p align="left">&copy; Find Tutor 2018</p>
      </footer>
      </div>
</body>

</html>

