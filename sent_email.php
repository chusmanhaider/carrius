<?php
    include_once 'db_connect.php';
    if(isset($_POST['emailMe']))
    {
        $emailA=mysqli_real_escape_string($connect,$_POST['getSubEmail']);
        $email   = preg_replace('/\s+/', '', $emailA);
        //$email = str_replace(' ', '', $email);
        $msg=mysqli_real_escape_string($connect,$_POST['message']);
        $car_id=$_POST['car_id'];

        $notify=mysqli_real_escape_string($connect,$_POST['notifyMe']);

        $sql_email="INSERT INTO emailCar (emailCar_Email, CarId) VALUES ('$email','$car_id')";

        if(mysqli_query($connect, $sql_email))
        {
            $last_id = mysqli_insert_id($connect);
            if($last_id!='')
            {
                $sql_notify="INSERT INTO notifyforoffers (notifyOffer_Email, notifyOffer_Status) VALUES ('$email','$notify')";
                if(mysqli_query($connect,$sql_notify))
                {
                    header("location:view-car.php?id=".$car_id."&msg=Success");
                }
                else
                {
                    header("location:view-car.php?id=".$car_id."&msgErr=Error");
                }
            }
            else
            {
                header("location:view-car.php?id=".$car_id."&msgErr=Error");
            }
        }
        else
        {
            header("location:view-car.php?id=".$car_id."&msgErr=Error");
        }

    }
?>