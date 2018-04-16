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
        $sql = "DELETE FROM `parentcircular`  WHERE ID = $id";
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
<p <?php if($mgs=='')echo "style='display:none;'" ?>><?php echo $mgs ;?></p>

    <?php
    $userno=$_SESSION["User_ID"];
     $sql="SELECT * FROM `parentcircular`  WHERE `User_ID`='$userno'";
      $query=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($query)):

  ?>
    <div style="padding: 40px;border: 1px solid;width: 800px;">
       <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?='edit_circular_parent.php'.'?delete='.$row['ID']?>" class="btn btn-danger" style="float: right;"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
      <br>
       <br>
       <a href="<?='update_tutor.php'.'?update='.$row['ID']?>" class="btn btn-danger" style="float: right;"><i class="fa fa-trash-o" aria-hidden="true"></i> Update</a>
       
       <table  >
        <tr><td> Circular Title:</td> <td><?php echo ""." ".$row["Circular_Title"]; ?></td></tr>
<tr><td>Prefered Subject:</td> <td><?php echo ""." ".$row["student_Subject"];?></td> 
</tr>
<tr><td>Tuition Area :</td> <td><?php echo " "." ".$row["Area"]; ?></td>
</tr>
<tr><td> Schedule </td> <td><?php echo "  "." ".$row["Tuition_Schedule"]; ?></td></tr>

<tr><td> Prefered Subject:</td> <td><?php echo " "." ".$row["week"];?></td>   </tr>

<tr><td> Student Number:</td> <td><?php echo ""." ".$row["Student_number"]; ?></td></tr>
<tr><td>Expected Tuition Fee :</td> <td><?php echo ""." ".$row["salary"];?></td> 
</tr>
<tr><td>Short Details :</td> <td><?php echo ""." ".$row["Details"];?></td> 
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
  
    
       