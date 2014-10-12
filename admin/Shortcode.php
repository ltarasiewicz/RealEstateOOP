<?php

class Shortcode
{
    public function __construct($version) 
    {
        $this->version = $version;
    }    
    
    public function createShortcode()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/shortcodeForm.php';
    }
    
}