
<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <title></title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>images/fav.png"/>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600' rel='stylesheet' type='text/css'>
    <link href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="<?= base_url() ?>css/style.css"/>


</head>

<style type="text/css">
    .payment-box{
        width: 700px;
        height: auto;
        padding: 35px 0px 61px 0px;
        margin: 0px auto;
    }
    .online-payment{
        border: 1px solid #EF7B1A;
        height: auto;
        padding-bottom: 34px;
    }
    .clearfix:before,
    .clearfix:after {
        content: " "; /* 1 */
        clear:both;
        display: table; /* 2 */
    }
    .payment-head{
        float:left;
        width:100%;
        height:30px;
    }
    .payment-head h3{
        font-size:14px;
        color:#000;
        font-weight:bold;
        text-align:left;
        padding:20px;
        display:inline-block;
    }
    .payment-head h3 span{
        color:#F2953A;
    }

    .online-box h3{
        font-size:14px;
        color:#000;
        font-weight:bold;
        text-align:left;
    }
    .online-box img{
        position:relative;
        top:6px;
        left:25px;
    }
    .read-payment input{
        padding: 6px;
        background: #8FE086;
        border-radius: 3px;
        color: #fff;
        position: relative;

        font-size: 18px;
        text-decoration: none;
        float: right;
        font-weight: bold;
    }
    .read-payment{
        float: left;
        width: 610px;
        padding: 20px;
        height:auto;
        margin: 40px 20px 20px 20px;
        border: 1px solid #cbc9c9;
    }
    .read-payment h3{
        font-size:16px;
        color:#222121;
        font-weight:bold;
        text-align:left;
    }
    .read-payment ul{
        padding-left:10px;
    }
    .read-payment ul li{
        list-style: none;
        background: url(<?= base_url() ?>images/icon-payment.png) no-repeat 1px 11px;
        display: block;
        line-height: 25px;
        padding-left: 13px;
    }
</style>
<body>
    <?php include('header.php'); ?>
    <div class="my-profile-wrapper">
        <div class="payment-box">
            <img src="<?= base_url() ?>images/online-bg.png" />
            <div class="online-payment clearfix">
                <div class="payment-head">
                    <h3> <?=$payment_plan_title?></h3><h3>Amount Rs <span><?= $payment_amount ?></span></h3>
                </div>
                <div class="clearfix">
                </div>
                <div class="read-payment">
                    <h3>This Page is Redirecting to <img src="<?= base_url() ?>images/cc-avenue.jpg" style=" display: inline;" />
                         <?php echo form_open('ccavRequestHandler/index/'.$payment_url); ?>
                        
                     
                            <input name="Pay_ccavenue" type="submit" value="CheckOut" class="complete-btn"/>
                        </form>

                    </h3>
                </div>
                <div class="read-payment">
                    <h3>Read Before Making Payment</h3>
                    <ul>
                        <li>Payments will be processed by our payments partner CC Avenue, via their secure web interface.</li>
                        <li>If an online payment is made on a working day, your profile will be activated after the successful verification of the profile through the given telephone numbers.</li>
                        <li>Please contact <?= $this->config->item('matrimony_name') ?> Customer Care Executive +91-9497005641</li>

                    </ul>

                </div>
            </div>
        </div>

    </div><!--my-profile-wrapper ends-->

    <?php //include('footer.php'); ?>

</body>
</html>
