<?php
include_once "connection.php";
session_start();
if(!isset($_SESSION["login"])){
    header("location:login.php");
  }

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
    <title>View by work</title>
        <link rel="stylesheet" href="css1/css/bootstrap.min.css">


<body>
<script src="./js/bootstrap.min.js"></script>

    <table border="1" class="table table-bordered">
<thead>
    <tr>
        <th>Name</th>
        <th> Company Number</th>
        <th>Personnel</th>
        <th> Username</th>
        <th>Verified</th>
        
    </tr>
</thead>
<tbody>
    <?php
    $sql = "SELECT * FROM users where verified = 1";
    $rest = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($rest)){
  
    ?>
    <tr>
       <td><?php echo $row["name"] ?></td> 
       <td><?php echo $row["company_number"] ?></td> 
       <td><?php echo $row["personnel"] ?></td> 
       <td><?php echo $row["username"] ?></td> 
       <td><?php echo $row["verified"] ?></td> 
       

    </tr>
    <?php  } ?>
</tbody>
    </table>
</body>
</html>