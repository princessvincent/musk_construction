<?php
include_once "connection.php";
session_start();
$user = (object) $_SESSION["login"];
$user1 = $user->username;


if(!isset($_SESSION["login"])){
    header("location:login.php");
  }
// session_start();

$role = (object) $_SESSION["login"];
if($role->personnel==1)
include_once "header1.php";
elseif($role->personnel==2)
include_once "header2.php";
else{
 include_once "header3.php";
}
?>



<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projects</title>
    <link rel="stylesheet" href="css1/css/bootstrap.min.css">

<body>
<script src="./js/bootstrap.min.js"></script>

    <table border="1" class="table table-bordered">
<thead>
    <tr>
       
        <th> Project ID</th>
        <th>Username</th>
    </tr>
</thead>
<tbody>
    <?php
    $sql = "SELECT * FROM project_register where username = '$user1'";
    $rest = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($rest)){
  $id = $row["id"]
    ?>
    <tr>
       <td><?php echo $row["project_id"] ?></td> 
       <td><?php echo $row["username"] ?></td> 
    
    </tr>
    <?php  } ?>
</tbody>
    </table>
</body>
</html>