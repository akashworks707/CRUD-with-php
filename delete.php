<?php
    include 'connect.php';

    if(isset($_GET['id'])){
        $id= $_GET['id'];
        
        $sql = "DELETE FROM `students` WHERE id=$id";
        $result= mysqli_query($con, $sql);
        
        if($result){
            echo "The user has been deleted!";
            header('location:display.php');
        }else{
            die(mysqli_error($con));
        }
    }

?>