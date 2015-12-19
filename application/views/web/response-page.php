<div class="row">

    <div class="col-md-12">
        <div class="booking-outer-wrapper slt-Rm-Outer clearfix">
            <div class="bk-title">
                <h3>Thank You</h3>
            </div>

            <div class="select-roomWraper clearfix">
                <?php 
$soft_status = simplexml_load_string($softbooking);
                        $softresponse_msg = $soft_status['SoftBookingSucess'];
                ?>
                <?php if($softbooking == 1){?>
                <b>Thank you for booking with us..!!!</b>
                <?php }else{?>
                <div class="alert alert-danger alert-dismissible alert-special" role="alert"><button type="button" class="close" data-dismiss="alert"></button>Sorry, Unable to process soft booking..!!</div>
                <?php }?>
            </div>
        </div>
    </div>
</div>

