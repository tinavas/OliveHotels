
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
                            <div class="page-title"><h2>Online <span>Booking</span></h2></div>
                        </div>

                    </div>
                    
                </div>

                <div class="booking-mainWrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="booking-steps">
                                <ul>
                                    <li>1</li>
                                    <li class="active">2</li>
                                    <li>3</li>
                                    <li>4</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <form class="form-horizontal" id="bookingForm" role="form" action="<?php echo base_url(); ?>booking/submit_booking/<?= $id ?>" method="post" enctype="multipart/form-data">
                            <div class="col-md-10">
                                <div class="booking-outer-wrapper clearfix">
                                    <div class="bk-title">
                                        <h3>Reserve Room</h3>
                                    </div>
                                    <div class="select-hotel-wrapper ht-bk-form clearfix">
                                        <?php
                                $checkin_date = @$_REQUEST['checkin_date'];
                                if (empty($checkin_date)) {
                                    $checkin_date = date('d-m-Y');
                                }
                                $checkout_date = @$_REQUEST['checkout_date'];
                                if (empty($checkout_date)) {
                                    $checkout_date = date('d-m-Y', strtotime( $checkin_date. ' + 1 day'));;
                                }
//                                $no_people = @$_REQUEST['no_people'];
//                                if (empty($no_people)) {
//                                    $no_people = 0;
//                                }
//                                $no_child = @$_REQUEST['no_child'];
//                                if (empty($no_child)) {
//                                    $no_child = 0;
//                                }
//                                $no_rooms = @$_REQUEST['no_rooms'];
//                                if (empty($no_rooms)) {
//                                    $no_rooms = 0;
//                                }
//                                $no_extra_bed = @$_REQUEST['no_extra_bed'];
//                                if (empty($no_extra_bed)) {
//                                    $no_extra_bed = 0;
//                                }
                                ?>
                                        <div class="row">
                                        	
                                            <?php if (isset($errs)) { ?>
                                            	<div class="row">
                                            	<div class="col-md-12">
                                                <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button><?php echo $errs; ?></div>
                                                </div>
                                            </div>
                                                <!--<div class="col-sm-10 errs col-sm-offset-2"><p><?php echo $errs; ?></p></div>-->
                                            <?php } ?>


                                            <?php if (isset($err_mgs)) { ?>
                                                <div class="col-sm-10 errs col-sm-offset-2"><p><?php echo $err_mgs; ?></p></div>
                                            <?php } ?>
                                            <div class="col-md-6">
                                                <div class="frm-group date-pkr">
                                                    <label>Check In Date</label>
                                                    <input type="text" id="datepicker" placeholder="Select Check In Date" name="checkin_date" value="<?php echo $checkin_date; ?>"/>
                                                    <span class="errs" id="err_checkin_date"><?php echo form_error('checkin_date');       ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="frm-group date-pkr">
                                                    <label>Check Out Date</label>
                                                    <input type="text" id="datepicker-1" placeholder="Select Check Out Date" name="checkout_date" value="<?php echo $checkout_date; ?>"/>
                                                    <span class="errs" id="err_checkout_date"><?php echo form_error('checkout_date');       ?></span>
                                                </div>
                                            </div>
                                        </div>
<!--                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="frm-group">
                                                    <label>No of Adults</label>
                                                    <select name="no_people" id="no_people">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                    <input type="text" name="no_people" id="no_people" value="<?php echo $no_people; ?>">
                                                    <span class="errs" id="err_no_rooms"><?php echo form_error('no_people');?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="frm-group">
                                                    <label>No of Children's</label>
                                                    <input type="text" name="no_child" id="no_child" value="<?php echo $no_child; ?>">
                                                    <span class="errs" id="err_checkin_date"><?php echo form_error('no_child');?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="frm-group">
                                                    <label>No of Rooms</label>
                                                    <select name="no_rooms" id="no_rooms">
                                                        <option value="1" <?php if($no_rooms=='1'){echo 'selected';}?>>1</option>

                                                        <option value="2" <?php if($no_rooms=='2'){echo 'selected';}?>>2</option>

                                                        <option value="3" <?php if($no_rooms=='3'){echo 'selected';}?>>3</option>

                                                        <option value="4" <?php if($no_rooms=='4'){echo 'selected';}?>>4</option>

                                                        <option value="5" <?php if($no_rooms=='5'){echo 'selected';}?>>5</option>

                                                        <option value="6" <?php if($no_rooms=='6'){echo 'selected';}?>>6</option>

                                                        <option value="7" <?php if($no_rooms=='7'){echo 'selected';}?>>7</option>

                                                        <option value="8" <?php if($no_rooms=='8'){echo 'selected';}?>>8</option>

                                                        <option value="9" <?php if($no_rooms=='9'){echo 'selected';}?>>9</option>

                                                        <option value="10" <?php if($no_rooms=='10'){echo 'selected';}?>>10</option>
                                                    </select>
                                                    <span class="errs" id="err_checkin_date"><?php // echo form_error('no_rooms');       ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="frm-group">
                                                    <label>No of Extra Bed</label>
                                                    <select name="no_extra_bed" id="no_extra_bed">
                                                        <option value="0" <?php if($no_extra_bed=='0'){echo 'selected';}?>>0</option>
                                                        <option value="1" <?php if($no_extra_bed=='1'){echo 'selected';}?>>1</option>

                                                    </select>
                                                    <span class="errs" id="err_checkin_date"><?php // echo form_error('no_extra_bed');       ?></span>
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="bt-book-sbmt-btn clearfix">
                                                    <input type="submit" value="Continue"/>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $("#datepicker").datepicker({
                                                defaultDate: "+1w",
                                                changeMonth: true,
                                                dateFormat: "dd-mm-yy",
                                                numberOfMonths: 2,
                                                minDate: 0,
                                            });
                                            $("#datepicker-1").datepicker({
                                                defaultDate: "+1w",
                                                changeMonth: true,
                                                dateFormat: "dd-mm-yy",
                                                numberOfMonths: 2,
                                                minDate: 0,
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </form>


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



