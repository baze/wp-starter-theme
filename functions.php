<?php

if ( ! class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
    });
    return;
}

define('THEME_URL', get_template_directory_uri());

class StarterSite extends TimberSite
{
    function __construct()
    {
        add_theme_support('post-formats');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_filter('timber_context', array($this, 'add_to_context'));
        add_filter('get_twig', array($this, 'add_to_twig'));
        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_taxonomies'));
        add_action('wp_enqueue_scripts', array($this, 'load_styles'));
        add_action('wp_footer', array($this, 'load_scripts'));
        parent::__construct();
    }

    function register_post_types()
    {
        //this is where you can register custom post types
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

    function register_taxonomies()
    {
        //this is where you can register custom taxonomies
    }

    function add_to_context($context)
    {
        $context['foo'] = 'bar';
        $context['stuff'] = 'I am a value set in your functions.php file';
        $context['notes'] = 'These values are available everytime you call Timber::get_context();';
        $context['menu'] = new TimberMenu();
        $context['site'] = $this;
        return $context;
    }

    function add_to_twig($twig)
    {
        /* this is where you can add your own fuctions to twig */
        $twig->addExtension(new Twig_Extension_StringLoader());
        $twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
        return $twig;
    }

    function load_styles()
    {
        wp_register_style('screen', THEME_URL . '/dest/css/screen.css', '', '', 'screen');
        wp_enqueue_style('screen');
    }

    function load_scripts()
    {
        wp_enqueue_script('main', THEME_URL . '/dest/js/bundle.js', array(), '20140916', true);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

}

new StarterSite();

function myfoo($text)
{
    $text .= ' bar!';
    return $text;
}
