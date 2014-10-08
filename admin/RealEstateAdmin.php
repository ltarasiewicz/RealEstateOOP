<?php

class RealEstateAdmin
{
    protected $version;
    
    public function __construct($version) {
        $this->version = $version;
    }
    
    public function enqueueStyles() {
        
//        wp_enqueue_style(
//            
//        );
        
    }
    
    public function addMetaBoxes() {
        add_meta_box(
            'realEstateArea',
            'Metraż',
            array( $this, 'renderRealEstateArea' ),
            'post',
            'normal',
            'core'
        );
    }
    
    public function renderRealEstateArea() {
        require_once plugin_dir_path(__FILE__) . 'partials/real-estate-meta-box.php';
    }
}