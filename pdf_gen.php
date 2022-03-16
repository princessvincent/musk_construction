<?php
include_once "connection.php";

session_start();
if(!isset($_SESSION["login"])){
    header("location:login.php");
  }

// include_once "inspection.php";
include_once "./fpdf1/fpdf.php";

$pdf = new FPDF();

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


        $pdf->AddPage();
        $pdf->SetFont("Arial","B",19);


       $pdf->Cell(50,10,"proj_name",1,0);
       $pdf->Cell(150,10,$proj_name,1,1);

       $pdf->Cell(50,10,"proj_id",1,0);
       $pdf->Cell(150,10,$proj_id,1,1);

       $pdf->Cell(50,10,"insp_date",1,0);
       $pdf->Cell(150,10,$insp_date,1,1);

       $pdf->Cell(50,10,"insp_username",1,0);
       $pdf->Cell(150,10,$insp_username,1,1);

       $pdf->Cell(50,10,"site_loc",1,0);
       $pdf->Cell(150,10,$site_loc,1,1);

       $pdf->Cell(50,10,"insp_time",1,0);
       $pdf->Cell(150,10,$insp_time,1,1);

       $pdf->Cell(50,10,"proj_dura",1,0);
       $pdf->Cell(150,10,$proj_dura,1,1);

       $pdf->Cell(50,10,"comment",1,0);
       $pdf->Cell(150,10,$comment,1,1);

       $pdf->Cell(50,10,"action",1,0);
       $pdf->Cell(150,10,$action,1,1);

       $pdf->Cell(50,10,"site_image",1,0);
       $pdf->Cell(150,10,$site_image,1,1);

       $pdf->Cell(50,10,"site_rate",1,0);
       $pdf->Cell(150,10,$site_rate,1,1);

       $pdf->Cell(50,10,"num_staff",1,0);
       $pdf->Cell(150,10,$num_staff,1,1);

       $pdf->Cell(50,10,"sta_mach",1,0);
       $pdf->Cell(150,10,$sta_mach,1,1);
       
       
       $pdf->Output();
       
       
       $sql = "INSERT INTO inspection (name_of_project,project_id,date_of_inspection,inspector_username,location_of_site,time_of_inspection,duration_of_project,comments,action,number_of_site_images,site_rating,number_of_staff,state_of_equipment_and_machinary) VALUES('$proj_name','$proj_id','$insp_date','$insp_username','$site_loc', '$insp_time', '$proj_dura','$comment','$action','$site_image','$site_rate','$num_staff','$sta_mach')";
       $rest1 = mysqli_query($conn,$sql);
       if($rest1){
           echo "You have successfully created inspection!!";
       }else{
           echo "Failed";
       }

       
    }else{
        echo "error";
    }
}

?>

