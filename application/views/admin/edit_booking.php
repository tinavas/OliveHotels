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
        <!--<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">-->
        <link href="<?php echo base_url(); ?>assets/css/bootstrapValidator.min.css" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cal/jquery-ui-1.10.4.custom.min.css" />
        <style type="text/css">
            .errs p{
                color: red;
            }
            .errs{
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

                                <?php if ($this->session->flashdata('message')) { ?>
                                    <div class="col-lg-8"> 
                                        <div class="alert alert-info fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <?php echo $this->session->flashdata('message'); ?>
                                        </div>
                                    </div>
                                <?php } ?>


                                <div class="col-lg-8">



                                    <form class="form-horizontal" id="bookingForm" role="form" action="<?php echo base_url(); ?>admin/booking/edit_booking/<?php echo $booking->booking_id; ?>" method="post" enctype="multipart/form-data">


                                        <div class="col-sm-9 errs col-sm-offset-3 errs" id="errs_log"></div>
                                        <?php if (isset($err_mgs)) { ?>
                                            <div class="col-sm-9 errs col-sm-offset-3"><p><?php echo $err_mgs; ?></p></div>
                                        <?php } ?>



                                        <div class="form-group">

                                            <label for="checkin_date" class="col-sm-3 control-label">Booking Status</label>
                                            <div class="col-sm-3">
                                                <?php if ($booking->booking_status == 1) { ?>
                                                    <span class="label label-success">Confirmed</span>

                                                <?php } elseif ($booking->booking_status == 2) { ?>
                                                    <span class="label label-danger">Canceled</span>
                                                <?php } else { ?>
                                                    <span class="label label-danger">Not Confirmed</span>
                                                <?php } ?>
                                            </div>

                                            <div class="col-sm-3">
                                                <?php if ($booking->payment_status == 1) { ?>
                                                    <span class="label label-success">Payment Done</span>                                               
                                                <?php } else { ?>
                                                    <span class="label label-danger">Payment not Done</span>
                                                <?php } ?>
                                            </div>


                                        </div>
                                        <div class="form-group">
                                            <label for="checkin_date" class="col-sm-3 control-label">Softbooking Id: </label>
                                            <div class="col-sm-3">
                                                <b><?php echo $booking->softbookid;?></b>
                                            </div>
                                            <label for="checkout_date" class="col-sm-3 control-label">Transaction Id: </label>
                                            <div class="col-sm-3">
                                                <b><?php echo $booking->transactionid;?></b>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <label for="checkin_date" class="col-sm-3 control-label">Check in Date</label>
                                            <div class="col-sm-3">
                                                <input name="checkin_date" type="text" class="form-control" id="checkin_date" placeholder="Check in Date" value="<?php echo date('Y-m-d', strtotime($booking->date_checkin)); ?>"> 
                                            </div>

                                            <label for="checkout_date" class="col-sm-3 control-label">Check out Date</label>
                                            <div class="col-sm-3">
                                                <input name="checkout_date" type="text" class="form-control" id="checkout_date" placeholder="Check out Date"  value="<?php echo date('Y-m-d', strtotime($booking->date_checkout)); ?>">
                                            </div>

                                        </div>





                                        <div class="form-group">
                                            <label for="hotel_master" class="col-sm-3 control-label">Select Hotel</label>
                                            <div class="col-sm-3">
                                                <select name="hotel_master" class="form-control">
                                                    <option value="">Select Hotel</option>
                                                    <?php foreach ($hotel_master as $hotel) { ?>
                                                        <option value="<?php echo $hotel->hotel_master_id; ?>" <?php if ($hotel->hotel_master_id == $booking->hotel_master_id) { ?> selected="true" <?php } ?>><?php echo $hotel->hotel_master_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="errs"><?php echo form_error('hotel_name'); ?></span>
                                            </div> 
                                            <label for="room_type" class="col-sm-3 control-label">Select Room Type</label>
                                            <div class="col-sm-3">
                                                <select name="room_type" id="room_type" class="form-control">
                                                    <option value="">Select Room Type</option>
                                                    <?php foreach ($room_masters as $t => $room) { ?>
                                                        <option value="<?php echo $room->room_type_id; ?>" <?php if ($room->room_type_id == $booking->room_master_id) { ?> selected="true" <?php } ?>><?php echo $room->room_type_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="errs"><?php echo form_error('room_type'); ?></span>
                                            </div>                                        

                                        </div>                                         
                                        <div class="form-group">
                                            <label for="no_rooms" class="col-sm-3 control-label">No of Rooms</label>
                                            <div class="col-sm-3">
                                                <input name="no_rooms" type="text" class="form-control" id="no_rooms" placeholder="No of Rooms"  value="<?php echo $booking->no_rooms; ?>">
                                                <span class="errs"><?php echo form_error('no_rooms'); ?></span>
                                            </div> 
                                            <label for="no_people" class="col-sm-3 control-label">No of Adults</label>
                                            <div class="col-sm-3">
                                                <input name="no_people" type="text" class="form-control" id="no_people" placeholder="No of Adults"  value="<?php echo $booking->no_people; ?>">
                                                <span class="errs"><?php echo form_error('no_people'); ?></span>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="no_child" class="col-sm-3 control-label">No of Child</label>
                                            <div class="col-sm-3">
                                                <input name="no_child" type="text" class="form-control" id="no_child" placeholder="No of Child" value="<?php echo $booking->no_child; ?>">
                                                <span class="errs"><?php echo form_error('no_child'); ?></span>
                                            </div>
                                            <label for="no_extra_bed" class="col-sm-3 control-label">No of Extra Bed</label>
                                            <div class="col-sm-3">
                                                <input name="no_extra_bed" type="text" class="form-control" id="no_extra_bed" placeholder="No of Extra Bed" value="<?php echo $booking->no_extra_bed; ?>">
                                                <span class="errs"><?php echo form_error('no_extra_bed'); ?></span>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="total_rate" class="col-sm-3 control-label">Total Rate</label>
                                            <div class="col-sm-9">
                                                <input name="total_rate" type="text" class="form-control" readonly="true" id="total_rate" placeholder="Total" value="<?php echo $booking->total_rate; ?>">
                                                <span class="errs"><?php echo form_error('total_rate'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="requirements" class="col-sm-3 control-label">Special Requirements</label>
                                            <div class="col-sm-9">
                                                <textarea name="requirements" id="requirements" class="form-control" placeholder="Special Requirements"><?php echo $booking->requirements; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="booking_name" class="col-sm-3 control-label">Full Name</label>
                                            <div class="col-sm-9">
                                                <input name="booking_name" type="text" class="form-control" id="booking_name" placeholder="Name"  value="<?php echo $booking->first_name; ?>">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="phone" class="col-sm-3 control-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone" value="<?php echo $booking->phone; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-9">
                                                <input name="email" type="text" class="form-control" id="email" placeholder="Email"  value="<?php echo $booking->email; ?>">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="country" class="col-sm-3 control-label">Country</label>
                                            <div class="col-sm-9">
                                                <input name="country" type="text" class="form-control" id="country" placeholder="Country" value="<?php echo $booking->country; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="state" class="col-sm-3 control-label">State</label>
                                            <div class="col-sm-9">
                                                <input name="state" type="text" class="form-control" id="state" placeholder="State" value="<?php echo $booking->state; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="col-sm-3 control-label">City</label>
                                            <div class="col-sm-9">
                                                <input name="city" type="text" class="form-control" id="city" placeholder="City" value="<?php echo $booking->city; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="address" class="col-sm-3 control-label">Address</label>
                                            <div class="col-sm-9">
                                                <textarea name="address" id="address" class="form-control" placeholder="Address"><?php echo $booking->address; ?></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-3 pull-right">
                                                <button name="submit" type="submit" class="btn btn-primary pull-right">Update Reservation</button> 
                                            </div>
                                            <div class="col-sm-3 pull-right">
                                                <?php if ($booking->booking_status == 1) { ?>
                                                    <a href="<?php echo base_url(); ?>admin/booking/cancel_booking/<?php echo $booking->booking_id; ?>" class="btn btn-warning pull-right">Cancel Booking</a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url(); ?>admin/booking/confirm_booking/<?php echo $booking->booking_id; ?>" class="btn btn-success pull-right">Confirm Booking</a>
                                                <?php } ?>
                                            </div>
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

<!--        <script>
            $(document).ready(function () {

                $('#checkin_date').change(function () {
                    $.post('<?php echo base_url(); ?>admin/booking/check_availability_update/<?php echo $booking->booking_id; ?>', $('#bookingForm').serialize(), function (data) {
                                    $('#errs_log').text($.parseJSON(data));
                                });
                                $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                                    $('#total_rate').val(data);
                                });
                            });
                            $('#checkout_date').change(function () {
                                $.post('<?php echo base_url(); ?>admin/booking/check_availability_update/<?php echo $booking->booking_id; ?>', $('#bookingForm').serialize(), function (data) {
                                                $('#errs_log').text($.parseJSON(data));
                                            });
                                            $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                                                $('#total_rate').val(data);
                                            });
                                        });
                                        $('#room_type').change(function () {
                                            $.post('<?php echo base_url(); ?>admin/booking/check_availability_update/<?php echo $booking->booking_id; ?>', $('#bookingForm').serialize(), function (data) {
                                                            $('#errs_log').text($.parseJSON(data));
                                                        });
                                                        $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                                                            $('#total_rate').val(data);
                                                        });
                                                    });
                                                    $('#no_rooms').keyup(function () {
                                                        $.post('<?php echo base_url(); ?>admin/booking/check_availability_update/<?php echo $booking->booking_id; ?>', $('#bookingForm').serialize(), function (data) {
                                                                        $('#errs_log').text($.parseJSON(data));
                                                                    });
                                                                    $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                                                                        $('#total_rate').val(data);
                                                                    });
                                                                });
                                                                $('#no_people').keyup(function () {
                                                                    $.post('<?php echo base_url(); ?>admin/booking/check_availability_update/<?php echo $booking->booking_id; ?>', $('#bookingForm').serialize(), function (data) {
                                                                                    $('#errs_log').text($.parseJSON(data));
                                                                                });
                                                                                $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                                                                                    $('#total_rate').val(data);
                                                                                });
                                                                            });
                                                                            $('#no_child').keyup(function () {
                                                                                $.post('<?php echo base_url(); ?>admin/booking/check_availability_update/<?php echo $booking->booking_id; ?>', $('#bookingForm').serialize(),
                                                                                                    function (data) {
                                                                                                        $('#errs_log').text($.parseJSON(data));
                                                                                                    });
                                                                                            $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                                                                                                $('#total_rate').val(data);
                                                                                            });
                                                                                        });
                                                                                        $('#no_extra_bed').keyup(function () {
                                                                                            $.post('<?php echo base_url(); ?>admin/booking/check_availability_update/<?php echo $booking->booking_id; ?>', $('#bookingForm').serialize(), function (data) {
                                                                                                            $('#errs_log').text($.parseJSON(data));
                                                                                                        });
                                                                                                        $.post('<?php echo base_url(); ?>admin/booking/get_rate', $('#bookingForm').serialize(), function (data) {
                                                                                                            $('#total_rate').val(data);
                                                                                                        });
                                                                                                    });

                                                                                                });
        </script>-->

        <script type="text/javascript">
            $(document).ready(function () {
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
<!--        <script type="text/javascript">
            function change_room() {
                var hotel = $('#hotel_master').val();
                $.post('<?php echo base_url(); ?>admin/booking/change_room/' + hotel, function (data) {
                    $('select#room_type').html(data);
                });

            }
        </script>-->

    </body>
</html>
