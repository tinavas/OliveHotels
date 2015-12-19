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
    </head>

    <body>
        <div id="wrapper">

            <?php include('navigation.php'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Room Master</h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li class="active"> Room Master</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Room Master  </h3>                                
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
                                <a href="<?php echo base_url(); ?>admin/room_master/add_room_master/<?= $this->session->userdata('hotel_id')?>" class="btn btn-primary pull-right"> Add Room Master </a>

                                <div class="table-responsive">
                                    <table class="table table-hover tablesorter">
                                        <thead>
                                            <tr>
                                                <th class="header">No. <i class="fa fa-sort"></i></th>
                                                <th class="header">Room Type<i class="fa fa-sort"></i></th>   
                                                <th class="header">Image</th>
                                                <th class="header"></th>
                                                <!--<th class="header"></th>-->
                                                <!--<th class="header"></th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $count  =   1;
                                            foreach ($room_masters as $c => $room_master) { ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php if($room_master->room_type==1){echo 'Standard Rooms';}else if($room_master->room_type==2){echo 'Deluxe Rooms';}else if($room_master->room_type==3){echo 'Executive Rooms';}else if($room_master->room_type==4){echo 'Suite Rooms';}; ?></td>      
                                                    <td><img src="<?php echo base_url(); ?>uploads/room_master/thumb/<?php echo $room_master->image; ?>" width="75" /></td>      
                                                    <td><a href="<?php echo base_url(); ?>admin/room_master/edit_room_master/<?php echo $room_master->room_master_id; ?>">Edit</a></td>
<!--                                                    <td>
                                                        <a href="<?php echo base_url(); ?>admin/room_master/delete_room_master/<?php echo $room_master->room_master_id; ?>" onclick="return confirm('Do you want to delete this record ?');">Delete</a>
                                                    </td>-->
<!--                                                    <td>
                                                        <a href="<?php echo base_url(); ?>admin/room_master/room_availability_season/<?php echo $room_master->room_master_id; ?>">Default Availability</a>
                                                    </td>-->
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

    </body>
</html>
