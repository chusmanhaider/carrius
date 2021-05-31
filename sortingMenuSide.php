<html>
    <head>
       <style>
            
       </style>
    </head>
    <body>
        <div class="" style="margin-top: 15px;margin-left:-20px">
            <div class="col col-md-6 col-xs-12">                				
                <div class="list-group">
                    <h4>Drivertain</h4>
                    <?php
                        require_once ("db_connect.php");
                        
                        if(!isset($_GET['wheelDrive']))
                        {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive awd" name="drivetain" value="AWD"  > AWD</label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive fwd" name="drivetain" value="FWD"  > FWD</label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive rwd" name="drivetain" value="RWD"  > RWD</label>
                    </div>
                    <div class="list-group-item checkbox">
                        <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive fourwd" name="drivetain" value="4WD"  > 4WD</label>
                    </div>
                    <?php
                        }
                        else
                        {
                            if($_GET['wheelDrive']=='awd')
                            {
                    ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" checked="checked" class="common_selector_drive awd" name="drivetain" value="AWD"  > AWD</label>
                                </div>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive fwd" name="drivetain" value="FWD"  > FWD</label>
                                </div>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive rwd" name="drivetain" value="RWD"  > RWD</label>
                                </div>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive fourwd" name="drivetain" value="4WD"  > 4WD</label>
                                </div>
                    <?php
                            }
                            else if($_GET['wheelDrive']=='fwd')
                            {
                    ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive awd" name="drivetain" value="AWD"  > AWD</label>
                                </div>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" checked="checked" class="common_selector_drive fwd" name="drivetain" value="FWD"  > FWD</label>
                                </div>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive rwd" name="drivetain" value="RWD"  > RWD</label>
                                </div>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive fourwd" name="drivetain" value="4WD"  > 4WD</label>
                                </div>
                    <?php
                            }
                            else if($_GET['wheelDrive']=='rwd')
                            {
                    ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive awd" name="drivetain" value="AWD"  > AWD</label>
                                </div>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive fwd" name="drivetain" value="FWD"  > FWD</label>
                                </div>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" checked="checked" class="common_selector_drive rwd" name="drivetain" value="RWD"  > RWD</label>
                                </div>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive fourwd" name="drivetain" value="4WD"  > 4WD</label>
                                </div>
                    <?php
                            }
                            else if($_GET['wheelDrive']=='4wd')
                            {
                    ?>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive awd" name="drivetain" value="AWD"  > AWD</label>
                                </div>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive fwd" name="drivetain" value="FWD"  > FWD</label>
                                </div>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" class="common_selector_drive rwd" name="drivetain" value="RWD"  > RWD</label>
                                </div>
                                <div class="list-group-item checkbox">
                                    <label><input type="radio" style="margin-left: -20px;" checked="checked" class="common_selector_drive fourwd" name="drivetain" value="4WD"  > 4WD</label>
                                </div>
                    <?php
                            }
                        }
                    ?>
                </div>
                <div class="list-group">
                    <h4>Condition</h4>
                    <div class="list-group-item checkbox newCondition">
                        <label><input type="radio" style="margin-left: -20px;" name="conditionRadio" class="common_selector newCond" value="New"  > New</label>
                    </div>
                    <div class="list-group-item checkbox usedCondition">
                        <label><input type="radio" style="margin-left: -20px;" name="conditionRadio" class="common_selector usedCond" value="Used"  > Used</label>
                    </div>
                </div>
                <div class="list-group">
                    <h4>Electric</h4>
                    <div class="list-group-item checkbox">
                        <label><input type="radio" style="margin-left: -20px;" name="electRadio" class="common_selector_ele yesElectric" value="Yes"  > Yes</label>
                    </div>
                    <div class="list-group-item checkbox changeColor">
                        <label><input type="radio" style="margin-left: -20px;" name="electRadio" class="common_selector_ele noElectric" value="No"  > No</label>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>