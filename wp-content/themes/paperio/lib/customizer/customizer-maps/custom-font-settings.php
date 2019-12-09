<?php

    if ( !defined( 'ABSPATH' ) ) { exit; }

    $tz_googlefonts = paperio_googlefonts_list();

    /* Main Google Enable Settings */
     $wp_customize->add_setting( 'tz_enable_google_font', array(
        'default'           => '0',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Paperio_Customize_switch_Control( $wp_customize, 'tz_enable_google_font', array(
        'label'             => esc_attr__( 'Disable Google Fonts', 'paperio' ),
        'section'           => 'tz_add_general_font_family_section',
        'settings'          => 'tz_enable_google_font',
        'type'              => 'paperio_switch',
        'choices'           => array(
                                    '1' => esc_html__( 'On', 'paperio' ),
                                    '0' => esc_html__( 'Off', 'paperio' ),
                               ),
    ) ) );
    /* End Google Font Enable Settings */

    /* Main Font Settings */
    $wp_customize->add_setting( 'tz_main_font', array(
        'default'           => 'Open Sans',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_main_font', array(
        'label'             => esc_attr__( 'Main Font', 'paperio' ),
        'section'           => 'tz_add_general_font_family_section',
        'setting'           => 'tz_main_font',
        'type'              => 'select',
        'active_callback'  => 'paperio_google_font_callback',
        'choices'           => $tz_googlefonts,
    ) ) );
    /* End Main Font Settings */

    /* Google Main Font Weight Settings */
    $wp_customize->add_setting( 'tz_google_main_font_weight', array(
        'default'           => array( '100', '200' ,'300', '400', '500', '600', '700', '800', '900' ),
        'sanitize_callback' => 'paperio_sanitize_multiple_checkbox'
    ) );

    $wp_customize->add_control( new Paperio_Customize_Checkbox_Multiple( $wp_customize, 'tz_google_main_font_weight', array(
        'label'             => esc_attr__( 'Main Font Weight', 'paperio' ),
        'type'              => 'paperio_checkbox_multiple',
        'section'           => 'tz_add_general_font_family_section',
        'settings'          => 'tz_google_main_font_weight',
        'choices'           => array(
                                    '100' => '100',
                                    '200' => '200',
                                    '300' => '300',
                                    '400' => '400',
                                    '500' => '500',
                                    '600' => '600',
                                    '700' => '700',
                                    '800' => '800',
                                    '900' => '900',
                                ),
        'active_callback'  => 'paperio_google_font_callback',
    ) ) );
    /* End Main Google Font Weight Settings */

    /* Alt Font Settings */
    $wp_customize->add_setting( 'tz_alt_font', array(
        'default'           => 'Montserrat',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_alt_font', array(
        'label'             => esc_attr__( 'Alt Font', 'paperio' ),
        'section'           => 'tz_add_general_font_family_section',
        'setting'           => 'tz_alt_font',
        'type'              => 'select',
        'active_callback'  => 'paperio_google_font_callback',
        'choices'           => $tz_googlefonts,
    ) ) );
    /* End Alt Font Settings */

    /* Google Alt Font Weight Settings */

    $wp_customize->add_setting( 'tz_google_alt_font_weight', array(
        'default'           => array( '100', '200' ,'300', '400', '500', '600', '700', '800', '900' ),
        'sanitize_callback' => 'paperio_sanitize_multiple_checkbox'
    ) );

    $wp_customize->add_control( new Paperio_Customize_Checkbox_Multiple( $wp_customize, 'tz_google_alt_font_weight', array(
        'label'             => esc_attr__( 'Alt Font Weight', 'paperio' ),
        'type'              => 'paperio_checkbox_multiple',
        'section'           => 'tz_add_general_font_family_section',
        'settings'          => 'tz_google_alt_font_weight',
        'choices'           => array(
                                    '100' => '100',
                                    '200' => '200',
                                    '300' => '300',
                                    '400' => '400',
                                    '500' => '500',
                                    '600' => '600',
                                    '700' => '700',
                                    '800' => '800',
                                    '900' => '900',
                                ),
        'active_callback'  => 'paperio_google_font_callback',
    ) ) );

    /* End Alt Google Font Weight Settings */

    /* Font Language settings */

    $wp_customize->add_setting( 'tz_main_font_subsets', array(
        'default'           => array( 'cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin-ext', 'vietnamese' ),
        'sanitize_callback' => 'paperio_sanitize_multiple_checkbox'
    ) );

    $wp_customize->add_control( new Paperio_Customize_Checkbox_Multiple( $wp_customize, 'tz_main_font_subsets', array(
        'label'             => esc_attr__( 'Font Languages', 'paperio' ),
        'type'              => 'paperio_checkbox_multiple',
        'section'           => 'tz_add_general_font_family_section',
        'settings'          => 'tz_main_font_subsets',
        'choices'           => array(
                                    'cyrillic'      => esc_attr__( 'Cyrillic', 'paperio' ),
                                    'cyrillic-ext'  => esc_attr__( 'Cyrillic Extended', 'paperio' ),
                                    'greek'         => esc_attr__( 'Greek', 'paperio' ),
                                    'greek-ext'     => esc_attr__( 'Greek Extended', 'paperio' ),
                                    'latin-ext'     => esc_attr__( 'Latin Extended', 'paperio' ),
                                    'vietnamese'    => esc_attr__( 'Vietnamese', 'paperio' ),
                                ),
        'active_callback'  => 'paperio_google_font_callback',
    ) ) );

    /* End Font Language settings */

    /* Call Back Functions */
    if ( ! function_exists( 'paperio_google_font_callback' ) ) {
        function paperio_google_font_callback( $control ) {
            if ( $control->manager->get_setting( 'tz_enable_google_font' )->value() != '1' ) {
                return true;
            } else {
                return false;
            }
        }
    }
   
    /* End Call Back Functions */