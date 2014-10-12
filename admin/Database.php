<?php
/**
 * Class responsible for saving and retrieving data from the WP database
 *
 * @author ltarasiewicz
 */
class Database {

    protected $version;
    
    // Validator class object
    protected $validator;
    
    public function __construct($version) 
    {
        $this->version = $version;
        
        $this->loadDependancies();
        
        $this->validator = new Validator($this->version);
        
    }   
    
    public function loadDependancies()
    {
        require_once plugin_dir_path(__FILE__) . 'Validator.php';
    }
    
    public function saveRealEstate($id) 
    {
        
        if( count($_POST) && get_post_type($id) == 'real_estate' ) {
                      
            $area = esc_html(get_post_meta($id, 'real_estate_area', true));
            $price = esc_html(get_post_meta($id, 'real_estate_price', true));
            $address = esc_html(get_post_meta($id, 'real_estate_address', true));
            
            $new_area = sanitize_text_field($_POST['realEstateArea']);
            $new_price = sanitize_text_field($_POST['realEstatePrice']);  
            $new_address = sanitize_text_field($_POST['realEstateAddress']);  
            
            if ($this->validator->validateNumeric($new_area)) {
                
                update_post_meta($id, 'real_estate_area', $new_area, $area);  
                
            }

            if ($this->validator->validateNumeric($new_price)) {
                
                update_post_meta($id, 'real_estate_price', $new_price, $price);                
                
            } 

            update_post_meta($id, 'real_estate_address', $new_address, $address);
            
            
            $attachmentId = media_handle_upload('realEstatePicture', $_POST['postID']);
            
            
        }
        
    }
    
    public function ajaxFormInsert()
    {
        global $wpdb;

        $title = esc_textarea($_POST['realEstateTitle']);
        $price = intval($_POST['realEstatePrice']);
        $area = intval($_POST['realEstateArea']);
        $address = esc_textarea($_POST['realEstateAddress']);
        $description = esc_textarea($_POST['realEstateDescription']);
        $type = intval($_POST['realEstateType']);
        $date = current_time('mysql');

        $data = array(
            'post_author' => 2,
            'post_date' => $date,
            'post_content' =>   $description,
            'post_title'    =>  $title,
            'post_status'   =>  'draft',
            'post_type' =>  'real_estate',
            'post_name' =>  sanitize_title($title)        
        );

        $postsTable = $wpdb->prefix . 'posts';

        $wpdb->insert($postsTable, $data);

        $newPostID = $wpdb->insert_id;

        $metaPrice = array(
            'post_id'   =>  $newPostID,
            'meta_key'  =>  'real_estate_price',
            'meta_value'    =>  $price
        );

        $metaArea = array(
            'post_id'   =>  $newPostID,
            'meta_key'  =>  'real_estate_area',
            'meta_value'    =>  $area        
        );

        $metaAddress = array(
            'post_id'   =>  $newPostID,
            'meta_key'  =>  'real_estate_address',
            'meta_value'    =>  $address
        );

        $taxonomy = array(
            'object_id' =>  $newPostID,
            'term_taxonomy_id'  =>  $type,
        );

        $metaTable = $wpdb->prefix . 'postmeta';
        $taxonomyTable = $wpdb->prefix . 'term_relationships';
        $wpdb->insert($metaTable, $metaPrice);
        $wpdb->insert($metaTable, $metaArea);
        $wpdb->insert($metaTable, $metaAddress);
        $wpdb->insert($taxonomyTable, $taxonomy);   
        
        media_handle_upload('realEstatePicture', $newPostID);
        
        die();
    }
    
}
