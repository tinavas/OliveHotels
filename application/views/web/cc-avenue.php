
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
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link href="<?= base_url() ?>css/jquery.fancybox.css" type="text/css" rel="stylesheet">

        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <style>
            .frm-group .bookError{
                color: red;
                font-weight: normal;
            }
        </style>
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
                        <div class="my-profile-wrapper">
                            <div class="payment-box">

                                <h3>Thank you</h3>
                                <div class="read-payment">
                                    <p><?php echo $message; ?></p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-1"></div>
                </div>
            </div><!--booking-mainWrapper ends-->

        </div>
    </div>

    <?php include('footer.php'); ?>
    <script type="text/javascript" src="<?= base_url() ?>js/jquery.fancybox.js"></script>
    <script type="text/javascript">
        jQuery(window).load(function () { // makes sure the whole site is loaded
            jQuery("#status").fadeOut(); // will first fade out the loading animation
            jQuery("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.			

        });
    </script>
    <script src="<?= base_url() ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>js/responsiveslides.min.js"></script>
</body>
</html>