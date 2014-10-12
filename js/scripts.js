
// Script for uploading using a jQuery upload plugin on the front-end

jQuery(document).ready(function() {
    
        randomValue = Math.random();
        
        uploadObject = jQuery('#fileUploader').uploadFile({
            url: "wp-content/plugins/RealEstateOOP/js/uploader/upload.php?id=" + randomValue,
            multiple: true,
            fileName: "myPhoto",
            maxFileSoze: 1024*500,
            allowedTypes: "*",
            autoSubmit: false,
            afterUploadAll: function()
            {
                jQuery("input[name='action']").val('realEstateFormInsert');

                jQuery.post(
                    ajaxForm.ajaxurl,
                    jQuery('#ajaxForm').serialize(),
                    function(response)
                    {

                    },
                    'json'
                );

            }                

        }); //end uploadFile       

}); //end ready
