<?php

class RealEstateLoader
{
    protected $actions;
    protected $filters;
    
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
            addFilter($hook['hook'], array($hook['component'], $hook['callback']));
        }
        
        foreach ($this->actions as $hook) {
            addAction($hook['hook'], array($hook['component'], $hook['callback']));
        }        
        
    }
}