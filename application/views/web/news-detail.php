
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
		  <?php include('header.php');?>
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
                    <div class="updates-wrapper">
                    	<div class="row">
                            <div class="col-md-12">
                                    <div class="banner-overlap-title offer-pg-ttl">
                                     <div class="page-title"><h2><?php echo $news->news_title;?></h2></div>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            
                         <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-7">
                                  <div class="newssubimg"> <img src="<?= base_url()?>uploads/news/main/<?php echo $news->news_image;?>" class="img-responsive" alt="..." width="653px" height="272px"> </div>
                              </div>
                              <div class="newssub">
                                  <p><?php echo nl2br($news->news_content);?></p>
                               </div>
                              <!-----newssub end---------->
                            </div>
                            

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
       	 
        <?php include('footer.php');?>
        
</body>
</html>
    
    
  <script src="<?= base_url() ?>js/jquery.min.js"></script>
   