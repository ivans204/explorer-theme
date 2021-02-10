<?php add_action('after_setup_theme', 'explorer_theme_setup');

if (!function_exists('explorer_theme_setup'))
{

    function explorer_theme_setup() {

// Include additional files
        require_once(get_template_directory() . '/inc/classes/wp-bootstrap-navwalker.php');
        require_once(get_template_directory() . '/inc/classes/theme-customizer.php');
//        require_once (get_template_directory() . '/inc/woocommerce/explorer-woocommerce.php');

// Logo theme support
        add_theme_support('custom-logo');
        add_theme_support('custom-logo', [
            'flex-height' => true,
            'flex-width' => true,
        ]);
        add_theme_support( 'custom-header' );
        add_theme_support( 'wp-block-styles' );

// Thumbnail theme support
        add_theme_support('post-thumbnails');

// Load CSS & JS
        add_action('wp_enqueue_scripts', 'infinum_load_theme_assets');
        if (!function_exists('infinum_load_theme_assets'))
        {
            function infinum_load_theme_assets() {

                //Fonts
                wp_enqueue_style('caveat-brush-font', 'https://fonts.googleapis.com/css2?family=Caveat+Brush&display=swap', null, null);
                wp_enqueue_style('montserrat-font', 'https://fonts.google.com/specimen/Montserrat?query=monts', null, null);

                //Bootstrap css
                wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', null, null);

                // Main style.css
                wp_enqueue_style('explorer-main-style', get_bloginfo('stylesheet_url'), []);

                // Infinum css
                wp_enqueue_style('explorer-css', get_template_directory_uri() . '/assets/css/explorer.css', null, 1, 'all');

                // jQuery
                wp_enqueue_script('jQuery', 'https://code.jquery.com/jquery-3.5.1.min.js', null);

                // Bootstrap js
                wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', null);

                // Extra JS
                wp_enqueue_script('extra-js', get_template_directory_uri() . '/assets/js/extra.js', null);

            }
        }

// Add dashicons
        add_action('wp_enqueue_scripts', 'load_dashicons_front_end');
        function load_dashicons_front_end() {
            wp_enqueue_style('dashicons');
        }

// Register menus
        register_nav_menu('explorer-header-menu', esc_html__('Header Menu', 'explorer'));
        register_nav_menu('explorer-footer-menu', esc_html__('Footer Menu', 'explorer'));


        add_action('wp_nav_menu_items', function ($menu_items, $menu_object) {

            $menu_name = $menu_object->menu->name;

// Only append the new li to the 'Primary Navigation' menu.
// Change 'Primary Navigation' for the name of the menu that you'd like to amend.
            if ('Main Menu' === $menu_name)
            {
                $new_li = "
                    <li class='menu-item nav-item social-btns'>
                        <a target='_blank' href='". get_theme_mod('contact-facebook-link')."' class='menu-link-social'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='#ffffff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-facebook'><path d='M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z'></path></svg></a>
                        <a target='_blank' href='". get_theme_mod('contact-instagram-link')."' class='menu-link-social'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='#ffffff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-instagram'><rect x='2' y='2' width='20' height='20' rx='5' ry='5'></rect><path d='M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z'></path><line x1='17.5' y1='6.5' x2='17.51' y2='6.5'></line></svg></a>
                        <a target='_blank' href='mailto:". get_theme_mod('contact-info-mail') ."' class='menu-link-social'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='#ffffff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-mail'><path d='M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z'></path><polyline points='22,6 12,13 2,6'></polyline></svg></a>
                    </li>
                    ";

//                $new_li .= "<li class='menu-item nav-item social-btns'>" . do_shortcode('[language-switcher]') . "</li>";

                return $menu_items . $new_li;
            }

            return $menu_items;

        }, 10, 2);


// Allow SVG
        function cc_mime_types($mimes) {
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }

        add_filter('upload_mimes', 'cc_mime_types');
    }

    // Woocommerce support
    function mytheme_add_woocommerce_support() {
        add_theme_support('woocommerce');
    }

    add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
}