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
                        <h1>Album <small>Product Album</small></h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/album/index/<?= $this->session->userdata('hotel_id')?>">Albums</a></li>
                            <li class="active"> Edit Album</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->



                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Edit Album  </h3>                                
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
                                    <form class="form-horizontal" id="albumForm" role="form" action="<?php echo base_url(); ?>admin/album/edit_album/<?php echo $album->album_id; ?>" method="post" enctype="multipart/form-data">

                                        <input type="hidden" id="x1" name="x1" />
                                        <input type="hidden" id="y1" name="y1" />
                                        <input type="hidden" id="x2" name="x2" />
                                        <input type="hidden" id="y2" name="y2" />

                                        <input type="hidden" id="w" name="w" />
                                        <input type="hidden" id="h" name="h" />
                                        <input type="hidden" name="old_image" value="<?php echo $album->album_image; ?>" />

                                        <div class="form-group">
                                            <label for="hotel_master" class="col-sm-3 control-label">Hotel Name</label>
                                            <div class="col-sm-9">
                                                <select name="hotel_master" class="form-control">
                                                    <?php foreach($hotel_master as $hotel){?>
                                                    <option value="<?php echo $hotel->hotel_master_id;?>" <?php if($hotel->hotel_master_id == $album->hotel_master_id){echo 'selected';}?>  <?php echo set_select('hotel_master', $hotel->hotel_master_id,FALSE); ?> ><?php echo $hotel->hotel_master_name;?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="album_name" class="col-sm-3 control-label">Album Name</label>
                                            <div class="col-sm-9">
                                                <input name="album_name" type="text" class="form-control" id="album_name" placeholder="Album Name" value="<?php echo $album->album_title; ?>">
                                                <span class="err" id="album_name_err"><?php echo form_error('album_name'); ?></span>                       
                                            </div>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label for="fileImage" class="col-sm-3 control-label">Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="fileImage" class="form-controll" id="fileImage" placeholder="Logo" onchange="fileSelectHandler()">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="album_image" class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <img src="<?php echo base_url(); ?>uploads/album/thumb/<?php echo $album->album_image; ?>" />
                                            </div>
                                        </div>


                                        <img id="preview" />

                                        <div class="form-group">
                                            <button name="submit" type="submit" class="btn btn-primary pull-right">Edit Album</button>                                            
                                        </div>

                                    </form>
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

                    if ($('#album_name').val() == "") {
                        $('#album_name').focus();
                        $('#album_name_err').html("Please provide a room name").fadeIn(300).delay(800).fadeOut(800);
                        return false;
                    } else if ($('#album_description').val() == "") {
                        $('#album_description').focus();
                        $('#album_description_err').html("Please provide room description").fadeIn(300).delay(800).fadeOut(800);
                        return false;
                    } else {
                        return true;
                    }
                });

            });
        </script>

    </body>
</html>
