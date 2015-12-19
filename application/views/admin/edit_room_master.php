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
            <?php include('navigation.php'); ?>
            <div id="page-wrapper">

                <div class="row">
                    <div class="col-lg-12">
                        <h1>Room Master <small>Product Room Master</small></h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-globe"></i> <a href="<?php echo base_url(); ?>admin/home">Dashboard</a></li>
                            <li> <a href="<?php echo base_url(); ?>admin/room_master/index/<?= $this->session->userdata('hotel_id')?>">Room Masters</a></li>
                            <li class="active"> Edit Room Master</li>
                        </ol> 
                    </div>
                </div><!-- /.row -->



                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Edit Room Master  </h3>                                
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
                                    <form class="form-horizontal" id="room_masterForm" role="form" action="<?php echo base_url(); ?>admin/room_master/edit_room_master/<?php echo $room_master->room_master_id; ?>" method="post" enctype="multipart/form-data">

                                        <input type="hidden" id="x1" name="x1" />
                                        <input type="hidden" id="y1" name="y1" />
                                        <input type="hidden" id="x2" name="x2" />
                                        <input type="hidden" id="y2" name="y2" />

                                        <input type="hidden" id="w" name="w" />
                                        <input type="hidden" id="h" name="h" />
                                        <input type="hidden" name="old_image" value="<?php echo $room_master->image; ?>" />

                                        <div class="form-group">
                                            <label for="hotel_master" class="col-sm-3 control-label">Hotel Name</label>
                                            <div class="col-sm-9">
                                                <select name="hotel_master" class="form-control">
                                                    <?php foreach($hotel_master as $hotel){?>
                                                    <option value="<?php echo $hotel->hotel_master_id;?>" <?php if($hotel->hotel_master_id == $room_master->hotel_master_id){echo 'selected';}?>  <?php echo set_select('hotel_master', $hotel->hotel_master_id,FALSE); ?> ><?php echo $hotel->hotel_master_name;?></option>
                                                    <?php }?>
                                                </select>
<!--                                                <input name="room_master_name" type="text" class="form-control" id="room_master_name" placeholder="Room Master Name" value="<?php echo $room_master->name; ?>">
                                                <span class="err" id="room_master_name_err"><?php echo form_error('room_master_name'); ?></span>                       -->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="room_type" class="col-sm-3 control-label">Room Type</label>
                                            <div class="col-sm-9">
                                                <select name="room_type" class="form-control">
                                                    <?php foreach($room_type_master as $room_types){?>
                                                    <option value="<?php echo $room_types->room_type_id;?>" <?php if($room_types->room_type_id == $room_master->room_type){echo 'selected';}?>  <?php echo set_select('room_type',$room_types->room_type_id,FALSE); ?>><?php echo $room_types->room_type_name;?></option>
                                                    <?php }?>
                                                </select>
                                                <!--<input name="room_master_name" type="text" class="form-control" id="room_master_name" placeholder="Room Name" value="<?php echo set_value('room_master_name'); ?>">-->
                                                <!--<span class="err" id="room_master_name_err"><?php echo form_error('room_master_name'); ?></span>-->
                                            </div>
                                        </div>



<!--                                        <div class="form-group">
                                            <label for="no_adults" class="col-sm-3 control-label">Max Number of Adults</label>
                                            <div class="col-sm-9">
                                                <input name="no_adults" type="text" class="form-control" id="no_adults" placeholder="Max Number of Adults" value="<?php echo $room_master->no_adults; ?>">
                                                <span class="err" id="no_adults_err"><?php echo form_error('no_adults'); ?></span>                       
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_child" class="col-sm-3 control-label">Max Number of Child</label>
                                            <div class="col-sm-9">
                                                <input name="no_child" type="text" class="form-control" id="no_child" placeholder="Max Number of Child" value="<?php echo $room_master->no_child; ?>">
                                                <span class="err" id="no_child_err"><?php echo form_error('no_child'); ?></span>                       
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_extra_bed" class="col-sm-3 control-label">Max Number of Extra Bed</label>
                                            <div class="col-sm-9">
                                                <input name="no_extra_bed" type="text" class="form-control" id="no_extra_bed" placeholder="Max Number of Extra Bed" value="<?php echo $room_master->no_extra_bed; ?>">
                                                <span class="err" id="no_extra_bed_err"><?php echo form_error('no_extra_bed'); ?></span>                       
                                            </div>
                                        </div>-->







                                        <div class="form-group">
                                            <label for="room_master_description" class="col-sm-3 control-label">Room Description</label>
                                            <div class="col-sm-9">
                                                <textarea name="room_master_description" id="room_master_description" class="form-control" placeholder="Room Description"><?php echo $room_master->description; ?></textarea>
                                                <span class="err" id="room_master_description_err"><?php echo form_error('room_master_description'); ?></span>                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="fileImage" class="col-sm-3 control-label">Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="fileImage" class="form-controll" id="fileImage" placeholder="Logo" onchange="fileSelectHandler()">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="room_master_image" class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <img src="<?php echo base_url(); ?>uploads/room_master/thumb/<?php echo $room_master->image; ?>" />
                                            </div>
                                        </div>


                                        <img id="preview" />

                                        <div class="form-group">
                                            <button name="submit" type="submit" class="btn btn-primary pull-right">Add Room Master</button>                                            
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

                $('#room_masterForm').submit(function() {

                    if ($('#room_master_name').val() == "") {
                        $('#room_master_name').focus();
                        $('#room_master_name_err').html("Please provide a room name").fadeIn(300).delay(800).fadeOut(800);
                        return false;
                    } else if ($('#room_master_description').val() == "") {
                        $('#room_master_description').focus();
                        $('#room_master_description_err').html("Please provide room description").fadeIn(300).delay(800).fadeOut(800);
                        return false;
                    } else {
                        return true;
                    }
                });

            });
        </script>

    </body>
</html>
