<?php
include_once "connection.php";
session_start();

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
    <title>View by work</title>
    <link rel="stylesheet" href="css1/css/bootstrap.min.css">


<body>
<script src="./js/bootstrap.min.js"></script>

    <?php
    if(isset($_GET['id'])){
        // verify user here        
        $_SESSION['message'] = [];
        $user_id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        // var_dump($user_id);die;
        $sql2 = "UPDATE users SET verified = 1 where id = $user_id";
        $res = mysqli_query($conn,$sql2);
        if($res){
            $_SESSION['message']  = "Verify successfully";
        }else{
            $_SESSION['message']  = "verification failed";
        }
        header('location:unverify_user.php');
    }

    $sql = "SELECT * FROM users where verified = 0";
    $rest = mysqli_query($conn,$sql);
    ?>
    <h4 class="text-success"><?php echo ($_SESSION['message'] ?? "" ) ?></h4>
    <table border="1" class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th> Company Number</th>
            <th>Personnel</th>
            <th> Username</th>
            <th>Verified</th>
            <th>Action</th>
        </tr>
    </thead>
   
    <tbody>
        <?php
            if($rest){
            while($row=mysqli_fetch_assoc($rest)){
            $id = $row["id"];
        ?>
        <tr>
        <td><?php echo $row["name"] ?></td> 
        <td><?php echo $row["company_number"] ?></td> 
        <td><?php echo $row["personnel"] ?></td> 
        <td><?php echo $row["username"] ?></td> 
        <td><?php echo ($row["verified"]) ? "YES" : "NO" ?></td> 
        <td><a href="?id=<?php echo $id?>" class=" btn btn-success">Verify User</a></td>

        </tr>
        <?php  
        }
        }else{
            echo "<h4>No User</h4>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>