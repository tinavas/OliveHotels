
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
        <link href="<?= base_url() ?>css/jquery.fancybox.css" type="text/css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    </head>

    <body>
        <div class="sub-page-header">
            <?php include('header.php'); ?>
        </div>
        <div class="subpage-bannerWrapper career-banner">
            <div class="subpage-bannerContent sub-ban-cont-down">
                <h1>Olive <span>Hotels</span></h1>
                <p>OLIVE provides you the most luxurious stay heartened by tranquil quietness &amp;<br/> ensuring the best hospitality for our guest at our hotels</p>
            </div>
        </div>

        <div class="contact-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-overlap-title">
                            <div class="page-title"><h2>Careers at <span>Olive Hotels</span></h2></div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="career-wrapper">
                            <div class="career-top">
                                <p>A career in the hospitality industry offers an prospect to enhance  your  disciplines, etiquette which concretes your way to success.To achieve our vision, we are always looking out for passionate candidates .Fresher's may also apply, If you feel that you are a competent candidate.</p>
                            </div>
                            <div class="career-table">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <th>No</th>
                                        <th>Job Title</th>
                                        <th>Vacancies</th>
                                        <th>Location</th>
                                        <th>Education</th>
                                        <th>Experience</th>
                                        <th>Salary</th>
                                        <th>Candidature</th>
                                        <th></th>
                                    </tr>
                                    <?php
                                    $i = $row;

                                    foreach ($career as $result) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?=$i?></td>

                                            <td><?php echo $result['career_title']; ?></td>      
                                            <td><?php echo $result['career_no']; ?></td>      
                                            <td><?php echo $result['career_location']; ?></td>      
                                            <td><?php echo $result['career_education']; ?></td>
                                            <td><?php echo $result['career_experience']; ?></td>
                                            <td><?php echo $result['career_salary']; ?></td>
                                            <td><?php echo $result['career_candidature']; ?></td>
                                            <td class="apply-td">
                                                <a href="<?= base_url() ?>careers/send/<?= $result['career_id'] ?>" class="apply">Apply</a></td>
                                        </tr>


                                        <?php
                                    }
                                    ?>         


                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>





        <?php include('footer.php'); ?>

    </body>
</html>


<script src="<?= base_url() ?>js/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(window).load(function () { // makes sure the whole site is loaded
        jQuery("#status").fadeOut(); // will first fade out the loading animation
        jQuery("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.			
    });
</script>
<script src="<?= base_url() ?>js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>js/responsiveslides.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.fancybox.js"></script>
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
        
         $(".apply").fancybox({
           'width':350,
           'height':250,
           'type':'iframe'
        });


    });
</script>