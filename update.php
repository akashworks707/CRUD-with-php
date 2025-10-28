<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
        exit();
    }
    include "connect.php";

    if(isset($_GET['id'])){
        $id= $_GET['id'];
        
    $sql = "SELECT * FROM `students` WHERE id=$id";
    $result= mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $mail = $row['email'];
    $mobile = $row['mobile'];
    $pass = $row['password'];
    }

    if(isset($_POST['update'])){
        $name =$_POST['name'];
        $email =$_POST['email'];
        $phone =$_POST['phone'];
        $pass =$_POST['pass'];

        $sql= "UPDATE students SET name='$name', email='$email', mobile='$phone', password='$pass' WHERE id=$id";
        $result= mysqli_query($con,$sql);

        if($result){
            echo "Data Update Successfully!";
            header('location:display.php');
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
    <a href="/CRUD-with-php/user.php" class="btn btn-primary">Add User</a>
      <form method="POST" action="">
        <input class="form-control mt-2" type="text" value="<?php echo $name ?>" name="name">
        <input class="form-control mt-2" type="email" value="<?php echo $mail ?>" name="email">
        <input class="form-control mt-2" type="tel" value="<?php echo $mobile ?>" name="phone">
        <input class="form-control mt-2" type="password" value="<?php echo $pass ?>" name="pass">
        <input class="form-control btn btn-primary mt-2" type="submit" value="Update" name="update">
      </form>
   </div>
</body>
</html>