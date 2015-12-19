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
        <link href="<?php echo base_url(); ?>assets/css/bootstrapValidator.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="container" style="margin-top: 100px;">           
            <div class="row">                   
                <div class="col-lg-4 col-md-offset-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 class="panel-title"><strong>Login</strong></h2>
                        </div>
                        <div class="panel-body">
                            <?php if(!empty($message)){ ?>
                            <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $message; ?>
                            </div>
                            <?php } ?>                            
                            <form role="form" id="loginForm" action="<?php echo base_url(); ?>admin/login/index" method="post"> 
                                <div class="form-group">
                                    <label for="identity">Username</label>
                                    <input name="identity" type="text" class="form-control" id="identity" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <button name="submit" type="submit" class="btn btn-default pull-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>                       
                </div>               
            </div>
        </div>

        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>        
        <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>    

        <script type="text/javascript">
            $(document).ready(function() {


            $('#loginForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
            identity: {
            message: 'The username is not valid',
            validators: {
            notEmpty: {
            message: 'The username is required and can\'t be empty'
            },
            stringLength: {
            min: 6,
            max: 30,
            message: 'The username must be more than 6 and less than 30 characters long'
            },
            regexp: {
            regexp: /^[a-zA-Z0-9_\.]+$/,
            message: 'The username can only consist of alphabetical, number, dot and underscore'
            },
            different: {
            field: 'password',
            message: 'The username and password can\'t be the same as each other'
            }
            }
            },           
            password: {
            validators: {
            notEmpty: {
            message: 'The password is required and can\'t be empty'
            },                                
            different: {
            field: 'identity',
            message: 'The password can\'t be the same as username'
            }
            }
            }
            }
            });
            });
        </script>




    </body>
</html>
