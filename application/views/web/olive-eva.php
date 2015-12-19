

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
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700' rel='stylesheet' type='text/css'/>
        <link href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel="stylesheet">
        <link href="<?= base_url() ?>css/demo.css" type="text/css" rel="stylesheet">
        <link href="<?= base_url() ?>css/yamm.css" type="text/css" rel="stylesheet">
        <link href="<?= base_url() ?>css/jquery.fancybox.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/animate.css">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    </head>

    <body>
        <div class="sub-page-header">
            <?php include('header.php'); ?>
        </div>
        <div class="subpage-bannerWrapper">
            <div class="subpage-bannerContent wow fadeInUp animated">
                <h1>Olive <span>Eva</span></h1>
                <p>Opp. Info Park, Near Smart City, Kakkanad, Cochin <br/>
                    info@olivehotels.com | Phone: +91-484-422-2222 </p>
            </div>
        </div>

        <div class="hotel-mainWrapper">
            <div class="container">
                <div class="row">
                    <div class="banner-overlap-title">
                        <div class="page-title"><h2>About <span>Olive Eva</span></h2></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="hotel-detain-top-area">
                            <div class="hotel-gen-content">
                                <img src="<?= base_url() ?>images/eva-logo-1.png" alt="Olive iva">
                                <div class="ht-content-right">
                                    <p>Olive Eva - A modish hotel, clutches its position in the IT hub &amp; area where Smart city Kochi is upright, Kakkanad host of business and leisure travellers. It is strategically connected to the key magnetism of the Kochi city like amusement park, Shopping mall, railway station &amp; Cochin International Airport Limited.The Hotel encompasses of 44 well equipped rooms with ultra modern facilities ensuring a valuable experience to the guests.</p>
                                    <div class="ht-acces">
                                        <h3>Accessibility</h3>
                                        <p>Just a 5 mins stroll from Infopark &amp; Smart City Kochi, Amusement park, shopping mall &amp; railway station contained within a radius of 10 kms &amp; Cochin International Airport Limited positioned at a distance of 30 kms from the Hotel.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="hotel-Slider">
                                <ul id="slider1">
                                    <li><img src="<?= base_url() ?>images/hotel-slide-1.jpg" alt="slider"></li>
                                    <li><img src="<?= base_url() ?>images/hotel-slide-2.jpg" alt="slider"></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>

            <div class="olive-hotel-target-mainWrapper">
                <div class="target-linksWrapper clearfix">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="clearfix">
                                    <li class="active"><a href="#rooms-suites">
                                            <span class="icon-box suites"></span>
                                            Rooms &amp; Suites</a></li>
                                    <li><a href="#facilities">
                                            <span class="icon-box feclt"></span>
                                            Facilities</a></li>
                                    <li><a href="#restaurants">
                                            <span class="icon-box rest"></span>
                                            Restaurants</a></li>
                                    <li><a href="#meeting-Halls">
                                            <span class="icon-box halls"></span>
                                            Banquet Halls</a></li>
                                    <li><a href="#location">
                                            <span class="icon-box locat"></span>
                                            Address &amp; Location</a></li>
                                    <li><a href="#gallery">
                                            <span class="icon-box gall-ico"></span>
                                            Gallery</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="rooms-suites-wrapper" id="rooms-suites">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="rooms-list">
                                    <div class="rooms-list-imgWrapp">
                                        <img src="<?= base_url() ?>images/luxury.jpg" alt="rooms">
                                        <a href="<?= base_url() ?>images/gallery-14.jpg" class="overlay-leftTop room-fancybox">
                                            <span class="room-list-overlayInner clearfix">
                                                <span class="room-list-overlayInner-wrapper clearfix">
                                                    <i><img src="<?= base_url() ?>images/icon-9.png" alt="icon"></i>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="room-detail-content">
                                        <h3>Deluxe Rooms </h3>
                                        <div class="rm-dtl-btm-cont clearfix">
                                            <div class="rm-dtl-btm-left">
                                                <p>Single Occupancy -<b> 3000/-</b></p>
                                                <p>Double Occupancy -<b> 4000/-</b></p>
                                            </div>
                                            <div class="rm-dtl-btm-right">
                                                <a href="<?= site_url() ?>booking/submit_booking/1">Best Available Rate</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btm-round-ico"><i></i></div>
                                </div>                 		
                            </div>
                            <div class="col-md-4">
                                <div class="rooms-list">
                                    <div class="rooms-list-imgWrapp">
                                        <img src="<?= base_url() ?>images/img-3.jpg" alt="rooms">
                                        <a href="<?= base_url() ?>images/room-pop-2.jpg" class="overlay-leftTop room-fancybox">
                                            <span class="room-list-overlayInner clearfix">
                                                <span class="room-list-overlayInner-wrapper clearfix">
                                                    <i><img src="<?= base_url() ?>images/icon-9.png" alt="icon"></i>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="room-detail-content">
                                        <h3>Luxury Rooms  </h3>
                                        <div class="rm-dtl-btm-cont clearfix">
                                            <div class="rm-dtl-btm-left">
                                                <p>Single Occupancy -<b> 3500/-</b></p>
                                                <p>Double Occupancy -<b> 4500/-</b></p>
                                            </div>
                                            <div class="rm-dtl-btm-right">
                                                <a href="<?= site_url() ?>booking/submit_booking/1">Best Available Rate</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btm-round-ico"><i></i></div>
                                </div>                 		
                            </div>
                            <div class="col-md-4">
                                <div class="rooms-list">
                                    <div class="rooms-list-imgWrapp">
                                        <img src="<?= base_url() ?>images/luxury-suite.jpg" alt="rooms">
                                        <a href="<?= base_url() ?>images/room-pop-1.jpg" class="overlay-leftTop room-fancybox">
                                            <span class="room-list-overlayInner clearfix">
                                                <span class="room-list-overlayInner-wrapper clearfix">
                                                    <i><img src="<?= base_url() ?>images/icon-9.png" alt="icon"></i>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="room-detail-content">
                                        <h3>Luxury Suite Rooms </h3>
                                        <div class="rm-dtl-btm-cont clearfix">
                                            <div class="rm-dtl-btm-left">
                                                <p>Single Occupancy -<b> 5000/-</b></p>
                                                <p>Double Occupancy -<b> 6000/-</b></p>
                                            </div>
                                            <div class="rm-dtl-btm-right">
                                                <a href="<?= site_url() ?>booking/submit_booking/1">Best Available Rate</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btm-round-ico"><i></i></div>
                                </div>                 		
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="room-infoWrapp">
                                    <div class="padd-20 clearfix">
                                        <h3>Extra bed- 1500/-</h3>
                                        <p>Above rates are inclusive of breakfast.</p>
                                        <p>Govt taxes would be applicable.</p>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="room-infoWrapp">
                                    <div class="padd-20 clearfix">
                                        <h3>Meal Rates ( Lunch &amp; Dinner)</h3>
                                        <!--<p>350+tax for Lunch & Dinner and 250+tax for kids</p>
                                        <p>Taxes as applicable</p>-->
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="room-infoWrapp">
                                    <div class="padd-15 clearfix">
                                        <h3>Child Policy</h3>
                                        <p>0-5 years will be complimentary</p>
                                        <p>6-10 years will be charged @ 750 with bed &amp; 500 without bed</p>
                                        <p>Kids above 10 Years, Adults rate will be applicable.</p>
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="facilities-mainWrapper" id="facilities">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="target-area-wrapp">
                                        <h2>facilities</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="facilities-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="facities-list-wrapp">
                                            <h4>Hotel Services</h4>
                                            <ul>
                                                <li>Breakfast Included</li>
                                                <li>Coffee Shop</li>
                                                <li>Concierge</li>
                                                <li>Disabled Facilities</li>
                                                <li>Elevator</li>
                                                <li>Travel Assistance</li>
                                                <li>Meeting Facilities</li>
                                                <li>Car Park</li>
                                                <li>Valet Parking</li>
                                                <li>Wi-Fi</li>
                                                <li>Restaurant</li>
                                                <li>24 Hours Room Service</li>
                                                <li>Photocopier</li>
                                                <li>Fax</li>
                                                <li>Workstations</li>
                                                <li>Airport Transfer (Chargeable)</li>
                                                <li>Business Centre Board Room</li>
                                                <li>Laundry Service/Dry Cleaning</li>  
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="facities-list-wrapp">
                                            <h4>General Room Facilities</h4>
                                            <ul>
                                                <li>Air conditioning</li>
                                                <li>Bathrobes</li>
                                                <li>Bathtub</li>
                                                <li>Separate Shower </li>
                                                <li>Television</li>
                                                <li>Daily Newspaper</li>
                                                <li>Desk</li>
                                                <li>Hair Dryer (On request)</li>
                                                <li>WIFI connectivity</li>
                                                <li>Satellite/Cable TV</li>
                                                <li>Tea/coffee Maker</li>
                                                <li>Complimentary Bottled Water</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                  
                            </div>
                        </div><!--facilities-mainWrapper-->
                        <div class="olive-restuarent-mainWrapper" id="restaurants">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="target-area-wrapp">
                                        <h2>Restaurants</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="olive-restuarent-content-wrapper">


                                <div class="olive-restuarenr-list-wrapper">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="restuarent-listWrapper">
                                                <div class="rst-list-imgWrapp">
                                                    <img src="<?= base_url() ?>images/seven-res.jpg" alt="rooms">
                                                    <a href="#" class="overlay-leftTop">
                                                        <span class="room-list-overlayInner clearfix">
                                                            <span class="room-list-overlayInner-wrapper clearfix">
                                                                <h3 class="rst-name">Seven Spices Specialty Restaurant</h3>
                                                            </span>  
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="padd-20">
                                                    <div class="restuarent-list-content">

                                                        <div class="res-logo">
                                                            <img src="<?= base_url() ?>images/res-logo-1.jpg" alt="logo">
                                                        </div>
                                                        <div class="res-list-content-right">
                                                            <h4>Seven Spices Specialty Restaurant</h4>
                                                            <p>Even just a few spices or ethnic condiments that you can keep in your pantry can whirl your habitual dishes into a culinary magnum opus.</p>
                                                            <p>Culinary experiences are congregated from our multi cuisine restaurant. The ideal atmosphere of the restaurant well goes with the world's food album.</p>

                                                        </div>
                                                        <div class="restuarent-list-star">
                                                            <i></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="restuarent-listWrapper">
                                                <div class="rst-list-imgWrapp">
                                                    <img src="<?= base_url() ?>images/img-5.jpg" alt="rooms">
                                                    <a href="#" class="overlay-leftTop">
                                                        <span class="room-list-overlayInner clearfix">
                                                            <span class="room-list-overlayInner-wrapper clearfix">
                                                                <h3 class="rst-name">Bibiana</h3>
                                                            </span>  
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="padd-20">
                                                    <div class="restuarent-list-content">

                                                        <div class="res-list-content-right">
                                                            <h4>Bibiana</h4>
                                                            <p>Speciality restaurant designed in a chic air is dished up with steamy appetite of Grills &amp; Kebabs to revive your taste buds. </p>

                                                        </div>
                                                        <div class="restuarent-list-star">
                                                            <i></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div><!--olive-restuarent-mainWrapper-->

                        <div class="meeting-halls-mainWrapper" id="meeting-Halls">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="target-area-wrapp">
                                        <h2>Banquet &amp; Conferences hall</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="mtg-hall-content-mainWrapper">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="hall-content">
                                            <p>Well equipped conference halls personalized to convene your personal and business requirements in a very archetypal and elegant manner with extreme poise. Halls can accommodate from 15 to 250 pax with vibrant menu options.</p>
                                            <p>Unmatched services &quot; menu selections provide the hotel a magnificence experience of acuess get-together.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mtg-hall-list-wrapp">
                                            <div class="rooms-list-imgWrapp">
                                                <img src="<?= base_url() ?>images/hall-1.jpg" alt="rooms">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mtg-hall-list-wrapp">
                                            <div class="rooms-list-imgWrapp">
                                                <img src="<?= base_url() ?>images/hall-2.jpg" alt="rooms">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mtg-hall-list-wrapp">
                                            <div class="rooms-list-imgWrapp">
                                                <img src="<?= base_url() ?>images/hall-3.jpg" alt="rooms">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--meeting-halls-mainWrapper ends-->

                        <div class="Hotel-location" id="location">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="target-area-wrapp">
                                        <h2>Hotel Address &amp; Location</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="location-wrapper">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="Address-content">
                                            <h3>Find Us</h3>
                                            <p><b>For Reservation</b></br>
                                                +91 484 422 2222</br>
                                                +91 9567863102, +91 9567863104</br>
                                                +91 9567863102
                                                 </p>

                                            <p><b>Mail us at</b></br>
                                                reservations@olivehotels.com</br>
                                                sales.eva@olivehotels.com </p>

                                            <p><b>Address</b></br>
                                             Opp. Info Park, Near Smart City,<br/>
                                             Kakkanad,Cochin-682 030 </p>

                                            <div class="hd-top-right loacatin-icon">
                                                <ul>
                                                    <li><a href="https://www.facebook.com/olive.cochin?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="map">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d245.56307083412344!2d76.36480279323801!3d10.01610364614449!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xed0fe1bcd90d1ca5!2sOlive+Eva!5e0!3m2!1sen!2sus!4v1429346148419" width="100%" height="450" frameborder="0" style="border:0"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--meeting-halls-mainWrapper ends-->

                        <div class="gallery-mainWrapper" id="gallery">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="target-area-wrapp">
                                        <h2>Gallery</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="gl-slider-list">
                                <div class="row">
                                    <?php 
                                    $i =1;
                                    foreach($gallery as $gal){?>
                                    <div class="col-md-3">
                                        <div class="gallery-list-wrapp display">
                                            <div class="gallery-inner">
                                                <img src="<?= base_url() ?>uploads/album/main/<?php echo $gal->album_image;?>" alt="<?php echo $gal->album_title;?>">
                                                <?php 
                                                    $id = $gal->album_id;
                                                    $result = $this->gallery_model->list_album_gallery($id);
                                                    foreach($result as $gals){
                                                ?>
                                                <a href="<?= base_url() ?>uploads/gallery/main/<?php echo $gals->gallery_image;?>" class="gl-popup" data-fancybox-group="<?php echo $gal->album_title;?>" data-caption="<?php echo $gals->gallery_name;?>"></a>
                                                    <?php }?>
                                            </div>
                                            <h2><?php echo $gal->album_title;?></h2>
                                        </div>
                                    </div>
                                    
                                    <?php $i++;}?>
