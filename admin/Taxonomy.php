<?php

/**
 * Class responsible for registering new taxonomies
 *
 * @author ltarasiewicz
 */
class Taxonomy {
    
    protected $version;
    
    public function __construct($version) {
        $this->version = $version;
    }    
    
    public function registerHousesTaxonomy()
    {
        
        $labels = array(
            'name'  => _x('Rodzaje nieruchomości', 'houses_domy', 'text_domain'),
            'singular_name' =>  _x('Rodzaj nieruchomości', 'houses_domy', 'text_domain'),
            'search_items'  => __('Szukaj nieruchomości', 'text_domain'),
            'popular_items' =>  __('Popularne nieruchomości', 'text_domain'),
            'all_items' =>  __('Wszystkie nieruchomości', 'text_domain'),
            'parent_item'   =>  __('Grupa', 'text_domain'),
            'parent_item_colon' =>  __('Grupa', 'text_domain'),     
            'edit_item' =>  __('Edytuj', 'text_domain'),
            'update_item'   =>  __('Zmień', 'text_domain'),
            'add_new_item'  =>  __('Dodaj nowy rodzaj', 'text_domain'),
            'new_item_name' =>  __('Nowy rodzaj', 'text_domain'),
            'add_or_remove_items'   =>  __('Dodaj lub usuń rodzaj', 'text_domain'),
            'choose_from_most_used' =>  __('Najpopularniejsze', 'text_domain'),
            'menu_name' =>  __('Radzaje', 'text_domain'),
        );

        $args = array(
            'public'    =>  true,
            'labels'    =>  $labels,
            'draft' => true,
            'show_in_nav_menus' => true,
            'hierarchical' => true,
            'show_tagcloud' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'show_admin_column' => false,        
        );

        register_taxonomy('houses', 'real_estate', $args);         
    }
}
