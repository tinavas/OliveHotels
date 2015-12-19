<style>
.payment-box{
	text-align:center;
}
.payment-box h3{
	font-size:25px;
	color:#1e7ef4;
	margin-bottom:25px;
}
.payment-box .complete-btn{
	padding:8px 15px;
	font-size:15px;
	color:#fff;
	background:#1e7ef4;

}
.cc-note{
	margin:10px 0px;
	font-size:12px;
	color:#777;
	padding-left:10px;
}
.payment-box{
	margin-top:25px;
	margin-bottom:100px;
}
</style>
<div class="booking-outer" id="payment-option">
    <div class="row">
        <div class="my-profile-wrapper">
            <div class="payment-box">

                     <h3>Pay Amount- <b>Rs. <?php echo $grand_total;?></b></h3>
                    <div class="read-payment">
                            
                        <span class="cc-note">This Page is Redirecting to <img src="<?= base_url() ?>images/cc-avenue.jpg" style=" display: inline;" />
                            <form method="post" name="customerData" id="customerData">
                                <input type="hidden" name="merchant_id" value="72870"/>
                                <input type="hidden" name="order_id" value="<?php echo $booking_id; ?>"/>
                                <input type="hidden" name="amount" value="<?php echo $grand_total; ?>"/>
                                
                                <input type="hidden" name="currency" value="INR"/>
                                <input type="hidden" name="redirect_url" value="<?php echo base_url(); ?>ccresponse"/>
                                <input type="hidden" name="cancel_url" value="<?php echo base_url(); ?>ccresponse"/>
                                <input type="hidden" name="language" value="EN"/>

                                <input type="hidden" name="billing_name" value="<?php echo $order_details->first_name; ?>"/>
                                <input type="hidden" name="billing_address" value="<?php echo $order_details->address; ?>"/>
                                <input type="hidden" name="billing_city" value="<?php echo $order_details->city; ?>"/>
                                <input type="hidden" name="billing_state" value="<?php echo $order_details->state; ?>"/>
                                <input type="hidden" name="billing_zip" value="682017"/>
                                <input type="hidden" name="billing_country" value="<?php echo $order_details->country; ?>"/>
                                <input type="hidden" name="billing_tel" value="<?php echo $order_details->phone; ?>"/>
                                <input type="hidden" name="billing_email" value="<?php echo $order_details->email; ?>"/>
                                <?php if($order_details->hotel_master_id==1){?>
                                <input type="hidden" name="billing_notes" value="Eva">
                                <input type="hidden" name="delivery_name" value="Eva"/>
                                <input type="hidden" name="delivery_address" value="Near Info park & Smart City, Kakkanad"/>
                                <input type="hidden" name="delivery_city" value="Cochin"/>
                                <input type="hidden" name="delivery_state" value="Kerala"/>
                                <input type="hidden" name="delivery_zip" value="682030"/>
                                <input type="hidden" name="delivery_country" value="India"/>
                                <input type="hidden" name="delivery_tel" value="7025266776"/>
                                <?php }else if($order_details->hotel_master_id==2){?>
                                <input type="hidden" name="billing_notes" value="Downtown">
                                <input type="hidden" name="delivery_name" value="Downtown"/>
                                <input type="hidden" name="delivery_address" value="Hotel Olive Downtown 28/286, Kadavanthra Jn"/>
                                <input type="hidden" name="delivery_city" value="Kochi"/>
                                <input type="hidden" name="delivery_state" value="Kerala"/>
                                <input type="hidden" name="delivery_zip" value="682020"/>
                                <input type="hidden" name="delivery_country" value="India"/>
                                <input type="hidden" name="delivery_tel" value="7025266776"/>
                                <?php }?>
                                <input type="hidden" name="promo_code" value=""/>
                                <input type="hidden" name="customer_identifier" value="<?php echo $booking_id; ?>"/>
                                <!--<input name="Pay_ccavenue" type="submit" value="CheckOut" class="complete-btn"/>-->
                                <input name="Pay_ccavenue" type="submit" value="CheckOut" class="complete-btn"/>
                                <div class="loader" style="position:relative;top:-50px;">
                                    <img id="ajax-loader" src="<?= base_url() ?>images/wait.gif" style="position: relative;margin-left: 350px;display: none;">
                                    <!--<img id="ajax-loader" src="<?= base_url()?>images/loader.gif" style="width: 70px;display: none;">-->
                                </div>
                            </form>
                            <script type="text/javascript">
                                $("#customerData").submit(function(e){
                                    e.preventDefault();

                                        $('#ajax-loader').show();
                                        $.post("<?php echo base_url(); ?>ccavRequestHandler.php", $("#customerData").serialize(),function (data) {
//                                            $('#ajax-loader').hide();
                                            $('#payment-option').hide();
//                                            $('#response-msg').show();
                                            $('#response-msg').html(data);
                            //                  console.log(data);
                                        });

                                });

                            </script>

                    </div>
            </div>
        </div>   
    </div>
</div>
<div id="response-msg" style="display: none;"></div>
