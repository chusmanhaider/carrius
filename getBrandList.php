<?php
    require_once ("db_connect.php");
    $sql="Select * from cars_brand Where carBrand_Status='Available'";
    $result=mysqli_query($connect, $sql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<option id='$row[carBrand_ID]' value='$row[carBrand_Name]'>".$row['carBrand_Name']."</option>";
        }
    }
    else
    {
        echo "";
    }
?>