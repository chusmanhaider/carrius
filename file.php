<?php
    include_once '../db_connect.php';
    if(isset($_POST['btnSub']))
    {
        $email = mysqli_real_escape_string($connect, $_POST["email_sub"]);
        $status="Subscribed";
        if(strlen($email)>12)
        {
            $que="Select * from subscribers where sub_Email='$email' AND sub_Status='$status'";
            $rt=mysqli_query($connect,$que);
            $numRow=mysqli_num_rows($rt);
            if($numRow==0)
            {
                $sql="INSERT INTO subscribers (sub_Email, sub_Status) VALUES ('$email','$status')";
                if(mysqli_query($connect,$sql))
                {

                }
            }
            else
            {
            }
        }
    }
                        //echo $output;
?>