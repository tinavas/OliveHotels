<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>admin/home"><strong>OLIVE HOTELS</strong></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li> 
            <li>
                <ul class="nav navbar-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-picture-o"></i> Gallery<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <?php
                            $hotel_master = $this->hotel_master_model->list_hotel_master();
                            foreach ($hotel_master as $hotels) {
                                ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/album/index/<?php echo $hotels->hotel_master_id; ?>"><?php echo $hotels->hotel_master_name; ?></a>
                                </li>
                            <?php } ?>
                        </ul>

                    </li>
                </ul>
            </li>
            <li>
                <ul class="nav navbar-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home"></i> Room Master<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <?php
                            $hotel_master = $this->hotel_master_model->list_hotel_master();
                            foreach ($hotel_master as $hotels) {
                                ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/room_master/index/<?php echo $hotels->hotel_master_id; ?>"><?php echo $hotels->hotel_master_name; ?></a>
                                </li>
                            <?php } ?>
                        </ul>

                    </li>
                </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>admin/booking/list_all"><i class="fa fa-calendar"></i> Booking List</a></li>
<!--            <li>
                <ul class="nav navbar-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-calendar"></i> Booking<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>admin/booking/calendar"> Booking Calendar</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/booking/list_all">Booking List</a></li>
                        </ul>

                    </li>
                </ul>
            </li>-->
            <li>
                <ul class="nav navbar-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-comments"></i> News & Testimonial<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>admin/news">News</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/testimonial">Testimonial</a></li>
                        </ul>

                    </li>
                </ul>
            </li>
            <!--<li><a href="<?php echo base_url(); ?>admin/testimonial"><i class="fa fa-comments"></i> Testimonial</a></li>-->
            <li><a href="<?php echo base_url(); ?>admin/career"><i class="fa fa-envelope"></i> Career</a></li>
            <li>
                <ul class="nav navbar-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Enquiry<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/enquiry">Enquiry</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/enquiry/gm_enquiry">Message-GM</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/newsletter">Newsletter</a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right navbar-user">

            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('identity'); ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
<!--                    <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/account/change_password"><i class="fa fa-gear"></i> Change Password</a></li>-->
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>admin/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>