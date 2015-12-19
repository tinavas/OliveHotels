
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
                <p>OLIVE provides you the most luxurious stay heartened by tranquil quietness &amp;<br/> ensuring the best hospitality for our guest at our hotels</p>
            </div>
        </div>

        <div class="contact-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-overlap-title">
                            <div class="page-title"><h2>Get in <span>Touch</span></h2></div>
                        </div>
                    </div>
                </div>
                <div class="contact-top-wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-address-wrapp clearfix">
                                <div class="cnt-logo"><img src="<?= base_url() ?>images/cnt-logo-eva.jpg" alt="Olive eva"></div>
                                <div class="cnt-add-right">
                                    <p>Near Info park & Smart City<br/> 
                                        Kakkanad, Cochin-682 030<br/>
                                        <span>reservations@olivehotels.com<br/>
                                            info@olivehotels.com</span></p>
                                </div>
                            </div>        
                        </div>
                        <div class="col-md-6">
                            <div class="contact-address-wrapp clearfix">
                                <div class="cnt-logo cnt-dwn-logo"><img src="<?= base_url() ?>images/cnt-logo-downTown.jpg" alt="down town logo"></div>
                                <div class="cnt-add-right">
                                    <p>Hotel Olive Downtown 28/286, Kadavanthra Jn.<br/>
                                        Kochi, Kerala , india, 682 020<br/>
                                        <span>reservations.dt@olivehotels.com<br/>
                                            downtown@olivehotels.com<br/></span></p>
                                </div>
                            </div>        
                        </div>       
                    </div>

                    <div class="enqiury-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Enquiry</h3>
                            </div>
                        </div>

                        <div class="row">
                            <form name="quick_book" id="enquiry" method="POST" action="<?php echo site_url(); ?>contact/index">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="frm-group">
                                                <label>Selct Hotel</label>
                                                <select name="hotel_name" id="hotel_name">
                                                    <option value="1">Olive Eva</option>
                                                    <option value="2">Olive Down Town</option>
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="frm-group">
                                                <label>Name</label>
                                                <input type="text" placeholder="Enter Name" name="name" value="<?= set_value('name') ?>"/>
                                                <span class="errs" id="err_booking_name"><?php echo form_error('name'); ?></span>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="frm-group">
                                                <label>Email</label>
                                                <input type="text" placeholder="Enter Email" name="email" value="<?= set_value('email') ?>"/>
                                                <span class="errs" id="err_email"><?php echo form_error('email'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="frm-group">
                                                <label>Phone</label>
                                                <input type="text" placeholder="Enter Phone No." name="phone" value="<?= set_value('phone') ?>"/>
                                                <span class="errs" id="err_phone"><?php echo form_error('phone'); ?></span>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="frm-group">
                                                <label>Country</label>
                                                <input type="text" placeholder="Enter Country" name="country" value="<?= set_value('country') ?>"/>
                                                <span class="errs" id="err_country"><?php echo form_error('country'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="frm-group">
                                                <label>Message</label>
                                                <textarea placeholder="Enter Message" name="message"><?= set_value('message') ?></textarea>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="contact-submit">
                                                <input type="submit" value="Submit"/>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            <form name="quick_book" id="enquiry" method="POST" action="<?php echo site_url(); ?>contact/send_gm">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="write-to-gm">
                                            <h3>Write to GM</h3>
                                            <div class="frm-group">
                                                <label>Select Hotel</label>
                                                <select name="hotel_name" id="hotel_name">
                                                    <option value="1">Olive Eva</option>
                                                    <option value="2">Olive Down Town</option>
                                                </select>
                                            </div>
                                            <div class="frm-group">
                                                <label>Email</label>
                                                <input type="text" placeholder="Enter Email" name="gemail" value="<?= set_value('gemail') ?>"/>
                                                <span class="errs" id="err_email"><?php echo form_error('gemail'); ?></span>
                                            </div>
                                            <div class="frm-group">
                                                <label>Messege</label>
                                                 <textarea placeholder="Enter Message" name="message"><?= set_value('message') ?></textarea>
                                                 <span class="errs" id="err_country"><?php echo form_error('message'); ?></span>
                                            </div> 
                                            <div class="contact-submit">
                                                <input type="submit" value="Submit"/>
                                            </div>	
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!--enqiury-wrapper ends-->


                    </div>
                </div>

            </div><!--contact-top-wrapper-->


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