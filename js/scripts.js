jQuery(document).ready(function($) { 
    
    var options = {
        success:    showResponse,
        url:        ajaxForm.ajaxurl,
    }
    
    $('#ajaxForm').ajaxForm(options);
                      
        function showResponse(responseText, statusText, xhr, $form)  { 
 
        alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
            '\n\nThe output div should have already been updated with the responseText.'); 
    
        } 
        
        $("input[name='action']").val('realEstateFormInsert');

}); 