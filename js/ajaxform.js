jQuery( document ).ready(function() 
{
       
    jQuery( "#ajaxForm" ).submit(function(event) 
    {        
        jQuery("input[name='action']").val('realEstateForm');
        
        jQuery.post( 
            ajaxForm.ajaxurl,
            jQuery("#ajaxForm :input").serialize(),            
            function(error)
            {
                if (error !== '')
                {                    
                    for(key in error)
                    {
                        jQuery('#' + error[key]).addClass('form_error').attr('placeholder', error[key]);
                    }
                } 
                else
                {
                    window.uploadObject.startUpload();  
                    alert('Nieruchomość została dodana');
                }
            }, 
            "json"
        )
        .done(function()
        {
            
        }
        )
        .fail(function() 
        {
            
        });
        
        event.preventDefault();
    });
});