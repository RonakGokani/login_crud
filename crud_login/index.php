<?php

include "config.php";

$user = 0;
$success = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];

    $sql = "Select * from `ronak` Where username = '$username'";

    $result = mysqli_query($con,$sql);

    if($result){
      $num = mysqli_num_rows($result);
      if($num>0){
        $user=1;
        header('location:login.php');
      }else{
        $sql = "INSERT INTO `ronak`(`username`, `password`, `city`, `mobile`) VALUES ('$username','$password','$city','$mobile')";

        $result = mysqli_query($con,$sql);

        if($result){
            $success=1;
            header('location:login.php');
        }
      }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <?php 
    if($user){
        echo "you are all ready register in this website so please Logged in now";
    }
    ?>
    <?php 
    if($success){
        echo "you are succefully registered in this website";
    }
    ?>
    <h1>
        Registration Page
    </h1>
    <form action="register.php" method="post">
     <br>
       Username :<br> <input type="text" name="username" placeholder="Enter Username"><br>
       Password :<br> <input type="password" name="password" placeholder="Enter Password"><br>
       Cityname :<br> <input type="text" name="city" placeholder="Enter City"><br>
       Mobile   :<br> <input type="text" name="mobile" placeholder="Enter Mobile Number">
       <br><br>
        <input type="submit" name="register" value="Register" class="btn btn-primary">
    </form>
    <a href="login.php">login</a>
</body>
</html>