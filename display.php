<?php
  include "connect.php";
  $sql= "SELECT * FROM `students` ";
  $result= mysqli_query($con,$sql);
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
    <a href="/crud/user.php" class="btn btn-primary">Add User</a>
    <table class="table">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
      <?php
        if(mysqli_num_rows($result) > 0){
          while($row= mysqli_fetch_assoc($result)){
            echo "<tr scope='row'>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['mobile'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>
              <a href='update.php?id=" . $row['id'] . "' class='btn btn-primary'>Update</a>
              <a href='delete.php?id=" . $row['id'] . " ' class='btn btn-danger'>Delete</a>
            </td>";
            
            echo "</tr>";
          }
        }
      ?>
    </table>
  </div>
</body>
</html>