<!--                                    <div class="col-md-3">
                                        <div class="gallery-list-wrapp display">
                                            <div class="gallery-inner">
                                                <img src="<?= base_url() ?>images/gall-thumb-17.jpg" alt="gallery">
                                                <a href="<?= base_url() ?>images/gallery-17.jpg" class="gl-popup" data-fancybox-group="gallery1" data-caption="This is the caption">                       
                                                    <span class="gl-table">
                                                        <span class="gl-table-cell"><i></i></span>
                                                    </span>                             
                                                </a>

                                                <a href="<?= base_url() ?>images/hotel-slide-2.jpg" class="gl-popup hide-thumbImg" data-fancybox-group="gallery1"  data-caption="This is the caption"></a>
                                                <a href="<?= base_url() ?>images/hotel-slide-2.jpg" class="gl-popup hide-thumbImg" data-fancybox-group="gallery1"  data-caption="This is the caption"></a>
                                            </div>
                                            <h2>Gallery Category</h2>
                                        </div>
                                    </div>-->
                                </div>

                            </div><!--gl-slider-list ends-->




                        </div><!--gallery-mainWrapper ends-->


                    </div>
                </div>

            </div>
        </div>

        <?php include('footer.php'); ?>

    </body>
</html>


<script src="<?= base_url() ?>js/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(window).load(function () { // makes sure the whole site is loaded
        jQuery("#status").fadeOut(); // will first fade out the loading animation
        jQuery("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.			
    });
