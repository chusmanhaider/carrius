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
                <div class="row">
                    <span class="dailyRoutine">
                        <span class="col col-sm-4">
                            <span class="days daysRoutineEl">
                                <span style="color:black">Monday</span>
                            </span>
                        </span>
                        <span class="col col-sm-6">
                            <span class="hours daysRoutineLabel">
                                <b style="color:black">9:00 AM - 8:30 PM</b>
                            </span>
                        </span>
                    </span> 
                </div>
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
                <div class="row">
                    <span class="dailyRoutine">
                        <span class="col col-sm-4">
                            <span class="days daysRoutineEl">
                                <span style="color:black">Monday</span>
                            </span>
                        </span>
                        <span class="col col-sm-6">
                            <span class="hours daysRoutineLabel">
                                <b style="color:black">9:00 AM - 8:30 PM</b>
                            </span>
                        </span>
                    </span> 
                </div>
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
                <div class="row">
                    <span class="dailyRoutine">
                        <span class="col col-sm-4">
                            <span class="days daysRoutineEl">
                                <span style="color:black">Monday</span>
                            </span>
                        </span>
                        <span class="col col-sm-6">
                            <span class="hours daysRoutineLabel">
                                <b style="color:black">9:00 AM - 8:30 PM</b>
                            </span>
                        </span>
                    </span> 
                </div>
            </span>
    </body>
</html>