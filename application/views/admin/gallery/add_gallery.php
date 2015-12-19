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
                        <h1>Gallery</h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/album/index/<?= $this->session->userdata('hotel_id')?>">Albums</a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/album/gallery/<?= $album?>">Gallery</a></li>
                            <li class="active"> Add Gallery</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->



                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Add Gallery  </h3>                                
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

                                    <?php echo form_open_multipart('admin/album/add_gallery/'.$album, array('id' => 'albumForm', 'class' => 'form-horizontal')); ?>
                                    <input type="hidden" id="x1" name="x1" />
                                    <input type="hidden" id="y1" name="y1" />
                                    <input type="hidden" id="x2" name="x2" />
                                    <input type="hidden" id="y2" name="y2" />                                        
                                    <input type="hidden" id="w" name="w" />
                                    <input type="hidden" id="h" name="h" />
                                    <input type="hidden" id="album_id" name="album_id" value="<?= $album?>" />

                                    
                                    <div class="form-group">
                                        <label for="gallery_name" class="col-sm-3 control-label">Image Caption</label>
                                        <div class="col-sm-9">
                                            <input name="gallery_name" type="text" class="form-control" id="gallery_name" placeholder="Title" value="<?php echo set_value('gallery_name'); ?>">
                                            <span class="err" id="gallery_name_err"><?php echo form_error('gallery_name'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="fileImage" class="col-sm-3 control-label">Image </label>
                                        <div class="col-sm-9">
                                            <input type="file" name="fileImage" class="form-controll" id="fileImage" placeholder="Logo" onchange="fileSelectHandler()">
                                        </div>
                                    </div>         
                                    <img id="preview" />

                                    <div class="form-group">
                                        <button name="submit" type="submit" class="btn btn-primary pull-right">Add Image</button>                                            
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
            $(document).ready(function() {

                $('#albumForm').submit(function() {

                    if ($('#gallery_name').val() == "") {
                        $('#gallery_name').focus();
                        $('#gallery_name_err').text("Please provide a room name").fadeIn(300).delay(3000).fadeOut(800);
                        return false;
                    } else if ($('#album_description').val() == "") {
                        $('#album_description').focus();
                        $('#album_description_err').text("Please provide room description").fadeIn(300).delay(3000).fadeOut(800);
                        return false;
                    } else {
                        return true;
                    }
                });

            });
        </script>

    </body>
</html>
