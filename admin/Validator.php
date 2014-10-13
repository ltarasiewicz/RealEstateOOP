<?php

/**
 * Class responsible for validating user input fields from real_estate custom
 * post meta boxes
 *
 * @author ltarasiewicz
 */
class Validator {
        
    protected $version;
    
    public function __construct($version) 
    {
        $this->version = $version;
    }


    /**
     * Method checks if input is a numeric value
     */
    public function validateNumeric($input)
    {
        if (is_numeric($input)) {
            
            return true;
            
        }
        
        return false;
        
    }    
    
    public function ajaxFormCheck()
    {
        $error = '';

        if ($_POST['realEstateTitle'] != esc_textarea($_POST['realEstateTitle']) 
                || $_POST['realEstateTitle'] == '') {
            $error[] = 'realEstateTitle';       
        }
        if (filter_var( $_POST['realEstatePrice'], FILTER_SANITIZE_NUMBER_INT) != $_POST['realEstatePrice'] 
                || $_POST['realEstatePrice'] == '') {
            $error[] = 'realEstatePrice';       
        }    
        if (filter_var( $_POST['realEstateArea'], FILTER_SANITIZE_NUMBER_INT) != $_POST['realEstateArea'] 
                || $_POST['realEstateArea'] == '') {
            $error[] = 'realEstateArea';       
        }    
        if ($_POST['realEstateAddress'] != esc_textarea($_POST['realEstateAddress']) 
                || $_POST['realEstateAddress'] == '') {
            $error[] = 'realEstateAddress';       
        }    
        if ($_POST['realEstateDescription'] != esc_textarea($_POST['realEstateDescription']) 
                || $_POST['realEstateDescription'] == '') {
            $error[] = 'realEstateDescription';       
        }      
              
        
//        if ($_POST['realEstateType'] == '') {
//            $error[] = 'realEstateType';       
//        }   
                
        echo json_encode($error);

        die();        
    }
}
