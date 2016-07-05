jQuery(document).ready(function($) {
    console.log( 'LOADED Custom Uploader');
    //handle image upload on the settings page.
    $('.jhj_crtc_pdf_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Upload CTRC in PDF Form',
            button: {
                text: 'Upload PDF'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            //$('.jhj_slider_default_image').attr('src', attachment.url);
            $('.jhj_crtc_pdf_url').val(attachment.url);

        })
        .open();
    });
});
