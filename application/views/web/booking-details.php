
<style type="text/css">
    .ht-nm-dtl{
	padding:10px 0px;
	margin-bottom:5px;
	border-bottom:1px dotted #eee;
}
.ht-nm-dtl h3.htname{
	font-size:15px;
	color:#333;
	color:#555;
	padding-top:5px;
	font-weight:600;
	float:left;
	margin-right:25px;
}
.ht-nm-dtl .num-Rooms{
	float:left;
}
.ht-nm-dtl .num-Rooms p{
	font-size:13px;	
	float:left;
	padding-top:6px;
	margin-right:10px;
}
.ht-nm-dtl .num-Rooms select{
	/*width:70px;*/
	font-size:13px;
	height:33px;
	float:left;
	padding:5px;
	border:1px solid #ddd;
}
.display-inline{
	display:inline;
}
.rm-inpt-div .common-select{
    width:70px;
    font-size:13px;
    height:33px;
    padding:5px;
    border:1px solid #ddd; 
}
.ht-room-inputdetail .rm-inpt-div{
	display:inline-block;
	padding-right:25px;
}
.ht-room-inputdetail .rm-inpt-div p{
	font-weight:bold;
	color:#777;
	margin-bottom:3px;
}
.ht-room-inputdetail .rm-inpt-div input[type=text]{
	width:70px;
	height:30px;
	text-align:center;
	border:1px solid #ddd;
}
.ht-room-inputdetail{
	margin-top:12px;
}
 ul.rm-ul-listWRapp li{
	width:100%;
	display:inline-block;
	margin-bottom:10px;
	padding-bottom:12px;
	border-bottom:1px solid #eee;	
}

