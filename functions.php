<?php

	add_filter('get_twig', 'add_to_twig');
	define('THEME_URL', get_template_directory_uri());

	function add_to_twig($twig){
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension(new Twig_Extension_StringLoader());
		return $twig;
	}

	function load_scripts(){
		wp_enqueue_script('jquery');		
	}

	function load_styles(){
		
		wp_register_style( 'screen', THEME_URL.'/dest/css/screen.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}

	function osort(&$array, $prop) {
    	usort($array, function($a, $b) use ($prop) {
        	return $a->$prop > $b->$prop ? 1 : -1;
    	}); 
	}

	register_activation_hook(__FILE__, 'my_activation');

	add_action('wp_enqueue_scripts', 'load_scripts');
	add_action('wp_enqueue_scripts', 'load_styles');

	add_theme_support('post-formats');
	add_theme_support('post-thumbnails');


add_action('init', 'cptui_register_my_cpt_mitarbeiter');
function cptui_register_my_cpt_mitarbeiter()
{
    register_post_type('mitarbeiter', array(
        'label'               => 'Mitarbeiter',
        'description'         => '',
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array('slug' => 'mitarbeiter', 'with_front' => true),
        'query_var'           => true,
        'exclude_from_search' => true,
        'supports'            => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'labels'              => array(
            'name'               => 'Mitarbeiter',
            'singular_name'      => 'Mitarbeiter',
            'menu_name'          => 'Mitarbeiter',
            'add_new'            => 'Neuer Mitarbeiter',
            'add_new_item'       => 'Mitarbeiter hinzufügen',
            'edit'               => 'Bearbeiten',
            'edit_item'          => 'Mitarbeiter bearbeiten',
            'new_item'           => 'Neuer Mitarbeiter',
            'view'               => 'Ansehen',
            'view_item'          => 'Mitarbeiter ansehen',
            'search_items'       => 'Mitarbeiter durchsuchen',
            'not_found'          => 'Keine Mitarbeiter gefunden',
            'not_found_in_trash' => 'Keine Mitarbeiter im Papierkorb gefunden',
            'parent'             => 'Übergeordneter Mitarbeiter',
        )
    ));
}
