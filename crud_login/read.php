<?php 

include "config.php";

if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Read Data</h1>
    
    <table border="2" class="m-5 p-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>City</th>
                <th>Mobile</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              
              $sql = "SELECT * FROM `ronak`";

              $result = mysqli_query($con,$sql);

              if($result){
               while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $username = $row['username'];
                $password = $row['password'];
                $city = $row['city'];
                $mobile = $row['mobile'];

                
                echo '<tr>
                     <th>'.$id.'</th>
                     <th>'.$username.'</th>
                     <th>'.$password.'</th>
                     <th>'.$city.'</th>
                     <th>'.$mobile.'</th>
                     <td>
                      <button class="btn btn-success"><a class="text-light text-decoration-none" href="update.php?id='.$id.'">Update</a></button>
                      <button class="btn btn-danger"><a class="text-light text-decoration-none" href="delete.php?id='.$id.'">Delete</a></button>
                     </td>
                  </tr>';
               }
                
              }

            ?>
        </tbody>
    </table>
    <a href="register.php" class="btn btn-success">Add new User</a>
    <a href="login.php"  class="btn btn-success">Login</a>
</body>
</html>