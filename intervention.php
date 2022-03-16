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

if(isset($_POST["submit"])){
    if(isset($_POST["proj_name"])&& isset($_POST["proj_id"]) && isset($_POST["insp_date"]) && isset($_POST["insp_username"]) && isset($_POST["site_loc"]) && isset($_POST["insp_time"]) && isset($_POST["proj_dura"]) && isset($_POST["comment"])&& isset($_POST["action"]) && isset($_POST["site_image"])&& isset($_POST["site_rate"]) && isset($_POST["num_staff"]) && isset($_POST["sta_mach"])){
        $proj_name = mysqli_real_escape_string($conn,$_POST["proj_name"]);
        $proj_id = mysqli_real_escape_string($conn,$_POST["proj_id"]);
        $insp_date = mysqli_real_escape_string($conn,$_POST["insp_date"]);
        $insp_username = mysqli_real_escape_string($conn,$_POST["insp_username"]);
        $site_loc = mysqli_real_escape_string($conn,$_POST["site_loc"]);
        $insp_time = mysqli_real_escape_string($conn,$_POST["insp_time"]);
        $proj_dura = mysqli_real_escape_string($conn,$_POST["proj_dura"]);
        $comment = mysqli_real_escape_string($conn,$_POST["comment"]);
        $action = mysqli_real_escape_string($conn,$_POST["action"]);
        $site_image = mysqli_real_escape_string($conn,$_POST["site_image"]);
        $site_rate = mysqli_real_escape_string($conn,$_POST["site_rate"]);
        $num_staff = mysqli_real_escape_string($conn,$_POST["num_staff"]);
        $sta_mach = mysqli_real_escape_string($conn,$_POST["sta_mach"]);

        $sql = "INSERT INTO intervension (name_of_project,project_id,date_of_inspection,inspector_username,location_of_site,time_of_inspection,duration_of_project,comments,action,number_of_site_image,site_rating,number_of_staff,state_of_equipment_and_machinary) VALUES('$proj_name','$proj_id','$insp_date','$insp_username','$site_loc', '$insp_time', '$proj_dura','$comment','$action','$site_image','$site_rate','$num_staff','$sta_mach')";
        $rest1 = mysqli_query($conn,$sql);
        if($rest1){
            echo "You have successfully created intervention!!";
        }else{
            echo "Failed";
        }
    }else{
        echo "error";
    }
}

?>


<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intervention</title>
    <link rel="stylesheet" href="css1/css/bootstrap.min.css">

<body>
<script src="./js/bootstrap.min.js"></script>
<section>
    <div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" style="margin-left: 400px;">

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Name of Project</label>
    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="proj_name" placeholder=" Project Name" required>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Project Id</label>
    <input type="number" class="form-control w-50" id="exampleFormControlInput1" name="proj_id" placeholder="Project Id" required>
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Inspection Date</label>
    <input type="date" class="form-control w-50" id="exampleFormControlInput1" name="insp_date" placeholder="Inspection Date" required>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Inspector Username</label>
    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="insp_username" placeholder="Inspector Username" required>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Site Location</label>
    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="site_loc" placeholder="Site Location" required>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Time of Inspection</label>
    <input type="time" class="form-control w-50" id="exampleFormControlInput1" name="insp_time" placeholder="Time of Inspection" required>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Project Duration</label>
    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="proj_dura" placeholder="Project Duration" required>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Comment</label>
    <textarea  class="form-control w-50" id="exampleFormControlInput1" name="comment" placeholder="This is a brief summary of project so far" required></textarea>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Action</label>
    <textarea  class="form-control w-50" id="exampleFormControlInput1" name="action" placeholder="This is a brief summary of the behaviour/performance of staff working on the site" required></textarea>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Number of site image</label>
    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="site_image" placeholder="Number of Site Images" required>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Site rating</label>
    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="site_rate" placeholder="Site Rating" required>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Number of staff</label>
    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="num_staff" placeholder="Number of Staff" required>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">State of equipment and machinary</label>
    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="sta_mach" placeholder="State of Equipment and Machinary" required>
</div>

<div class="mb-3">
    <Button type="submit" class="btn btn-success w-50" name="submit">Create Intervention</Button>
</div>

</form>
    </div>
</section>
</body>
</html>