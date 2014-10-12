<?php

function getPostAttachments($currentPost) {
    
    $args = array(
    'post_type' =>  'attachment',
    'post_parent'   =>  $currentPost->ID,                     
    );

    $attachments = get_posts($args);
    
    return $attachments;
    
}