<?php
    include_once 'db_connect.php';
    if(isset($_POST['msgDealerBtn']))
    {
        $name=mysqli_real_escape_string($connect,$_POST['yourName']);
        $email=mysqli_real_escape_string($connect,$_POST['email']);
        $msg=mysqli_real_escape_string($connect,$_POST['message']);
        $notify=mysqli_real_escape_string($connect,$_POST['notifyMe']);

        $vidCall=mysqli_real_escape_string($connect,$_POST['liveVideoCall']);
        $date=mysqli_real_escape_string($connect,$_POST['dateSetFor']);
        $specificTime=mysqli_real_escape_string($connect,$_POST['specifcTime']);
        $cellNum=mysqli_real_escape_string($connect,$_POST['phoneNumber']);
        $zipCode=mysqli_real_escape_string($connect,$_POST['zipCode']);

        $car_id=$_POST['car_id'];

        $dealer_id=mysqli_real_escape_string($connect,$_POST['dealer_id']);

        $sql_msg="INSERT INTO msg_dealer (msgD_fName, msgD_Email, msgD_Msg, msgD_vidCallFlag, 
        msgD_Date, msgD_SpecificTime, msgD_PhoneNum, msgD_ZipCode, DealerId) VALUES 
        ('$name','$email','$msg','$vidCall','$date','$specificTime','$cellNum','$zipCode','$dealer_id')";

        if(mysqli_query($connect,$sql_msg))
        {
            $last_id = mysqli_insert_id($connect);
            if($last_id!='')
            {
                $sql_notify="INSERT INTO notifyforoffers (notifyOffer_Email, notifyOffer_Status) VALUES ('$email','$notify')";
                if(mysqli_query($connect,$sql_notify))
                {
                    header("location:view-car.php?id=".$car_id."&msgD=DSuccess");
                }
            }
            
        }
        else
        {
            header("location:view-car.php?id=".$car_id."&msgErrD=DError");
        }
    }
?>