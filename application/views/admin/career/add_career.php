
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
        <link href="<?php echo base_url(); ?>assets/css/jquery.Jcrop.min.css" rel="stylesheet">

        <style type="text/css">
            .err{
                color: red;
            }
            .err p{
                color: red;
            }
        </style>

    </head>
    <body>
        <div id="wrapper">
            <?php $this->view('admin/navigation.php'); ?>
            <div id="page-wrapper">

                <div class="row">
                    <div class="col-lg-12">
                        <h1>career <small>Product career</small></h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/career/index/<?= $this->session->userdata('hotel_id') ?>">careers</a></li>
                            <li class="active"> Add career</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->



                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Add career  </h3>                                
                            </div>
                            <div class="panel-body">
                                <?php if ($this->session->flashdata('message')) { ?>
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-4"> 
                                            <div class="alert alert-info fade in">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <?php echo $this->session->flashdata('message'); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-lg-6">

                                    <?php echo form_open_multipart('admin/career/add', array('id' => 'careerForm', 'class' => 'form-horizontal')); ?>

         
                                    <div class="form-group">
                                        <label for="career_title" class="col-sm-3 control-label">Job  Title</label>
                                        <div class="col-sm-9">
                                            <input name="career_title" type="text" class="form-control" id="career_title"  value="<?php echo set_value('career_title'); ?>">
                                            <span class="err" id="career_name_err"><?php echo form_error('career_title'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="career_name" class="col-sm-3 control-label">No of Vacancies</label>
                                        <div class="col-sm-9">
                                            <input name="career_no" type="text" class="form-control"   size="45" value="<?php echo set_value('career_no'); ?>">


                                            <span class="err" id="career_name_err"><?php echo form_error('career_no'); ?></span>
                                        </div>
                                    </div>
  <div class="form-group">
                                        <label for="career_name" class="col-sm-3 control-label">Location</label>
                                        <div class="col-sm-9">
                                            <input name="career_location" type="text" class="form-control"   size="45" value="<?php echo set_value('career_location'); ?>">


                                            <span class="err" id="career_name_err"><?php echo form_error('career_location'); ?></span>
                                        </div>
                                    </div>
                                    
                                   <div class="form-group">
                                        <label for="career_name" class="col-sm-3 control-label">Education</label>
                                        <div class="col-sm-9">
                                            <input name="career_education" type="text" class="form-control"   size="45" value="<?php echo set_value('career_education'); ?>">


                                            <span class="err" id="career_name_err"><?php echo form_error('career_education'); ?></span>
                                        </div>
                                    </div>
                                    
                                                             <div class="form-group">
                                        <label for="career_name" class="col-sm-3 control-label">Experience</label>
                                        <div class="col-sm-9">
                                            <input name="career_experience" type="text" class="form-control"   size="45" value="<?php echo set_value('career_experience'); ?>">


                                            <span class="err" id="career_name_err"><?php echo form_error('career_experience'); ?></span>
                                        </div>
                                    </div>
                                    
                                                                      
                                                             <div class="form-group">
                                        <label for="career_name" class="col-sm-3 control-label">Salary</label>
                                        <div class="col-sm-9">
                                            <input name="career_salary" type="text" class="form-control"   size="45" value="<?php echo set_value('career_salary'); ?>">


                                            <span class="err" id="career_name_err"><?php echo form_error('career_salary'); ?></span>
                                        </div>
                                    </div>
                                                                            <div class="form-group">
                                        <label for="career_name" class="col-sm-3 control-label">Candidature</label>
                                        <div class="col-sm-9">
                                            <input name="career_candidature" type="text" class="form-control"   size="45" value="<?php echo set_value('career_candidature'); ?>">


                                            <span class="err" id="career_name_err"><?php echo form_error('career_candidature'); ?></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <button name="submit" type="submit" class="btn btn-primary pull-right">Submit</button>                                            
                                    </div>
                                   


                                    <?php form_close(); ?>
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

        <script src="<?php echo base_url(); ?>assets/js/jquery.Jcrop.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jcropscript.js"></script>
        <script type="text/javascript">

        </script>
        <script type="text/javascript" >
            $(document).ready(function () {

                $('#careerForm').submit(function () {

                    if ($('#career_name').val() == "") {
                        $('#career_name').focus();
                        $('#career_name_err').text("Please provide a room name").fadeIn(300).delay(3000).fadeOut(800);
                        return false;
                    } else if ($('#career_description').val() == "") {
                        $('#career_description').focus();
                        $('#career_description_err').text("Please provide room description").fadeIn(300).delay(3000).fadeOut(800);
                        return false;
                    } else {
                        return true;
                    }
                });

            });
        </script>

    </body>
</html>
