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

             <?php $this->view('admin/navigation.php'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Testimonial</h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li class="active"> Testimonial</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Testimonial  </h3>                                
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
                                <a href="<?php echo base_url(); ?>admin/testimonial/add_testimonial" class="btn btn-primary pull-right"> Add Testimonial </a>

                                <div class="table-responsive">
                                    <table class="table table-hover tablesorter">
                                        <thead>
                                            <tr>
                                                <th class="header">No. <i class="fa fa-sort"></i></th>
                                                <th class="header">Client Name <i class="fa fa-sort"></i></th>   
                                                <!--<th class="header">Cover Image</th>-->
                                                <th class="header"></th>
                                                <th class="header"></th>
                                                <!--<th class="header"></th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $count  =   1;
                                            foreach ($testimonials as $c => $testimonial) { ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $testimonial->testimonial_title; ?></td>      
                                                    <!--<td><img src="<?php echo base_url(); ?>uploads/testimonial/thumb/<?php echo $testimonial->testimonial_image; ?>" width="75" /></td>-->      
                                                    <td><a href="<?php echo base_url(); ?>admin/testimonial/edit_testimonial/<?php echo $testimonial->testimonial_id; ?>">Edit</a></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>admin/testimonial/delete_testimonial/<?php echo $testimonial->testimonial_id; ?>" onclick="return confirm('Do you want to delete this record ?');">Delete</a>
                                                    </td>
<!--                                                    <td>
                                                        <a href="<?php echo base_url(); ?>admin/testimonial/gallery/<?php echo $testimonial->testimonial_id; ?>">Add Gallery Images</a>
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
