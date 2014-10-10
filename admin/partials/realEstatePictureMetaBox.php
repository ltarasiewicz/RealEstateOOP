<?php
/**
 * Access attached images
 */
$args = array(
    'post_type' =>  'attachment',
    'post_parent'   =>  $realEstate->ID,                     
);

$attachments = get_posts($args); 

//foreach ($attachments as $attachment) {
//    $images[] =  wp_get_attachment_image($attachment->ID, 'medium');
//}
//
//$numberOfPictures = count($images);

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
                    echo $images[$x] . '</br>';
                    ?>
                    <form>
                        <input type="hidden" value="" />
                        <input type="submit" value="Delete image" />
                    </form>
                    </br>
                    <?php
                    $x++;
                    
                }
                
                for($i=0; $i<$numberOfPictures; $i++) {
                    echo $images[$i] . '</br>';                   
                    ?>
                    <form>
                        <input type="hidden" value="" />
                        <input type="submit" value="Delete image" />
                    </form>
                    </br>
                    <?php
                }
                ?>                               
            </td>
        </tr>
    </table>
 
</div>