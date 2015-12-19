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
                              <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/career/index">Carrer</a></li>
                            <li class="active"> Resume (<?=$career_title?>)</li>
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
                              

                                <div class="table-responsive">
                                    <table class="table table-hover tablesorter">
                                        <thead>
                                            <tr>
                                                                                           
                                                
                                                
                                                 <th width="5%">No</th>

                                    <th class="header">Career Name <i class="fa fa-sort"></i></th>

                                    <th class="header">Career Phone</th>      
 <th class="header">Email</th>      
  <th class="header">Date</th>      
                                    <th class="header">Experience</th>
                                    <th class="header">Qualification</th>

                                    <th><strong>Download</th>
                                    <th class="header">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$i = $row;

foreach ($career as $result) {
    $i++;
    ?>
                                                <tr>
                                                             <td ><?php echo $i; ?></td>
                                        <td ><?php echo $result['first_name']; ?></td>

                                       
                                          <td ><?php echo $result['phone']; ?></td>
                                           <td ><?php echo $result['email']; ?></td>
                                            <td ><?php $this->obj_career->human_time($result['date_added']); ?></td>
                                           
                                        <td ><?php echo nl2br($result['experience']); ?></td>   
                                        <td ><?php echo nl2br($result['qualification']); ?></td>     



                                        <td >     	     
                                            <?php if (!empty($result['file'])) { ?>	  

                                                <a href="<?php echo base_url(); ?>uploads/career/<?php echo $result['file']; ?>" target="_blank">
                                                    <img src="<?= base_url() ?>images/download_square.png" style=" width: 45px;" />

                                                </a>


                                                <?php
                                            }
                                            ?>                     

                                        </td>                      

                                        <td  ><a href="<?php echo base_url(); ?>admin/career_sub/delete/<?php echo $result['enquiry_id']; ?>/<?= $row ?>" title="delete" onClick="return confirm('Do you want to delete this record ?');"><img src="<?php echo base_url(); ?>images/drop.png" border="0"></a></td>

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
