
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
                                	<ul class="clearfix">
                                    	<li class="slt-ul-list">
                                        	<div class="slt-rm-block">
                                            	<div class="slt-imgRm">
                                                	<img src="<?= base_url() ?>images/img-20.jpg"/>
                                                </div>
                                                <div class="slt-RMcont">
                                                	<div class="slt-rm-ttl clearfix">
                                                    	<div class="slt-ttl-left">
                                                        	<div class="slt-check">
                                                            	<input type="checkbox" name="sport[]" value="football" />
                                                            </div>
                                                            <div class="slt-rm-name">
                                                               <h2>Standard Rooms</h2>
                                                               <span>Non Smoking Room</span>
                                                            </div>
                                                        </div>
                                                        <div class="slt-ttl-right">
                                                        	<p>Select No. Rooms</p>
                                                            <select>
                                                            	<option>--</option>
                                                            	<option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="Rm-plan-list">
                                                    	<div class="Rm-pl-list">
                                                        	<div class="display-inline">
                                                            	<h3>Plan AP</h3>
                                                                <ul>
                                                                	<li>Single: <b>4900</b></li>
                                                                    <li>Double: <b>4900</b></li>
                                                                    <li>Extra-Adult: <b>2500</b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="Rm-pl-list">
                                                        	<div class="display-inline">
                                                            	<h3>Plan CP</h3>
                                                                <ul>
                                                                	<li>Single: <b>4900</b></li>
                                                                    <li>Double: <b>4900</b></li>
                                                                    <li>Extra-Adult: <b>2500</b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="Rm-pl-list">
                                                        	<div class="display-inline">
                                                            	<h3>Plan MAP</h3>
                                                                <ul>
                                                                	<li>Single: <b>4900</b></li>
                                                                    <li>Double: <b>4900</b></li>
                                                                    <li>Extra-Adult: <b>2500</b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </li>
                                        <li class="slt-ul-list mrg-right">
                                        	<div class="slt-rm-block">
                                            	<div class="slt-imgRm">
                                                	<img src="<?= base_url() ?>images/img-20.jpg"/>
                                                </div>
                                                <div class="slt-RMcont">
                                                	<div class="slt-rm-ttl clearfix">
                                                    	<div class="slt-ttl-left">
                                                        	<div class="slt-check">
                                                            	<input type="checkbox" name="sport[]" value="football" />
                                                            </div>
                                                            <div class="slt-rm-name">
                                                               <h2>Standard Rooms</h2>
                                                               <span>Non Smoking Room</span>
                                                            </div>
                                                        </div>
                                                        <div class="slt-ttl-right">
                                                        	<p>Select No. Rooms</p>
                                                            <select>
                                                            	<option>--</option>
                                                            	<option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="Rm-plan-list">
                                                    	<div class="Rm-pl-list">
                                                        	<div class="display-inline">
                                                            	<h3>Plan AP</h3>
                                                                <ul>
                                                                	<li>Single: <b>4900</b></li>
                                                                    <li>Double: <b>4900</b></li>
                                                                    <li>Extra-Adult: <b>2500</b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="Rm-pl-list">
                                                        	<div class="display-inline">
                                                            	<h3>Plan CP</h3>
                                                                <ul>
                                                                	<li>Single: <b>4900</b></li>
                                                                    <li>Double: <b>4900</b></li>
                                                                    <li>Extra-Adult: <b>2500</b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="Rm-pl-list">
                                                        	<div class="display-inline">
                                                            	<h3>Plan MAP</h3>
                                                                <ul>
                                                                	<li>Single: <b>4900</b></li>
                                                                    <li>Double: <b>4900</b></li>
                                                                    <li>Extra-Adult: <b>2500</b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </li>
                                        <li class="slt-ul-list">
                                        	<div class="slt-rm-block">
                                            	<div class="slt-imgRm">
                                                	<img src="<?= base_url() ?>images/img-20.jpg"/>
                                                </div>
                                                <div class="slt-RMcont">
                                                	<div class="slt-rm-ttl clearfix">
                                                    	<div class="slt-ttl-left">
                                                        	<div class="slt-check">
                                                            	<input type="checkbox" name="sport[]" value="football" />
                                                            </div>
                                                            <div class="slt-rm-name">
                                                               <h2>Standard Rooms</h2>
                                                               <span>Non Smoking Room</span>
                                                            </div>
                                                        </div>
                                                        <div class="slt-ttl-right">
                                                        	<p>Select No. Rooms</p>
                                                            <select>
                                                            	<option>--</option>
                                                            	<option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="Rm-plan-list">
                                                    	<div class="Rm-pl-list">
                                                        	<div class="display-inline">
                                                            	<h3>Plan AP</h3>
                                                                <ul>
                                                                	<li>Single: <b>4900</b></li>
                                                                    <li>Double: <b>4900</b></li>
                                                                    <li>Extra-Adult: <b>2500</b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="Rm-pl-list">
                                                        	<div class="display-inline">
                                                            	<h3>Plan CP</h3>
                                                                <ul>
                                                                	<li>Single: <b>4900</b></li>
                                                                    <li>Double: <b>4900</b></li>
                                                                    <li>Extra-Adult: <b>2500</b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="Rm-pl-list">
                                                        	<div class="display-inline">
                                                            	<h3>Plan MAP</h3>
                                                                <ul>
                                                                	<li>Single: <b>4900</b></li>
                                                                    <li>Double: <b>4900</b></li>
                                                                    <li>Extra-Adult: <b>2500</b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </li>
                                        <li class="slt-ul-list mrg-right">
                                        	<div class="slt-rm-block">
                                            	<div class="slt-imgRm">
                                                	<img src="<?= base_url() ?>images/img-20.jpg"/>
                                                </div>
                                                <div class="slt-RMcont">
                                                	<div class="slt-rm-ttl clearfix">
                                                    	<div class="slt-ttl-left">
                                                        	<div class="slt-check">
                                                            	<input type="checkbox" name="sport[]" value="football" />
                                                            </div>
                                                            <div class="slt-rm-name">
                                                               <h2>Standard Rooms</h2>
                                                               <span>Non Smoking Room</span>
                                                            </div>
                                                        </div>
                                                        <div class="slt-ttl-right">
                                                        	<p>Select No. Rooms</p>
                                                            <select>
                                                            	<option>--</option>
                                                            	<option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="Rm-plan-list">
                                                    	<div class="Rm-pl-list">
                                                        	<div class="display-inline">
                                                            	<h3>Plan AP</h3>
                                                                <ul>
                                                                	<li>Single: <b>4900</b></li>
                                                                    <li>Double: <b>4900</b></li>
                                                                    <li>Extra-Adult: <b>2500</b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="Rm-pl-list">
                                                        	<div class="display-inline">
                                                            	<h3>Plan CP</h3>
                                                                <ul>
                                                                	<li>Single: <b>4900</b></li>
                                                                    <li>Double: <b>4900</b></li>
                                                                    <li>Extra-Adult: <b>2500</b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="Rm-pl-list">
                                                        	<div class="display-inline">
                                                            	<h3>Plan MAP</h3>
                                                                <ul>
                                                                	<li>Single: <b>4900</b></li>
                                                                    <li>Double: <b>4900</b></li>
                                                                    <li>Extra-Adult: <b>2500</b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                    <div class="bt-book-sbmt-btn submit-room clearfix">
                                        <input type="submit" value="Select &amp; Continue" id="SubmitInfo" class="Rm-submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
       

            </div>
        </div>

		<script type="text/javascript">
            function customCheckbox(checkboxName){
                var checkBox = $('input[name="'+ checkboxName +'"]');
                $(checkBox).each(function(){
                    $(this).wrap( "<span class='custom-checkbox'></span>" );
                    if($(this).is(':checked')){
                        $(this).parent().addClass("selected");
                    }
                });
                $(checkBox).click(function(){
                    $(this).parent().toggleClass("selected");
                });
            }
            $(document).ready(function (){
                customCheckbox("sport[]");
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
            $('#select-room-alert').html('<div class="col-md-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>Please select room & count..!!</div></div>')
          
          // cancel submit
          return false;
        }else{
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