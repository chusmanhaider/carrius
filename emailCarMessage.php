<style>
    #takeMeBack{
        border:1px solid #044cc4;
        border-radius: 15px;
        width:140px;
        height:28px;
        margin-top: 5px;
        margin-bottom: 7px;
        margin-left: 75px;
        background-color: #044cc4;
        color:white;
        font-weight: bold;
    }
</style>
<div class="modal fade" id="emailCarMsg" tabindex="-1" role="dialog">
	<div class="modal-dialog" class="setDialogStyle" style="border-radius:25px;margin-top:3%;">
		<div class="modal-content" style="white;">
            <div class="modal-body" id="car_detail" style="margin-left:20px;height:auto; overflow:auto;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="closeModal"><i class="fa fa-times fa-1x closeModalIcon" style="color:#044cc4;"></i></span>
                </button>
                <div class="row">
                    <div class="col col-lg-4 col-xs-12" style="margin-top: 20px;">
                        <img src="resources/logo@2x.png" style="margin-left: 60px;" width="50px" height="50px">
                        <img src="resources/carrius.png" style="margin-left: 20px;margin-top:10px" width="141" height="35">
                    </div>
                    <div class="col col-lg-7 col-xs-12">
                        <div class="form-group">
                            <div class="row" style="margin-top: 34px;margin-left:30px">
                                <p style="display: inline-block;font-size:14px;font-weight:bold;"><img src="resources/Bluetick.png"> Car Information has been successfully sent to your email</p>
                            </div>
                            <div class="row">
                                <input type="button" data-dismiss="modal" value="Take Me Back!" name="takeMeBack" id="takeMeBack">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- error--->
<div class="modal fade" id="emailCarMsgError" tabindex="-1" role="dialog">
	<div class="modal-dialog" class="setDialogStyle" style="border-radius:25px;margin-top:3%;">
		<div class="modal-content" style="white;">
            <div class="modal-body" id="car_detail" style="margin-left:20px;height:auto; overflow:auto;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="closeModal"><i class="fa fa-times fa-1x closeModalIcon" style="color:#044cc4;"></i></span>
                </button>
                <div class="row">
                    <div class="col col-lg-4 col-xs-12" style="margin-top: 20px;">
                        <img src="resources/logo@2x.png" style="margin-left: 60px;" width="50px" height="50px">
                        <img src="resources/carrius.png" style="margin-left: 20px;margin-top:10px" width="141" height="35">
                    </div>
                    <div class="col col-lg-7 col-xs-12">
                        <div class="form-group">
                            <div class="row" style="margin-top: 34px;margin-left:30px">
                                <p style="display: inline-block;font-size:14px;font-weight:bold;" class="text-danger"><i class="fa fa-exclamation-triangle fa-1x" style="color:red"></i> <b>Error !</b> While sending Email</p>
                            </div>
                            <div class="row">
                                <input type="button" data-dismiss="modal" value="Take Me Back!" name="takeMeBack" id="takeMeBack" class="takeMeBackErr">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>