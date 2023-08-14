<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$database = "crud_login";

$con = new mysqli($hostname,$username,$password,$database);

if(!$con){
   die(mysqli_error($con)); 
}
?>