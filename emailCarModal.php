<style>
    #emailMe{
        border:1px solid #044cc4;
        border-radius: 15px;
        width:120px;
        height:28px;
        float:right;
        margin-right: 25px;
        background-color: #044cc4;
        color:white;
        font-weight: bold;
    }
</style>
<div class="modal fade" id="emailCar" tabindex="-1" role="dialog">
	<div class="modal-dialog" class="setDialogStyle" style="border-radius:25px;margin-top:3%;">
		<div class="modal-content" style="white;">
            <div class="modal-body" id="car_detail" style="margin-left:20px;height:auto; overflow:auto;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="closeModal"><i class="fa fa-times fa-1x closeModalIcon" style="color:#044cc4;"></i></span>
                </button>
                <div class="row">
                    <div class="col col-lg-4 col-xs-12">
                        <img src="resources/a.jpg" style="margin-left: -20px;" width="200px" height="120px">
                    </div>
                    <div class="col col-lg-7 col-xs-12">
                        <div style="clear: both;"></div>
                        <div class="row" style="margin-top: -28px;margin-left:0px">
                            <h4>Name</h4>
                        </div>
                        <form method="POST" action="">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col col-lg-12">
                                        <label>Email*</label>
                                        <input type="text" style="height:28px;border-radius:2px;background-color:#f7f7f7;" autocomplete="off" name="getSubEmail" id="getSubEmail" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 8px;">
                                    <input type="checkbox" style="height: 12px;width:12px;margin-left:14px;display:inline-block" id="notifyMe" class="form-control" name="notifyMe">
                                    <p style="display: inline-block;font-size:12px">Notify Me with the latest car offers, advice and news!</>
                                </div>
                                <div class="row">
                                    <input type="submit" value="Email Me" name="emailMe" id="emailMe">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>