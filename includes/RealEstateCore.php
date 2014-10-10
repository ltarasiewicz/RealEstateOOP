<?php

/**
 * 
 */

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
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/CustomPostType.php';
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/Enqueue.php';
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/MetaBox.php';
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/Taxonomy.php';
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/GeneralAdmin.php';
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/Database.php';
        
        require_once plugin_dir_path(__FILE__) . 'RealEstateLoader.php';
        
        $this->loader = new RealEstateLoader();
        
    }
    
    public function defineAdminHooks() {
        
        $metaBox = new MetaBox($this->getVersion());
        $customPost = new CustomPostType($this->getVersion());
        $customTaxonomy = new Taxonomy($this->getVersion());
        $enqueue = new Enqueue($this->getVersion());
        $admin = new GeneralAdmin($this->getVersion());
        $db = new Database($this->getVersion());
        
        $this->loader->addAction('admin_enqueue_scripts', $enqueue, 'enqueueStyles');
        $this->loader->addAction('add_meta_boxes', $metaBox, 'addMetaBoxes');
        $this->loader->addAction('init', $customPost, 'registerCustomPostType');
        $this->loader->addAction('init', $customTaxonomy, 'registerHousesTaxonomy');
        $this->loader->addAction('post_edit_form_tag', $admin, 'addEnctype');
        $this->loader->addAction('save_post', $db, 'saveRealEstate');
        
    }
    
    public function run() {
        
        $this->loader->run();
        
    }
    
    public function getVersion() {
        
        return $this->version;
        
    }
}