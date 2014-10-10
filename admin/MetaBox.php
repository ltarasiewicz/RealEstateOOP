<?php

/**
 * Class responsible for adding meta boxes
 */


class MetaBox
{
    protected $version;
    
    public function __construct($version) {
        $this->version = $version;
    }       
       
    public function addMetaBoxes() 
    {
        
        add_meta_box(
            'realEstateArea',
            'Metraż',
            array( $this, 'renderRealEstateArea' ),
            'real_estate',
            'normal',
            'core'
        );
        
        add_meta_box(
            'realEstatePrice',
            'Cena',
            array( $this, 'renderRealEstatePrice' ),
            'real_estate',
            'normal',
            'core'
        );

        add_meta_box(
            'realEstateAddress',
            'Adres',
            array( $this, 'renderRealEstateAddress' ),
            'real_estate',
            'normal',
            'core'
        );  
        
        add_meta_box(
            'realEstatePicture',
            'Zdjęcia',
            array( $this, 'renderRealEstatePicture' ),
            'real_estate',
            'normal',
            'core'
        );          
        
    }
    
    public function renderRealEstateArea($realEstate) 
    {
        $area = esc_html(get_post_meta($realEstate->ID, 'real_estate_area', true));
        
        require_once plugin_dir_path(__FILE__) . 'partials/realEstateAreaMetaBox.php';
    }
    
    public function renderRealEstatePrice($realEstate) 
    {
        $price = esc_html(get_post_meta($realEstate->ID, 'real_estate_price', true));
        
        require_once plugin_dir_path(__FILE__) . 'partials/realEstatePriceMetaBox.php';
    }
    
    public function renderRealEstateAddress($realEstate) 
    {       
        $address = esc_html(get_post_meta($realEstate->ID, 'real_estate_address', true));
        
        require_once plugin_dir_path(__FILE__) . 'partials/realEstateAddressMetaBox.php';
    }
    
    public function renderRealEstatePicture($realEstate) 
    {
        require_once plugin_dir_path(__FILE__) . 'partials/realEstatePictureMetaBox.php';
    }    
    
}