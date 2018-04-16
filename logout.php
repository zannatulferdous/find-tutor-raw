<?php

session_start();
session_destroy();
unset($_SESSION["User_ID"]);
unset($_SESSION["Username"]);
$url = "login.php";
if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:$url");
?>

