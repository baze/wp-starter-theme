<?php

if ( ! class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
    });
    return;
}

include(__DIR__ . '/_includes/cpt-leistung.php');
include(__DIR__ . '/_includes/cpt-mitarbeiter.php');
include(__DIR__ . '/_includes/cpt-job.php');
include(__DIR__ . '/_includes/cpt-standort.php');

include(__DIR__ . '/_includes/acf-leistung.php');
include(__DIR__ . '/_includes/acf-mitarbeiter.php');
include(__DIR__ . '/_includes/acf-job.php');
include(__DIR__ . '/_includes/acf-standort.php');

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
//        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_taxonomies'));
        add_action('init', array($this, 'register_menus'));
//        add_action('wp_enqueue_scripts', array($this, 'load_styles'));
//        add_action('wp_footer', array($this, 'load_scripts'));
        parent::__construct();
    }

    function register_post_types()
    {
        //this is where you can register custom post types
        cptui_register_my_cpt_mitarbeiter();
        cptui_register_my_cpt_standort();
        cptui_register_my_cpt_leistung();
        cptui_register_my_cpt_job();
    }

    function register_taxonomies()
    {
        //this is where you can register custom taxonomies
    }

    function register_menus()
    {
        register_nav_menus(array(
            'menu_primary' => __('Hauptmenü', 'euw'),
            'menu_secondary' => __('Footermenü', 'euw'),
            'menu_custom' => __('Benutzerdefiniertes Menü', 'euw')
        ));
    }

    function add_to_context($context)
    {
        $context['foo'] = 'bar';
        $context['stuff'] = 'I am a value set in your functions.php file';
        $context['notes'] = 'These values are available everytime you call Timber::get_context();';
        $context['menu_primary'] = new TimberMenu("menu_primary");
        $context['menu_secondary'] = new TimberMenu("menu_secondary");
        $context['menu_custom'] = new TimberMenu("menu_custom");
        $context['site'] = $this;
        $context['template_directory_uri'] = get_template_directory_uri();
//        $context['my-option-field'] = get_field('my-option-field', 'option');
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
//        wp_register_style('screen', THEME_URL . '/dest/css/screen.css', '', '', 'screen');
//        wp_enqueue_style('screen');
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
