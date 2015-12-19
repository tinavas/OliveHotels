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
                        <h1>News</h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/news/index">News</a></li>
                            <li class="active"> Add News</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->



                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Add News  </h3>                                
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

                                    <?php echo form_open_multipart('admin/news/add_news', array('id' => 'newsForm', 'class' => 'form-horizontal')); ?>
                                    <input type="hidden" id="x1" name="x1" />
                                    <input type="hidden" id="y1" name="y1" />
                                    <input type="hidden" id="x2" name="x2" />
                                    <input type="hidden" id="y2" name="y2" />                                        
                                    <input type="hidden" id="w" name="w" />
                                    <input type="hidden" id="h" name="h" />

                                    <div class="form-group">
                                        <label for="category" class="col-sm-3 control-label">Category</label>
                                        <div class="col-sm-9">
                                            <select name="category_name" id="category_name" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="1">News</option>
                                                <option value="2">Offers</option>
                                            </select>
                                            <!--<input name="news_name" type="text" class="form-control" id="news_name" placeholder="Name" value="<?php echo set_value('news_name'); ?>">-->
                                            <span class="err" id="category_name_err"><?php echo form_error('category_name'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="news_name" class="col-sm-3 control-label">Title</label>
                                        <div class="col-sm-9">
                                            <input name="news_name" type="text" class="form-control" id="news_name" placeholder="Name" value="<?php echo set_value('news_name'); ?>">
                                            <span class="err" id="news_name_err"><?php echo form_error('news_name'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="day_name" class="col-sm-3 control-label">Special Day(For offers only)</label>
                                        <div class="col-sm-9">
                                            <input name="day_name" type="text" class="form-control" id="day_name" placeholder="Special Day" value="<?php echo set_value('day_name'); ?>">
                                            <span class="err"><?php echo form_error('day_name'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="news_content" class="col-sm-3 control-label">Content</label>
                                        <div class="col-sm-9">
                                            <textarea name="news_content" id="news_content" class="form-control"><?php echo set_value('news_content'); ?></textarea>
                                            <!--<input name="news_place" type="text" class="form-control" id="news_place" placeholder="Palce" value="<?php echo set_value('news_place'); ?>">-->
                                            <span class="err" id="news_content_err"><?php echo form_error('news_content'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fileImage" class="col-sm-3 control-label">Image(Width:653px & Height:272px)</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="fileImage" class="form-controll" id="fileImage" placeholder="Logo" onchange="fileSelectHandler()">
                                        </div>
                                    </div>         
                                    <!--<img id="preview-news" />-->

                                    <div class="form-group">
                                        <button name="submit" type="submit" class="btn btn-primary pull-right">Add News</button>                                            
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
        <script src="<?php echo base_url(); ?>assets/js/jscrop-scriptNews.js"></script>
        <script type="text/javascript">

        </script>
        <script type="text/javascript" >
            $(document).ready(function() {

                $('#newsForm').submit(function() {
                    if ($('#category_name').val() == "") {
                        $('#category_name').focus();
                        $('#category_name_err').text("Please select category").fadeIn(300).delay(3000).fadeOut(800);
                        return false;
                    }
                    if ($('#news_name').val() == "") {
                        $('#news_name').focus();
                        $('#news_name_err').text("Please provide a room name").fadeIn(300).delay(3000).fadeOut(800);
                        return false;
                    } else if ($('#news_description').val() == "") {
                        $('#news_description').focus();
                        $('#news_description_err').text("Please provide room description").fadeIn(300).delay(3000).fadeOut(800);
                        return false;
                    } else {
                        return true;
                    }
                });

            });
        </script>

    </body>
</html>
