<?php

class The_Customizer
{
    public function __construct() {
        add_action('customize_register', array($this, 'register_customize_sections'));
    }

    public function register_customize_sections($wp_customize) {
        // Add settings to sections.
        $this->contact_info($wp_customize);
        $this->footer_section($wp_customize);
    }

    private function contact_info($wp_customize) {
        $wp_customize->add_section('contact-info-section', [
            'title' => 'Contact Info',
            'description' => __('Social media links and phone number.', 'explorer'),
        ]);

        // Contact info textarea
        $wp_customize->add_setting('contact-info-text', [
            'default' => '',
            'sanitize_callback' => [$this, 'sanitize_custom_text']
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact-info-text', [
            'label' => 'Contact info Text',
            'section' => 'contact-info-section',
            'settings' => 'contact-info-text',
            'type' => 'textarea',
            'input_attrs' => ['placeholder' => 'Enter text for contact page']
        ]));

        // Contact info phone number
        $wp_customize->add_setting('contact-phone-number', [
            'default' => '',
            'sanitize_callback' => [$this, 'sanitize_custom_number']
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact-info-number', [
            'label' => 'Contact info Phone number',
            'section' => 'contact-info-section',
            'settings' => 'contact-phone-number',
            'type' => 'number',
            'input_attrs' => ['placeholder' => 'Enter contact phone number']
        ]));

        // Contact info mail
        $wp_customize->add_setting('contact-info-mail', [
            'default' => '',
            'sanitize_callback' => [$this, 'sanitize_custom_mail']
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact-info-mail', [
            'label' => 'Contact info Mail',
            'section' => 'contact-info-section',
            'settings' => 'contact-info-mail',
            'type' => 'email',
            'input_attrs' => ['placeholder' => 'Enter contact mail']
        ]));

        // Contact info instagram link
        $wp_customize->add_setting('contact-instagram-link', [
            'default' => '',
            'sanitize_callback' => [$this, 'sanitize_custom_url']
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact-info-instagram', [
            'label' => 'Contact Instagram link',
            'section' => 'contact-info-section',
            'settings' => 'contact-instagram-link',
            'type' => 'text',
            'input_attrs' => ['placeholder' => 'Enter Instagram link']
        ]));

        // Contact info facebook link
        $wp_customize->add_setting('contact-facebook-link', [
            'default' => '',
            'sanitize_callback' => [$this, 'sanitize_custom_url']
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact-info-facebook', [
            'label' => 'Contact Facebook link',
            'section' => 'contact-info-section',
            'settings' => 'contact-facebook-link',
            'type' => 'text',
            'input_attrs' => ['placeholder' => 'Enter Facebook link']
        ]));

        // Newsletter text
        $wp_customize->add_setting('newsletter-text', [
            'default' => '',
            'sanitize_callback' => [$this, 'sanitize_custom_text']
        ]);

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact-info-facebook', [
            'label' => 'Front page newsletter text',
            'section' => 'contact-info-section',
            'settings' => 'newsletter-text',
            'type' => 'textarea',
            'input_attrs' => ['placeholder' => 'Enter front page newsletter text']
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

    public function sanitize_custom_number($input) {
        return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }

    public function sanitize_custom_mail($input) {
        return filter_var($input, FILTER_SANITIZE_EMAIL);
    }

    public function sanitize_custom_url($input) {
        return filter_var($input, FILTER_SANITIZE_URL);
    }

}

new The_Customizer();