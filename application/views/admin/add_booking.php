<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Olive Hotel - Admin</title><link type="image/png" rel="shortcut icon" href="<?= base_url() ?>images/fav.png"/>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
        <!-- Add custom CSS here -->
        <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
        <!-- Page Specific CSS -->
        <!-- <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css"> -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrapValidator.min.css" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cal/jquery-ui-1.10.4.custom.min.css" />
        <style type="text/css">
            .errs p{
                color: red;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <?php include('navigation.php'); ?>
            <div id="page-wrapper">

                <div class="row">
                    <div class="col-lg-12">
                        <h1>Room Booking <small></small></h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/booking/list_all">Room Booking</a></li>
                            <li class="active"> Reserve Room</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->



                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Reserve Room  </h3>                                
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="bookingForm" role="form" action="<?php echo base_url(); ?>admin/booking/add_booking" method="post" enctype="multipart/form-data">

                                        <?php if (isset($err_mgs)) { ?>
                                            <div class="col-sm-10 errs col-sm-offset-2"><p><?php echo $err_mgs; ?></p></div>
                                        <?php } ?>

                                        <div class="form-group">
                                            <label for="checkin_date" class="col-sm-2 control-label">Check in Date</label>
                                            <div class="col-sm-2">
                                                <input name="checkin_date" type="text" class="form-control" id="checkin_date" placeholder="Check in Date" value="<?php echo set_value('checkin_date'); ?>">
                                                <span class="errs"><?php echo form_error('checkin_date'); ?></span>
                                            </div>

                                            <label for="checkout_date" class="col-sm-2 control-label">Check out Date</label>
                                            <div class="col-sm-2">
                                                <input name="checkout_date" type="text" class="form-control" id="checkout_date" placeholder="Check out Date" value="<?php echo set_value('checkout_date'); ?>">
                                                <span class="errs"><?php echo form_error('checkout_date'); ?></span>
                                            </div>
                                            <div class="col-sm-4 errs" id="errs_log"> 

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hotel_master" class="col-sm-2 control-label">Select Hotel</label>
                                            <div class="col-sm-2">
                                                <select name="hotel_master" id="hotel_master" class="form-control" onchange="change_room()">
                                                    <option value="">Select Hotel</option>
                                                    <?php foreach ($hotel_master as $hotel) { ?>
                                                        <option value="<?php echo $hotel->hotel_master_id; ?>"  <?php echo set_select('hotel_master', $hotel->hotel_master_id, FALSE); ?> ><?php echo $hotel->hotel_master_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="errs"><?php echo form_error('hotel_name'); ?></span>
                                            </div> 

                                            <label for="room_type" class="col-sm-2 control-label">Select Room Type</label>
                                            <div class="col-sm-2">
                                                <select name="room_type" id="room_type" class="form-control">
                                                    
                                                </select>
                                                <span class="errs"><?php echo form_error('room_type'); ?></span>
                                            </div>                                              
                                        </div>                                         
                                        <div class="form-group">
                                            <label for="no_rooms" class="col-sm-2 control-label">No of Rooms</label>
                                            <div class="col-sm-2">
                                                <input name="no_rooms" type="text" class="form-control" id="no_rooms" placeholder="No of Rooms" value="<?php echo set_value('no_rooms'); ?>">
                                                <span class="errs"><?php echo form_error('no_rooms'); ?></span>
                                            </div>

                                            <label for="no_people" class="col-sm-2 control-label">No of Adults</label>
                                            <div class="col-sm-2">
                                                <input name="no_people" type="text" class="form-control" id="no_people" placeholder="No of Adults" value="<?php echo set_value('no_people'); ?>">
                                                <span class="errs"><?php echo form_error('no_people'); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_child" class="col-sm-2 control-label">No of Child</label>
                                            <div class="col-sm-2">
                                                <input name="no_child" type="text" class="form-control" id="no_child" placeholder="No of Child" value="<?php echo set_value('no_child'); ?>">
                                                <span class="errs"><?php echo form_error('no_child'); ?></span>
                                            </div>

                                            <label for="no_extra_bed" class="col-sm-2 control-label">No of Extra Bed</label>
                                            <div class="col-sm-2">
                                                <input name="no_extra_bed" type="text" class="form-control" id="no_extra_bed" placeholder="No of Extra Bed" value="<?php echo set_value('no_extra_bed'); ?>">
                                                <span class="errs"><?php echo form_error('no_extra_bed'); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_rate" class="col-sm-2 control-label">Total Rate</label>
                                            <div class="col-sm-6">
                                                <input name="total_rate" type="text" class="form-control" readonly="true" id="total_rate" placeholder="Total" value="<?php echo set_value('total_rate'); ?>">
                                                <span class="errs"><?php echo form_error('total_rate'); ?></span>
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <label for="requirements" class="col-sm-2 control-label">Special Requirements</label>
                                            <div class="col-sm-6">
                                                <textarea name="requirements" id="requirements" class="form-control" placeholder="Special Requirements"><?php echo set_value('requirements'); ?></textarea>
                                                <span class="errs"><?php echo form_error('requirements'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="booking_name" class="col-sm-2 control-label">Full Name</label>
                                            <div class="col-sm-6">
                                                <input name="booking_name" type="text" class="form-control" id="booking_name" placeholder="Name" value="<?php echo set_value('booking_name'); ?>">
                                                <span class="errs"><?php echo form_error('booking_name'); ?></span>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="phone" class="col-sm-2 control-label">Phone</label>
                                            <div class="col-sm-6">
                                                <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone" value="<?php echo set_value('phone'); ?>">
                                                <span class="errs"><?php echo form_error('phone'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-6">
                                                <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                                                <span class="errs"><?php echo form_error('email'); ?></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="country" class="col-sm-2 control-label">Country</label>
                                            <div class="col-sm-6">
                                                <input name="country" type="text" class="form-control" id="country" placeholder="Country" value="<?php echo set_value('country'); ?>">
                                                <span class="errs"><?php echo form_error('country'); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="state" class="col-sm-2 control-label">State</label>
                                            <div class="col-sm-6">
                                                <input name="state" type="text" class="form-control" id="state" placeholder="State" value="<?php echo set_value('state'); ?>">
                                                <span class="errs"><?php echo form_error('state'); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="col-sm-2 control-label">City</label>
                                            <div class="col-sm-6">
                                                <input name="city" type="text" class="form-control" id="city" placeholder="City" value="<?php echo set_value('city'); ?>">
                                                <span class="errs"><?php echo form_error('city'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="address" class="col-sm-2 control-label">Address</label>
                                            <div class="col-sm-6">
                                                <textarea name="address" id="address" class="form-control" placeholder="Address"><?php echo set_value('address'); ?></textarea>
                                                <span class="errs"><?php echo form_error('address'); ?></span>
                                            </div>
                                        </div>





                                        <div class="form-group col col-sm-8">
                                            <button name="submit" type="submit" class="btn btn-primary pull-right">Add Reservation</button>                                            
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->

        <!-- JavaScript -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>    
        <script src="<?php echo base_url(); ?>assets/cal/jquery-ui-1.10.4.custom.min.js"></script>

        <script>
                                                    $(function () {
                                                        $("#checkin_date").datepicker({
                                                            defaultDate: "+1w",
                                                            changeMonth: true,
                                                            dateFormat: "yy-mm-dd",
                                                            numberOfMonths: 2,
                                                            minDate: 0,
                                                            onClose: function (selectedDate) {
                                                                $("#checkout_date").datepicker("option", "minDate", selectedDate);
                                                            }
                                                        });
                                                        $("#checkout_date").datepicker({
                                                            defaultDate: "+1w",
                                                            changeMonth: true,
                                                            dateFormat: "yy-mm-dd",
                                                            numberOfMonths: 2,
                                                            onClose: function (selectedDate) {
                                                                $("#checkin_date").datepicker("option", "maxDate", selectedDate);
                                                            }
                                                        });
                                                    });
        </script>

        <script type = "text/javascript" >
            function change_room() {
                var hotel = $('#hotel_master').val();
                $.post('<?php echo base_url(); ?>admin/booking/change_room/' + hotel, function (data) {
                    $('select#room_type').html(data);
                });
                
            }
            $(document).ready(function () {
                change_room();
                $('#checkin_date').change(function () {
                    $.post('<?php echo base_url(); ?>admin/booking/check_availability', $('#bookingForm').serialize(), function (data) {
                        $('#errs_log').text($.parseJSON(data));
                    });
                    $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                        $('#total_rate').val(data);
                    });
                });
                $('#checkout_date').change(function () {
                    $.post('<?php echo base_url(); ?>admin/booking/check_availability', $('#bookingForm').serialize(), function (data) {
                        $('#errs_log').text($.parseJSON(data));
                    });
                    $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                        $('#total_rate').val(data);
                    });
                });
                $('#room_type').change(function () {
                    $.post('<?php echo base_url(); ?>admin/booking/check_availability', $('#bookingForm').serialize(), function (data) {
                        $('#errs_log').text($.parseJSON(data));
                    });
                    $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                        $('#total_rate').val(data);
                    });
                });
                $('#no_rooms').keyup(function () {
                    $.post('<?php echo base_url(); ?>admin/booking/check_availability', $('#bookingForm').serialize(), function (data) {
                        $('#errs_log').text($.parseJSON(data));
                    });
                    $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                        $('#total_rate').val(data);
                    });
                });
                $('#no_people').keyup(function () {
                    $.post('<?php echo base_url(); ?>admin/booking/check_availability', $('#bookingForm').serialize(), function (data) {
                        $('#errs_log').text($.parseJSON(data));
                    });
                    $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                        $('#total_rate').val(data);
                    });
                });
                $('#no_child').keyup(function () {
                    $.post('<?php echo base_url(); ?>admin/booking/check_availability', $('#bookingForm').serialize(), function (data) {
                        $('#errs_log').text($.parseJSON(data));
                    });
                    $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                        $('#total_rate').val(data);
                    });
                });
                $('#no_extra_bed').keyup(function () {
                    $.post('<?php echo base_url(); ?>admin/booking/check_availability', $('#bookingForm').serialize(), function (data) {
                        $('#errs_log').text($.parseJSON(data));
                    });
                    $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                        $('#total_rate').val(data);
                    });
                });






                $('#bookingForm').bootstrapValidator({
                    message: 'This value is not valid',
                    fields: {
                        checkin_date: {
                            message: 'The Checkin Date Valid',
                            validators: {
                                notEmpty: {
                                    message: 'The Checkin Date is required and can\'t be empty'
                                }
                            }
                        },
                        checkout_date: {
                            message: 'The Checkout Date is not Valid',
                            validators: {
                                notEmpty: {
                                    message: 'The Checkout Date is required and can\'t be empty'
                                }
                            }
                        },
                        room_type: {
                            message: 'The Room Type is not Valid',
                            validators: {
                                notEmpty: {
                                    message: 'The Room Type is required and can\'t be empty'
                                }
                            }
                        },
                        no_rooms: {
                            message: 'The No Rooms is not Valid',
                            validators: {
                                notEmpty: {
                                    message: 'The No Rooms is required and can\'t be empty'
                                }
                            }
                        },
                        no_people: {
                            message: 'The No of People is not Valid',
                            validators: {
                                notEmpty: {
                                    message: 'The No of People is required and can\'t be empty'
                                }
                            }
                        },
                        booking_name: {
                            message: 'The Full Name is not Valid',
                            validators: {
                                notEmpty: {
                                    message: 'The Full Name is required and can\'t be empty'
                                }
                            }
                        },
                        phone: {
                            message: 'The Phone is not Valid',
                            validators: {
                                notEmpty: {
                                    message: 'The Phone is required and can\'t be empty'
                                }
                            }
                        }
                    }
                });
                
            });
        </script>
        <script type="text/javascript">
            
        </script>
    </body>
</html>
