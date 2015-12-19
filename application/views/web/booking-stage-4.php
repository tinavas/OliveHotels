<style>
.total-rate{	
    position:relative;
    top:-20px;
    padding:10px;
    border:1px solid #eee;
    background:#f9f9f9;
    box-shadow:0px 1px 3px #eee;
}
.total-rate p{
    font-size:15px;
    color:#333;
    font-weight:bold;
    float:right;
}
</style>
<div id="success-submit">
    <div class="row">
        <div class="col-md-12">
            <div class="booking-steps">
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li class="active">4</li>
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
                <div class="col-md-12" style="top:10px;">
                    <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>While booking Please don't click the back or refresh buttons.</div>
                </div>
                <div class="ht-book-slt-rm-wrapper ht-tble-display clearfix">

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                        <tr>
                            <th>Room</th>
                            <th>Booking Details</th>
                            <th>No. of Rooms</th>
                            <th>Plan Details</th>
                            <th>Total Cost</th>
                        </tr>
                        <?php
                            function dateDiff($start, $end) {
                                $start_ts = strtotime($start);
                                $end_ts = strtotime($end);
                                $diff = $end_ts - $start_ts;
                                return round($diff / 86400);
                            }
                            $stay_count = dateDiff(date('d-m-Y', strtotime($this->session->userdata('check_in'))), date('d-m-Y', strtotime($this->session->userdata('check_out'))));
                        ?>
                        <?php for ($i = 0; $i < $this->session->userdata('rooms_count'); $i++) {?>
                        <?php
                        if($this->session->userdata('hotel_id')==1){
                           $room_category = $this->db->where(array('room_type'=>$room_id[$i],'hotel_master_id'=>1))->get('room_master')->result(); 
                        }else if($this->session->userdata('hotel_id')==2){
                            $room_category = $this->db->where(array('room_type'=>$room_id[$i],'hotel_master_id'=>2))->get('room_master')->result();
                        }
                        
                        ?>
                        <tr>
                            <td>
                                <?php if($room_category){?>
                                <img src="<?php echo base_url(); ?>uploads/room_master/thumb/<?php echo $room_category[0]->image; ?>" alt="image" width="130px" height="90px">
                                <?php }?> 
                                <p><?php echo $room_name[$i];?></p>
                            </td>

                            <td>
                                <?php
                                echo date('d-m-Y', strtotime($this->session->userdata('check_in'))) . '<br/> To  <br/>' . date('d-m-Y', strtotime($this->session->userdata('check_out')));
                                ?>
                            </td>
                            <td class="tbl-rm">
                                <?php echo $user_selected_rooms[$i];?>
                            </td>
                            <td>
                                <?php if($plan[$i]==1){echo 'American Plan(AP)';}else if($plan[$i]==2){echo 'Continential Plan(CP)';}else if($plan[$i]==3){echo 'European Plan(EP)';}else if($plan[$i]==4){echo 'Modified American Plan(MAP)';};?>
                            </td>
                            <td class="cost">
                                <h4>
                                    <?php echo 'Rs.' . ($rates[$i] * $stay_count); ?>
                                    <p style="font-size: 8px !important;">* Inclusive of all taxes</p>
    <!--                                <p>Single<?php echo $singleroom[$i];?></p>
                                    <p>Double<?php echo $doubleroom[$i];?></p>
                                    <p>Extra<?php echo $extra_adultroom[$i];?></p>-->
                                </h4>
                            </td>
                        </tr>
                        <?php
                        }?>
                    </table>
                    <div class="total-rate clearfix">
                        <?php 
                        $product_total[] = 0;
                        $grand_total = 0;
                        for ($i = 0; $i < $this->session->userdata('rooms_count'); $i++) {
                            $grand_total+=($rates[$i] * $stay_count);
                            $product_total[$i] =($rates[$i] * $stay_count);
                        }
                        ?>
                        <p>Grand Total: Rs.<?php echo $grand_total;?></p>
                    </div>
                    <form class="form-horizontal" id="bookingForm">
                        <div class="enter-detail-wrapp">
                            <h3>Enter Your Details</h3>
                            <div class="enter-form-wrapp ht-bk-form">
                                <div class="row">
                                    <?php
                                    for ($i = 0; $i < $this->session->userdata('rooms_count'); $i++) {
                                    ?>
                                    <input type="hidden" name="product_total[]" value="<?php echo $product_total[$i];?>">
                                    <input type="hidden" name="room_id[]" value="<?php echo $room_id[$i];?>">
                                    <input type="hidden" name="room_name[]" value="<?php echo $room_name[$i];?>">
                                    <input type="hidden" name="user_selected_rooms[]" value="<?php echo $user_selected_rooms[$i];?>">
                                    <input type="hidden" name="child[]" value="<?php echo $children[$i];?>">
                                    <input type="hidden" name="adult[]" value="<?php echo $adult[$i];?>">
                                    <input type="hidden" name="extra_bed[]" value="<?php echo $extra_bed[$i];?>">
                                    <input type="hidden" name="plan[]" value="<?php echo $plan[$i];?>">
                                    <input type="hidden" name="single_room[]" value="<?php echo $singleroom[$i];?>">
                                    <input type="hidden" name="double_room[]" value="<?php echo $doubleroom[$i];?>">
                                    <input type="hidden" name="extra_adultroom[]" value="<?php echo $extra_adultroom[$i];?>">
                                    <input type="hidden" name="total_pax[]" value="<?php echo $total_pax[$i];?>">
                                    <?php }?>
                                    <input type="hidden" name="grand_total" value="<?php echo $grand_total;?>">
                                    

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
                                        <p  id="errors" style="margin-top: 8px;color:#F41515; float:left;"></p>
                                        
                                        <div class="bt-book-sbmt-btn clearfix">
                                            <input type="hidden" name="formSubmitted" value="1"  id="submit" />
                                            
                                            <input type="submit" value="Finish">
                                        </div>
                                        <div class="loader" style="position:relative;top:-50px;">
                                            <img id="ajax-loader" src="<?= base_url()?>images/loader.gif" style="width: 70px;display: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div><!--ht-book-slt-rm-wrapper-->

            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<div id="response-msg"></div>
<script type="text/javascript">
    $("#bookingForm").submit(function(e){
        e.preventDefault();
        var email = $('#email').val();
        var phon = $('#phone').val();
        var flag = 1;
        var filter = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{1,4}$/;
        
        if($('#address').val()==''){                                   
            $('#address').focus();
            flag=0;
        }
        if ($('#email').val() == '') {
            $('#email').focus();
            flag = 0;
        }
        if (!filter.test(email)) {
            flag = 2;
        }
        var phone1 = /^[0-9]$/;
        if ($('#phone').val() == '') {
            $('#phone').focus();
            flag = 0;
        }
        if ($('#name').val() == '') {
            $('#name').focus();
            flag = 0;
        }
        if (flag != 1) {
            if (flag == 0) {
                $("#errors").html("<span class='red'>Required</span>");
                return false;
            }
            if (flag == 2) {
                $("#errors").html("<span class='red'>Enter Valid Email</span>");
                $("#email").focus();
                return false;
            }
            if (flag == 3) {
                $("#errors").html("<span class='red'>Enter Valid Phone Number</span>");
                $("#phone").focus();
                return false;
            }
        }else{
            $('#ajax-loader').show();
            $.post("<?= base_url() ?>booking/submit_personal_details", $("#bookingForm").serialize(),function (data) {
                $('#ajax-loader').hide();
                $('#success-submit').hide();
                $('#response-msg').html(data);
//                  console.log(data);
            });
        }
    });
    
</script>