
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
            <div class="subpage-bannerContent">
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
                <?php
                $hotel_name = @$_REQUEST['hotel_name'];
                $room_type = @$_REQUEST['room_type'];
                if (empty($room_type)) {
                    $room_type = '';
                }
                $checkin_date = @$_REQUEST['arrival_date'];
                if (empty($checkin_date)) {
                    $checkin_date = date('d-m-Y');
                }
                $checkout_date = @$_REQUEST['departure_date'];
                if (empty($checkout_date)) {
                    $checkout_date = date('d-m-Y', strtotime($checkin_date . ' + 1 day'));
                    ;
                }
                $no_people = @$_REQUEST['no_people'];
                if (empty($no_people)) {
                    $no_people = 0;
                }
                $no_child = @$_REQUEST['no_child'];
                if (empty($no_child)) {
                    $no_child = 0;
                }
                $no_rooms = @$_REQUEST['no_rooms'];
                if (empty($no_rooms)) {
                    $no_rooms = 0;
                }
                ?>
                <div class="booking-outer">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                           
                            <form name="book_room" id="bookingForm" method="POST" action="<?= site_url() ?>booking/booking_landing">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="frm-group">
                                            <label>Select Hotel</label>
                                            <select name="hotel_name" id="hotel_name" onchange="return change_roomtype()">
                                                <option value="1" <?php
                            if ($hotel_name == '1') {
                                echo 'selected';
                            }
                            ?>>Olive Eva</option>
                                                <option value="2" <?php
                                                if ($hotel_name == '2') {
                                                    echo 'selected';
                                                }
                            ?>>Olive Down Town</option>
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="frm-group">
                                            <label>Select Room Type</label>
                                            <select name="room_type">
                                                <option <?php
                                                if ($room_type == '') {
                                                    echo 'selected';
                                                }
                            ?>>Select Room Type</option>
                                                <option value="1" <?php
                                                if ($room_type == '1') {
                                                    echo 'selected';
                                                }
                            ?>>
                                                    Deluxe</option>
                                                <option value="2" <?php
                                                if ($room_type == '2') {
                                                    echo 'selected';
                                                }
                            ?>>Luxury</option>
                                                <option value="3" <?php
                                                if ($room_type == '3') {
                                                    echo 'selected';
                                                }
                            ?> id="exe" style="display:none;">Executive</option>
                                                <option value="4" <?php
                                                if ($room_type == '4') {
                                                    echo 'selected';
                                                }
                            ?> id="suite" style="display:none;">Suite</option>
                                                <option value="5" <?php
                                                if ($room_type == '5') {
                                                    echo 'selected';
                                                }
                            ?>>Luxury Suite</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6"> 
                                        <div class="frm-group">
                                            <label>Arrival</label>
                                            <input type="text" id="datepicker" name="checkin_date" value="<?= $checkin_date ?>"/>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="frm-group">
                                            <label>Departure</label>
                                            <input type="text" id="datepicker-1" value="<?= $checkout_date ?>" name="checkout_date"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="frm-group">
                                                    <label>Rooms</label>
                                                    <select name="no_rooms" id="no_rooms">
                                                        <?php for ($i = 1; $i <= 10; $i++) { ?> 
                                                            <option value="<?= $i ?>" <?php
                                                        if ($no_rooms == $i) {
                                                            echo 'selected';
                                                        }
                                                            ?>><?= $i ?></option>
                                                                <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="frm-group">
                                                    <label>Adults</label>
                                                    <select name="no_people" id="no_people">
                                                        <?php for ($i = 1; $i <= 10; $i++) { ?> 
                                                            <option value="<?= $i ?>" <?php
                                                        if ($no_people == $i) {
                                                            echo 'selected';
                                                        }
                                                            ?>><?= $i ?></option>
                                                                <?php } ?>                                               
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="frm-group">
                                                    <label>Children</label>
                                                    <select name="no_child" id="no_people">
                                                        <?php for ($i = 1; $i <= 10; $i++) { ?> 
                                                            <option value="<?= $i ?>" <?php
                                                        if ($no_child == $i) {
                                                            echo 'selected';
                                                        }
                                                            ?>><?= $i ?></option>
                                                                <?php } ?>                                               
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> 

                                    </div>
                                    <script>
                                        $("#datepicker").datepicker({
                                            defaultDate: "+1w",
                                            changeMonth: true,
                                            dateFormat: "d-m-yy",
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="prs-dtl">Personal Details</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="frm-group">
                                            <label>Name</label>
                                            <input type="text" placeholder="Enter Name" name="name" id="name" value="<?= set_value('name')?>"/>
                                            <span class="errs" id="err_booking_name"><?php echo form_error('name'); ?></span>
                                        </div> 


                                    </div>
                                    <div class="col-md-6">
                                        <div class="frm-group">
                                            <label>Email</label>
                                            <input type="text" placeholder="Enter Email" name="email" id="email" value="<?= set_value('email')?>"/>
                                            <span class="errs" id="err_email"><?php echo form_error('email'); ?></span>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="frm-group">
                                            <label>Phone</label>
                                            <input type="text" placeholder="Enter Phone No." name="phone" id="phone" value="<?= set_value('phone')?>"/>
                                            <span class="errs" id="err_phone"><?php echo form_error('phone'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="frm-group">
                                            <label>Country</label>
                                            <input type="text" placeholder="Enter Country" name="country" id="country" value="<?= set_value('country')?>"/>
                                            <span class="errs" id="err_country"><?php echo form_error('country'); ?></span>
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
                            <script type="text/javascript">
                                    $(document).ready(function () {
                                        var hotel = '<?= @$_REQUEST['hotel_name'] ?>';
                                        if (hotel == '2') {
                                            $('#exe').show();
                                            $('#suite').show();
                                        } else {
                                            $('#exe').hide();
                                            $('#suite').hide();
                                        }
                                        $('#bookingForm').submit(function () {

                                            var phone_filter = /^[0-9]{10}$/;
                                            var filter = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{1,4}$/;
                                            if ($('#name').val() == '') {
                                                $('#err_booking_name').text('The Name is required and can\'t be empty');
                                                return false;
                                            }
                                            else if ($('#phone').val() == '') {
                                                $('#err_phone').text('The Phone is required and can\'t be empty');
                                                return false;
                                            }else if(!phone_filter.test($('#phone').val())){
                                                $('#err_phone').text('The Phone should be valid');
                                                return false;
                                            }
                                            else if ($('#email').val() == '') {
                                                $('#err_email').text('The Email is required and can\'t be empty');
                                                return false;
                                            }
                                            else if (!filter.test($('#email').val())) {
                                                $('#err_email').text('The Email should be valid');
                                                return false;
                                            }
                                            else if ($('#country').val() == '') {
                                                $('#err_country').text('The Address is required and can\'t be empty');
                                                return false;
                                            }

                                            else
                                            {
                                                return true;
                                            }

                                        });
                                    });

                                    function change_roomtype() {
                                        var hotel = $('#hotel_name').val();
                                        if (hotel == '2') {
                                            $('#exe').show();
                                            $('#suite').show();
                                        } else {
                                            $('#exe').hide();
                                            $('#suite').hide();
                                        }
                                    }
                            </script>

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