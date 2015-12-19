<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Olive Hotels</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700' rel='stylesheet' type='text/css'>
        
        <style type="text/css">
            *{
                padding: 0px;
                margin: 0px;
                
            }
            body{
                font-family:'Open Sans';
            }
            .career-form{
                overflow: hidden;
            }
            .carr-ttl{
                margin-bottom: 10px;
            }
            .carr-ttl h3{
                padding: 10px;
                text-align: center;
                font-size: 16px;
                color: #fff;
                background: #4993cf;
                    
            }
            .career-form input[type=text]{
                width: 100%;
                height: 40px;
                margin-bottom: 6px;
                border:1px solid #ccc;
                padding-left: 10px;
                box-sizing: border-box;
                
            }
            .career-form input[type=file]{
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                background: #fff;
                box-sizing: border-box;
                margin-bottom: 10px;
                
            }
            .career-form textarea{
                width: 100%;
                height: 80px;
                margin-bottom: 6px;
                border:1px solid #ccc;
                padding: 10px;
                box-sizing: border-box;
                
            }
            .note{
                font-size: 12px;
                color: #666;
           
            }
            .submit{
                width: 100%;
                display: table;
                    
            }
            .career-form input[type=submit]{
                    padding: 8px 15px;
                    background: #3C9E64;
                    font-size: 15px;
                    font-weight: bold;
                    color: #fff;
                    cursor: pointer;
                    float: right;
                    border:none;
                    border-radius: 3px;
                    
                    
                    
            }
        </style>
        
        <script src="<?= base_url() ?>js/jquery.min.js"></script>
        
        <div class="career-form">
            <div class="carr-ttl"><h3>Apply for <?= $career[0]['career_title'] ?></h3></div>
        <?php
        $attributes = array('name' => 'form1', 'id' => 'form1');
        ?>
        <?php echo form_open_multipart('careers/send/' . $career_id, $attributes); ?>
        <input type="hidden" name="career_id" value="<?= $career_id ?>">
            <input type="hidden" name="post_for" id="post_for" class="form2"    value="<?= $career[0]['career_title'] ?>"/>
            <input type="text" placeholder="Name" class="form2"  name="firstname" id="firstname" value="<?= set_value('firstname') ?>"/>
            <input type="text" placeholder="Phone No" class="form2"   name="phone" id="phone" value="<?= set_value('phone') ?>"/>
            <input type="text" placeholder="E-mail" class="form2"  name="email" id="email" value="<?= set_value('email') ?>"/>

            <textarea name="experience" id="experience" placeholder="Experience" class="form-box"></textarea>

            <textarea name="qualification" id="qualification" placeholder="Qualification" class="form-box"></textarea>


            <div class="file-choosen">
                <p class="note"> Note: Please upload your CV in Word or Pdf format</p>
                <input type="file" name="image"/></div>
            <div class="submit"> <input type="submit" value="Apply Now" id="submit" class="form4">
            </div>

                </form>

                </div>
                <script type="text/javascript">
                    $('#submit').click(function () {
                        var email = $('#email').val();
                        var filter = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{1,4}$/;
                        var flag = 1;
                        $("#experience").css('border', '0px solid red');
                        $("#firstname").css('border', '0px solid red');
                        $("#email").css('border', '0px solid red');
                        $("#address").css('border', '0px solid red');
                        $("#phone").css('border', '0px solid red');
                        $("#qualification").css('border', '0px solid red');

                        if ($('#post_for').val() == '') {

                            $("#post_for").css('border', '1px solid red');
                            flag = 0;

                        }
                        if ($('#experience').val() == '') {

                            $("#experience").css('border', '1px solid red');
                            flag = 0;

                        }


                        if ($('#firstname').val() == '') {
                            $("#firstname").css('border', '1px solid red');
                            flag = 0
                        }
                        if ($('#email').val() == '') {
                            $("#email").css('border', '1px solid red');
                            flag = 0
                        }
                        if (!filter.test(email)) {
                            $("#email").css('border', '1px solid red');
                            flag = 2
                        }
                        if ($('#address').val() == '') {
                            $("#address").css('border', '1px solid red');
                            flag = 0
                        }

                        if ($('#phone').val() == '') {
                            $("#phone").css('border', '1px solid red');
                            flag = 0
                        }

                        if ($('#qualification').val() == '') {
                            $("#qualification").css('border', '1px solid red');
                            flag = 0
                        }
                        if (flag == 1) {

                            document.form1.submit();
                            return true;
                        }
                        else
                        {
                            if (flag == 0) {
                                $("#errors").html("<span class='red'>Required</b></span>");
                                return false;
                            }
                            if (flag == 2) {
                                $("#errors").html("<span class='red'>Enter Valid Email </b></span>");
                                $("#email").focus();
                                return false;
                            }

                        }


                    });


                </script>
