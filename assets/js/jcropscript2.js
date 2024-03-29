/**
 *
 * HTML5 Image uploader with Jcrop
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2012, Script Tutorials
 * http://www.script-tutorials.com/
 */

// convert bytes into friendly format
function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB'];
    if (bytes == 0)
        return 'n/a';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
}
;

// check for selected crop region
function checkForm2() {
    if (parseInt($('#w_c').val()))
        return true;
    $('.error').html('Please select a crop region and then press Upload').show();
    return false;
}
;

// update info by cropping (onChange and onSelect events handler)
function updateInfo2(e) {
    $('#x1_c').val(e.x);
    $('#y1_c').val(e.y);
    $('#x2_c').val(e.x2);
    $('#y2_c').val(e.y2);
    $('#w_c').val(e.w);
    $('#h_c').val(e.h);
}
;

// clear info by cropping (onRelease event handler)
function clearInfo2() {
    $('.info #w_c').val('');
    $('.info #h_c').val('');
}
;

function fileSelectHandler2() {

   
   

    // get selected file
    var oFile = $('#fileImage2')[0].files[0];

    // hide all errors
    $('.error').hide();

    // check for image type (jpg and png are allowed)
    var rFilter = /^(image\/jpeg|image\/png)$/i;
    if (!rFilter.test(oFile.type)) {
        $('.error').html('Please select a valid image file (jpg and png are allowed)').show();
        return;
    }

    // check for file size
    if (oFile.size > 1024 * 1024) {
        $('.error').html('You have selected too big file, please select a one smaller image file').show();
        return;
    }

    // preview element
    var oImage = document.getElementById('preview2');

    // prepare HTML5 FileReader
    var oReader = new FileReader();
    oReader.onload = function(e) {

        // e.target.result contains the DataURL which we can use as a source of the image
        oImage.src = e.target.result;
        oImage.onload = function() { // onload event handler   

            // display step 2
            $('.step2').fadeIn(500);

            // display some basic image info
            var sResultFileSize = bytesToSize(oFile.size);
            $('#filesize').val(sResultFileSize);
            $('#filetype').val(oFile.type);
            $('#filedim').val(oImage.naturalWidth + ' x ' + oImage.naturalHeight);

            // Create variables (in this scope) to hold the Jcrop API and image size
            var jcrop_api, boundx, boundy;

            // destroy Jcrop if it is existed
            if (typeof jcrop_api != 'undefined')
                jcrop_api.destroy();

            // initialize Jcrop
            $('#preview2').Jcrop({
                minSize: [32, 32], // min crop size
                aspectRatio: 0.97, // keep aspect ratio 1:1
                bgFade: true, // use fade effect
                bgOpacity: .3, // fade opacity
                onChange: updateInfo2,
                onSelect: updateInfo2,
                onRelease: clearInfo2
            }, function() {

                // use the Jcrop API to get the real image size
                var bounds = this.getBounds();
                boundx = bounds[0];
                boundy = bounds[1];

                // Store the Jcrop API in the jcrop_api variable
                jcrop_api = this;
            });
        };
    };

    // read selected file as DataURL
    oReader.readAsDataURL(oFile);
}