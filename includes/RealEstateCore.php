<?php

class RealEstateCore
{
    protected $loader;
    protected $plugin_slug;
    protected $version;
    
    public function __construct() {
        
        $this->plugin_slug = 'single-post-meta-manager-slug';
        $this->version = '0.0.1';
        
        $this->loadDependancies();
        $this->defineAdminHooks();
        
    }
    
    public function loadDependancies() {
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/RealEstateAdmin.php';
        
        require_once plugin_dir_path(__FILE__) . 'RealEstateLoader.php';
        
        $this->loader = new RealEstateLoader();
        
    }
    
    public function defineAdminHooks() {
        
        $admin = new RealEstateAdmin($this->getVersion());
        $this->loader->addAction('admin_enqueue_scripts', $admin, 'enqueueStyles');
        $this->loader->addAction('add_meta_boxes', $admin, 'addMetaBoxes');
        
    }
    
    public function run() {
        
        $this->loader->run();
        
    }
    
    public function getVersion() {
        
        return $this->version;
        
    }
}