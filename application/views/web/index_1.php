

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
        <link rel="stylesheet" href="<?= base_url() ?>css/animate.css">
        <link href="<?= base_url() ?>css/demo.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/yamm.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    </head>

    <body>
        <div class="SliderWrapper">
            <ul id="slider1">
                <li><img src="<?= base_url() ?>images/slider-1.jpg" alt="slider"></li>
                <li><img src="<?= base_url() ?>images/slider-2.jpg" alt="slider"></li>
                <li><img src="<?= base_url() ?>images/slider-3.jpg" alt="slider"></li>
                <!--<li><img src="<?= base_url() ?>images/slider-4.jpg" alt="slider"></li>-->
                  <li><img src="<?= base_url() ?>images/slider-5.jpg" alt="slider"></li>
            </ul>
            <div class="overlay-leftTop sliderOverlay">
                <div class="sliderOverlayInner">
                    <div class="sliderOverlayInner-tableCell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="Slider-contentWrapp wow fadeInLeft animated">
                                        <h1>Comfort in Class</span></h1>
                                        <p>OLIVE provides you the most luxurious stay heartened by tranquil quietness & ensuring  the best hospitality for our guest at our hotels</p>
                                        <div class="Slider-contLink"><a href="#">Explore</a></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="HotelBookingWrapper  wow slideInRight" data-wow-duration="1.2s">
                                        <div class="HotelBookingTtl"><h2><span>Olive</span> Hotel Booking</h2>
                                            <div class="HTtl-icon"><i class="fa fa-sort-desc"></i></div></div>
                                        <div class="HotelBooking-FormWrapper">
                                            <div class="HTBK-inner clearfix">

                                                <form name="quick_book" id="quick_book" action="">
                                                    <div class="BK-formSelectHotel">
                                                        <label>Select Hotels</label>
                                                        <div class="BH-fm-select">
                                                            <select name="hotel_master" id="hotel_master" class="form-control" onChange="change_hotel()">

                                                                <?php foreach ($hotel_master as $hotel) { ?>
                                                                    <option value="<?php echo $hotel->hotel_master_id; ?>" ><?php echo $hotel->hotel_master_name; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="BK-formGroup BKright-curved">
                                                        <label>Arrival</label>
                                                        <input type="text" id="datepicker" placeholder="Select arrival date" name="checkin_date"/>
                                                    </div>
                                                    <div class="BK-formGroup BKright-curved">
                                                        <label>Departure</label>
                                                        <input type="text" id="datepicker-1" placeholder="Select departure date" name="checkout_date"/>
                                                    </div>
                                                    <div class="BK-selectOuter clearfix">
                                                        <div class="BK-formSelectGroup">
                                                            <label>Rooms</label>
                                                            <div class="BH-fm-select">
                                                                <select name="no_rooms" id="no_rooms">
                                                                    <?php for ($i = 1; $i <= 10; $i++) { ?> 
                                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="BK-formSelectGroup">
                                                            <label>Adults</label>
                                                            <div class="BH-fm-select">
                                                                <select name="no_people" id="no_people">
                                                                    <?php for ($i = 1; $i <= 10; $i++) { ?> 
                                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                                    <?php } ?>                                               
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="BK-formSelectGroup mrg-right">
                                                            <label>Children's</label>
                                                            <div class="BH-fm-select">
                                                                <select name="no_child" id="no_people">
                                                                    <?php for ($i = 0; $i <= 10; $i++) { ?> 
                                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                                    <?php } ?>                                               
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="HTBK-fm-Submit">
                                                        <input type="submit" value="Search Rooms"/>
                                                    </div>
                                                </form>
                                                <script>
                                                    $("#datepicker").datepicker({
                                                        defaultDate: "+1w",
                                                        changeMonth: true,
                                                        dateFormat: "dd-mm-yy",
                                                        numberOfMonths: 1,
                                                        minDate: 0,
                                                    });
                                                    $("#datepicker-1").datepicker({
                                                        defaultDate: "+1w",
                                                        changeMonth: true,
                                                        dateFormat: "dd-mm-yy",
                                                        numberOfMonths: 1,
                                                        minDate: 0,
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div><!--HotelBookingWrapper-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('header.php'); ?>

        <div class="welcomewrapp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Welcome to <span> Olive Hotels </span></h1>
                        <p>Amidst the busy serpentines of traffic, growing IT and eventful diaries of Kochi, OLIVE provides you the most luxurious stay heartened by tranquil quietness &amp; ensuring  the best hospitality for our guest at our hotels   OLIVE DOWNTOWN  at Kadavantra and OLIVE EVA at Kakanad
                            Our hotels combines great ambience with perfect personalized assistance and service with exclusive luxurious rooms, conferencing facilities and an array of restaurants.</p>
                        <a href="#">More</a>                    </div>
                </div>
            </div>
        </div>
        <div class="olive-group">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="olive-groupTitle">
                            <h1>Olive Hotels - Perfect hues of<span> Hospitality</span></h1>
                            <p>Our hotels combines great ambience with perfect personalized assistance and service with exclusive luxurious rooms, conferencing facilities and an array of restaurants.</p>
                            <span class="olive-line"></span>                        </div>
                    </div>
                </div>
                <div class="row olive-hotel-row">
                    <div class="col-md-6">
                        <div class="olive-ht-wrapp-Main  olive-ht-wrapp-Main-left">
                            <div class="olive-ht-wrapp">
                                <div class="olive-ht-img">
                                    <a href="<?= site_url() ?>olive-eva"><img src="<?= base_url() ?>images/img-1.jpg" alt="Olive Hotels"></a>
                                    <div class="OLline tol-top-ln"></div>
                                    <div class="OLline ol-right-ln"></div>
                                    <div class="OLline ol-btm-ln"></div>
                                    <div class="OLline ol-left-ln"></div>
                                </div>
                                <div class="hotel-dec"><span>Olive Eva ,kakkanad</span></div>
                                <div class="olive-ht-content clearfix">
                                    <div class="logo-wrapp">
                                        <a href="<?= site_url() ?>olive-eva"><img src="<?= base_url() ?>images/eva.png" alt="Olive eva"></a>                                </div>
                                    <div class="oline-ht-content">
                                        <p>A modish hotel, clutches its position in the IT hub &amp; area where Smart city Kochi is upright, Kakkanad host of business and leisure travellers.</p>
                                        <a href="<?= site_url() ?>olive-eva">More</a>                                </div>
                                </div>
                            </div>
                            <div class="arrow-hotel-sign ar-left"><i class="ht-icon"></i></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="olive-ht-wrapp-Main">
                            <div class="arrow-hotel-sign ar-right"><i class="ht-icon-right"></i></div>
                            <div class="olive-ht-wrapp">
                                <div class="olive-ht-img">
                                    <a href="<?= site_url() ?>olive-down-town"><img src="<?= base_url() ?>images/img-2.jpg" alt="Olive Hotels"></a>
                                    <div class="OLline tol-top-ln"></div>
                                    <div class="OLline ol-right-ln"></div>
                                    <div class="OLline ol-btm-ln"></div>
                                    <div class="OLline ol-left-ln"></div>
                                </div>
                                <div class="hotel-dec"><span>Olive Down Town ,kadavanthra</span></div>
                                <div class="olive-ht-content clearfix">
                                    <div class="logo-wrapp">
                                        <a href="<?= site_url() ?>olive-down-town"><img src="<?= base_url() ?>images/down-town.jpg" alt="Olive eva"></a>                                </div>
                                    <div class="oline-ht-content down-town-content">
                                        <p>The Hotel embraces 97 unique luxurious accommodations comprising Executive, Deluxe& Suites rooms offering high standards of service </p>
                                        <a href="<?= site_url() ?>olive-down-town">More</a>                                </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div><!--olive-ht-wrapp-Main ends-->
            </div>
        </div><!--olive-group ends-->

        <?php include('footer.php'); ?>

    </body>
</html>


<script src="<?= base_url() ?>js/jquery.min.js"></script>
<script>
                                                    $(function () {
                                                        window.prettyPrint && prettyPrint()
                                                        $(document).on('click', '.yamm .dropdown-menu', function (e) {
                                                            e.stopPropagation()
                                                        })
                                                    })
</script>
<script type="text/javascript">
    jQuery(window).load(function () { // makes sure the whole site is loaded
        jQuery("#status").fadeOut(); // will first fade out the loading animation
        jQuery("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.			
    });
</script>
<script src="<?= base_url() ?>js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>js/responsiveslides.min.js"></script>
<script src="<?= base_url() ?>js/wow.min.js"></script>
<script>
    function change_hotel(){
        var action = $('#hotel_master').val();
            
            $("#quick_book").attr("action", "<?= base_url()?>booking/submit_booking/" + action);
    }
    // You can also use "$(window).load(function() {"
    $(function () {
       change_hotel();
        // $("#popup").trigger('click');
        // Slideshow 1
        $("#slider1").responsiveSlides({
            speed: 2000,
            pager: true
        });

        wow = new WOW({
            animateClass: 'animated',
            offset: 100
        });
        wow.init();

    });
</script>


