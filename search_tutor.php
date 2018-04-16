<?php
session_start();

include("functions.php");
if(isset($_SESSION["User_ID"])) {
	if(isLoginSessionExpired()) {
		header("Location:login.php");
	}
}
if(isset($_REQUEST["search"])){
	$Educational_Level = $_POST['Educational_Level'];
        $Area=$_POST['Area'];
        $Institute = $_POST['Institute'];
       $sql = "SELECT * FROM `tutorcircular` LEFT JOIN `registration` ON `registration`.`User_ID`=`tutorcircular`.`User_ID`  WHERE `Educational_Level`='$Educational_Level' OR `Area` = '$Area'  OR `Institute` = '$Institute' ORDER BY `T_ID` DESC";
        $result = filterTable($sql);
}
 else {
   $sql = "SELECT * FROM tutorcircular LEFT JOIN `registration` ON `registration`.`User_ID`=`tutorcircular`.`User_ID`  ";
         $result = filterTable($sql);
}

if(isset($_REQUEST["sid"])){
    //$sid=$_REQUEST["sid"];
    $sql = "SELECT * FROM tutorcircular LEFT JOIN `registration` ON `registration`.`User_ID`=`tutorcircular`.`User_ID` WHERE T_ID='$sid' ";
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
          <div> <?php 
        
         if($_SESSION["User_ID"]==true){ ?>
              
   <h4>  <?php echo "<br>Tutor: "." ".$_SESSION["Username"];?> </h4>
<?php }
else{
	
header('location:login.php');

}
?> </div>
          <form action="search_tutor.php" method="post">
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
  <tr>
          <td> <img src="upload/<?=$row['IMAGE_URL']?>" height="70" width="70" style="margin-top: 12px; border: 2px solid #555;">
          <br><br>
          </td>     
 </tr>
 <tr >
<td>Name: </td> <td> <?php echo " "." ".$row["Full_Name"];?></td>   </tr>
<tr >
<tr >
<td>Highest Education: </td> <td><?php echo " "." ".$row["Educational_Level"];?></td>   </tr>
<tr><td> Institute:  </td> <td><?php echo "  "." ".$row["Institute"]; ?></td></tr>
<tr><td>Tuition Area :</td> <td><?php echo " "." ".$row["Area"]; ?></td>
</tr>
<tr><td> Available Schedule :</td> <td><?php echo ""." ".$row["Schedule"]; ?></td></tr>
<tr><td>Expected Tuition Fee :</td> <td><?php echo ""." ".$row["salary"];?></td> 
</tr>
<tr>
    <td><a href="show_profile.php?sid=<?php echo $row["T_ID"] ?>"><h3>show Details</h3></a> </td>
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
<h3>SEARCH TUTORS</h3>

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
Highest/Current Education:       <br>
    <select id="select" name="Educational_Level" >
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
Institute : (eg. BUET, Dhaka University, etc.)
<input type="text" name="Institute" placeholder="value to search"><br>
<input type="submit" name="search" value="search tutor"><br>
</td>
</tr>
</table>
</form>
      </div>
    </div>

    <div class="container">
      <footer>
        <p>&copy; Find Tutor 2018</p>
      </footer>
    </div> <!-- /container -->        <
        
    </body>
</html>

