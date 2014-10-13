<?php
    
    if ( ! empty($_POST['pictureToDelete']) && isset($_POST['pictureToDelete'])) {
    
        $numberOfImages = count($_POST['pictureToDelete']);
                
        for ($i=0; $i<$numberOfImages; $i++) {
                        
            $attachmentID[] = $_POST['pictureToDelete'][$i];
                        
            wp_delete_attachment($attachmentID[$i]);         
        }
             
}