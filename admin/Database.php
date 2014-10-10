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
        
        $this->validator = new Validator;
        
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
            
//            $file = $_FILES['realEstatePicture'];                        
//            unset($_FILES);
//            $fileSplit;
//            
//            $numberOfFiles = sizeof($file['name']);           
// 
//            for($i=0; $i<$numberOfFiles; $i++){
//                
//                    $fileSplit[$i]['name'] = $file['name'][$i];
//                    $fileSplit[$i]['type'] = $file['type'][$i];
//                    $fileSplit[$i]['tmp_name'] = $file['tmp_name'][$i];
//                    $fileSplit[$i]['error'] = $file['error'][$i];
//                    $fileSplit[$i]['name'] = $file['name'][$i];
//                    $fileSplit[$i]['size'] = $file['size'][$i];
//            }
//            
//            for($i=0; $i<numberOfFiles; $i++) {
//                
//                $_FILES['realEstatePicture'] = $fileSplit[$i];
//                media_handle_upload('realEstatePicture', $_POST['postID']);
//                
//            }
            
            $attachmentId = media_handle_upload('realEstatePicture', $_POST['postID']);
            
                                    
        }
        
    }
    
}
