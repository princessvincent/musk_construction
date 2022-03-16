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
    <title>New projects</title>
    <link rel="stylesheet" href="css1/css/bootstrap.min.css">


<body>
<script src="./js/bootstrap.min.js"></script>

    <table border="1" class="table table-bordered">
<thead>
    <tr>
        <th>Project Name</th>
        <th> Project ID</th>
        <th>Location of Site</th>
        <th>Size of Site</th>
        <th>Expected duration of project</th>
        <th>Number of Staff Needed</th>
        <th>Financial Budget</th>
        <th>Machinaries to be Use</th>
        <th>Action</th>
        
    </tr>
</thead>
<tbody>
    <?php
    $sql = "SELECT * FROM projects";
    $rest = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($rest)){
  $id = $row["id"]
    ?>
    <tr>
       <td><?php echo $row["project_name"] ?></td> 
       <td><?php echo $row["project_id"] ?></td> 
       <td><?php echo $row["location_of_site"] ?></td> 
       <td><?php echo $row["size_of_site"] ?></td> 
       <td><?php echo $row["expected_duration_of_project"] ?></td> 
       <td><?php echo $row["number_of_staff_needed"] ?></td> 
       <td><?php echo $row["financial_budget"] ?></td> 
       <td><?php echo $row["machinaries_to_be_use"] ?></td> 
       <td><a href="./register-projects.php?id=<?php echo $id?>" class="btn btn-success">Register For Project</a></td> 


    </tr>
    <?php  } ?>
</tbody>
    </table>
</body>
</html>