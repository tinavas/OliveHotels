<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th class="header">No.</th>
            <th class="header">Contact Details</th> 
            <th class="header">Hotel Name</th>
            <th class="header" width="85">Days</th>
            <th class="header" width="135">Details</th>
            <th class="header">Requirements</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        foreach ($bookings as $c => $booking) {
            ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td>
                    Name : <?php echo $booking->first_name; ?><br />
                    Phone : <?php echo $booking->phone; ?><br />
                    Email : <?php echo $booking->email; ?>                                               
                </td> 
                <td>
                    <?php
                    $condition = array('hotel_master_id' => $booking->hotel_master_id);
                    $hot = $this->hotel_master_model->list_hotel_name($condition);
                    echo $hot->hotel_master_name ;
                    ?>
                </td>
                <td>
                    <?php echo date('d M y', strtotime($booking->date_checkin)); ?> <br /> 
                    To <br />
    <?php echo date('d M y', strtotime($booking->date_checkout)); ?>
                </td>
                <td>
                    <?php if (!empty($booking->no_rooms)) { ?>
                        No of Rooms : <?php echo $booking->no_rooms; ?><br />
                    <?php } ?>
                    <?php if (!empty($booking->no_people)) { ?>
                        No of Adults : <?php echo $booking->no_people; ?><br />
                    <?php } ?>
                    <?php if (!empty($booking->no_child)) { ?>
                        No of Child : <?php echo $booking->no_child; ?><br />
                    <?php } ?>
                    <?php if (!empty($booking->no_extra_bed)) { ?>
                        No of Extra Bed : <?php echo $booking->no_extra_bed; ?>
    <?php } ?>
                </td> 
                <td><?php echo $booking->requirements; ?></td> 
            </tr>
<?php } ?>
    </tbody>
</table>