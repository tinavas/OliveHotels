<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>


<script src="<?php echo base_url(); ?>assets/js/jquery.Jcrop.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jscrop-scriptNews.js"></script>
<link href="<?php echo base_url(); ?>assets/css/jquery.Jcrop.min.css" rel="stylesheet">
<!-- START Content -->
<div class="container-fluid">
    <!-- START Row -->
    <div class="row-fluid">
        <!-- START Datatable 2 -->
        <div class="span12 widget lime">
            <header>
                <h4 class="title"><span class="icon icone-crop"></span>Crop Image</h4>
                <!-- START Label/Badge -->

                <!--/ END Label/Badge -->
                <!-- START Button Group -->

                <!--/ END Button Group -->
            </header>
        </div>
        <!-- START General Elements -->
        <?php echo form_open_multipart('admin/news/save'); ?>
        <?php
        if (isset($error)) {
            echo '<span style="color:red">' . $error . '</span>';
            $this->session->set_userdata('msg', '');
        }
        ?>

        <!--    <form class="span12 widget stacked dark form-horizontal bordered">-->

        <section class="body">
            <div class="body-inner">
                <!-- Message -->
                <div class="control-group">
                    <!--     <div class="alert">
                             <button type="button" class="close" data-dismiss="alert">×</button>
                             Atqui erant an his. Quo ei debet noluisse, sapientem mediocritatem pri ad, vis brute mandamus torquatos at.
                         </div>-->
                </div><!--/ Message -->






                <!-- Textarea -->
                <div class="control-group">
                    <li style="list-style:none;">   <a href="<?php echo site_url(); ?>admin/news"><strong>Back</strong></a>  </li>
                    <label class="control-label"> </label>  
                    <div class="controls">
                        <div >
                            <img src="<?php echo base_url(); ?>uploads/news/main/<?php echo $news->news_image; ?>"  id="cropbox"/>
                        </div>
                        <div id="uploaded_preview">
                            <input type="hidden"  id="x" name="x" />
                            <input type="hidden"  id="y" name="y" />
                            <input type="hidden"  id="w" name="w" />
                            <input type="hidden"  id="h" name="h" />

                            <input type="hidden"  id="image_name" name="image_name" value="<?php echo $news->news_image; ?>" />
                            <br />	
                            <img id="preview-news" />

                        </div>

                        <script type="text/javascript">

                            $(function () {

                                $('#cropbox').Jcrop({
                                    aspectRatio: 1.1,
                                    onSelect: updateCoords
                                });

                            });

                            function updateCoords(c)
                            {
                                $('#x').val(c.x);
                                $('#y').val(c.y);
                                $('#w').val(c.w);
                                $('#h').val(c.h);
                            }
                            ;

                            function checkCoords()
                            {
                                if (parseInt($('#w').val()))
                                    return true;
                                alert('Please select a crop region then press submit.');
                                return false;
                            }
                            ;

                        </script>

                        </span>				
                    </div>
                </div><!--/ Textarea -->

                <!-- Select -->
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <input type="submit" name="Submit" value="Submit" onclick="return checkCoords();" >
                    </div>
                </div><!--/ Select -->







            </div>
        </section>
        </form>
        <!--/ END General Elements -->
    </div>
    <!--/ END Row -->
</div>
<!--/ END Content -->


