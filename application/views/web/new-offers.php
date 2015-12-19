
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
    </head>

    <body>
        <div class="sub-page-header">
            <?php include('header.php'); ?>
        </div>
        <div class="news-offers-outerWrapper">
            <div class="news-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="offer-banner">
                                <img src="<?= base_url() ?>images/news-banner.jpg" alt="banner">
                                <div class="overlay-leftTop offer-overlay">	
                                    <div class="offer-ico clearfix"></div></br>
                                    <h1>Seasonal Offers, Special Offers, News &amp; Events </h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="offer-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="banner-overlap-title offer-pg-ttl">
                                    <div class="page-title"><h2><span> Offers </span></h2></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <?php
                            $count = 1;
                            if ($offers) {
                                foreach ($offers as $offer) {
                                    ?>
                            <div class="col-md-6">
                            	<div class="off-wrapper">
                                	<div class="off-left">
                                    	<a href="<?= base_url() ?>web/details/<?php echo $offer->news_id; ?>">
                                            <img src="<?= base_url() ?>uploads/news/thumb/<?php echo $offer->news_image; ?>" alt="offer">
                                            <!--<img src="<?= base_url() ?>images/off-1.jpg"/>-->
                                        </a>
                                    </div>
                                    <div class="off-right">
                                    	<div class="tbl">
                                        	<div class="tbl-cell">
                                            	<div class="off-cnt">
                                                    <?php if($offer->day_name){?>
                                                	<span class="note"><?php echo $offer->day_name; ?></span>
                                                    <?php }?>
                                                	<h2><?php echo $offer->news_title; ?></h2>
                                                        <?php if($offer->news_content){?>
                                                        <p><?php echo character_limiter($offer->news_content, 200); ?></p>
                                                        <?php }?>
                                                    <a href="<?= base_url() ?>web/details/<?php echo $offer->news_id; ?>" class="more">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php $count++;
    }
}
?>
<!--                            <div class="col-md-6">
                            	<div class="off-wrapper">
                                	<div class="off-left">
                                    	<a href="#"><img src="<?= base_url() ?>images/off-2.jpg"/></a>
                                    </div>
                                    <div class="off-right">
                                    	<div class="tbl">
                                        	<div class="tbl-cell">
                                            	<div class="off-cnt">
                                                	<h2>Seafood <b>Friday</b></h2>
                                                    <p>Seaday Fridays is more than just a dining experience--Fresh seafood, cooked to perfection at..</p>
                                                    <a href="#" class="more">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>-->
                        </div>
<!--                        <div class="row">
                            <div class="col-md-6">
                            	<div class="off-wrapper">
                                	<div class="off-left">
                                    	<a href="#"><img src="<?= base_url() ?>images/off-1.jpg"/></a>
                                    </div>
                                    <div class="off-right">
                                    	<div class="tbl">
                                        	<div class="tbl-cell">
                                            	<div class="off-cnt">
                                                	<span class="note">All Friday</span>
                                                	<h2><b>Discount Offer</b> @ Olive Downtown</h2>
                                                    <a href="#" class="more">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                            	<div class="off-wrapper">
                                	<div class="off-left">
                                    	<a href="#"><img src="<?= base_url() ?>images/off-2.jpg"/></a>
                                    </div>
                                    <div class="off-right">
                                    	<div class="tbl">
                                        	<div class="tbl-cell">
                                            	<div class="off-cnt">
                                                	<h2>Seafood <b>Friday</b></h2>
                                                    <p>Seaday Fridays is more than just a dining experience--Fresh seafood, cooked to perfection at..</p>
                                                    <a href="#" class="more">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>-->
                    </div>

                    <div class="updates-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="banner-overlap-title offer-pg-ttl">
                                    <div class="page-title"><h2>Our<span> News &amp; Updates</span></h2></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
<?php
$i = 1;
if ($news) {
    foreach ($news as $newss) {
        ?>
                                    <div class="col-md-6">
                                        <div class="news-update-wrapp clearfix">
                                            <a href="#" class="nws-img">
                                                <img src="<?= base_url() ?>uploads/news/thumb/<?php echo $newss->news_image; ?>" width="285px">
                                            </a>
                                            <div class="news-update-right">
                                                <h4><?php echo $newss->news_title; ?> </h4>
                                                <p><?php echo character_limiter($newss->news_content, 200); ?></p>
                                                <a href="<?= base_url() ?>web/details/<?php echo $newss->news_id; ?>">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                                <div class="col-md-6">
                                    <p style="margin-bottom: 20px;">Not Available..!!!</p>
                                </div>
<?php } ?>
                            <!--                         <div class="col-md-6">
                                                            <div class="news-update-wrapp clearfix">
                                                            <a href="#" class="nws-img"><img src="<?= base_url() ?>images/img-12.jpg"></a>
                                                            <div class="news-update-right">
                                                                    <h4>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout </h4>
                                                                <p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist</p>
                                                                <a href="#">Read More</a>
                                                            </div>
                                                        </div>
                                                     </div>
                                                    </div>
                                                    <div class="row">
                                                     <div class="col-md-6">
                                                            <div class="news-update-wrapp clearfix">
                                                            <a href="#" class="nws-img"><img src="<?= base_url() ?>images/img-13.jpg"></a>
                                                            <div class="news-update-right">
                                                                    <h4>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout </h4>
                                                                <p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist</p>
                                                                <a href="#">Read More</a>
                                                            </div>
                                                        </div>
                                                     </div>
                                                     <div class="col-md-6">
                                                            <div class="news-update-wrapp clearfix">
                                                            <a href="#" class="nws-img"><img src="<?= base_url() ?>images/img-14.jpg"></a>
                                                            <div class="news-update-right">
                                                                    <h4>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout </h4>
                                                                <p>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist</p>
                                                                <a href="#">Read More</a>
                                                            </div>
                                                        </div>
                                                     </div>-->
                        </div>
                    </div>

                </div>
            </div>
        </div>

<?php include('footer.php'); ?>

    </body>
</html>


<script src="<?= base_url() ?>js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>js/responsiveslides.min.js"></script>
