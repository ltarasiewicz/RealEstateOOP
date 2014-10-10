<?php
/**
 * Class resposnibel for registering custom post types
 *
 * @author ltarasiewicz
 */
class CustomPostType {
    
    protected $version;
    
    public function __construct($version) {
        $this->version = $version;
    }
    
    public function registerCustomPostType() {

        register_post_type('real_estate', array(
            'labels' => array(
                'name'  =>  'Nieruchomości',
                'add_new'   =>  'Dodaj',
                'add_new_item'  =>  'Dodaj nową nieruchomość',
                'edit_item' =>  'Edytuj nieruchomość',
                'new_item'  =>  'Nowa nieruchomość',
                'view_item' =>  'Pokaż nieruchomość',
                'search_items'  =>  'Szukaj nieruchomości',
                'not_found' =>  'Nieruchomość nie została znaleziona',
                'not_found_in_trash'    =>  'Nieruchomość nie została znaleziona w koszu',
                'parent_item_colon' =>  'Poprzednia nieruchoność',            
            ),
            'description'   =>  'Rodzaj postów do zarządzania nieruchomościami',
            'public'    =>  true,
            'menu_position' =>  20,
            'supports'  =>  array('title', 'editor', 'comments', 'thumbnail'),
            'has_archive'   =>  true,
            'show_in_nav_menus' =>  true,
            'taxonomies'    =>  array('Domy'),      
            )
        );       
    }   
}
