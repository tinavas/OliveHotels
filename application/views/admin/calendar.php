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

        <link href="<?php echo base_url(); ?>assets/css/master.css" rel="stylesheet" type="text/css">

        <style type="text/css">
            .date_has_event div{
                position: relative;
                bottom: 0px;
            }            
        </style>        
    </head>
    <body>
        <div id="wrapper">
            <?php include('navigation.php'); ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">

                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-dashboard"></i> Booking Calendar - <?php echo $current_month_text; ?></li>
                        </ol>

                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div id="calmain">
                        <table cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sun</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thu</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                </tr>
                            </thead>
                            <tr>
                                <?php
                                for ($i = 0; $i < $total_rows; $i++) {
                                    for ($j = 0; $j < 7; $j++) {
                                        $day++;

                                        if ($day > 0 && $day <= $total_days_of_current_month) {
                                            //YYYY-MM-DD date format
                                            $date_form = "$current_year/$current_month/$day";
                                            $date_form2 = "$current_year-$current_month-$day";



//                                            $booking_status = $this->db->query("SELECT DISTINCT(`booking`.`booking_id`),"
//                                                            . "SUM(`booking`.`no_rooms`) as no_book,"
//                                                            . "`room_master`.`name` as name,"
//                                                            . "`booking`.`room_master_id`,"
//                                                            . "`booking`.`hotel_master_id`,"
//                                                            . "`room_availability_season`.`availability` as availability"
//                                                            . " FROM `booking`"
//                                                            . " JOIN `room_master`"
//                                                            . " JOIN `room_availability_season`"
//                                                            . " ON `booking`.`room_master_id`=`room_master`.`room_master_id`"
//                                                            . " AND `room_master`.`room_master_id`=`room_availability_season`.`room_master_id`"
//                                                            . " WHERE '" . $date_form2 . "'>=`booking`.`date_checkin`"
//                                                            . " AND '" . $date_form2 . "'<=`booking`.`date_checkout`"
//                                                            . "AND '" . $date_form2 . "'>=`room_availability_season`.`from_date` "
//                                                            . "AND '" . $date_form2 . "'<=`room_availability_season`.`to_date`"
//                                                            . " GROUP BY `room_master`.`room_master_id`")->result();

                                            //echo $this->db->last_query();

                                            echo '<td';

                                            //check if the date is today
                                            if ($date_form == $today) {
                                                echo ' id="today"';
                                            }
                                            if (!empty($booking_status)) {
                                                //adding the date_has_event class to the <td> and close it
                                                echo ' class="date_has_event"><div style="width:175px; padding:0px;"><span style="font-size:20px;"> ' . $day . '</span>';

                                                foreach ($booking_status as $key => $event) {
                                                    $id = $event->hotel_master_id;
                                                    $condition = array('hotel_master_id'=>$id);
                                                    $hotel_names = $this->hotel_master_model->list_hotel_name($condition);
                                                    $htl = $hotel_names->hotel_master_name;
                                                    echo '<a class="btn btn-primary btn-xs" style="width:100%;"  href="' . base_url()
                                                    . 'admin/booking/get_bookig_date_room/'
                                                    . strtotime($date_form2) . '/'
                                                    . $event->room_master_id
                                                    . '"  data-target="#modal">'
                                                    . $event->name . ' ('
//                                                    . $event->no_book . '/'
//                                                    . $event->availability . ')'
                                                    . $htl.')'
                                                    . ' ('
                                                    . $event->no_book . '/'
                                                    . $event->availability . ')</a>';
                                                }
                                                echo '</div>';
                                            } else {
                                                echo '> <span style="font-size:20px;">' . $day . '</span>';
                                            }

                                            echo "</td>";
                                        } else {
                                            //showing empty cells in the first and last row
                                            echo '<td class="padding">&nbsp;</td>';
                                        }
                                    }
                                    echo "</tr><tr>";
                                }
                                ?>
                            </tr>
                            <tfoot>		
                            <th>
                                <?php echo anchor('admin/booking/calendar/' . $previous_year, '&laquo;&laquo;', array('title' => $previous_year_text)); ?>
                            </th>
                            <th>
                                <?php echo anchor('admin/booking/calendar/' . $previous_month, '&laquo;', array('title' => $previous_month_text)); ?>
                            </th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>
                                <?php echo anchor('admin/booking/calendar/' . $next_month, '&raquo;', array('title' => $next_month_text)); ?>
                            </th>
                            <th>
                                <?php echo anchor('admin/booking/calendar/' . $next_year, '&raquo;&raquo;', array('title' => $next_year_text)); ?>

                            </th>		
                            </tfoot>
                        </table>
                    </div>

                </div><!-- /.row -->

            </div><!-- /#page-wrapper -->

        </div><!-- /#wrapper -->


        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="leadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="color: black;">
                    <div class="modal-header" style="background-color: #3276B1; border-radius: 5px 5px 0px 0px; color: #FFFFFF">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Reservation Details</h4>
                    </div>
                    <div class="modal-body" id="res_target_edit">
                    </div>
                </div>
            </div>
        </div>     


        <!-- JavaScript -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

        <script type="text/javascript">
            $(function() {
                $('a[data-target="#modal"]').click(function(event) {
                    event.preventDefault();
                    $('#modal').find('.modal-body').load($(this).attr('href'), function() {
                        $('#modal').modal('show');
                    });

                });
            });
        </script>


    </body>
</html>
