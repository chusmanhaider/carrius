<html>
    <head>
        <style>
            .hrUnderTeam{
                width:140px;
                margin-left: 10px;
            }
            .changeColor{
                color:black;
            }
            .alignLeftHead{
                margin-left: 10px;
            }
            @media (max-width:575px){
                .daysRoutineEl{
                    text-align: center;
                }
            }
        </style>
    </head>
    <body>
        <div class="">
            <h3 class="changeColor">Team Members</h3>
            <hr class="hrUnderTeam" style="border: 1px solid #047cf3;stroke: #047cf3; fill: #047cf3;margin-top:-7px;">
            <h4 class="changeColor alignLeftHead">Administration Department</h4>
            <?php
                /*include_once 'db_connect.php';
                $d_Id=$_GET['zD'];
                $sql_admindept="Select * from dealer INNER JOIN administration_dept ON
                administration_dept.DealerId=dealer.dealer_ID Where administration_dept.adDept_Status='Active'
                AND dealer.dealer_ID='$d_Id'";
                $result=mysqli_query($connect, $sql_admindept);
                $numRows_admin=mysqli_num_rows($result);
                if()*/

            ?>
            <span class="adminDept">
            <?php
                $dealer_id=$_GET['url'];
                $sql_admin="Select * from administration_dept where adDept_Status='Active' AND DealerId='$dealer_id' ORDER By adDept_DesignPriority ASC";
                $result_admin=mysqli_query($connect, $sql_admin);
                $numRows_admin=mysqli_num_rows($result_admin);
                if($numRows_admin>0)
                {
                    while($row_admin=mysqli_fetch_assoc($result_admin))
                    {
            ?>
                <div class="row">
                    <span class="dailyRoutine">
                        <span class="col col-sm-4">
                            <span class="days daysRoutineEl">
                                <span style="color:black"><?php echo $row_admin['adDept_MemberName'];?></span>
                            </span>
                        </span>
                        <span class="col col-sm-6">
                            <span class="hours daysRoutineLabel">
                                <b style="color:black"><?php echo $row_admin['adDept_Designation'];?></b>
                            </span>
                        </span>
                    </span> 
                </div>
                <?php
                    }
                }
                else
                {
                ?>
                <div class="row">
                    <span style="font-size:14px;color:red;margin-left:45px">No Administration Staff Added yet</span>
                </div>
                <?php
                }
                ?>
            </span>
            <!-- Finance Dept-->
            <h4 class="changeColor alignLeftHead">Finance Department</h4>
            <?php
                /*include_once 'db_connect.php';
                $d_Id=$_GET['zD'];
                $sql_financedept="Select * from dealer INNER JOIN finance_dept ON
                finance_dept.DealerId=dealer.dealer_ID Where finance_dept.finDept_Status='Active'
                AND dealer.dealer_ID='$d_Id'";
                $result_finance=mysqli_query($connect, $sql_financedept);
                $numRows_finance=mysqli_num_rows($result_finance);
                if()*/

            ?>
            <span class="financeDept">
            <?php
                $dealer_id=$_GET['url'];
                $sql_fin="Select * from finance_dept where finDept_Status='Active' AND DealerId='$dealer_id' ORDER By finDept_DesignPriority ASC";
                $result_fin=mysqli_query($connect, $sql_fin);
                $numRows_fin=mysqli_num_rows($result_fin);
                if($numRows_fin>0)
                {
                    while($row_fin=mysqli_fetch_assoc($result_fin))
                    {
            ?>
                <div class="row">
                    <span class="dailyRoutine">
                        <span class="col col-sm-4">
                            <span class="days daysRoutineEl">
                                <span style="color:black"><?php echo $row_fin['finDept_MemberName'];?></span>
                            </span>
                        </span>
                        <span class="col col-sm-6">
                            <span class="hours daysRoutineLabel">
                                <b style="color:black"><?php echo $row_fin['finDept_Designation'];?></b>
                            </span>
                        </span>
                    </span> 
                </div>
                <?php
                    }
                }
                else
                {
                ?>
                <div class="row">
                    <span style="font-size:14px;color:red;margin-left:45px">No Finance Staff Added yet</span>
                </div>
                <?php
                }
                ?>
            </span>
        </div>
        <!-- Sales Department-->
        <h4 class="changeColor alignLeftHead">Sales Department</h4>
            <?php
                /*include_once 'db_connect.php';
                $d_Id=$_GET['zD'];
                $sql_salesdept="Select * from dealer INNER JOIN sales_dept ON
                sales_dept.DealerId=dealer.dealer_ID Where sales_dept.sales_Status='Active'
                AND dealer.dealer_ID='$d_Id'";
                $result_sales=mysqli_query($connect, $sql_salesdept);
                $numRows_sales=mysqli_num_rows($result_sales);
                if()*/

            ?>
            <span class="salesDept">
            <?php
                $dealer_id=$_GET['url'];
                $sql_sales="Select * from sales_dept where sales_Status='Active' AND DealerId='$dealer_id' ORDER By sales_DesignPriority ASC";
                $result_sales=mysqli_query($connect, $sql_sales);
                $numRows_sales=mysqli_num_rows($result_sales);
                if($numRows_sales>0)
                {
                    while($row_sales=mysqli_fetch_assoc($result_sales))
                    {
            ?>
                <div class="row">
                    <span class="dailyRoutine">
                        <span class="col col-sm-4">
                            <span class="days daysRoutineEl">
                                <span style="color:black"><?php echo $row_fin['sales_MemberName'];?></span>
                            </span>
                        </span>
                        <span class="col col-sm-6">
                            <span class="hours daysRoutineLabel">
                                <b style="color:black"><?php echo $row_fin['sales_Designation'];?><</b>
                            </span>
                        </span>
                    </span> 
                </div>
                <?php
                    }
                }
                else
                {
                ?>
                <div class="row">
                    <span style="font-size:14px;color:red;margin-left:45px">No Sales Staff Added yet</span>
                </div>
                <?php
                }
                ?>
            </span>
    </body>
</html>