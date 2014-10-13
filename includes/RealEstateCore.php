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
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/Shortcode.php';
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'helpers/file-handler.php';
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'helpers/helpers.php';
        
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
        $shortcode = new Shortcode($this->getVersion());
        $validator = new Validator($this->getVersion());
        
        $this->loader->addAction('admin_enqueue_scripts', $enqueue, 'enqueueAdminStyles');
        $this->loader->addAction('admin_enqueue_scripts', $enqueue, 'enqueueAdminScripts');
        $this->loader->addAction('wp_enqueue_scripts', $enqueue, 'enqueueCustom');
        $this->loader->addAction('wp_enqueue_scripts', $enqueue, 'enqueueUploader');
        $this->loader->addAction('wp_enqueue_scripts', $enqueue, 'ajaxFormEnqueue');
        $this->loader->addAction('add_meta_boxes', $metaBox, 'addMetaBoxes');
        $this->loader->addAction('init', $customPost, 'registerCustomPostType');
        $this->loader->addAction('init', $customTaxonomy, 'registerHousesTaxonomy');
        $this->loader->addAction('post_edit_form_tag', $admin, 'addEnctype');
        $this->loader->addAction('save_post', $db, 'saveRealEstate');
        
        $this->loader->addAction('wp_ajax_realEstateForm', $validator, 'ajaxFormCheck');
        $this->loader->addAction('wp_ajax_nopriv_realEstateForm', $validator, 'ajaxFormCheck');
        
        $this->loader->addAction('wp_ajax_realEstateFormInsert', $db, 'ajaxFormInsert');
        $this->loader->addAction('wp_ajax_nopriv_realEstateFormInsert', $db, 'ajaxFormInsert');        
        
        $this->loader->addFilter('single_template', $admin, 'createSingleTemplate');
        $this->loader->addShortcode('realestate', $shortcode, 'createShortcode');
              
        
    }
    
    public function run() {
        
        $this->loader->run();
        
    }
    
    public function getVersion() {
        
        return $this->version;
        
    }
}