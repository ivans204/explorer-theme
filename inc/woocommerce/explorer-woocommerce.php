<?php


add_action('woocommerce_checkout_create_order_line_item', 'cfwc_add_custom_data_to_order', 10, 4);

add_filter('woocommerce_billing_fields', 'wpb_custom_billing_fields');
function wpb_custom_billing_fields($fields = array()) {

    unset($fields['billing_company']);
    unset($fields['billing_address_1']);
    unset($fields['billing_address_2']);
//    unset($fields['billing_state']);
//    unset($fields['billing_city']);
//    unset($fields['billing_phone']);
    unset($fields['billing_postcode']);
    unset($fields['billing_country']);

    return $fields;
}

/**
 * Customize product data tabs
 */
add_filter('woocommerce_product_tabs', 'woo_custom_description_tab', 98);
function woo_custom_description_tab($tabs) {
    $tabs['description']['callback'] = 'woo_custom_description_tab_content';
    $tabs['description']['priority'] = 1;
    $tabs['description']['title'] = __('Informacije');
    return $tabs;
}

function woo_custom_description_tab_content() {
    global $product;
    $id = $product->get_id();

    echo "
<div class='row product-details'>
    <div class='col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6 d-flex align-items-center'><i class='icon icon-clock'></i>
        <div><p class='acf-info'>" . get_field('tura_duration', $id) . " " . get_field('tura_duration_time', $id) . "</p><p class='acf-name'>" . __('Trajanje') . "</p></div>
    </div>
    <div class='col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6 d-flex align-items-center'><i class='icon icon-location'></i>
        <div><p class='acf-info'>" . get_field('tura_location', $id) . "</p><p class='acf-name'>" . __('Lokacija') . "</p></div>
    </div>
    <div class='col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6 d-flex align-items-center'><i class='icon icon-people'></i>
        <div><p class='acf-info'>" . get_field('tura_age', $id) . "+</p><p class='acf-name'>" . __('Godine') . "</p></div>
    </div>
    <div class='col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6 d-flex align-items-center'><i class='icon icon-activity'></i>
        <div><p class='acf-info'>" . get_field('tura_razina_aktivnosti', $id) . "/10</p><p class='acf-name'>" . __('Aktivnosti') . "</p></div>
    </div>
    <div class='col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6 d-flex align-items-center'><i class='icon icon-date'></i>
        <div><p class='acf-info'>" . get_field('tura_start', $id) . "-" . get_field('tura_end', $id) . "</p><p class='acf-name'>" . __('Datumi') . "</p></div>
    </div>
    <div class='col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6 d-flex align-items-center'><i class='icon icon-group'></i>
        <div><p class='acf-info'>" . get_field('tura_group_size', $id) . "</p><p class='acf-name'>" . __('Grupa') . "</p></div>
    </div>
</div>
";

    echo $product->get_description();

}

// Remove title from product summary
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

// Remove category from product summary
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// Remove link from product image
function e12_remove_product_image_link($html, $post_id) {
    return preg_replace("!<(a|/a).*?>!", '', $html);
}

add_filter('woocommerce_single_product_image_thumbnail_html', 'e12_remove_product_image_link', 10, 2);

/**
 * Remove related products output
 */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

//disable related bookings on checkout order page
if (function_exists('YITH_WCBK'))
{
    remove_action('woocommerce_order_details_after_order_table', array(YITH_WCBK()->orders, 'show_related_bookings'));
}

/**
 * Location tab
 */

add_filter( 'woocommerce_product_tabs', 'product_location_tab' );
function product_location_tab( $tabs ) {

    // Adds the new tab

    $tabs['Lokacija'] = array(
        'title' 	=> __( 'Lokacija', 'explorer_theme' ),
        'priority' 	=> 2,
        'callback' 	=> 'location_tab_content'
    );

    return $tabs;

}
function location_tab_content() {

    echo "<a target='_blank' href='". get_field('tura_location_url') ."'><img class='w-100' src='". get_field('tura_location_img') ."'></a>";

}

add_filter( 'woocommerce_add_to_cart_redirect', function( $url ) {
    global $woocommerce;
    return $woocommerce->cart->get_checkout_url();
});