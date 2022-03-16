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
    <title>View by site</title>
    <link rel="stylesheet" href="css1/css/bootstrap.min.css">


<body>
<script src="./js/bootstrap.min.js"></script>


    <table border="1" class="table table-bordered">
<thead>
    <tr>
        <th>Name of project</th>
        <th> Project ID</th>
        <th>Date of inspection</th>
        <th>Inspector Username</th>
        <th>Location of Site</th>
        <th>Time of Inspection</th>
        <th>Duration of project</th>
        <th>Comments</th>
        <th>Action</th>
        <th>Number of Site Images</th>
        <th>Site Rating</th>
        <th>Number of Staff</th>
        <th>State of Equipment and Machinary</th>
    </tr>
</thead>
<tbody>
    <?php
    $sql = "SELECT * FROM inspection";
    $rest = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($rest)){
  
    ?>
    <tr>
       <td><?php echo $row["name_of_project"] ?></td> 
       <td><?php echo $row["project_id"] ?></td> 
       <td><?php echo $row["date_of_inspection"] ?></td> 
       <td><?php echo $row["inspector_username"] ?></td> 
       <td><?php echo $row["location_of_site"] ?></td> 
       <td><?php echo $row["time_of_inspection"] ?></td> 
       <td><?php echo $row["duration_of_project"] ?></td> 
       <td><?php echo $row["comments"] ?></td> 
       <td><?php echo $row["action"] ?></td> 
       <td><?php echo $row["number_of_site_images"] ?></td> 
       <td><?php echo $row["site_rating"] ?></td> 
       <td><?php echo $row["number_of_staff"] ?></td> 
       <td><?php echo $row["state_of_equipment_and_machinary"] ?></td> 

    </tr>
    <?php  } ?>
</tbody>
    </table>
</body>
</html>