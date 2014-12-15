<?php

if ( ! class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
    });
    return;
}

//include(__DIR__ . '/_inc/cpt/cpt-event.php');
//include(__DIR__ . '/_inc/cpt/cpt-service.php');

//include(__DIR__ . '/_inc/cpt-leistung.php');
//include(__DIR__ . '/_inc/cpt-job.php');

include(__DIR__ . '/_inc/cpt/cpt-mitarbeiter.php');
include( __DIR__ . '/_inc/acf/acf-mitarbeiter.php' );

//include(__DIR__ . '/_inc/cpt-produkt.php');
//include(__DIR__ . '/_inc/cpt-standort.php');

include(__DIR__ . '/_inc/acf/acf-company-info.php');
include(__DIR__ . '/_inc/acf/acf-legal.php');
include(__DIR__ . '/_inc/acf/acf-privacy-policy.php');

include( __DIR__ . '/_inc/acf/acf-front-page.php' );
include( __DIR__ . '/_inc/acf/acf-flexible-content.php' );

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
        if (function_exists('pll_register_string')) {
            // Datenschutz
            register_string( 'Datenschutz' );
            register_string( get_field( 'datenschutz-preambel', 'options' ), 'euw', true );
            register_string( 'Datenschutzerklärung für die Nutzung von Facebook-Plugins (Like-Button)' );
            register_string( get_field( 'datenschutz-like', 'options' ), 'euw', true );
            register_string( 'Datenschutzerklärung für die Nutzung von Google Analytics' );
            register_string( get_field( 'datenschutz-analytics', 'options' ), 'euw', true );
            register_string( 'Datenschutzerklärung für die Nutzung von Google Adsense' );
            register_string( get_field( 'datenschutz-adsense', 'options' ), 'euw', true );
            register_string( 'Datenschutzerklärung für die Nutzung von Google +1' );
            register_string( get_field( 'datenschutz-plus', 'options' ), 'euw', true );
            register_string( 'Datenschutzerklärung für die Nutzung von Twitter' );
            register_string( get_field( 'datenschutz-twitter', 'options' ), 'euw', true );

            // Impressum
            register_string( 'Disclaimer' );
            register_string( get_field( 'disclaimer_anzeigen', 'options' ), 'euw', false );
            register_string( 'Haftung für Inhalte' );
            register_string( get_field( 'haftung-fuer-inhalte', 'options' ), 'euw', true );
            register_string( 'Haftung für Links' );
            register_string( get_field( 'haftung-fuer-links', 'options' ), 'euw', true );
            register_string( 'Urheberrecht' );
            register_string( get_field( 'urheberrecht', 'options' ), 'euw', true );

            // tmg
            register_string( 'Angaben gemäß § 5 TMG:' );
            register_string( get_field( 'firmenbezeichnung', 'options' ), 'euw', false );
            register_string( get_field( 'strasse_hausnummer', 'options' ), 'euw', false );
            register_string( get_field( 'postleitzahl', 'options' ), 'euw', false );
            register_string( get_field( 'ort', 'options' ), 'euw', false );
            register_string( 'Vertreten durch:' );
            register_string( get_field( 'vertretungsberechtigt', 'options' ), 'euw', true );
            register_string( 'Kontakt' );
            register_string( 'Telefon:' );
            register_string( get_field( 'telefon', 'options' ), 'euw', false );
            register_string( 'Telefax:' );
            register_string( get_field( 'telefax', 'options' ), 'euw', false );
            register_string( 'E-Mail:' );
            register_string( get_field( 'e-mail', 'options' ), 'euw', false );
            register_string( 'Registereintrag' );
            register_string( get_field( 'registereintrag-art', 'options' ), 'euw', true );
            register_string( get_field( 'registergericht', 'options' ), 'euw', true );
            register_string( get_field( 'registernummer', 'options' ), 'euw', true );
            register_string( 'Umsatzsteuer-ID:' );
            register_string( 'Umsatzsteuer-Identifikationsnummer gemäß §27 a Umsatzsteuergesetz:' );
            register_string( get_field( 'ust-id', 'options' ), 'euw', false );

            // Custom
            register_string( 'Telefon' );
            register_string( 'E-Mail' );
            register_string( 'Alle Rechte vorbehalten.' );
            register_string( 'Mehr erfahren' );

//            register_string( 'Sorry' );
//            register_string( "we couldn't find what you're looking for" );
        }

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

        if (function_exists('get_fields')) {
            $context['options'] = get_fields( 'options' );
        }

        if (function_exists('pll_the_languages')) {
            $context['language_switcher'] = pll_the_languages( $args = [
                'show_names'             => 0,
                'show_flags'             => 1,
                'hide_if_empty'          => 0,
                'hide_if_no_translation' => 0,
                'hide_current'           => 0,
                'echo'                   => 0
            ] );
        }

        if (function_exists('get_field')) {
            $context['global_businessinfo_firmenbezeichnung']  = get_field( 'firmenbezeichnung', 'options' );
            $context['global_businessinfo_strasse_hausnummer'] = get_field( 'strasse_hausnummer', 'options' );
            $context['global_businessinfo_postleitzahl']       = get_field( 'postleitzahl', 'options' );
            $context['global_businessinfo_ort']                = get_field( 'ort', 'options' );
            $context['global_businessinfo_bundesland']         = get_field( 'bundesland', 'options' );
            $context['global_businessinfo_telefon']            = get_field( 'telefon', 'options' );
            $context['global_businessinfo_telefon_link']       = get_field( 'telefon-link', 'options' );
            $context['global_businessinfo_telefax']            = get_field( 'telefax', 'options' );
            $context['global_businessinfo_telefax_link']       = get_field( 'telefax-link', 'options' );
            $context['global_businessinfo_email']              = get_field( 'e-mail', 'options' );
        }

        $context['analyticsProfile'] = 'UA-49457421-XX';

        return $context;
    }

    function add_to_twig($twig)
    {
        /* this is where you can add your own fuctions to twig */
        $twig->addExtension(new Twig_Extension_StringLoader());
        $twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
        $twig->addFunction(new Twig_SimpleFunction('srcset_post_thumbnail', 'srcset_post_thumbnail'));
        $twig->addFunction(new Twig_SimpleFunction('placeholder', 'placeholder_image'));
        $twig->addFunction(new Twig_SimpleFunction('_e', 'get_translation'));
        $twig->addFunction(new Twig_SimpleFunction('duration', 'eventDuration'));
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

function srcset_post_thumbnail($defaultSize = 'medium')
{
    $thumbnailSizes = [
        'thumbnail',
        'medium',
        'large',
        'full'
    ];

    $html = '<img ';
    $html .= 'srcset="';

    $thumb_id = get_post_thumbnail_id();

    for ($i = 0; $i < count($thumbnailSizes); $i++) {
        $thumb = wp_get_attachment_image_src($thumb_id, $thumbnailSizes[$i], true);

        $url = $thumb[0];
        $width = $thumb[1];

        $html .= $url . ' ' . $width . 'w';

        if ($i < count($thumbnailSizes) - 1) {
            $html .= ', ';
        }
    }

    $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);

    $thumbMedium = wp_get_attachment_image_src($thumb_id, $defaultSize, true);

    $html .= '" ';
    $html .= 'sizes="';
    $html .= '(max-width: 48em) 672px, ';
    $html .= '(max-width: 60em) 1080px, ';
    $html .= '(max-width: 75em) 1425px';
    $html .= '"';
    $html .= 'src="' . $thumbMedium[0] . '" alt="' . $alt . '">';

    return $html;
}

function placeholder_image($width = 48, $height = 48)
{
//    return "http://www.lorempixel.com/g/{$width}/{$height}/";
    return "http://placehold.it/{$width}x{$height}";
}

function register_string($string, $domain = 'polylang', $multiline = false) {
    $slug = sanitize_title( $string );
    pll_register_string( $slug, $string, $domain, $multiline );
}

function get_translation( $translated_text, $domain = 'polylang') {

    if (function_exists('pll__')) {
        $translated_text = pll__( $translated_text, $domain );
    }

    return $translated_text;
}

function eventDuration($event) {
    $startDate = new DateTime( $event->get_field('event-start') );
    $endDate = new DateTime( $event->get_field( 'event-end' ) );
    $duration  = $startDate->diff( $endDate->add( new DateInterval( 'P1D' ) ) );

    return $duration->format('%a');
}

function dd($value) {
    die( var_dump( $value ) );
}