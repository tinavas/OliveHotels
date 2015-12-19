<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="quick-links">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="web/index">Home</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="<?= site_url() ?>about-group">Group</a></li>
                            <li><a href="<?= site_url() ?>booking-landing">Online Booking </a></li>
                            <li><a href="<?= site_url() ?>contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-4">
                    <div class="subscribe">
                        <h3>Subscribe Newsletter</h3>
                        <div class="subscribe-form">
                            <form>
                                <input type="text" placeholder="Enter Your Email Addres here" name="newsletter_email" id="newsletter_email"/>
                                <input type="submit" value="Subscribe" id="news-letter-submit"/>

                            </form>
                        </div>
                        <div id="div_newsletter" style="color:#FF0000; padding-top:5px; " ></div>
                        <script type="text/javascript">
                            $('#news-letter-submit').click(function (e) {

                                e.preventDefault();

                                //alert(currenturl);


                                $("#div_newsletter").html("");

                                var newsletter_email = $('#newsletter_email').val();
                                var filter = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{1,4}$/;

                                if ($('#newsletter_email').val() == '') {


                                    $("#div_newsletter").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Please enter a valid email address</div>');

                                    $('#newsletter_email').focus();
                                    return false;
                                } else if (!filter.test(newsletter_email)) {
                                    $("#div_newsletter").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Please enter a valid email address</div>');
                                    $('#newsletter_email').focus();
                                    return false;
                                }

                                else {


                                    var newsletter_email = $('#newsletter_email').val();


                                    $.ajax({
                                        type: "POST",
                                        dataType: 'html',
                                        url: '<?= base_url(); ?>admin/newsletter/add',
                                        data: {'newsletter_email': newsletter_email},
                                        success: function (users) {
                                            $('#div_newsletter').html(users);
                                            $('#newsletter_email').val('');
                                            //$('#newsletter_email').val('Your Email address');


                                            return true;
                                        }

                                    });
                                    return true;
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="footer-bottom">
        <p>Copyright 2015 Olive Hotels</p>
    </div>-->
<div class="container-fluid footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-3 pull-left"><p class="p1">Copyright 2015 Olive Hotels</p></div>
                <div class="col-md-6"></div>
                <div class="col-md-3 pull-right"><p class="p2">Designed &amp; Developed by <a href="http://www.easysoftindia.com" target="_blank" style="color: #4a9fe4;">Easysoft Technologies</a></p></div>

            </div><!------row--end------------>
        </div><!-----container end---->
    </div>
</footer>