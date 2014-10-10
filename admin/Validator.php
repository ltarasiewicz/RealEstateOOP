<?php

/**
 * Class responsible for validating user input fields from real_estate custom
 * post meta boxes
 *
 * @author ltarasiewicz
 */
class Validator {
        
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
}
