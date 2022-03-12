<?php 

error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$db = 'bocanek-uzivatele';

// Create connection


// Check connection
if ($conn = mysqli_connect($servername,$username,$password,$db)->connect_error) {
  die("Connection failed");
}
else
	$spojeni = mysqli_connect($servername,$username,$password,$db)

?>