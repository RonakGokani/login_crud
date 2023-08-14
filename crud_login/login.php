<?php

include "config.php";

$login = 0;
$invalid = 0;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];

    $sql = "SELECT * FROM `ronak` Where `username`='$username' and `password`='$password'";

    $result = mysqli_query($con,$sql);

    if($result){
        $login=1;
        session_start();
        $_SESSION['username'] = $username;
        header('location:read.php');
    }else{
        die(mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Login
    </h1>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Enter Username">
        <input type="text" name="password" placeholder="Enter Password">
        <input type="submit" name="login" value="login">
    </form>
    <a href="register.php">Register</a>
</body>
</html>