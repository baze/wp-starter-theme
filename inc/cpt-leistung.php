<?php

add_action('init', 'cptui_register_my_cpt_leistung');
function cptui_register_my_cpt_leistung()
{
    register_post_type('leistung', array(
        'label'           => 'Leistungen',
        'description'     => '',
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'map_meta_cap'    => true,
        'hierarchical'    => false,
        'rewrite'         => array('slug' => 'leistungen', 'with_front' => true),
        'query_var'       => true,
        'supports'        => array('title', 'editor', 'excerpt', 'custom-fields', 'revisions', 'thumbnail', 'author', 'page-attributes'),
        'labels'          => array(
            'name'               => 'Leistungen',
            'singular_name'      => 'Leistung',
            'menu_name'          => 'Leistungen',
            'add_new'            => 'Hinzufügen',
            'add_new_item'       => 'Neue Leistung',
            'edit'               => 'Bearbeiten',
            'edit_item'          => 'Leistung bearbeiten',
            'new_item'           => 'Neue Leistung',
            'view'               => 'Ansehen',
            'view_item'          => 'Leistung ansehen',
            'search_items'       => 'Leistungen durchsuchen',
            'not_found'          => 'Keine Leistungen gefunden',
            'not_found_in_trash' => 'Keine Leistungen im Papierkorb gefunden',
            'parent'             => 'Übergeordnete Leistung',
        )
    ));
}

include(__DIR__ . '/acf-leistung.php');