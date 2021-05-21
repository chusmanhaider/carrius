<?php
    include_once 'db_connect.php';
    if(isset($_POST['msgDealer']))
    {
        $name=mysqli_real_escape_string($connect,$_POST['yourName']);
        $name   = preg_replace('/\s+/', '', $name);

        $emailA=mysqli_real_escape_string($connect,$_POST['email']);
        $email   = preg_replace('/\s+/', '', $emailA);

        //$email = str_replace(' ', '', $email);
        $phone=mysqli_real_escape_string($connect,$_POST['phoneNum']);

        $msg=mysqli_real_escape_string($connect,$_POST['message']);
        $dealer_id=$_POST['dealer_id'];
        $car_id=$_POST['car_id'];

        $status="Requested";

        $budget=mysqli_real_escape_string($connect,$_POST['monthlyBudget']);
        $weather=mysqli_real_escape_string($connect,$_POST['weatherCond']);
        $family=mysqli_real_escape_string($connect,$_POST['numFamilyMem']);

        $sql_email="INSERT INTO contact_dealership (cDealer_Name, cDealer_Email, 
        cDealer_Phone, cDealer_Msg, cDealer_monthlyBudget, cDealer_FamilyMember, cDealer_Weather, cDealer_Status, DealerId) 
        VALUES ('$name','$email','$phone','$msg','$budget','$family','$weather','$status','$dealer_id')";

        if(mysqli_query($connect, $sql_email))
        {
            
            header("location:view-car.php?id=".$car_id."&msgR=SuccessR");
        }
        else
        {
            header("location:view-car.php?id=".$car_id."&msgErrR=ErrorR");
        }

    }
?>