<?php

/**
 * Plugin Name:       Reviews post type
 * Description:       Plugin za dodavanje reviewsa
 * Version:           1.0.0
 * Author:            Ivan Švrga
 * Author URI:        https://ivansvrga.com
 * License:           GPL-2.0+
 */


function my_custom_post_reviews() {
    $args = array();
    register_post_type('review', $args);
}

add_action('init', 'my_custom_post_reviews');

// Adding Custom Post Type for Reviews Listing

function my_custom_post_review() {

//labels array added inside the function and precedes args array
    $labels = array(
        'name' => _x('Reviews', 'post type general name'),
        'singular_name' => _x('Review', 'post type singular name'),
        'add_new' => _x('Add New', 'Review'),
        'add_new_item' => __('Add New Review'),
        'edit_item' => __('Edit Review'),
        'new_item' => __('New Review'),
        'all_items' => __('All Reviews'),
        'view_item' => __('View Review'),
        'search_items' => __('Search reviews'),
        'not_found' => __('No reviews found'),
        'not_found_in_trash' => __('No reviews found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Reviews'
    );

// args array
    $args = array(
        'labels' => $labels,
        'description' => 'Displays city reviews and their ratings',
        'public' => true,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
    );

    register_post_type('review', $args);
}

add_action('init', 'my_custom_post_review');

//creating custom taxonomies for hotels custom post

//registration of taxonomies

function my_taxonomies_review() {

//labels array

    $labels = array(
        'name' => _x( 'Review Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Review Category', 'taxonomy singular name' ),
        'search_items' => __( 'Search Review Categories' ),
        'all_items' => __( 'All Review Categories' ),
        'parent_item' => __( 'Parent Review Category' ),
        'parent_item_colon' => __( 'Parent Review Category:' ),
        'edit_item' => __( 'Edit Review Category' ),
        'update_item' => __( 'Update Review Category' ),
        'add_new_item' => __( 'Add New Review Category' ),
        'new_item_name' => __( 'New Review Category' ),
        'menu_name' => __( ' Review Categories' ),
    );

//args array

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );

    register_taxonomy( 'review_category', 'review', $args );
}

add_action( 'init', 'my_taxonomies_review', 0 );