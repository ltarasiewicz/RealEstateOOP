<?php

/**
 * Access attached images
 */


// Use a helper function to retrieve all attachments for the current post

$attachments = getPostAttachments($realEstate);

?>

<div class="metaBox">        
 
    <table id="realEstatePictureMetaBoxData">
        <tr>
            <td>
                <input type="file" name="realEstatePicture" id="realEstatePicture" value="Dodaj zdjęcie" />
                <input type="hidden" name="postID" value="<?php echo $realEstate->ID; ?>" />
            </td>
            <td>    
                
                <?php 
                $x = 0;
                foreach ($attachments as $attachment) {                    
                    $images[$x] = wp_get_attachment_image($attachment->ID, 'medium');
                    $imageIDs[$x] = $attachment->ID;                    
                ?>
                    <div id="pictureBox">
                        <div><?php echo $images[$x]; ?></div>
                        <div class="checkboxBox"><input type="checkbox" name="pictureToDelete[]" value="<?php echo $imageIDs[$x] ?>"/></div>
                    </div>
                <?php
                    $x++;                  
                }                  
                ?> 
                    <div class="clearfix"></div>
                    <div style="float: right">
                        <input type="submit" id="deleteButton" value="Delete selected images" />
                    </div>
            </td>
        </tr>
    </table>
</div>