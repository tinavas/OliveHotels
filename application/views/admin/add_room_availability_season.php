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
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <!-- Page Specific CSS -->

        <link href="<?php echo base_url(); ?>assets/css/bootstrapValidator.min.css" rel="stylesheet">

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
                        <h1>
                            Room Master
                            <?php
                            $id = $this->session->userdata('hotel_id');
                            $condition = array('hotel_master_id' => $id);
                            $hotel_names = $this->hotel_master_model->list_hotel_name($condition);
                            echo '(' . $hotel_names->hotel_master_name . ')';
                            ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/room_master/index/<?= $this->session->userdata('hotel_id') ?>">Room Masters</a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/room_master/room_availability_season/<?php echo $room_master_id; ?>">Room Availability for Season</a></li>
                            <li class="active"> Add Room for Seasons</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Add Room Availability  </h3>                                
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-6">
                                    <form class="form-horizontal" id="room_masterForm" role="form" action="<?php echo base_url(); ?>admin/room_master/add_room_availability_season/<?php echo $room_master_id; ?>" method="post" enctype="multipart/form-data">


                                        <div class="form-group">
                                            <label for="from_date" class="col-sm-3 control-label">From date</label>
                                            <div class="col-sm-9">
                                                <input name="from_date" type="text" class="form-control" id="from_date" value="<?php echo set_value('from_date'); ?>" placeholder="From Date">
                                                <input type="hidden" name="hotel_name" value="<?= $id ?>"/>
                                                <span class="errs"><?php echo form_error('from_date'); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="to_date" class="col-sm-3 control-label">To Date</label>
                                            <div class="col-sm-9">
                                                <input name="to_date" type="text" class="form-control" id="to_date" value="<?php echo set_value('to_date'); ?>" placeholder="To Date">
                                                <span class="errs"><?php echo form_error('to_date'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="rate" class="col-sm-3 control-label">Rate - Single Occupancy</label>
                                            <div class="col-sm-9">
                                                <input name="rate" type="text" class="form-control" id="rate" value="<?php echo set_value('rate'); ?>" placeholder="Rate - Single Occupancy">
                                                <span class="errs"><?php echo form_error('rate'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="rate_double" class="col-sm-3 control-label">Rate - Double Occupancy</label>
                                            <div class="col-sm-9">
                                                <input name="rate_double" type="text" class="form-control" id="rate_double" value="<?php echo set_value('rate_double'); ?>" placeholder="Rate - Double Occupancy">
                                                <span class="errs"><?php echo form_error('rate_double'); ?></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="rate" class="col-sm-3 control-label">Extra Bed Rate</label>
                                            <div class="col-sm-9">
                                                <input name="rate_extra_bed" type="text" class="form-control" id="rate_extra_bed" value="<?php echo set_value('rate_extra_bed'); ?>" placeholder="Extra Bed Rate">
                                                <span class="errs"><?php echo form_error('rate_extra_bed'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="availability" class="col-sm-3 control-label">Default Availability</label>
                                            <div class="col-sm-9">
                                                <input name="availability" type="text" class="form-control" id="availability" value="<?php echo set_value('availability'); ?>" placeholder="Availability">
                                                <span class="errs"><?php echo form_error('availability'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="priority" class="col-sm-3 control-label">Priority</label>
                                            <div class="col-sm-9">
                                                <input name="priority" type="text" class="form-control" id="priority" placeholder="Priority">
                                                <span>Priority Top 0,1,2,3,4 etc  </span>
                                                <span class="errs" id="priority_err"><?php echo form_error('priority'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button name="submit" type="submit" class="btn btn-primary pull-right">Add Room Availability</button>                                            
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
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>    
        <script type="text/javascript">
            $(function () {
                $("#from_date").datepicker({
                    'dateFormat': 'yy-mm-dd'
                });
            });
            $(function () {
                $("#to_date").datepicker({
                    'dateFormat': 'yy-mm-dd'
                });
            });
        </script>
        <script type = "text/javascript" >
            $(document).ready(function () {

                $('#room_masterForm').bootstrapValidator({
                    message: 'This value is not valid',
                    fields: {
                        from_date: {
                            message: 'The From Date is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'The From Date is required and can\'t be empty'
                                }
                            }
                        },
                        to_date: {
                            message: 'The To Date is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'The To Date is required and can\'t be empty'
                                }
                            }
                        },
                        rate: {
                            message: 'The Rate is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'The Rate is required and can\'t be empty'
                                }
                            }
                        },
                        availability: {
                            message: 'The Availability is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'The Availability is required and can\'t be empty'
                                }
                            }
                        }
                    }
                });
            });
        </script>

    </body>
</html>
