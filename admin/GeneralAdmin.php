<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class that provides general, helper adminstration methods
 *
 * @author ltarasiewicz
 */
class GeneralAdmin {

    protected $version;
    
    public function __construct($version) {
        $this->version = $version;
    }   
    
    public function addEnctype()
    {
        echo 'enctype="multipart/form-data"';
    }
    
    public function createSingleTemplate($singleTemplate) 
    {
        if (get_post_type() == 'real_estate') {
            $singleTemplate = plugin_dir_path(dirname(__FILE__)) . 'single-real_estate.php';
        }
        
        return $singleTemplate;
        
    }
    
    
}
