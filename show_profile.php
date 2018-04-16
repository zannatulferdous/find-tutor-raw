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
 if(isset($_REQUEST["show"])){
	header('location:searchtutor.php');
}
 $sid=$_REQUEST["sid"];
  $sql = "SELECT * FROM tutorcircular LEFT JOIN `registration` ON `registration`.`User_ID`=`tutorcircular`.`User_ID` WHERE T_ID='$sid' ";
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

<div class="col-2 right" >
<h3> Tutor Profile Information</h3>

<h2>Name: <?php echo " "." ".$row["Full_Name"];?></h2>
<form style="align:center" method="post" action="" onsubmit="return checkForm(this);" enctype="multipart/form-data">

<table class="col-3" cellpadding="20px">
  <tr>
          <td> <img src="upload/<?=$row['IMAGE_URL']?>" height="70" width="70" style="margin-top: 12px; border: 2px solid #555;">
          <br><br>
          </td>     
 </tr>
 
 <tr><td><h3> Personal Information</h3></td></tr> 
<tr >
<td>Email: </td> <td><?php echo " "." ".$row["Email"];?></td>   </tr>
<tr><td> Phone number:  </td> <td><?php echo "  "." ".$row["Phone_Number"]; ?></td></tr>
<tr><td>District:</td> <td><?php echo " "." ".$row["District"]; ?></td>
</tr>
<tr><td> Address :</td> <td><?php echo ""." ".$row["Address"]; ?></td></tr>
<tr><td>Gender :</td> <td><?php echo ""." ".$row["Gender"];?></td> 
</tr>
<tr><td>Date of Birth :</td> <td><?php echo ""." ".$row["Date"];?></td> 
</tr>
<tr >
<td>Nationality: </td> <td><?php echo " "." ".$row["Nationality"];?></td>   </tr>
<tr><td> National_ID_No: </td> <td><?php echo "  "." ".$row["National_ID_No"]; ?></td></tr>
<tr>
         <td>National ID picture: </td> <td> <img src="uploads/<?=$row['file_name']?>" height="70" width="70" style="margin-top: 12px; border: 2px solid #555;">
          <br><br>
          </td>     
 </tr>
<tr><td>Short Information</td> <td><?php echo " "." ".$row["Short_Information"]; ?></td>
</tr>

<tr><td><h3> Education Details</h3></td></tr>  
<tr><td> Educational Level :</td> <td><?php echo ""." ".$row["Educational_Level"]; ?></td></tr>
<tr><td>Highest Education:</td> <td><?php echo ""." ".$row["Subject"];?></td> 
</tr>
<tr><td> Institute:  </td> <td><?php echo "  "." ".$row["Institute"]; ?></td></tr>
<tr>
<tr><td><h3> Others Details</h3></td></tr>  
<td> Prefered Subject:</td> <td><?php echo " "." ".$row["Student_Level"];?></td>   </tr>
<tr><td>Tuition Area :</td> <td><?php echo " "." ".$row["Area"]; ?></td>
</tr>
<tr><td> Available Schedule :</td> <td><?php echo ""." ".$row["Schedule"]; ?></td></tr>
<tr><td>Expected Tuition Fee :</td> <td><?php echo ""." ".$row["salary"];?></td> 
</tr>
<tr>
    <td><a href="searchtutor.php"><input type="submit" name="show" id="submit" value="Back"></a> </td>
</tr>
</table>

</form>
</div>
        
    </body>
</html>
  
    
       
    
    