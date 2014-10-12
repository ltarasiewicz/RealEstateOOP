<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Enqueue
 *
 * @author ltarasiewicz
 */
class Enqueue 
{
    
    protected $version;
    
    public function __construct($version) {
        $this->version = $version;
    }        

    public function enqueueAdminStyles() 
    {
        
        wp_enqueue_style('customStyles', plugins_url('', dirname(__FILE__)) . '/admin/css/real-estate-styles.css', array(), '11102014');
        
    }     
    
    public function enqueueAdminScripts()
    {
        wp_enqueue_script('customScripts', plugins_url('', dirname(__FILE__)) . '/js/scripts.js', array(), '10102014');
    }
    
    public function enqueueCustom()
    {
        wp_enqueue_script('customScripts', plugins_url('', dirname(__FILE__)) . '/js/scripts.js', array('jquery', 'uploader'), '12102014');
    }
    
    public function enqueueUploader()
    {
        wp_enqueue_style('uploaderCSS', plugins_url('', dirname(__FILE__)) . '/js/uploader/uploadfile.css', array(), '12102014');
        wp_enqueue_script('uploader', plugins_url('', dirname(__FILE__)) . '/js/uploader/jquery.uploadfile.min.js', array('jquery'), '12102014');
        
    }
    
    public function ajaxFormEnqueue() 
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('ajaxformjs', plugins_url('', dirname(__FILE__)) . '/js/ajaxform.js', array('jquery'));

        $localize = array(
            'ajaxurl'  =>   admin_url('admin-ajax.php')
        );

        wp_localize_script('ajaxformjs', 'ajaxForm', $localize);        
    }
    
}