</script>
<script src="<?= base_url() ?>js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>js/responsiveslides.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.plusanchor.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.fancybox.js"></script>
<script src="<?= base_url() ?>js/wow.min.js"></script>
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
        wow = new WOW({
            animateClass: 'animated',
            offset: 100
        });
        wow.init();

        // fixed Nav




    });
</script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {

        $('.gl-popup').fancybox({
            'padding': 5,
            beforeShow: function () {
                this.title = $(this.element).data("caption");
            }
        });
        $('.room-fancybox').fancybox({
            'padding': 5
        });


        wow = new WOW({
            animateClass: 'animated',
            offset: 100
        });
        wow.init();

        // fixed Nav




    });
</script>
<script type="text/javascript">
    var $document = $(document),
            Window = $(window);
    linksWrapper = $('.target-linksWrapper'),
            offset = linksWrapper.offset().top - 250;
    Window.scroll(
            (function () {
                //alert(offset);

                var $scroll_window = jQuery(window).scrollTop();
                var $scrollTop_linksWrapper = linksWrapper.scrollTop();

                if ($scroll_window > offset) {
                    linksWrapper.addClass('target-linksWrapper-fixed');
                }
                if ($scroll_window < offset) {
                    linksWrapper.removeClass('target-linksWrapper-fixed');
                }

            })
            );

    // on click addClass Active

    //$( '.target-linksWrapper li a').bind( "click", function(e) {
//	  //e.preventDefault();
//	  $( '.target-linksWrapper li').removeClass('active');
//	  $(this).parent(li).addClass('active');
//	});
//			
</script>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('body').plusAnchor({
            easing: 'easeInOutExpo',
            offsetTop: -120,
            speed: 1000,
            onInit: function (base) {

                if (base.initHash != '' && $(base.initHash).length > 0) {
                    window.location.hash = 'hash_' + base.initHash.substring(1);
                    window.scrollTo(0, 0);

                    $(window).load(function () {

                        timer = setTimeout(function () {
                            $(base.scrollEl).animate({
                                scrollTop: $(base.initHash).offset().top
                            }, base.options.speed, base.options.easing);
                        }, 2000); // setTimeout

                    }); // window.load
                }
                ; // if window.location.hash

            } // onInit
        });
    });
</script>