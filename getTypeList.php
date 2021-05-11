<?php
    require_once ("db_connect.php");
    $sql="Select * from cars_type Where cType_Status='Available'";
    $result=mysqli_query($connect, $sql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<option id='$row[cType_ID]' value='$row[cType_Name]'>".$row['cType_Name']."</option>";
        }
    }
    else
    {
        echo "";
    }
?>