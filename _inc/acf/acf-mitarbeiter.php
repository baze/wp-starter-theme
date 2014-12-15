<?php

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id'         => 'acf_mitarbeiter',
        'title'      => 'Mitarbeiter',
        'fields'     => array(
            array(
                'key'           => 'field_533acd24c0986',
                'label'         => 'Jobtitel',
                'name'          => 'jobtitle',
                'type'          => 'text',
                'required'      => 0,
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => '',
            ),
        ),
        'location'   => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'mitarbeiter',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options'    => array(
            'position'       => 'acf_after_title',
            'layout'         => 'default',
            'hide_on_screen' => array(
                0 => 'excerpt',
                1 => 'custom_fields',
                2 => 'discussion',
                3 => 'comments',
                4 => 'format',
                5 => 'tags',
                6 => 'send-trackbacks',
                7 => 'author',
            ),
        ),
        'menu_order' => 0,
    ));
}
