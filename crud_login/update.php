<?php 

include ('config.php');

$id = $_GET['id'];

$sql = "SELECT * FROM `ronak` WHERE id='$id'";

$result = mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($result);

$username = $row['username'];
$password = $row['password'];
$city = $row['city'];
$mobile = $row['mobile'];

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];

    $sql = "update `ronak` set id='$id', username='$username', password='$password', city='$city', mobile='$mobile' where id='$id'";

    $result = mysqli_query($con,$sql);

    if($result){
        header('location:read.php');
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
    <h1>Update Data</h1>

    <form method="post">
        <br>
        username : <br><input type="text" name="username" placeholder="Enter Username" value="<?php echo $username ?>"><br>
        password : <br><input type="text" name="password" placeholder="Enter Password" value="<?php echo $password ?>"><br>   
        city :     <br> <input type="text" name="city" placeholder="Enter City"        value="<?php echo $city ?>"><br>
        mobile :   <br><input type="text" name="mobile" placeholder="Enter Mobile"     value="<?php echo $mobile ?>"><br>
            <br><input type="submit" name="submit" value="update">
    </form>
</body>
</html>