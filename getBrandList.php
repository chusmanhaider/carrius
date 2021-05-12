<?php
    require_once ("db_connect.php");
    $selectedBrand = $_GET ['brand'];
    $sql="Select * from cars_brand Where carBrand_Status='Available'";
    $result=mysqli_query($connect, $sql);
    $numRows=mysqli_num_rows($result);
    if($selectedBrand=='')
    {
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
    }
    else
    {
        if($numRows>0)
        {
            while($rw=mysqli_fetch_assoc($result))
            {
                if($selectedBrand==$rw['carBrand_Name'])
                {
                    echo "<option id='$rw[carBrand_ID]' selected='selected' value='$rw[carBrand_Name]'>".$rw['carBrand_Name']."</option>";
                }
                else
                {
                    echo "<option id='$rw[carBrand_ID]' value='$rw[carBrand_Name]'>".$rw['carBrand_Name']."</option>";
                }
            }
        }
        else
        {
            echo "";
        }
    }
?>