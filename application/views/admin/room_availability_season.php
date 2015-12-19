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
                        <h1>
                            Room Master
                            <?php
                            $id = $this->session->userdata('hotel_id');
                            $condition = array('hotel_master_id'=>$id);
                            $hotel_names = $this->hotel_master_model->list_hotel_name($condition);
                            echo '('.$hotel_names->hotel_master_name.')';
                            ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/room_master/index/<?= $this->session->userdata('hotel_id')?>"> Room Master</a></li>
                            <li class="active"> Room Availability</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Room Availability  </h3>                                
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
                                <a href="<?php echo base_url(); ?>admin/room_master/add_room_availability_season/<?php echo $room_master_id; ?>" class="btn btn-primary pull-right"> Add Room Availability </a>

                                <div class="table-responsive">
                                    <table class="table table-hover tablesorter">
                                        <thead>
                                            <tr>
                                                <th class="header">No. <i class="fa fa-sort"></i></th>
                                                <th class="header">Date <i class="fa fa-sort"></i></th>   
                                                <th class="header">Availability</th>
                                                <th class="header">Priority</th>
                                                <th class="header"></th>
                                                <th class="header"></th>                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $count  =   1;
                                            foreach ($room_availability_season as $c => $season) { ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $season->from_date.' - '.$season->to_date; ?></td>      
                                                    <td><?php echo $season->availability; ?></td>      
                                                    <td><?php echo $season->priority; ?></td>      
                                                    <td><a href="<?php echo base_url(); ?>admin/room_master/edit_room_availability_season/<?php echo $season->room_master_id; ?>/<?php echo $season->room_availability_season_id; ?>">Edit</a></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>admin/room_master/delete_room_availability_season/<?php echo $season->room_master_id; ?>/<?php echo $season->room_availability_season_id; ?>" onclick="return confirm('Do you want to delete this record ?');">Delete</a>
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

    </body>
</html>
