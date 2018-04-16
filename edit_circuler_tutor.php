
    
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
 $mgs='';  
if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        $sql = "DELETE FROM `tutorcircular`  WHERE T_ID = $id";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $mgs = "Data Delete Successfully!";
           
        }
        else
        {
            $mgs = "Data Delete Fail!";
            
        }
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
          </form>        </div>
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
<?php } 
else{
	
header('location:login.php');

}
?> 
<h3> Edit Your Profile Info</h3>
<p <?php if($mgs=='')echo "style='display:none;'" ?>><?php echo $mgs ;?></p>

    <?php
    $userno=$_SESSION["User_ID"];
     $sql="SELECT * FROM `tutorcircular`  WHERE `User_ID`='$userno'";
      $query=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($query)):

  ?>
    <div style="padding: 40px;border: 1px solid;width: 800px;">
       <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?='edit_circuler_tutor.php'.'?delete='.$row['T_ID']?>" class="btn btn-danger" style="float: right;"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
       <br>
       <br>
       <a href="<?='update_tuition.php'.'?update='.$row['T_ID']?>" class="btn btn-danger" style="float: right;"><i class="fa fa-trash-o" aria-hidden="true"></i> Update</a>
       <table  >
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

  </table>
    </div>
  <br>
<?php endwhile; ?>

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
  
    
       