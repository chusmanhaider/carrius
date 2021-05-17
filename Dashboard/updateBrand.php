<?php  
require_once '../db_connect.php';
error_reporting(0);
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $name = mysqli_real_escape_string($connect, $_POST["updateCategoryName"]);
	  $status = mysqli_real_escape_string($connect, $_POST["updateCategoryStatus"]);
      if($_POST["category_id"] != '')  
      {  
           $query = "  
           UPDATE cars_brand  
           SET carBrand_Name='$name',
           carBrand_Status='$status'
           WHERE carBrand_ID='".$_POST["category_id"]."'";  
           $message = 'Data Updated';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           
      }  
       echo $output;
 }  
 ?>