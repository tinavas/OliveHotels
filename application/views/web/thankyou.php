
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
                        <div class="banner-overlap-title booking-pg-ttl">
                            <div class="page-title"><h2>Thank <span>You</span></h2></div>
                        </div>
                    </div>
                </div>
                
                <div class="booking-outer">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Thank you for enquiry!! We will contact you soon.</p> 
                                        <br><br><br><br><br><br><br><br>
                                    </div> 
                                    

                                </div>
                            
                            

                        </div>
                        <div class="col-md-1"></div>

                    </div>

                    <!--booking outer ends-->

                    <!--<div class="booking-mainWrapper">
                        <div class="row">
                                <div class="col-md-12">
                                <div class="booking-steps">
                                        <ul>
                                        <li class="active">1</li>
                                        <li>2</li>
                                        <li>3</li>
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
                                        <h3>Select Hotel</h3>
                                    </div>
                                    <div class="select-hotel-wrapper clearfix">
                                        <div class="slt-ht-outerWrapp">
                                           <div class="olive-ht-wrapp">
                                                <div class="olive-ht-img">
                                                    <a href="#"><img src="<?= base_url() ?>images/img-1.jpg" alt="Olive Hotels"></a>
                                                </div>
                                                <div class="olive-ht-content clearfix">
                                                    <div class="logo-wrapp">
                                                        <a href="#"><img src="<?= base_url() ?>images/eva.png" alt="Olive eva"></a>                                </div>
                                                    <div class="oline-ht-content">
                                                        <h4>Olive Eva , Kakkanad</h4>
                                                        <p>A modish hotel, clutches its position in the IT hub & area where Smart city Kochi is upright, Kakkanad host of business and leisure travellers.</p>
                                                        <a href="#">Select &amp; Continue</a>
                                                   </div>
                                                </div>
                                           </div>
                                        </div>
                                        <div class="slt-ht-outerWrapp mrg-right">
                                           <div class="olive-ht-wrapp">
                                                <div class="olive-ht-img">
                                                    <a href="#"><img src="<?= base_url() ?>images/img-2.jpg" alt="Olive Hotels"></a>
                                                </div>
                                                <div class="olive-ht-content clearfix">
                                                    <div class="logo-wrapp">
                                                        <a href="#"><img src="<?= base_url() ?>images/down-town.jpg" alt="Olive eva"></a>                                </div>
                                                    <div class="oline-ht-content down-town-content">
                                                        <h4>Olive Down Town ,kadavanthra</h4>
                                                        <p>The Hotel embraces 97 unique luxurious accommodations comprising Executive, Deluxe& Suites rooms offering high standards of service </p>
                                                        <a href="#">Select &amp; Continue</a>
                                                   </div>
                                                </div>
                                           </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>--><!--booking-mainWrapper ends-->

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