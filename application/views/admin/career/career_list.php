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
                        <h1>Career</h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li class="active"> Career</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Career  </h3>                                
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
                                <a href="<?php echo base_url(); ?>admin/career/add" class="btn btn-primary pull-right"> Add Career </a>

                                <div class="table-responsive">
                                    <table class="table table-hover tablesorter">
                                        <thead>
                                            <tr>
                                                <th class="header">No. <i class="fa fa-sort"></i></th>
                                                <th class="header">Job Title <i class="fa fa-sort"></i></th>   
                                                <th class="header">No of Vacancies <i class="fa fa-sort"></i></th>   
                                                  <th class="header">Location <i class="fa fa-sort"></i></th>   
                                                <th class="header">Edit</th>
                                                <th class="header">Delete</th>
                                                <th class="header">Resume</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = $row;

                                            foreach ($career as $result) {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $result['career_title']; ?></td>      
                                                      <td><?php echo $result['career_no']; ?></td>      
                                                        <td><?php echo $result['career_location']; ?></td>      
                                                    <td><a href="<?php echo base_url(); ?>admin/career/edit/<?php echo $result['career_id']; ?>">Edit</a></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>admin/career/delete/<?php echo $result['career_id']; ?>" onclick="return confirm('Do you want to delete this record ?');">Delete</a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>admin/career_sub/set_data/<?php echo $result['career_id']; ?>/<?=$row?>" >View</a>
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