.submit-room{
	text-align:center;
	margin-bottom:15px;
}
.submit-room input[type=submit]{
	display:inline-block;
	float:none;
}
.price-stand{
    float: none;
    margin-left: 390px;
}
.price-stand p{
	font-size:13px;	
	float:left;
	padding-top:6px;
	margin-right:10px;
}
.price-stand select{
	width:70px;
	font-size:13px;
	height:33px;
	float:left;
	padding:5px;
	border:1px solid #ddd;
}
</style>
<div id="dynamic-reservation">
    <div class="row">
        <div class="col-md-12">
            <div class="booking-steps">
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li class="active">3</li>
                    <li>4</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="booking-outer-wrapper clearfix">
                <div class="bk-title">
                    <h3>User Details</h3>
                </div>
                <div class="col-md-12" style="top:10px;">
                    <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>While booking Please don't click the back or refresh buttons.</div>
                </div>
                <form id="reserveDetails">
                <div class="ht-book-slt-rm-wrapper clearfix">
                    <?php 
                    for($i=0;$i<$length;$i++){
                        ?>
                    <ul class="rm-ul-listWRapp">
                        <li>
                            <div class="ht-nm-dtl clearfix">
                                <h3 class="htname"><?php echo $room_name[$i];?></h3>
                                <div class="num-Rooms">
                                    <p>Price Standard</p>
                                    <select name="price_cat[]" id="price_cat_<?php echo $i;?>">
                                        <!--<option value="1">American Plan</option>-->
                                        <option value="2">Continental Plan</option>
                                        <!--<option value="3">European Plan</option>-->
                                        <!--<option value="4">Modified American Plan</option>-->
                                    </select>
    <!--                                <p>Number of Rooms</p>
                                    <select name="no_rooms[]" id="no_rooms_<?php echo $i;?>" onchange="return changeAvail('<?php echo $i;?>')">
                                        <?php for($j=0;$j<$available_rooms[$i];$j++){?>
                                        <option value="<?php echo $j;?>"><?php echo $j;?></option>
                                        <?php }?>
                                    </select>-->
                                </div>
    <!--                            <div class="price-stand">
                                    <p>Price Standard</p>
                                    <select name="price_cat[]" id="price_cat_<?php echo $i;?>">
                                        <option value="1">AP</option>
                                        <option value="2">CP</option>
                                        <option value="3">EP</option>
                                        <option value="4">MAP</option>
                                    </select>
                                </div>-->
                            </div>
                            <div class="ht-room-inputdetail">
                                <?php $k = 1;for($j=0;$j<$rooms_selected[$i];$j++){?>
                                <div class="display-inline">
                                    <div class="rm-inpt-div">
                                        <?php echo $k.' . ';?>
                                        <div class="rm-inpt-div">
                                            <p>Adults</p>
                                            <!--<input type="text" name="adults_<?php echo $j;?>_<?php echo $i;?>" value="1" id="adults_<?php echo $j;?>"/>-->
                                            <select name="adults_<?php echo $j;?>_<?php echo $i;?>" id="adults_<?php echo $j;?>" class="common-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="rm-inpt-div">
                                            <p>Children's</p>
                                            <select name="childrens_<?php echo $j;?>_<?php echo $i;?>" id="childrens_<?php echo $j;?>" class="common-select">
                                               	<option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                            <!--<input type="text" name="childrens_<?php echo $j;?>_<?php echo $i;?>" value="1" id="childrens_<?php echo $j;?>" />-->
                                        </div>
                                        <div class="rm-inpt-div">
                                            <p>Extra Bed</p>
                                            <select name="extrabed_<?php echo $j;?>_<?php echo $i;?>" id="extrabed_<?php echo $j;?>" class="common-select">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                            </select>
                                            <!--<input type="text" name="extrabed_<?php echo $j;?>_<?php echo $i;?>" value="0" id="extrabed_<?php echo $j;?>"/>-->
                                        </div>

                                    </div>
                                </div>
                                <?php $k++;}?>
                            </div>

                        </li>
                    </ul>
                    <input type="hidden" id="room_id_<?php echo $i;?>" name="room_id[]" value="<?php echo $room_id[$i];?>"/>
                    <input type="hidden" id="short_room_name_<?php echo $i;?>" name="short_room_name[]" value="<?php echo $short_room_name[$i];?>"/>
                    <input type="hidden" id="room_name_<?php echo $i;?>" name="room_name[]" value="<?php echo $room_name[$i];?>"/>
                    <input type="hidden" id="single_ap_<?php echo $i;?>" name="single_ap[]" value="<?php echo $single_ap[$i];?>"/>
                    <input type="hidden" id="single_cp_<?php echo $i;?>" name="single_cp[]" value="<?php echo $single_cp[$i];?>"/>
                    <input type="hidden" id="single_map_<?php echo $i;?>" name="single_map[]" value="<?php echo $single_map[$i];?>"/>
                    <input type="hidden" id="single_ep_<?php echo $i;?>" name="single_ep[]" value="<?php echo $single_ep[$i];?>"/>
                    <input type="hidden" id="double_ap_<?php echo $i;?>" name="double_ap[]" value="<?php echo $double_ap[$i];?>"/>
                    <input type="hidden" id="double_cp_<?php echo $i;?>" name="double_cp[]" value="<?php echo $double_cp[$i];?>"/>
                    <input type="hidden" id="double_map_<?php echo $i;?>" name="double_map[]" value="<?php echo $double_map[$i];?>"/>
                    <input type="hidden" id="double_ep_<?php echo $i;?>" name="double_ep[]" value="<?php echo $double_ep[$i];?>"/>
                    <input type="hidden" id="map_extra_<?php echo $i;?>" name="map_extra[]" value="<?php echo $map_extra[$i];?>"/>
                    <input type="hidden" id="ap_extra_<?php echo $i;?>" name="ap_extra[]" value="<?php echo $ap_extra[$i];?>"/>
                    <input type="hidden" id="cp_extra_<?php echo $i;?>" name="cp_extra[]"value="<?php echo $cp_extra[$i];?>"/>
                    <input type="hidden" id="ep_extra_<?php echo $i;?>" name="ep_extra[]" value="<?php echo $ep_extra[$i];?>"/>
                    <input type="hidden" id="user_selected_rooms_<?php echo $i;?>" name="user_selected_rooms[]" value="<?php echo $rooms_selected[$i];?>"/>
                    <?php }?>
                </div>
                <div class="bt-book-sbmt-btn submit-room clearfix">
                    <input type="submit" value="Continue" id="SubmitInfo">
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<div id="dynamic-reserve">
    
</div>
<script type="text/javascript">
    $("#reserveDetails").submit(function(e){
        e.preventDefault();
        $.post("<?= base_url() ?>booking/reservation_details", $("#reserveDetails").serialize(),function (data) {
            $('#dynamic-reservation').hide();
            $('#dynamic-reserve').html(data);
//                console.log(data);
        });
    });
    
</script>
