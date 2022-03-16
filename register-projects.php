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

if(isset($_POST['proj'])){
if(isset($_POST["project"]) && isset($_POST["name"])){
    $pro = mysqli_real_escape_string($conn,$_POST["project"]);
    $name = mysqli_real_escape_string($conn,$_POST["name"]);

    $sql = "INSERT INTO project_register (project_id,username)VALUES('$pro','$name')";
    $res = mysqli_query($conn,$sql);
    if($res){
        echo "You have successfully register for this Project!!";
    }else{
        echo "Unable to register Project";
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
    <title>Document</title>
    <link rel="stylesheet" href="css1/css/bootstrap.min.css">

<body>
<script src="./js/bootstrap.min.js"></script>

<section>
    <div class="" style="margin-left: 200px;">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Project Id</label>
                    <input type="number" class="form-control w-50" id="exampleFormControlInput1" name="project" placeholder="Project Id" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="name" placeholder="Username" required>
</div>
<div class="mb-3">
                    <Button type="submit" class="btn btn-success w-50" name="proj">Register Project</Button>
                </div>
        </form>
    </div>
</section>
</body>
</html>