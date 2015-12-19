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
        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cal/jquery-ui-1.10.4.custom.min.css" />
    </head>

    <body>
        <div id="wrapper">

            <?php include('navigation.php'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Reservation List</h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li class="active"> Reservation List</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col col-sm-6">
                                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Reservation List  </h3> 
                                    </div>
<!--                                    <div class="col col-sm-3 pull-right">
                                        <a href="<?php echo base_url(); ?>admin/booking/add_booking" class="btn btn-info pull-right">  Reserve Room</a>
                                    </div>-->
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php if ($this->session->flashdata('message')) { ?>
                                    <div class="col-lg-4"> 
                                        <div class="alert alert-info fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <?php echo $this->session->flashdata('message'); ?>
                                        </div>
                                    </div>
                                <?php } ?>                              

                                <div class="row">
                                    <div class="col col-md-12">
                                        <form id="lead_form" class="form form-inline" role="form" action="<?php echo base_url(); ?>admin/booking/search" method="get" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="sr-only" for="search_query">Search Query</label>
                                                <input type="text" name="search_query" class="form-control input-sm" id="search_query" placeholder="Enter Search Query" value="<?php echo $this->input->get('search_query'); ?>" >
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="project">Hotel Type</label>
                                                <select name="hotel_master" id="hotel_master" class="form-control">
                                                    <option value="">Select Hotel</option>
                                                     <?php foreach ($hotel_master as $hotel) { ?>
                                                        <option value="<?php echo $hotel->hotel_master_id; ?>"><?php echo $hotel->hotel_master_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
<!--                                            <div class="form-group">
                                                <label class="sr-only" for="project">Room Type</label>
                                                <select name="room_type" id="room_type" class="form-control">
                                                    <option value="">Select Room Type</option>
                                                    <?php foreach ($room_masters as $t => $room) { ?>
                                                        <option value="<?php echo $room->room_master_id; ?>" <?php if ($this->input->get('room_type') == $room->room_master_id) { ?> selected="true" <?php } ?>><?php echo $room->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>-->
                                            <div class="form-group">
                                                <label for="checkin_date" class="sr-only">Date</label>                                               
                                                <input name="checkin_date" type="text" class="form-control" id="checkin_date" placeholder="Date"  value="<?php echo $this->input->get('checkin_date'); ?>" >                                                 
                                            </div>                                            
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover tablesorter">
                                        <thead>
                                            <tr>
                                                <th class="header">No. <i class="fa fa-sort"></i></th>
                                                <th class="header">Name <i class="fa fa-sort"></i></th>   
                                                <th class="header">Phone <i class="fa fa-sort"></i></th>
                                                <th class="header">Check in Date <i class="fa fa-sort"></i></th>
                                                <th class="header">Check out Date <i class="fa fa-sort"></i></th>
                                                <th class="header"></th>
                                                <th class="header"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($bookings as $c => $booking) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $booking->first_name; ?></td>      
                                                    <td><?php echo $booking->phone; ?></td> 

                                                    <td><?php echo date('d-m-Y', strtotime($booking->date_checkin)); ?></td> 
                                                    <td><?php echo date('d-m-Y', strtotime($booking->date_checkout)); ?></td> 

                                                    <td><a href="<?php echo base_url(); ?>admin/booking/edit_booking/<?php echo $booking->booking_id; ?>">View/Edit</a></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>admin/booking/delete_booking/<?php echo $booking->booking_id; ?>" onclick="return confirm('Do you want to delete this record ?');">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="row text-center"><?php echo $this->pagination->create_links(); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->

            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->

        <!-- JavaScript -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

        <!-- Page Specific Plugins -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/tablesorter/jquery.tablesorter.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/tablesorter/tables.js"></script>
        <script src="<?php echo base_url(); ?>assets/cal/jquery-ui-1.10.4.custom.min.js"></script>

        <script>
                                                        $(function() {
                                                            $("#checkin_date").datepicker({
                                                                defaultDate: "+1w",
                                                                changeMonth: true,
                                                                dateFormat: "yy-mm-dd",
                                                                numberOfMonths: 2,
                                                            });

                                                        });
        </script>
    </body>
</html>
