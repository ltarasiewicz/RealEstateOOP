<?php

/**
 * Class responsible for coordinating actions and filters between the core 
 * plugin class (RealEstateCore) and administration (admin) classes
 */
class RealEstateLoader
{
    protected $actions;
    protected $filters;
    protected $shortcodes;
    
    public function __construct() {
        
        $this->actions = array();        
        $this->filters = array();
    }
    
    public function addAction($hook, $component, $callback) {
        
        $this->actions = $this->add($this->actions, $hook, $component, $callback);
        
    }
    
    public function addFilter($hook, $component, $callback) {
        
        $this->filters = $this->add($this->filters, $hook, $component, $callback);   
        
    }
    
    public function addShortcode($hook, $component, $callback) {
        
        $this->shortcodes = $this->add($this->shortcodes, $hook, $component, $callback);   
        
    }    
    
    public function add($hooks, $hook, $component, $callback) {
        
        $hooks[] = array(
            'hook'      =>  $hook,
            'component' =>  $component,
            'callback'  =>  $callback,
            
        );
        
        return $hooks;
    }
    
    public function run() {
        
        foreach ($this->filters as $hook) {
            add_filter($hook['hook'], array($hook['component'], $hook['callback']));
        }
        
        foreach ($this->actions as $hook) {
            add_action($hook['hook'], array($hook['component'], $hook['callback']));
        }     
        
        foreach ($this->shortcodes as $hook) {
            add_shortcode($hook['hook'], array($hook['component'], $hook['callback']));
        }
        
    }
}