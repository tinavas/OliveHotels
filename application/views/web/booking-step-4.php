<?php
$checkin_date = $post_data['checkin_date'];
$checkout_date = $post_data['checkout_date'];
$no_rooms = $post_data['no_rooms'];


$no_extra_bed = $post_data['no_extra_bed'];
$room_type = $post_data['room_type'];
$hotel_master = $post_data['hotel_master'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Olive Hotels</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?= base_url() ?>css/bootstrap.css" rel="stylesheet" media="screen">
        <link type="image/png" rel="shortcut icon" href="<?= base_url() ?>images/fav.png"/>
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>css/style.css">
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>css/responsiveslides.css">
        <link type="text/css" rel="stylesheet" href="<?= base_url() ?>css/custom-responsive.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700' rel='stylesheet' type='text/css'>
        <link href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel="stylesheet">
        <link href="<?= base_url() ?>css/demo.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/yamm.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <style>
            .frm-group .error{
                color:red;
                font-size: 10px;
                font-weight: normal;
            }
        </style>
    </head>

    <body>
        <div class="sub-page-header">
            <?php include('header.php'); ?>
        </div>
        <div class="subpage-bannerWrapper">
            <div class="subpage-bannerContent sub-ban-cont-down">
                <h1>Olive <span>Hotels</span></h1>
                <p>OLIVE provides you the most luxurious stay heartened by tranquil quietness &amp;<br/> ensuring the best hospitality for our guest at our hotels </p>
            </div>
        </div>

        <div class="contact-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-overlap-title booking-pg-ttl">
                            <div class="page-title"><h2>Online <span>Booking</span></h2></div>
                        </div>
                    </div>
                </div>

                <div class="booking-mainWrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="booking-steps">
                                <ul>
                                    <li>1</li>
                                    <li>2</li>
                                    <li>3</li>
                                    <li>4</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="booking-outer-wrapper clearfix">
                                <div class="bk-title">
                                    <h3>Reserve Room</h3>
                                </div>

                                <div class="ht-book-slt-rm-wrapper ht-tble-display clearfix">

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <?php
                                        $rm_img = $this->db->select('image')->where('room_master_id', $room_type)->get('room_master')->first_row()->image;
                                        ?>
                                        <tr>
                                            <th>Room</th>
                                            <th>Booking Details</th>
                                            <th>No. of Rooms</th>
                                            <th>Details</th>
                                            <th>Total Cost</th>
                                        </tr>
                                        <tr>
                                            <td><img src="<?php echo base_url(); ?>uploads/room_master/thumb/<?php echo $rm_img; ?>" alt="image" width="130px" height="90px"></td>
                                            <td>
                                                <?php
                                                echo date('d-m-Y', strtotime($post_data['checkin_date'])) . '<br/> To  <br/>' . date('d-m-Y', strtotime($post_data['checkout_date']));
                                                ?>
                                            </td>
                                            <td class="tbl-rm"><?php echo $post_data['no_rooms']; ?></td>
                                            <td>Number of Adults : <strong><?php echo $post_data['no_people']; ?></strong><br/>
                                                Number of Child : <strong><?php echo $post_data['no_child']; ?></strong><br/>
                                                Number of Extra Bed : <strong><?php echo $post_data['no_extra_bed']; ?></strong></td>
                                            <td class="cost">
                                                <h4>
                                                    <?php
                                                    $date_diff = (strtotime($checkout_date) - strtotime($checkin_date)) / (60 * 60 * 24);
                                                    $this_date = $checkin_date;
                                                    $rate = 0;

                                                    for ($i = 1; $i <= $date_diff; $i++) {

                                                        $booked_rooms = 0;
                                                        $remaining_rooms = 0;

                                                        $this->db->select('room_availability_season.availability,room_availability_season.rate,room_availability_season.rate_double,room_availability_season.rate_extra_bed');
                                                        $this->db->from('room_master');
                                                        $this->db->join('room_availability_season', 'room_master.room_master_id=room_availability_season.room_master_id');
                                                        $this->db->where('room_availability_season.from_date <=', $this_date);
                                                        $this->db->where('room_availability_season.to_date >=', $this_date);
                                                        $this->db->where('room_master.room_master_id', $room_type);
                                                        $this->db->order_by('room_availability_season.priority', 'asc');
                                                        $room_master = $this->db->get()->first_row();

                                                        $remaining_rooms = $room_master->availability - $booked_rooms;
                                                        $no_people  =   $post_data['no_people'];

                                                        if ($remaining_rooms < $no_rooms) {
                                                            $booking_status = 'Selected Number of Rooms are not Available';
                                                            break;
                                                        } else {


                                                            if ($no_people == 1) {
                                                                $rate += $room_master->rate + ($no_extra_bed * $room_master->rate_extra_bed);
                                                            } elseif ($no_people == 2) {
                                                                $rate += $room_master->rate_double + ($no_extra_bed * $room_master->rate_extra_bed);
                                                            } elseif ($no_people > 2) {
                                                                if ($no_extra_bed == 0) {
                                                                    $no_extra_bed = 1; //if peopple > 2 add extra bed                                                                
                                                                }
                                                                $rate += $room_master->rate_double + ($no_extra_bed * $room_master->rate_extra_bed);
                                                            } else {
                                                                $rate += $room_master->rate + ($no_extra_bed * $room_master->rate_extra_bed);
                                                            }
                                                        }
                                                        $this_date = date('Y-m-d', strtotime($this_date . '+1 days'));
                                                    }
                                                    ?>
                                                    <?php echo 'Rs.' . ($rate * $no_rooms); ?>
                                                </h4>
                                            </td>
                                        </tr>
                                    </table>
                                    <form class="form-horizontal" id="bookingForm" role="form" action="<?php echo base_url(); ?>booking/submit_personal_details" method="post" enctype="multipart/form-data">
                                        <div class="enter-detail-wrapp">
                                            <h3>Enter Your Details</h3>
                                            <div class="enter-form-wrapp ht-bk-form">
                                                <div class="row">
                                                    <input type="hidden" name="room_type" value="<?php echo $post_data['room_type']; ?>" />
                                                    <input type="hidden" name="checkin_date" value="<?php echo date('Y-m-d', strtotime($post_data['checkin_date'])); ?>" />
                                                    <input type="hidden" name="checkout_date" value="<?php echo date('Y-m-d', strtotime($post_data['checkout_date'])); ?>" />
                                                    <input type="hidden" name="no_people" value="<?php echo $no_people; ?>" />
                                                    <input type="hidden" name="no_child" value="<?php echo $post_data['no_child']; ?>" />
                                                    <input type="hidden" name="no_rooms" value="<?php echo $post_data['no_rooms']; ?>" />
                                                    <input type="hidden" name="no_extra_bed" value="<?php echo $post_data['no_extra_bed']; ?>" />
                                                    <input type="hidden" name="total_rate" value="<?php echo $post_data['total_rate']; ?>" />
                                                    <input type="hidden" name="hotel_master" value="<?= $hotel_master ?>"/>
                                                    <div class="col-md-4">
                                                        <div class="frm-group">
                                                            <label>Full Name</label>
                                                            <input type="text" name="name" id="name" value="<?= set_value('name') ?>"/>
                                                            <span class="errs"><?php echo form_error('name'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="frm-group">
                                                            <label>Phone</label>
                                                            <input type="text" name="phone" id="phone" value="<?= set_value('phone') ?>"/>
                                                            <span class="errs"><?php echo form_error('phone'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="frm-group">
                                                            <label>Email</label>
                                                            <input type="text" name="email" id="email" value="<?= set_value('email') ?>"/>
                                                            <span class="errs"><?php echo form_error('email'); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="frm-group">
                                                            <label>Country</label>

                                                            <select name="country" id="country" style="width:210px;">
                                                                <option value="India">India</option>

                                                                <option value="Afghanistan">Afghanistan</option>
                                                                <option value="Albania">Albania</option>
                                                                <option value="Algeria">Algeria</option>
                                                                <option value="American Samoa">American Samoa</option>
                                                                <option value="Andorra">Andorra</option>
                                                                <option value="Angola">Angola</option>

                                                                <option value="Anguilla">Anguilla</option>
                                                                <option value="Antigua And Barbuda">Antigua And Barbuda</option>
                                                                <option value="Argentina">Argentina</option>
                                                                <option value="Armenia">Armenia</option>
                                                                <option value="Aruba">Aruba</option>
                                                                <option value="Australia">Australia</option>

                                                                <option value="Austria">Austria</option>
                                                                <option value="Azerbaijan">Azerbaijan</option>
                                                                <option value="Bahamas, The">Bahamas, The</option>
                                                                <option value="Bahrain">Bahrain</option>
                                                                <option value="Bangladesh">Bangladesh</option>
                                                                <option value="Barbados">Barbados</option>

                                                                <option value="Belarus">Belarus</option>
                                                                <option value="Belgium">Belgium</option>
                                                                <option value="Belize">Belize</option>
                                                                <option value="BBenin">BBenin</option>
                                                                <option value="Bermuda">Bermuda</option>
                                                                <option value="Bhutan">Bhutan</option>

                                                                <option value="Bolivia">Bolivia</option>
                                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                                <option value="Botswana">Botswana</option>
                                                                <option value="Brazil">Brazil</option>
                                                                <option value="British Virgin Islands">British Virgin Islands</option>
                                                                <option value="Brunei">Brunei</option>

                                                                <option value="Bulgaria">Bulgaria</option>
                                                                <option value="Burkina Faso">Burkina Faso</option>
                                                                <option value="Burma">Burma</option>
                                                                <option value="Burundi">Burundi</option>
                                                                <option value="Cambodia">Cambodia</option>
                                                                <option value="Cameroon">Cameroon</option>

                                                                <option value="Canada">Canada</option>
                                                                <option value="Cape Verde">Cape Verde</option>
                                                                <option value=">Cayman Islands">&gt;Cayman Islands</option>
                                                                <option value=">Central African Republic">&gt;Central African Republic</option>
                                                                <option value="Chad">Chad</option>
                                                                <option value="Chile">Chile</option>

                                                                <option value="China">China</option>
                                                                <option value="Christmas Island">Christmas Island</option>
                                                                <option value="Colombia">Colombia</option>
                                                                <option value="Comoros">Comoros</option>
                                                                <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                                                <option value="Congo, Republic of the">Congo, Republic of the</option>

                                                                <option value="Cook Islands">Cook Islands</option>
                                                                <option value="Costa Rica">Costa Rica</option>
                                                                <option value="Cote Ivoire">Cote Ivoire</option>
                                                                <option value="Croatia">Croatia</option>
                                                                <option value="Cuba">Cuba</option>
                                                                <option value="Cyprus">Cyprus</option>

                                                                <option value="Czech Republic">Czech Republic</option>
                                                                <option value="Denmark">Denmark</option>
                                                                <option value="Djibouti">Djibouti</option>
                                                                <option value="Dominica">Dominica</option>
                                                                <option value="Dominican Republic">Dominican Republic</option>
                                                                <option value="East Timor">East Timor</option>

                                                                <option value="Ecuador">Ecuador</option>
                                                                <option value="Egypt">Egypt</option>
                                                                <option value="El Salvador">El Salvador</option>
                                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                <option value="Eritrea">Eritrea</option>
                                                                <option value="Estonia">Estonia</option>

                                                                <option value="Ethiopia">Ethiopia</option>
                                                                <option value="Falkland Islands">Falkland Islands</option>
                                                                <option value="Faroe Islands">Faroe Islands</option>
                                                                <option value="Fiji">Fiji</option>
                                                                <option value="Finland">Finland</option>
                                                                <option value="France">France</option>

                                                                <option value="French Guiana">French Guiana</option>
                                                                <option value="French Polynesia">French Polynesia</option>
                                                                <option value="Gabon">Gabon</option>
                                                                <option value="Gambia, The">Gambia, The</option>
                                                                <option value="Georgia">Georgia</option>
                                                                <option value="Germany">Germany</option>

                                                                <option value="Ghana">Ghana</option>
                                                                <option value="Gibraltar">Gibraltar</option>
                                                                <option value="Greece">Greece</option>
                                                                <option value="Greenland">Greenland</option>
                                                                <option value="Grenada">Grenada</option>
                                                                <option value="Guadeloupe">Guadeloupe</option>

                                                                <option value="Guam">Guam</option>
                                                                <option value="Guatemala">Guatemala</option>
                                                                <option value="Guinea">Guinea</option>
                                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                                <option value="Guyana">Guyana</option>
                                                                <option value="Haiti">Haiti</option>

                                                                <option value="Honduras">Honduras</option>
                                                                <option value="Hungary">Hungary</option>
                                                                <option value="Iceland">Iceland</option>
                                                                <option value="India">India</option>
                                                                <option value="Indonesia">Indonesia</option>
                                                                <option value="Iran">Iran</option>

                                                                <option value="Iraq">Iraq</option>
                                                                <option value="Ireland">Ireland</option>
                                                                <option value="Issrael">Issrael</option>
                                                                <option value="Italy">Italy</option>
                                                                <option value="Jamaica">Jamaica</option>
                                                                <option value="Japan">Japan</option>

                                                                <option value="Jordan">Jordan</option>
                                                                <option value="Kazakhstan">Kazakhstan</option>
                                                                <option value="Kenya">Kenya</option>
                                                                <option value="Kiribati">Kiribati</option>
                                                                <option value="Korea, North">Korea, North</option>
                                                                <option value="Korea, South">Korea, South</option>

                                                                <option value="Kuwait">Kuwait</option>
                                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                <option value="Laos">Laos</option>
                                                                <option value="Latvia">Latvia</option>
                                                                <option value="Lebanon">Lebanon</option>
                                                                <option value="Lesotho">Lesotho</option>

                                                                <option value="Liberia">Liberia</option>
                                                                <option value="Libya">Libya</option>
                                                                <option value="Liechtenstein">Liechtenstein</option>
                                                                <option value="Lithuania">Lithuania</option>
                                                                <option value="Luxembourg">Luxembourg</option>
                                                                <option value="Macau">Macau</option>

                                                                <option value="Macedonia">Macedonia</option>
                                                                <option value="Madagascar">Madagascar</option>
                                                                <option value="Malawi">Malawi</option>
                                                                <option value="Malaysia">Malaysia</option>
                                                                <option value="Maldives">Maldives</option>
                                                                <option value="Mali">Mali</option>

                                                                <option value="Malta">Malta</option>
                                                                <option value="Marshall Islands">Marshall Islands</option>
                                                                <option value="Martinique">Martinique</option>
                                                                <option value="Mauritania">Mauritania</option>
                                                                <option value="Mauritius">Mauritius</option>
                                                                <option value="Mayotte">Mayotte</option>

                                                                <option value="Mexico">Mexico</option>
                                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                                <option value="Moldova">Moldova</option>
                                                                <option value="Monaco">Monaco</option>
                                                                <option value="Mongolia">Mongolia</option>
                                                                <option value="Montserrat">Montserrat</option>

                                                                <option value="Morocco">Morocco</option>
                                                                <option value="Mozambique">Mozambique</option>
                                                                <option value="Namibia">Namibia</option>
                                                                <option value="Nauru">Nauru</option>
                                                                <option value="Nepal">Nepal</option>
                                                                <option value="Netherlands">Netherlands</option>

                                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                                <option value="New Caledonia">New Caledonia</option>
                                                                <option value="New Zealand">New Zealand</option>
                                                                <option value="Nicaragua">Nicaragua</option>
                                                                <option value="Niger">Niger</option>
                                                                <option value="Nigeria">Nigeria</option>

                                                                <option value="Niue">Niue</option>
                                                                <option value="Norfolk Island">Norfolk Island</option>
                                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                <option value="Norway">Norway</option>
                                                                <option value="Oman">Oman</option>
                                                                <option value="Pakistan">Pakistan</option>

                                                                <option value="Palau">Palau</option>
                                                                <option value="Panama">Panama</option>
                                                                <option value="Papua new Guinea">Papua new Guinea</option>
                                                                <option value="Paraguay">Paraguay</option>
                                                                <option value="Peru">Peru</option>
                                                                <option value="Philippines">Philippines</option>

                                                                <option value="Pitcairn Island">Pitcairn Island</option>
                                                                <option value="Poland">Poland</option>
                                                                <option value="Portugal">Portugal</option>
                                                                <option value="Puerto Rico">Puerto Rico</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Reunion">Reunion</option>

                                                                <option value="Romania">Romania</option>
                                                                <option value="Russia">Russia</option>
                                                                <option value="Rwanda">Rwanda</option>
                                                                <option value="Saint Helena">Saint Helena</option>
                                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                <option value="Saint Lucia">Saint Lucia</option>

                                                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                                <option value="Samoa">Samoa</option>
                                                                <option value="San Marino">San Marino</option>
                                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Senegal">Senegal</option>

                                                                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                                                <option value="Seychelles">Seychelles</option>
                                                                <option value="Sierra Leone">Sierra Leone</option>
                                                                <option value="Singapore">Singapore</option>
                                                                <option value="Slovakia">Slovakia</option>
                                                                <option value="Slovenia">Slovenia</option>

                                                                <option value="Solomon Islands">Solomon Islands</option>
                                                                <option value="Somalia">Somalia</option>
                                                                <option value="South Africa">South Africa</option>
                                                                <option value="Spain">Spain</option>
                                                                <option value="Sri Lanka">Sri Lanka</option>
                                                                <option value="Sudan">Sudan</option>

                                                                <option value="Suriname">Suriname</option>
                                                                <option value="Swaziland">Swaziland</option>
                                                                <option value="Sweden">Sweden</option>
                                                                <option value="Switzerland">Switzerland</option>
                                                                <option value="Syria">Syria</option>
                                                                <option value="Taiwan">Taiwan</option>

                                                                <option value="Tajikistan">Tajikistan</option>
                                                                <option value="Tanzania">Tanzania</option>
                                                                <option value="Thailand">Thailand</option>
                                                                <option value="Togo">Togo</option>
                                                                <option value="Tokelau">Tokelau</option>
                                                                <option value="Tonga">Tonga</option>

                                                                <option value="Trinidad And Tobago">Trinidad And Tobago</option>
                                                                <option value="Tunisia">Tunisia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="Turkmenistan">Turkmenistan</option>
                                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                <option value="Tuvalu">Tuvalu</option>

                                                                <option value="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                                                <option value="Uganda">Uganda</option>
                                                                <option value="Ukraine">Ukraine</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>

                                                                <option value="Uruguay">Uruguay</option>
                                                                <option value="Uzbekistan">Uzbekistan</option>
                                                                <option value="Vanuatu">Vanuatu</option>
                                                                <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
                                                                <option value="Venezuela">Venezuela</option>
                                                                <option value="Vietnam">Vietnam</option>

                                                                <option value="West Bank">West Bank</option>
                                                                <option value="Western Sahara">Western Sahara</option>
                                                                <option value="Yemen">Yemen</option>
                                                                <option value="Yugoslavia, Federal Repubic Of">Yugoslavia, Federal Repubic Of</option>
                                                                <option value="Zambia">Zambia</option>
                                                                <option value="Zimbabwe">Zimbabwe</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="frm-group">
                                                            <label>State</label>
                                                            <input type="text" name="state" id="state" value="<?= set_value('state') ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="frm-group">
                                                            <label>City</label>
                                                            <input type="text" name="city" id="city" value="<?= set_value('city') ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="frm-group">
                                                            <label>Address</label>
                                                            <textarea name="address" id="address"><?= set_value('address') ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="frm-group">
                                                            <label>Special Requirements</label>
                                                            <textarea name="requirements" id="requirements"><?= set_value('requirement') ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="bt-book-sbmt-btn clearfix">
                                                            <input type="hidden" name="formSubmitted" value="1"  id="submit" />
                                                            <input type="submit" value="Finish">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                                    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#bookingForm").validate({
                                                rules: {
                                                    name: 'required',
                                                    email: {
                                                        required: true,
                                                        email: true
                                                    }
                                                    ,
                                                    phone: {
                                                        required: true,
                                                        number: true
                                                    }

                                                },
                                                messages: {
                                                    name: "Please enter your name",
                                                    email: {
                                                        required: "Please enter email address",
                                                        minlength: jQuery.format("At least {0} characters required!")
                                                    },
                                                    phone: {
                                                        required: "Please enter valid phone number"
                                                    }
                                                },
//                                                
                                            });
                                        });
                                    </script>

                                </div><!--ht-book-slt-rm-wrapper-->

                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div><!--booking-mainWrapper ends-->

            </div>
        </div>





<?php include('footer.php'); ?>

    </body>
</html>


<!--<script src="<?= base_url() ?>js/jquery.min.js"></script>-->
<script type="text/javascript">
    jQuery(window).load(function () { // makes sure the whole site is loaded
        jQuery("#status").fadeOut(); // will first fade out the loading animation
        jQuery("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.			
    });
</script>
<script src="<?= base_url() ?>js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {

        // $("#popup").trigger('click');
        // Slideshow 1
        $("#slider1").responsiveSlides({
            speed: 1000,
            nav: true
        });
        $("#gallery-slider").responsiveSlides({
            speed: 1000,
            nav: true,
            auto: false
        });


    });
</script>