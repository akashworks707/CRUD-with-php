<?php
session_start();
include "connect.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if($password == $row['password']){
            $_SESSION['user'] = $row['username'];
            header("Location: display.php"); 
            exit();
        } else {
            echo "❌ Wrong password!";
        } 
    } else {
        echo "❌ No user found!";
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
<form method="POST">
     <h2>Login</h2>
    <input class="form-control mt-2" type="email" placeholder="Email" name="email">
    <input class="form-control mt-2" type="password" placeholder="Password" name="password">
    <input class="form-control btn btn-primary mt-2" type="submit" value="Login" name="login">
</form>
</div>
</body>
</html>