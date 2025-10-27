<?php
    include 'connect.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['pass'];

      $sql= "INSERT INTO `users`(username, email, password) values('$username', '$email', '$password')";
      $result= mysqli_query($con,$sql);

      if($result){
        echo "Registration Successful!";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container py-5">
      <form method="POST" action="">
        <input class="form-control mt-2" type="text" placeholder="User Name" name="username">
        <input class="form-control mt-2" type="email" placeholder="Email" name="email">
        <input class="form-control mt-2" type="password" placeholder="Password" name="pass">
        <input class="form-control btn btn-primary mt-2" type="submit" value="Register" name="submit">
      </form>
   </div>
</body>
</html>