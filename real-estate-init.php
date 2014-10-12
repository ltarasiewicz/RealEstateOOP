<?php
/*
 * Plugin Name:       Real Estate Manager
 * Description:       A simple plugin for managing a real estate agency
 * Version:           0.0.1
 * Author:            Łukasz Tarasiewicz
 * Author URI:        https://github.com/ltarasiewicz
 * License:           GPL
 */
 
if ( ! defined( 'WPINC' ) ) {
    die;
}

require_once plugin_dir_path(__FILE__) . 'includes/RealEstateCore.php';


function runRealEstateCore() {
    $rec = new RealEstateCore();
    $rec->run();    
}

runRealEstateCore();