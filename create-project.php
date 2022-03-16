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


if(isset($_POST["create"])){
    $proj_name = mysqli_real_escape_string($conn,$_POST["proj_name"]);
    $proj_id = mysqli_real_escape_string($conn,$_POST["proj_id"]);
    $loc_site = mysqli_real_escape_string($conn,$_POST["loc_site"]);
    $size_site = mysqli_real_escape_string($conn,$_POST["size_site"]);
    $proj_dura = mysqli_real_escape_string($conn,$_POST["proj_dura"]);
    $num_staff = mysqli_real_escape_string($conn,$_POST["num_staff"]);
    $fin_budg = mysqli_real_escape_string($conn,$_POST["fin_budg"]);
    $machine = mysqli_real_escape_string($conn,$_POST["machine"]);
    $insp = mysqli_real_escape_string($conn,$_POST["inspect"]);
    $interv = mysqli_real_escape_string($conn,$_POST["interv"]);

    $insert = "INSERT INTO projects (project_name,project_id,location_of_site,size_of_site,expected_duration_of_project,number_of_staff_needed,financial_budget,machinaries_to_be_use,inspected,intervened)VALUES('$proj_name','$proj_id','$loc_site','$size_site','$proj_dura','$num_staff','$fin_budg','$machine','$insp','$interv')";
    $res = mysqli_query($conn,$insert);
    if($res){
        echo "Project created successfully!!";
    }else{
        echo "Unable to create Project";
    }
}else{
    // echo "error";
}
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project</title>
    <link rel="stylesheet" href="css1/css/bootstrap.min.css">
</head>
<body>
<script src="./js/bootstrap.min.js"></script>
   <section> 
       <div class="" style="margin-left: 200px;">
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
           <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Project Name</label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="proj_name" placeholder="Project Name" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Project  Id</label>
                    <input type="number" class="form-control w-50" id="exampleFormControlInput1" name="proj_id" placeholder="Project Id" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Location of Site</label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="loc_site" placeholder="Location of Site" required >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Size of Site</label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="size_site" placeholder="Size of Site" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Expected duration of project</label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="proj_dura" placeholder="Expected duration of project" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Number of staff needed</label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="num_staff" placeholder="Number of staff needed" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Financial Budget</label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="fin_budg" placeholder="Financial Budget" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Machinaries to be used </label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="machine" placeholder="Machinaries to be Used" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Inspected</label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="inspect" placeholder="Inspected" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Intervened</label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="interv" placeholder="Intervened" required>
                </div>
                

                <div class="mb-3">
                    <Button type="submit" class="btn btn-success w-50" name="create">Create Project</Button>
                </div>


           </form>
       </div>
   </section> 
</body>
</html>