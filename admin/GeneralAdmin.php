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
    
}
