<?php
  session_start();
  if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
  }
  include "connect.php";

  if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $pass= $_POST['pass'];

    $sql= "INSERT INTO `students`(name, email, mobile, password) values('$name', '$email', '$phone', '$pass')";
    $result= mysqli_query($con, $sql);

    if($result){
      echo "Your form submission has been successfull!";
      header("location:display.php");
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
    <a href="/CRUD-with-php/display.php" class="btn btn-primary">All User</a>
      <form method="POST" action="">
        <input class="form-control mt-2" type="text" placeholder="Name" name="name">
        <input class="form-control mt-2" type="email" placeholder="Email" name="email">
        <input class="form-control mt-2" type="tel" placeholder="Phone Number" name="phone">
        <input class="form-control mt-2" type="password" placeholder="Password" name="pass">
        <input class="form-control btn btn-primary mt-2" type="submit" value="Submit" name="submit">
      </form>
   </div>
</body>
</html>