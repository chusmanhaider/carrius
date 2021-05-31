<html>
    <head>
        <style>
            .hrUnderAboutDealer{
                width:160px;
                margin-left: 10px;
            }
            .daysRoutineEl{
                margin-left: 39px;
            }
            .daysRoutineLabel{
                margin-left: -20px;
            }
            .thisLabel,.cellNumLabel{
                margin-left: 10px;
            }
            .alignLeft{
                margin-left: 20px;
            }
            .alignLeftVal{
                margin-left: -20px;
            }
            .fa{
                margin-left: 10px;
                margin-right: 7px;
            }
            .alignLeftLast{
                color:black;
                margin-left:39px;
            }
            .fa-check{
                background-color:#1cc412;
                border:1px solid black;
                color:white;
            }
            .fa-check:after{
                margin-left: -2px;
            }
            .addMarTop{
                margin-top: 25px;
                margin-left: 50px;
            }
            .leftAlign{
                margin-left: 50px;
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
            <h3 style="color:black">About Dealership</h3>
            <hr class="hrUnderAboutDealer" style="border: 1px solid #047cf3;stroke: #047cf3; fill: #047cf3;margin-top:-7px;">
            <h5 style="color:black;margin-left:10px"><b>Business Hours:</b></h5>
            <!-- Daily Routine-->
            <span class="daysRoutine">
                <?php
                    $Id = $_GET['url'];
                    $sql_test="Select * from business_schedule Inner join
                    bschedule_check on business_schedule.bsCheckId = bschedule_check.bSCheck_ID
                    where business_schedule.DealerId='$Id'";
                    
                    $result = mysqli_query($connect, $sql_test);
                    $numRows = mysqli_num_rows($result);
                    $line = mysqli_fetch_assoc($result);

                    $isClosed_Mon = $line['bSCheck_Mon'];
                    $isClosed_Tue = $line['bSCheck_Tue'];
                    $isClosed_Wed = $line['bSCheck_Wed'];
                    $isClosed_Thr = $line['bSCheck_Thr'];
                    $isClosed_Fri = $line['bSCheck_Fri'];
                    $isClosed_Sat = $line['bSCheck_Sat'];
                    $isClosed_Sun = $line['bSCheck_Sun'];
                     
                    //From Time
                    $query_from = "Select * from business_fromtime Inner join business_schedule on
                    business_schedule.fromTimeId = business_fromtime.bsFrom_ID 
                    where business_schedule.DealerId='$Id'";

                    $result_from = mysqli_query($connect, $query_from);
                    $row_from = mysqli_fetch_assoc($result_from);
                     
                    //TO TIME
                    $query_to = "Select * from business_totime Inner join business_schedule on
                    business_schedule.toTimeId = business_totime.bsTo_ID 
                    where business_schedule.DealerId='$Id'";

                    $result_to = mysqli_query($connect, $query_to);
                    $row_to = mysqli_fetch_assoc($result_to);

                    
                    if($numRows>0)
                    {
                ?>
                    <div class="row">
                        <span class="dailyRoutine">
                            <span class="col col-sm-3">
                                <span class="days daysRoutineEl">
                                    <span style="color:black">Monday</span>
                                </span>
                            </span>
                            <span class="col col-sm-6">
                                <span class="hours daysRoutineLabel">
                                    <b style="color:black">
                                        <?php
                                            if($isClosed_Mon=='Closed')
                                            {
                                                echo "<span class='text-danger' style='padding-left:10%'>Closed</span>";
                                            }
                                            else if($isClosed_Mon=='')
                                            {
                                                $mon_time = date("g:i A", strtotime($row_from['bsFrom_Mon'])); 
                                                $mon_ttime = date("g:i A", strtotime($row_to['bsTo_Mon'])); 
                                                echo $mon_time." - ".$mon_ttime;
                                            }
                                        ?>
                                    </b>
                                </span>
                            </span>
                        </span> 
                    </div>
                    <div class="row">
                        <span class="dailyRoutine">
                            <span class="col col-sm-3">
                                <span class="days daysRoutineEl">
                                    <span style="color:black">Tuesday</span>
                                </span>
                            </span>
                            <span class="col col-sm-6">
                                <span class="hours daysRoutineLabel">
                                    <b style="color:black">
                                    <?php
                                            if($isClosed_Tue=='Closed')
                                            {
                                                echo "<span class='text-danger' style='padding-left:10%'>Closed</span>";
                                            }
                                            else if($isClosed_Tue=='')
                                            {
                                                $tue_time = date("g:i A", strtotime($row_from['bsFrom_Tue'])); 
                                                $tue_ttime = date("g:i A", strtotime($row_to['bsTo_Tue'])); 
                                                echo $tue_time." - ".$tue_ttime;
                                            }
                                        ?>
                                    </b>
                                </span>
                            </span>
                        </span> 
                    </div>
                    <div class="row">
                        <span class="dailyRoutine">
                            <span class="col col-sm-3">
                                <span class="days daysRoutineEl">
                                    <span style="color:black">Wednesday</span>
                                </span>
                            </span>
                            <span class="col col-sm-6">
                                <span class="hours daysRoutineLabel">
                                <b style="color:black">
                                    <?php
                                            if($isClosed_Wed=='Closed')
                                            {
                                                echo "<span class='text-danger' style='padding-left:10%'>Closed</span>";
                                            }
                                            else if($isClosed_Wed=='')
                                            {
                                                $wed_time = date("g:i A", strtotime($row_from['bsFrom_Wed'])); 
                                                $wed_ttime = date("g:i A", strtotime($row_to['bsTo_Wed'])); 
                                                echo $wed_time." - ".$wed_ttime;
                                            }
                                        ?>
                                    </b>
                                </span>
                            </span>
                        </span> 
                    </div>
                    <div class="row">
                        <span class="dailyRoutine">
                            <span class="col col-sm-3">
                                <span class="days daysRoutineEl">
                                    <span style="color:black">Thrusday</span>
                                </span>
                            </span>
                            <span class="col col-sm-6">
                                <span class="hours daysRoutineLabel">
                                    <b style="color:black">
                                        <?php
                                            if($isClosed_Thr=='Closed')
                                            {
                                                echo "<span class='text-danger' style='padding-left:10%'>Closed</span>";
                                            }
                                            else if($isClosed_Thr=='')
                                            {
                                                $thr_time = date("g:i A", strtotime($row_from['bsFrom_Thr'])); 
                                                $thr_ttime = date("g:i A", strtotime($row_to['bsTo_Thr'])); 
                                                echo $thr_time." - ".$thr_ttime;
                                            }
                                        ?>
                                    </b>
                                </span>
                            </span>
                        </span> 
                    </div>
                    <div class="row">
                        <span class="dailyRoutine">
                            <span class="col col-sm-3">
                                <span class="days daysRoutineEl">
                                    <span style="color:black">Friday</span>
                                </span>
                            </span>
                            <span class="col col-sm-6">
                                <span class="hours daysRoutineLabel">
                                    <b style="color:black">
                                        <?php
                                            if($isClosed_Fri=='Closed')
                                            {
                                                echo "<span class='text-danger' style='padding-left:10%'>Closed</span>";
                                            }
                                            else if($isClosed_Fri=='')
                                            {
                                                $fri_time = date("g:i A", strtotime($row_from['bsFrom_Fri'])); 
                                                $fri_ttime = date("g:i A", strtotime($row_to['bsTo_Fri'])); 
                                                echo $fri_time." - ".$fri_ttime;
                                            }
                                        ?>
                                    </b>
                                </span>
                            </span>
                        </span> 
                    </div> 
                    <div class="row">
                        <span class="dailyRoutine">
                            <span class="col col-sm-3">
                                <span class="days daysRoutineEl">
                                    <span style="color:black">Saturday</span>
                                </span>
                            </span>
                            <span class="col col-sm-6">
                                <span class="hours daysRoutineLabel">
                                    <b style="color:black">
                                        <?php
                                            if($isClosed_Sat=='Closed')
                                            {
                                                echo "<span class='text-danger' style='padding-left:10%'>Closed</span>";
                                            }
                                            else if($isClosed_Sat=='')
                                            {
                                                $sat_time = date("g:i A", strtotime($row_from['bsFrom_Sat'])); 
                                                $sat_ttime = date("g:i A", strtotime($row_to['bsTo_Sat'])); 
                                                echo $sat_time." - ".$sat_ttime;
                                            }
                                        ?>
                                    </b>
                                </span>
                            </span>
                        </span> 
                    </div> 
                    <div class="row">
                        <span class="dailyRoutine">
                            <span class="col col-sm-3">
                                <span class="days daysRoutineEl">
                                    <span style="color:black">Sunday</span>
                                </span>
                            </span>
                            <span class="col col-sm-6">
                                <span class="hours daysRoutineLabel">
                                    <b style="color:black">
                                        <?php
                                            if($isClosed_Sun=='Closed')
                                            {
                                                echo "<span class='text-danger' style='padding-left:10%'>Closed</span>";
                                            }
                                            else if($isClosed_Sun=='')
                                            {
                                                $sun_time = date("g:i A", strtotime($row_from['bsFrom_Sun'])); 
                                                $sun_ttime = date("g:i A", strtotime($row_to['bsTo_Sun'])); 
                                                echo $sun_time." - ".$sun_ttime;
                                            }
                                        ?>
                                    </b>
                                </span>
                            </span>
                        </span> 
                    </div>
                <?php
                    }
                    else if($numRows==0)
                    {
                        echo "<p style='color:red'>No Business Hours added</p>";
                    }
                ?>
            </span>
            <h5 style="color:black;margin-left:10px"><b>Contact Info:</b></h5>   
            <span class="contactInfo">
                <?php
                    $sql_contact = "SELECT * from dealer Inner join 
                    cars on dealer.dealer_ID=cars.DealerId Inner join
                    cars_brand on cars_brand.carBrand_ID=cars.CarBrandId  
                    where cars_brand.carBrand_Status='Available' AND
                    cars.car_Status='Available' AND cars.car_AutoStatus='Active' AND 
                    dealer.dealer_Status='Active' AND dealer.dealer_ID='$Id'
                    ";
                    $res_contact = mysqli_query($connect, $sql_contact);
                    $row_contact = mysqli_fetch_assoc($res_contact);
                    $num_row_contact=mysqli_num_rows($res_contact);
                    $array = array();
                    $array_cond = array();
                    // look through query
                    while($row = mysqli_fetch_assoc($res_contact))
                    {

                        // add each row returned into an array
                        $array[] = $row['carBrand_Name'];
                        $array_cond[]=$row['car_NewUsed'];
                    
                        //echo $row['username']; // etc

                    }

                    
                ?>
                <div class="row">
                    <span class="contactInfoS">
                        <span class="col col-sm-3">
                            <span class="days alignLeft">
                                <span style="color:black"><i class="fa fa-phone"></i> Phone #</span>
                            </span>
                        </span>
                        <span class="col col-sm-6">
                            <span class="hours alignLeftVal">
                                <b style="color:black"><?php echo $row_contact['dealer_CellNum'];?></b>
                            </span>
                        </span>
                    </span> 
                </div>
                <div class="row">
                    <span class="contactInfoS">
                        <span class="col col-sm-3">
                            <span class="days alignLeft">
                                <span style="color:black"><i class="fa fa-envelope"></i> Email</span>
                            </span>
                        </span>
                        <span class="col col-sm-6">
                            <span class="hours alignLeftVal">
                                <b style="color:black"><?php echo $row_contact['dealer_Email'];?></b>
                            </span>
                        </span>
                    </span> 
                </div>
                <div class="row">
                    <span class="contactInfoS">
                        <span class="col col-sm-3">
                            <span class="days alignLeft">
                                <span style="color:black"><i class="fa fa-globe"></i> Website</span>
                            </span>
                        </span>
                        <span class="col col-sm-6">
                            <span class="hours alignLeftVal">
                                <b style="color:black"><?php echo $row_contact['dealer_Website'];?></b>
                            </span>
                        </span>
                    </span> 
                </div>
                <div class="row">
                    <span class="contactInfoS">
                        <span class="col col-sm-3">
                            <span class="days alignLeft">
                                <span style="color:black"><i class="fa fa-map-marker"></i> Address</span>
                            </span>
                        </span>
                        <span class="col col-sm-6">
                            <span class="hours alignLeftVal">
                                <b style="color:black"><?php echo $row_contact['dealer_Location'];?></b>
                            </span>
                        </span>
                    </span> 
                </div>
            </span>
            
            <h5 style="color:black;margin-left:10px"><b>Description:</b></h5>
            <span class="alignLeftLast leftAlign">Hey!!</span><br>
            <span class="alignLeftLast leftAlign">We provide solutions to ALL your car related needs!!??</span>
            <br>
            <h5 class="alignLeftLast"><i class="fa fa-check"></i>Business Hours:<i class="fa fa-check"></i></h5>
            <span class="alignLeftLast leftAlign">Monday-Sunday & Public Holidays</span>
            <p class="alignLeftLast leftAlign">All Days </p>
            <br>
            <p class="alignLeftLast">Let us serve you?</p>
            <span class="alignLeftLast"><i class="fa fa-check"></i> Specialist in 
                <?php
                $length = count($array);
                $t=0; 
                //echo $length;
                foreach($array as $resultArr) {
                    while($t<=$length)
                    {
                        if($t<$length && $t!=$length-1)
                        {
                            echo $resultArr." ";
                            $t++;
                            break;
                        }
                        else if($t==$length-1)
                        {
                            echo " & ".$resultArr;
                            $t++;
                            break;
                        }
                           
                    }
                      
                }
                
                ?>
            </span><br>
            <span class="alignLeftLast"><i class="fa fa-check"></i> We check, we service, we test before we sell</span><br>
            <span class="alignLeftLast"><i class="fa fa-check"></i> 
               <?php
                $length_co = count($array_cond);
                $t_co=0;
                foreach(array_unique($array_cond) as $resultArrCond) {
                    echo $resultArrCond;
                    if($length_co!=$t_co)
                    {
                        echo " / ";
                        $t_co++;
                    }
                    else if($length_co==$t_co)
                    {
                        echo "";
                        $t_co++;
                    }
                }
               ?>are available
            </span>
            <br>
            <p class="alignLeftLast addMarTop">Our Team</p>
            
            <p class="alignLeftLast addMarTop"><?php echo $row_contact['dealer_Dealership'];?></p>
        </div>
    </body>
</html>
