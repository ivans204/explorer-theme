<?php

class The_Customizer
{
    public function __construct() {
        add_action('customize_register', array($this, 'register_customize_sections'));
    }

    public function register_customize_sections($wp_customize) {
        // Add settings to sections.
        $this->footer_section($wp_customize);
        $this->header_section($wp_customize);
    }

    private function header_section($wp_customize) {
        $wp_customize->add_section('basic-header-section', [
            'title' => 'Header Settings',
            'priority' => 1,
            'description' => __('Header Settings.', 'explorer'),
        ]);

        $wp_customize->add_setting('basic-header-img', [
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitize_custom_url']
        ]);

        $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'basic-author-callout-image-control', [
            'label' => 'Image',
            'section' => 'basic-header-section',
            'settings' => 'basic-header-img',
//            'width' => 442,
//            'height' => 310
        ]));
    }

    private function footer_section($wp_customize) {

        $wp_customize->add_section('basic-footer-section', [
            'title' => 'Footer Settings',
            'priority' => 2,
            'description' => __('Footer Settings.', 'explorer'),
        ]);

        $wp_customize->add_setting('basic-footer-text', [
            'default' => '',
            'sanitize_callback' => [$this, 'sanitize_custom_text']
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-footer-control', [
            'label' => 'Footer Text',
            'section' => 'basic-footer-section',
            'settings' => 'basic-footer-text',
            'type' => 'textarea'
        ]));

    }

    public function sanitize_custom_text($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }

    public function sanitize_custom_url($input) {
        return filter_var($input, FILTER_SANITIZE_URL);
    }

}

new The_Customizer();