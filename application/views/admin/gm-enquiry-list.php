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
                        <h1>GM Enquiry List</h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li class="active"> GM Enquiry List</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col col-sm-6">
                                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> GM Messages  </h3> 
                                    </div>
<!--                                    <div class="col col-sm-3 pull-right">
                                        <a href="<?php echo base_url(); ?>admin/enquiry/add_enquiry" class="btn btn-info pull-right">  Reserve Room</a>
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


                                <div class="table-responsive">
                                    <table class="table table-hover tablesorter">
                                        <thead>
                                            <tr>
                                                <th class="header">No. <i class="fa fa-sort"></i></th>
                                                <th class="header">Hotel Name <i class="fa fa-sort"></i></th>
<!--                                                <th class="header" width="15%">Name <i class="fa fa-sort"></i></th>
                                                <th class="header">Email <i class="fa fa-sort"></i></th>
                                                <th class="header">Phone <i class="fa fa-sort"></i></th>
                                                <th class="header" width="10%">Country <i class="fa fa-sort"></i></th>-->
                                                <th class="header" >Message <i class="fa fa-sort"></i></th>
                                                <th class="header" >Date</th>
                                                <th class="header"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($enquirys as $c => $enquiry) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td>
                                                        <?php
                                                        $id = $enquiry->hotel_master_id;
                                                        $condition = array('hotel_master_id'=>$id);
                                                        $hotel_names = $this->hotel_master_model->list_hotel_name($condition);
                                                        echo $hotel_names->hotel_master_name;
                                                        ?>
                                                    </td>
<!--                                                    <td><?php echo $enquiry->name; ?></td>
                                                    <td><?php echo $enquiry->email; ?></td>
                                                    <td><?php echo $enquiry->phone; ?></td>
                                                    <td><?php echo $enquiry->country; ?></td>-->
                                                    <td><?php echo $enquiry->message; ?></td> 

                                                    <td><p><?php echo date('d-m-Y', strtotime($enquiry->date_added)); ?></p></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>admin/enquiry/delete_gm_enquiry/<?php echo $enquiry->enquiry_id; ?>" onclick="return confirm('Do you want to delete this record ?');">Delete</a>
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
