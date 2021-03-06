<?php

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id'         => 'acf_poduct',
        'title'      => 'Podukt',
        'fields'     => array(
            array(
                'key'   => 'field_542175a819a5c',
                'label' => 'Produktinfos',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'          => 'field_5421760419a5e',
                'label'        => 'Produktnummern',
                'name'         => 'produkt-description-additional-sku-list',
                'type'         => 'repeater',
                'sub_fields'   => array(
                    array(
                        'key'           => 'field_5421763d19a5f',
                        'label'         => 'Art der Produktnummer',
                        'name'          => 'produkt-description-additional-sku-list-entry-type',
                        'type'          => 'text',
                        'instructions'  => 'Um welche Art der Produktnummer handelt es sich?',
                        'column_width'  => '',
                        'default_value' => 'Artikelnummer:',
                        'placeholder'   => '',
                        'prepend'       => '',
                        'append'        => '',
                        'formatting'    => 'html',
                        'maxlength'     => '',
                    ),
                    array(
                        'key'           => 'field_5421769819a60',
                        'label'         => 'Produktnummer',
                        'name'          => 'produkt-description-additional-sku-list-entry-number',
                        'type'          => 'text',
                        'instructions'  => 'Geben Sie bitte die Produktnummer ein.',
                        'column_width'  => '',
                        'default_value' => '',
                        'placeholder'   => '',
                        'prepend'       => '',
                        'append'        => '',
                        'formatting'    => 'html',
                        'maxlength'     => '',
                    ),
                ),
                'row_min'      => '',
                'row_limit'    => '',
                'layout'       => 'table',
                'button_label' => 'Neue Produktnummer anlegen.',
            ),
            array(
                'key'   => 'field_54217db55e9f3',
                'label' => 'Call-To-Action',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'          => 'field_542178f219a61',
                'label'        => 'Call-To-Action',
                'name'         => 'produkt-description-additional-cta',
                'type'         => 'repeater',
                'sub_fields'   => array(
                    array(
                        'key'           => 'field_5421792e19a62',
                        'label'         => 'Call-To-Action-Überschrift',
                        'name'          => 'produkt-description-additional-cta-headline',
                        'type'          => 'text',
                        'column_width'  => '',
                        'default_value' => 'Möchten Sie mehr erfahren?',
                        'placeholder'   => '',
                        'prepend'       => '',
                        'append'        => '',
                        'formatting'    => 'html',
                        'maxlength'     => '',
                    ),
                    array(
                        'key'           => 'field_5421796919a63',
                        'label'         => 'Call-To-Action-Text',
                        'name'          => 'produkt-description-additional-cta-content',
                        'type'          => 'textarea',
                        'column_width'  => '',
                        'default_value' => 'Zögern Sie nicht uns zu schreiben. Unsere freundlichen Mitarbeiter stehen Ihnen gerne zur Verfügung.',
                        'placeholder'   => '',
                        'maxlength'     => '',
                        'rows'          => '',
                        'formatting'    => 'none',
                    ),
                    array(
                        'key'           => 'field_54217a4119a65',
                        'label'         => 'Call-To-Action-Text',
                        'name'          => 'produkt-description-additional-cta-text',
                        'type'          => 'text',
                        'column_width'  => '',
                        'default_value' => 'Nehmen Sie jetzt Kontakt auf!',
                        'placeholder'   => '',
                        'prepend'       => '',
                        'append'        => '',
                        'formatting'    => 'none',
                        'maxlength'     => 128,
                    ),
                    array(
                        'key'          => 'field_542179c419a64',
                        'label'        => 'Call-To-Action-Link',
                        'name'         => 'produkt-description-additional-cta-link',
                        'type'         => 'page_link',
                        'instructions' => 'Legen Sie hier fest, auf welche Seite der Call-To-Action-Button verweisen soll.',
                        'column_width' => '',
                        'post_type'    => array(
                            0 => 'page',
                        ),
                        'allow_null'   => 0,
                        'multiple'     => 0,
                    ),
                ),
                'row_min'      => '',
                'row_limit'    => 1,
                'layout'       => 'table',
                'button_label' => 'Call-To-Action hinzufügen.',
            ),
            array(
                'key'   => 'field_542175e119a5d',
                'label' => 'Produkt-Sektionen',
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'          => 'field_542142ac5523a',
                'label'        => 'Produkt-Sektion',
                'name'         => 'produkt-section',
                'type'         => 'repeater',
                'instructions' => 'Legen Sie hier eine weitere, auskappbare Sektion mit weiteren Produktinformationen an.',
                'sub_fields'   => array(
                    array(
                        'key'           => 'field_5421430b5523b',
                        'label'         => 'Überschrift der Produkt-Sektion',
                        'name'          => 'produkt-section-headline',
                        'type'          => 'text',
                        'column_width'  => '',
                        'default_value' => '',
                        'placeholder'   => '',
                        'prepend'       => '',
                        'append'        => '',
                        'formatting'    => 'html',
                        'maxlength'     => '',
                    ),
                    array(
                        'key'          => 'field_542143505523c',
                        'label'        => 'Inhalt der Produkt-Sektion',
                        'name'         => 'produkt-section-container',
                        'type'         => 'flexible_content',
                        'instructions' => 'Welchen Inhalt wünschen Sie für diese Sektion?',
                        'column_width' => 100,
                        'layouts'      => array(
                            array(
                                'label'      => 'Produkt-Galerie',
                                'name'       => 'produkt-gallery-layout',
                                'display'    => 'table',
                                'min'        => '',
                                'max'        => '',
                                'sub_fields' => array(
                                    array(
                                        'key'          => 'field_542146305523d',
                                        'label'        => 'Inhalte der Produkt-Galerie',
                                        'name'         => 'produkt-gallery',
                                        'type'         => 'gallery',
                                        'instructions' => 'Laden Sie hier Ihre zusätzlichen Bilder hoch.',
                                        'column_width' => 100,
                                        'preview_size' => 'thumbnail',
                                        'library'      => 'all',
                                    ),
                                ),
                            ),
                            array(
                                'label'      => 'Zusätzliche Produktinformationen',
                                'name'       => 'produkt-additional-infos-layout',
                                'display'    => 'table',
                                'min'        => '',
                                'max'        => '',
                                'sub_fields' => array(
                                    array(
                                        'key'           => 'field_5421479a5523f',
                                        'label'         => 'Überschrift Zusätzliche Produktinformationen',
                                        'name'          => 'produkt-additional-infos-main-section-headline',
                                        'type'          => 'text',
                                        'column_width'  => '',
                                        'default_value' => 'Zusätzliche Produktinformationen',
                                        'placeholder'   => '',
                                        'prepend'       => '',
                                        'append'        => '',
                                        'formatting'    => 'html',
                                        'maxlength'     => '',
                                    ),
                                    array(
                                        'key'           => 'field_5421481555240',
                                        'label'         => 'Text Zusätzliche Produktinformationen',
                                        'name'          => 'produkt-additional-infos-main-section-content',
                                        'type'          => 'wysiwyg',
                                        'column_width'  => '',
                                        'default_value' => '',
                                        'toolbar'       => 'full',
                                        'media_upload'  => 'no',
                                    ),
                                    array(
                                        'key'          => 'field_54216a9485f6e',
                                        'label'        => 'Weiterführende Informationen',
                                        'name'         => 'produkt-additional-infos-sidebar',
                                        'type'         => 'repeater',
                                        'column_width' => '',
                                        'sub_fields'   => array(
                                            array(
                                                'key'          => 'field_54216d1b85f6f',
                                                'label'        => 'Bild zur weiterführenden Information',
                                                'name'         => 'produkt-additional-infos-sidebar-entry-figure',
                                                'type'         => 'image',
                                                'column_width' => '',
                                                'save_format'  => 'url',
                                                'preview_size' => 'thumbnail',
                                                'library'      => 'all',
                                            ),
                                            array(
                                                'key'           => 'field_54216d5a85f70',
                                                'label'         => 'Text zur weiterführenden Information',
                                                'name'          => 'produkt-additional-infos-sidebar-entry-text',
                                                'type'          => 'wysiwyg',
                                                'column_width'  => '',
                                                'default_value' => '',
                                                'toolbar'       => 'full',
                                                'media_upload'  => 'no',
                                            ),
                                        ),
                                        'row_min'      => '',
                                        'row_limit'    => '',
                                        'layout'       => 'table',
                                        'button_label' => 'Weiterführende Informationen hinzufügen.',
                                    ),
                                ),
                            ),
                        ),
                        'button_label' => 'Neues Layout hinzufügen.',
                        'min'          => 1,
                        'max'          => 1,
                    ),
                ),
                'row_min'      => '',
                'row_limit'    => '',
                'layout'       => 'table',
                'button_label' => 'Eine weitere Sektion hinzufügen.',
            ),
        ),
        'location'   => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'product',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options'    => array(
            'position'       => 'normal',
            'layout'         => 'default',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}

