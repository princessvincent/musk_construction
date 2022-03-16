<?php
include "connection.php";

session_start();

if(isset($_POST["log"])){
    if(isset($_POST["name"]) && isset($_POST["pass"])){
        $user = $_POST["name"];
        $pass = $_POST["pass"];

        // $sel = "SELECT verified from users";
        // $re1 = mysqli_query($conn,$sel);
        // $veri = mysqli_fetch_assoc($re1);

        $sele = "SELECT * FROM users where username = '$user' and password = '$pass'";
        $res = mysqli_query($conn,$sele);
        $num = mysqli_num_rows($res);
        if($num == 1 ){
            $_SESSION["login"] = mysqli_fetch_assoc($res);

            $this_user = (object) $_SESSION["login"];
            if(!$this_user->verified){
                echo "Your Profile has not been verified";
            }elseif($this_user->personnel ==1)
                header("location:admin-dashboard.php");
            elseif ($this_user->personnel ==2)
                header("location:inspector-dashboard.php");
            elseif ($this_user->personnel==3)
                header("location:staff-dashboard.php");
            }else{
                echo "Wrong Password or Username";
            }

        }else{
            echo "error";
        }

    }


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css1/css/bootstrap.min.css">

</head>
<body>
<script src="./js/bootstrap.min.js"></script>

<section>
    <div>
        <h1 class="text-success">Log in Page</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" style="margin-left: 400px;">

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Username</label>
    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="name" placeholder="Username" required>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Password</label>
    <input type="password" class="form-control w-50" id="exampleFormControlInput1" name="pass" placeholder="Password" required>
</div>

<div class="mb-3">
    <Button type="submit" class="btn btn-success w-50" name="log">Log in</Button>
</div>

</form> 
    </div>
</section>
</body>
</html>