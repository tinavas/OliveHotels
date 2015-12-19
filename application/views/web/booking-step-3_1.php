<?php print_r($response); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Olive Hotels</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?= base_url() ?>css/bootstrap.css" rel="stylesheet" media="screen">
        <link type="image/png" rel="shortcut icon" href="<?= base_url() ?>images/fav.png"/>
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>css/style.css">
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>css/responsiveslides.css">
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>css/custom-responsive.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700' rel='stylesheet' type='text/css'>
        <link href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel="stylesheet">
        <link href="<?= base_url() ?>css/demo.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/yamm.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <style>
            .alert-special{
               padding-left: 275px; 
            }
            @media screen and (max-width: 1024px) {
                .alert-special{
                   padding-left: 190px; 
                }
            }
            @media screen and (max-width: 768px) {
                .alert-special{
                   padding-left: 50px; 
                }
            }
            @media screen and (max-width: 640px) {
                .alert-special{
                   padding-left: 33px; 
                }
            }
            @media screen and (max-width: 480px) {
                .alert-special{
                   padding-left: 33px; 
                }
            }
            
        </style>
    </head>

    <body>
        <div class="sub-page-header">
            <?php include('header.php'); ?>
        </div>
        <div class="subpage-bannerWrapper">
            <div class="subpage-bannerContent sub-ban-cont-down">
                <h1>Olive <span>Hotels</span></h1>
                <p>OLIVE provides you the most luxurious stay heartened by tranquil quietness &amp;<br/> ensuring the best hospitality for our guest at our hotels </p>
            </div>
        </div>

        <div class="contact-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-overlap-title booking-pg-ttl bk-pg-Rmttl">
                            <div class="page-title"><h2>Online <span>Booking</span></h2></div>
                        </div>
                    </div>
                </div>

                <div class="booking-mainWrapper" id="room_types">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="booking-steps">
                                <ul>
                                    <li>1</li>
                                    <li>2</li>
                                    <li class="active" id="remove">3</li>
                                    <li id="add">4</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="booking-outer-wrapper slt-Rm-Outer clearfix">
                                <div class="bk-title">
                                    <h3>Select Room</h3>
                                </div>
                                
                                <div class="select-roomWraper clearfix">
                                  <div class="row" id="select-room-alert" style="display:none;">
                                  
                                </div>  
                                    <ul class="clearfix">
                                        <?php
                                        $count = 1;
                                        $rate_single = $rate_double = $rate_extra_adult = $available_rooms = 0;

                                        function dateDiff($start, $end) {
                                            $start_ts = strtotime($start);
                                            $end_ts = strtotime($end);
                                            $diff = $end_ts - $start_ts;
                                            return round($diff / 86400);
                                        }

                                        $room_details = simplexml_load_string($response);
                                        if($room_details){
                                        foreach ($room_details->RoomType as $room_type) {
                                            foreach ($room_type->RatePlan as $rate_plans) {
                                                foreach ($rate_plans->Rates as $rates) {
                                                    if ($available_rooms > $rates['AvailableRooms']) {
                                                        $available_rooms = $available_rooms;
                                                    } else {
                                                        $available_rooms = $rates['AvailableRooms'];
                                                    }
                                                }
                                            }
                                        ?>

                                        <?php
                                        $checkin_date = date('Y-m-d', strtotime($post_data['checkin_date']));
                                        $checkout_date = date('Y-m-d', strtotime($post_data['checkout_date']));
                                        $stay_count = dateDiff($checkin_date, $checkout_date);
                                        $rate_plan_id = '';
                                        $rate_plan_name = '';
                                        $rate_map_single = $rate_map_double = $rate_map_extra = $rate_map_extra = 0;
                                        $rate_ap_single = $rate_ap_double = $rate_ap_extra = $rate_ap_extra = 0;
                                        $rate_ep_single = $rate_ep_double = $rate_ep_extra = $rate_ep_extra = 0;
                                        $rate_cp_single = $rate_cp_double = $rate_cp_extra = $rate_cp_extra = 0;

//                                        $rate_double
//                                        $rate_extra_adult
//                                        $available_rooms
                                        ?>      
                                        <?php
                                        if ($room_type['Id'] == 1) {
                                            $room_category = $this->room_master_model->room_details(1);
                                        } else if ($room_type['Id'] == 2) {
                                            $room_category = $this->room_master_model->room_details(2);
                                        } else if ($room_type['Id'] == 3) {
                                            $room_category = $this->room_master_model->room_details(3);
                                        } else if ($room_type['Id'] == 4) {
                                            $room_category = $this->room_master_model->room_details(4);
                                        }
                                        ?> 
                                        <?php if ($available_rooms != 0) { ?>
                                        
                                        <li class="slt-ul-list <?php if($count % 2==0){ echo 'mrg-right';}?>">
                                            <div class="slt-rm-block">
                                                <div class="slt-imgRm">
                                                    <img src="<?= base_url() ?>uploads/room_master/thumb/<?php echo $room_category[0]->image; ?>" alt="<?php echo $room_category[0]->room_type; ?>">
                                                </div>
                                                <div class="slt-RMcont">
                                                    <div class="slt-rm-ttl clearfix">
                                                        <div class="slt-ttl-left">
                                                            <div class="slt-check">
                                                                <input type="checkbox" name="checkbox[]" id="room" value="<?php echo $room_type['Id']; ?>" />
                                                            </div>
                                                            <div class="slt-rm-name">
                                                                <h2><?php echo $room_type['Description']; ?></h2>
                                                                <span><?php echo $room_type['SpecialInstruction']; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="slt-ttl-right">
                                                            <p>Select No. Rooms</p>
                                                            <select name="rooms_selected" id="rooms_selected_<?php echo $room_type['Id']; ?>">
                                                                 <?php for ($i = 0; $i <= $available_rooms; $i++) { ?>
                                                                    <option value="<?php echo $i; ?>" <?php if($i == 1){echo 'selected';}?>><?php echo $i; ?></option>
                                                                 <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="Rm-plan-list">
                                                        <?php
                                                            foreach ($room_type->RatePlan as $rate_plans) {
                                                            foreach ($rate_plans->Rates as $rates) {
                                                                if ($available_rooms > $rates['AvailableRooms']) {
                                                                    $available_rooms = $available_rooms;
                                                                } else {
                                                                    $available_rooms = $rates['AvailableRooms'];
                                                                }
                                                            }
                                                            if ($rate_plans['id'] == 'AP') {
                                                                foreach ($rate_plans as $plan_rate) {
                                                                    if ($rate_single > $plan_rate['Single']) {
                                                                        $rate_single = $rate_single;
                                                                    } else {
                                                                        $rate_single = $plan_rate['Single'];
                                                                    }

                                                                    if ($rate_double > $plan_rate['Double']) {
                                                                        $rate_double = $rate_single;
                                                                    } else {
                                                                        $rate_double = $plan_rate['Double'];
                                                                    }

                                                                    if ($rate_extra_adult > $plan_rate['ExtraAdult']) {
                                                                        $rate_extra_adult = $rate_extra_adult;
                                                                    } else {
                                                                        $rate_extra_adult = $plan_rate['ExtraAdult'];
                                                                    }
                                                                }
                                                                $rate_ap_single = $rate_single;
                                                                $rate_ap_double = $rate_double;
                                                                $rate_ap_extra = $rate_extra_adult;
                                                            } else if ($rate_plans['id'] == 'CP') {
                                                                foreach ($rate_plans as $plan_rate) {
                                                                    if ($rate_single > $plan_rate['Single']) {
                                                                        $rate_single = $rate_single;
                                                                    } else {
                                                                        $rate_single = $plan_rate['Single'];
                                                                    }

                                                                    if ($rate_double > $plan_rate['Double']) {
                                                                        $rate_double = $rate_single;
                                                                    } else {
                                                                        $rate_double = $plan_rate['Double'];
                                                                    }

                                                                    if ($rate_extra_adult > $plan_rate['ExtraAdult']) {
                                                                        $rate_extra_adult = $rate_extra_adult;
                                                                    } else {
                                                                        $rate_extra_adult = $plan_rate['ExtraAdult'];
                                                                    }
                                                                }
                                                                $rate_cp_single = $rate_single;
                                                                $rate_cp_double = $rate_double;
                                                                $rate_cp_extra = $rate_extra_adult;
                                                            } else if ($rate_plans['id'] == 'EP') {
                                                                foreach ($rate_plans as $plan_rate) {
                                                                    if ($rate_single > $plan_rate['Single']) {
                                                                        $rate_single = $rate_single;
                                                                    } else {
                                                                        $rate_single = $plan_rate['Single'];
                                                                    }

                                                                    if ($rate_double > $plan_rate['Double']) {
                                                                        $rate_double = $rate_single;
                                                                    } else {
                                                                        $rate_double = $plan_rate['Double'];
                                                                    }

                                                                    if ($rate_extra_adult > $plan_rate['ExtraAdult']) {
                                                                        $rate_extra_adult = $rate_extra_adult;
                                                                    } else {
                                                                        $rate_extra_adult = $plan_rate['ExtraAdult'];
                                                                    }
                                                                }
                                                                $rate_ep_single = $rate_single;
                                                                $rate_ep_double = $rate_double;
                                                                $rate_ep_extra = $rate_extra_adult;
                                                            } else if ($rate_plans['id'] == 'MAP') {
                                                                foreach ($rate_plans as $plan_rate) {
                                                                    if ($rate_single > $plan_rate['Single']) {
                                                                        $rate_single = $rate_single;
                                                                    } else {
                                                                        $rate_single = $plan_rate['Single'];
                                                                    }

                                                                    if ($rate_double > $plan_rate['Double']) {
                                                                        $rate_double = $rate_single;
                                                                    } else {
                                                                        $rate_double = $plan_rate['Double'];
                                                                    }

                                                                    if ($rate_extra_adult > $plan_rate['ExtraAdult']) {
                                                                        $rate_extra_adult = $rate_extra_adult;
                                                                    } else {
                                                                        $rate_extra_adult = $plan_rate['ExtraAdult'];
                                                                    }
                                                                }
                                                                $rate_map_single = $rate_single;
                                                                $rate_map_double = $rate_double;
                                                                $rate_map_extra = $rate_extra_adult;
                                                            }
                                                            ?>
                                                        <div class="Rm-pl-list">
                                                            <div class="display-inline">
                                                                <h3>Plan <?php echo $rate_plans['id']; ?></h3>
                                                                <ul>
                                                                    <li>Single: <b><?php echo $rate_single; ?></b></li>
                                                                    <li>Double: <b><?php echo $rate_double; ?></b></li>
                                                                    <li>Extra-Adult: <b><?php echo $rate_extra_adult; ?></b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <?php } ?>

                                                    </div>

                                                </div>
                                            </div>
                                            <input type="hidden" name="room_name" value="<?php echo $room_type['Name']; ?>" id="room_name_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="room_desc" value="<?php echo $room_type['Description']; ?>" id="room_desc_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="rate_ap_single" value="<?php echo $rate_ap_single; ?>" id="rate_ap_single_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="rate_cp_single" value="<?php echo $rate_cp_single; ?>" id="rate_cp_single_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="rate_map_single" value="<?php echo $rate_map_single; ?>" id="rate_map_single_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="rate_ep_single" value="<?php echo $rate_ep_single; ?>" id="rate_ep_single_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="rate_ap_double" value="<?php echo $rate_ap_double; ?>" id="rate_ap_double_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="rate_cp_double" value="<?php echo $rate_cp_double; ?>" id="rate_cp_double_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="rate_map_double" value="<?php echo $rate_map_double; ?>" id="rate_map_double_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="rate_ep_double" value="<?php echo $rate_ep_double; ?>" id="rate_ep_double_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="rate_map_extra" value="<?php echo $rate_map_extra; ?>" id="rate_map_extra_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="rate_ap_extra" value="<?php echo $rate_ap_extra; ?>" id="rate_ap_extra_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="rate_cp_extra" value="<?php echo $rate_cp_extra; ?>" id="rate_cp_extra_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="rate_ep_extra" value="<?php echo $rate_ep_extra; ?>" id="rate_ep_extra_<?php echo $room_type['Id']; ?>"/>
                                            <input type="hidden" name="available_rooms" value="<?php echo $available_rooms; ?>" id="available_rooms_<?php echo $room_type['Id']; ?>"/>
                                        </li>
                                        <?php }?>
                                        
                                        <?php $count++;}}else{ ?>
                                        <script>
                                            $(function () {
                                                $('#SubmitInfo').hide();
                                            });
                                        </script>
                                        <li>
                                            <div class="alert alert-danger alert-dismissible alert-special" role="alert"><button type="button" class="close" data-dismiss="alert"></button>Sorry, Something went wrong please try again after sometime....!!!</div>
                                        </li>
                                        <?php }?>
                                    </ul>
                                    <div class="bt-book-sbmt-btn submit-room clearfix">
                                        <input type="submit" value="Select &amp; Continue" id="SubmitInfo" class="Rm-submit" onclick="return submitForm()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="dynamic-details">

                </div>

            </div>
        </div>

        <script type="text/javascript">
            function customCheckbox(checkboxName) {
                var checkBox = $('input[name="' + checkboxName + '"]');
                $(checkBox).each(function () {
                    $(this).wrap("<span class='custom-checkbox'></span>");
                    if ($(this).is(':checked')) {
                        $(this).parent().addClass("selected");
                    }
                });
                $(checkBox).click(function () {
                    $(this).parent().toggleClass("selected");
                });
            }
            $(document).ready(function () {
                customCheckbox("checkbox[]");
                customCheckbox("car[]");
                customCheckbox("confirm");
            })
        </script>




        <?php include('footer.php'); ?>

    </body>
</html>


<script src="<?= base_url() ?>js/jquery.min.js"></script>
<!--<script src="<?= base_url() ?>js/custom.js"></script>-->
<script type="text/javascript">
            jQuery(window).load(function () { // makes sure the whole site is loaded
                jQuery("#status").fadeOut(); // will first fade out the loading animation
                jQuery("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.			
            });
</script>
<script type="text/javascript">

    function submitForm()
    {
        var fields = $('input[type="checkbox"]').serializeArray();
        
        if (fields.length == 0)
        {
            $('#select-room-alert').show();
            $('#select-room-alert').html('<div class="col-md-12 focused"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>Please select room & count..!!</div></div>')
            $('.close').focus();
            // cancel submit
            return false;
        } else {
            var checkboxValues = [];
            var room_id = [];
            var available_rooms = [];
            var rooms_selected = [];
            var room_name = [];
            var room_desc = [];
            var rate_ap_single = [];
            var rate_cp_single = [];
            var rate_map_single = [];
            var rate_ep_single = [];
            var rate_ap_double = [];
            var rate_cp_double = [];
            var rate_map_double = [];
            var rate_ep_double = [];
            var rate_map_extra = [];
            var rate_ap_extra = [];
            var rate_cp_extra = [];
            var rate_ep_extra = [];
            $('input[type="checkbox"]:checked').each(function (index, elem) {

                checkboxValues.push($(elem).val());

            });
            var mySelect = checkboxValues;
            var len = mySelect.length;
            var check = checkboxValues.join(',');
            for (i = 0; i < len; i++) {
                room_id.push(mySelect[i]);
                available_rooms.push($('#available_rooms_' + mySelect[i]).val());
                rooms_selected.push($('#rooms_selected_' + mySelect[i]).val());
                room_name.push($('#room_name_' + mySelect[i]).val());
                room_desc.push($('#room_desc_' + mySelect[i]).val());
                rate_ap_single.push($('#rate_ap_single_' + mySelect[i]).val());
                rate_cp_single.push($('#rate_cp_single_' + mySelect[i]).val());
                rate_map_single.push($('#rate_map_single_' + mySelect[i]).val());
                rate_ep_single.push($('#rate_ep_single_' + mySelect[i]).val());
                rate_ap_double.push($('#rate_ap_double_' + mySelect[i]).val());
                rate_cp_double.push($('#rate_cp_double_' + mySelect[i]).val());
                rate_map_double.push($('#rate_map_double_' + mySelect[i]).val());
                rate_ep_double.push($('#rate_ep_double_' + mySelect[i]).val());
                rate_map_extra.push($('#rate_map_extra_' + mySelect[i]).val());
                rate_ap_extra.push($('#rate_ap_extra_' + mySelect[i]).val());
                rate_cp_extra.push($('#rate_cp_extra_' + mySelect[i]).val());
                rate_ep_extra.push($('#rate_ep_extra_' + mySelect[i]).val());

                //        console.log(room_id+','+available_rooms+','+room_name+','+room_desc+','+rate_ap_single+','+rate_cp_single+','+rate_map_single+','+rate_ep_single);
            }
            
            $.ajax({
                url: '<?php echo base_url('booking/submit_user_details'); ?>',
                type: 'post',
                data: {
                    'length': len,
                    'roomid': room_id,
                    'availablerooms': available_rooms,
                    'roomname': room_name,
                    'roomdesc': room_desc,
                    'rateapsingle': rate_ap_single,
                    'ratecpsingle': rate_cp_single,
                    'ratemapsingle': rate_map_single,
                    'rateepsingle': rate_ep_single,
                    'rateapdouble': rate_ap_double,
                    'ratecpdouble': rate_cp_double,
                    'ratemapdouble': rate_map_double,
                    'rateepdouble': rate_ep_double,
                    'ratemapextra': rate_map_extra,
                    'rateapextra': rate_ap_extra,
                    'ratecpextra': rate_cp_extra,
                    'rateepextra': rate_ep_extra,
                    'roomsselected': rooms_selected
                },
                datatype: 'json',
                success: function (data) {
                    $('#room_types').hide();
                    $('#dynamic-details').html(data);

                    //             console.log(data); 
                }
            });
        }



    }
</script>

<script src="<?= base_url() ?>js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {

        // $("#popup").trigger('click');
        // Slideshow 1
        $("#slider1").responsiveSlides({
            speed: 1000,
            nav: true
        });
        $("#gallery-slider").responsiveSlides({
            speed: 1000,
            nav: true,
            auto: false
        });


    });
</script>