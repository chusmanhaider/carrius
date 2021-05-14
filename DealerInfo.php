<?php
    require_once ("db_connect.php");
    $carId=$_GET['id'];
    $sql_car= "SELECT * FROM cars 
    INNER JOIN dealer ON dealer.dealer_ID = cars.DealerId
    WHERE dealer.dealer_Status='Active' AND cars.car_Status = 'Available' AND
    cars.car_AutoStatus = 'Active' AND cars.car_ID='$carId'";
    $result = mysqli_query($connect, $sql_car);
    while($row = mysqli_fetch_assoc($result))
    {
?>
<div class="row">
    <div class="iContainerInfo" style="background-color: #f7f7f7;">
        <span class="infoContent">
            <h4 style="color:black" >Dealership Information</h4>
            <hr class="hrUnderStyleDInfo" style="border: 1px solid #047cf3;stroke: #047cf3; fill: #047cf3;margin-top:-7px;">
            <span class="col col-lg-5">
                <div class="col col-lg-5">
                    <img src="resources/Updated Icons//test.png" class="img-thumbnail">
                </div>
                <div class="dealershipDetail col col-lg-7">
                    <span class="dealershipListing addMarginTopY">
                        <img src="resources/icons png/user (1).png" width="14px" height="14px">
                        <span class="setFontColor"><?php echo $row['dealer_Dealership'];?></span>
                    </span>
                    <span class="locationListing addMarginTopX">
                        <img src="resources/icons png/pin.png" width="16px" height="16px">
                        <span class="setFontColor"><?php echo $row['dealer_Location'];?></span>
                    </span>
                    <span class="timingListing addMarginTopX">
                        <img src="resources/icons png/hour.png" width="16px" height="16px">
                        <span class="setFontColor">Monday to Friday <br>Hours 9:00 am to 5:00 PM</span>
                    </span>
                </div>
            </span>
            <span class="col col-lg-1"></span>
            <span class="col col-lg-6">
                <span class="rating">
                    <h5 style="color: black;" id="ratingHead"><b>Customer Ratings</b></h5>
                    <span class="fa fa-star fa-2x stars" id="firstStar"></span>
                    <span class="fa fa-star fa-2x stars" id="secStar"></span>
                    <span class="fa fa-star fa-2x stars" id="thirdStar"></span>
                    <span class="fa fa-star fa-2x stars" id="fourthStar"></span>
                    <span class="fa fa-star fa-2x stars" id="fiveStar"></span>
                    <span class="numVal"><span id="starsVal"></span> Stars</span>
                </span>
                <span class="addSpaceX"><br></span>
                <span class="contactBtns">
                    <span class="firstBtn">
                        <input type="button" data-toggle="modal" data-target="#contactDealership" class="contactDBtn selectColor" id="<?php echo $row['dealer_ID']; ?>" name="contactDealerBtn" value="Contact Dealership">
                    </span>
                    <span class="secBtn">
                        <a href="dealer-profile.php?url=<?php echo $row['dealer_ID'];?>"><input type="button" class="viewCBtn selectColor" id="" name="viewAllCars" value="View all cars from dealership"></a>
                    </span>
                </span>
            </span>
        </span>
    </div>
</div>
<?php
    }
?>