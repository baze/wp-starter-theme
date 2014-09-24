<?php

if ( ! class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
    });
    return;
}

include(__DIR__ . '/inc/cpt-leistung.php');
include(__DIR__ . '/inc/cpt-job.php');
include(__DIR__ . '/inc/cpt-mitarbeiter.php');
include(__DIR__ . '/inc/cpt-produkt.php');
include(__DIR__ . '/inc/cpt-standort.php');

include(__DIR__ . '/inc/acf-company-info.php');
include(__DIR__ . '/inc/acf-legal.php');
include(__DIR__ . '/inc/acf-privacy-policy.php');

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
        add_action('init', array($this, 'register_strings'));
//        add_action('wp_enqueue_scripts', array($this, 'load_styles'));
//        add_action('wp_footer', array($this, 'load_scripts'));
        parent::__construct();
    }

    function register_post_types()
    {
        //this is where you can register custom post types
    }

    function register_strings()
    {
        // Datenschutz
        pll_register_string('datenschutz_preambel_title', 'Datenschutz', 'polylang', false);
        pll_register_string('datenschutz_preambel', get_field('datenschutz-preambel', 'options'), 'polylang', true);

        pll_register_string('datenschutz_like_title', 'Datenschutzerklärung für die Nutzung von Facebook-Plugins
        (Like-Button)', 'polylang', false);
        pll_register_string('datenschutz_like', get_field('datenschutz-like', 'options'), 'polylang', true);

        pll_register_string('datenschutz_analytics_title', 'Datenschutzerklärung für die Nutzung von Google Analytics', 'polylang', false);
        pll_register_string('datenschutz_analytics', get_field('datenschutz-analytics', 'options'), 'polylang', true);

        pll_register_string('datenschutz_adsense_title', 'Datenschutzerklärung für die Nutzung von Google Adsense', 'polylang', false);
        pll_register_string('datenschutz_adsense', get_field('datenschutz-adsense', 'options'), 'polylang', true);

        pll_register_string('datenschutz_plus_title', 'Datenschutzerklärung für die Nutzung von Google +1', 'polylang', false);
        pll_register_string('datenschutz_plus', get_field('datenschutz-plus', 'options'), 'polylang', true);

        pll_register_string('datenschutz_twitter_title', 'Datenschutzerklärung für die Nutzung von Twitter', 'polylang', false);
        pll_register_string('datenschutz_twitter', get_field('datenschutz-twitter', 'options'), 'polylang', true);

        // Impressum
        pll_register_string('disclaimer_anzeigen', get_field('disclaimer_anzeigen', 'options'), 'polylang', false);
        pll_register_string('haftung_fuer_inhalte', get_field('haftung-fuer-inhalte', 'options'), 'polylang', true);
        pll_register_string('haftung_fuer_links', get_field('haftung-fuer-links', 'options'), 'polylang', true);
        pll_register_string('urheberrecht', get_field('urheberrecht', 'options'), 'polylang', true);
        pll_register_string('firmenbezeichnung', get_field('firmenbezeichnung', 'options'), 'polylang', false);
        pll_register_string('strasse_hausnummer', get_field('strasse_hausnummer', 'options'), 'polylang', false);
        pll_register_string('postleitzahl', get_field('postleitzahl', 'options'), 'polylang', false);
        pll_register_string('ort', get_field('ort', 'options'), 'polylang', false);
        pll_register_string('vertretungsberechtigt', get_field('vertretungsberechtigt', 'options'), 'polylang', true);
        pll_register_string('telefon', get_field('telefon', 'options'), 'polylang', false);
        pll_register_string('telefax', get_field('telefax', 'options'), 'polylang', false);
        pll_register_string('email', get_field('e-mail', 'options'), 'polylang', false);
        pll_register_string('registereintrag_art', get_field('registereintrag-art', 'options'), 'polylang', true);
        pll_register_string('registergericht', get_field('registergericht', 'options'), 'polylang', true);
        pll_register_string('registernummer', get_field('registernummer', 'options'), 'polylang', true);
        pll_register_string('ust_id', get_field('ust-id', 'options'), 'polylang', false);

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
        $context['site'] = $this;

        $context['menu_primary'] = new TimberMenu("menu_primary");
        $context['menu_secondary'] = new TimberMenu("menu_secondary");
        $context['menu_custom'] = new TimberMenu("menu_custom");

        $context['options'] = get_fields('options');

        $context['language_switcher'] = pll_the_languages($args = [
            'show_names'             => 0,
            'show_flags'             => 1,
            'hide_if_empty'          => 0,
            'hide_if_no_translation' => 0,
            'hide_current'           => 0,
            'echo'                   => 0
        ]);

        $context['global_businessinfo_firmenbezeichnung'] = get_field('firmenbezeichnung', 'options');
        $context['global_businessinfo_strasse_hausnummer'] = get_field('strasse_hausnummer', 'options');
        $context['global_businessinfo_postleitzahl'] = get_field('postleitzahl', 'options');
        $context['global_businessinfo_ort'] = get_field('ort', 'options');
        $context['global_businessinfo_bundesland'] = get_field('bundesland', 'options');
        $context['global_businessinfo_telefon'] = get_field('telefon', 'options');
        $context['global_businessinfo_telefon_link'] = get_field('telefon-link', 'options');
        $context['global_businessinfo_telefax'] = get_field('telefax', 'options');
        $context['global_businessinfo_telefax_link'] = get_field('telefax-link', 'options');
        $context['global_businessinfo_email'] = get_field('e-mail', 'options');
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
