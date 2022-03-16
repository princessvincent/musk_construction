<?php
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
    <title>Intervention</title>
    <link rel="stylesheet" href="css1/css/bootstrap.min.css">

<body>
<script src="./js/bootstrap.min.js"></script>
<section>
    <div>
    <form action="pdf_gen.php" method="POST" style="margin-left: 400px;">

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
    <Button type="submit" class="btn btn-success w-50" name="submit">create Inspection</Button>
</div>

</form>
    </div>
</section>
</body>
</html>