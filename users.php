<?php
include_once "connection.php";

if(isset($_POST["sign"])){
    if(isset($_POST["name"])&& isset($_POST["company"])&& isset($_POST["personel"]) && isset($_POST["password"]) && isset($_POST["username"])){
        $name = mysqli_real_escape_string($conn,$_POST["name"]);
        $company = mysqli_real_escape_string($conn,$_POST["company"]);
        $person = mysqli_real_escape_string($conn,$_POST["personel"]);
        $pass = md5(mysqli_real_escape_string($conn,$_POST["password"]));
        $user = mysqli_real_escape_string($conn,$_POST["username"]);

$sql = "SELECT * from users where username = '$user'";
$res2 = mysqli_query($conn,$sql);
$num1 = mysqli_num_rows($res2);
if($num1==1){
    echo "Sorry Username already exist!!";
}else{
    $sql = "INSERT INTO users (name,company_number,personnel,password,username)VALUES('$name', '$company','$person', '$pass','$user')";
    $rest = mysqli_query($conn,$sql);
    if($rest){
        echo "You have registered successfully, You wont be able to login till you are verify by admin";
        header("location:login.php");
    }else{
        echo "Unable to register";
    }
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
    <title>Sign Up</title>

    <link rel="stylesheet" href="css1/css/bootstrap.min.css">


<body>
    <script src="./js/bootstrap.min.js"></script>


    <section>
        <div class="">
            <h1 class="text-success text-center mb-5">Sign Up</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" style="margin-left: 400px;">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="name" placeholder="Name" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Company Number</label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="company" placeholder="Company Number" required>
                </div>
                <label for=""> Select Personnel</label>
                <select class="form-select w-50" aria-label="Default select example" name="personel" required>
                    <?php
                    $sql = "SELECT * FROM roles";
                    $res = mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_array($res)){

                    ?>
                   
                    <option value="<?php  echo $row['id']?>"><?php echo $row['name']?></option>
                    <?php }?>
                </select>
            

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="Password" class="form-control w-50" id="exampleFormControlInput1" name="password" placeholder="Password" required >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" class="form-control w-50" id="exampleFormControlInput1" name="username" placeholder="Username" required>
                </div>
                

                <div class="mb-3">
                    <Button type="submit" class="btn btn-success w-50" name="sign">Sign Up</Button>
                </div>

            </form> 
        </div>
    </section>
</body>

</html>