<?php
/**
 * Estatein Theme Functions
 *
 * @package Estatein
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ===================================
// THEME SETUP
// ===================================
function estatein_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'customize-selective-refresh-widgets' );

    add_image_size( 'property-card',   600, 400, true );
    add_image_size( 'property-detail', 1200, 800, true );
    add_image_size( 'team-photo',      200, 200, true );

    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'estatein' ),
        'footer'  => __( 'Footer Navigation', 'estatein' ),
    ] );
}
add_action( 'after_setup_theme', 'estatein_setup' );

// ===================================
// ENQUEUE ASSETS
// ===================================
function estatein_enqueue_assets() {
    wp_enqueue_style(
        'estatein-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
        [],
        null
    );
    wp_enqueue_style(
        'estatein-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'estatein-fonts' ],
        '1.0.0'
    );
    wp_enqueue_script(
        'estatein-js',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        '1.0.0',
        true
    );
    wp_localize_script( 'estatein-js', 'estateinData', [
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'estatein_nonce' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'estatein_enqueue_assets' );

// ===================================
// CUSTOM POST TYPES
// ===================================
function estatein_register_cpts() {
    // Properties
    register_post_type( 'property', [
        'labels' => [
            'name'          => __( 'Properties', 'estatein' ),
            'singular_name' => __( 'Property', 'estatein' ),
            'add_new_item'  => __( 'Add New Property', 'estatein' ),
            'edit_item'     => __( 'Edit Property', 'estatein' ),
            'view_item'     => __( 'View Property', 'estatein' ),
            'search_items'  => __( 'Search Properties', 'estatein' ),
            'not_found'     => __( 'No properties found', 'estatein' ),
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => [ 'slug' => 'properties' ],
        'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'menu_icon'    => 'dashicons-building',
        'show_in_rest' => true,
    ] );

    // Team Members
    register_post_type( 'team_member', [
        'labels' => [
            'name'          => __( 'Team Members', 'estatein' ),
            'singular_name' => __( 'Team Member', 'estatein' ),
            'add_new_item'  => __( 'Add New Team Member', 'estatein' ),
        ],
        'public'       => true,
        'supports'     => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
        'menu_icon'    => 'dashicons-groups',
        'show_in_rest' => true,
    ] );

    // Testimonials
    register_post_type( 'testimonial', [
        'labels' => [
            'name'          => __( 'Testimonials', 'estatein' ),
            'singular_name' => __( 'Testimonial', 'estatein' ),
            'add_new_item'  => __( 'Add New Testimonial', 'estatein' ),
        ],
        'public'       => false,
        'show_ui'      => true,
        'supports'     => [ 'title', 'editor', 'custom-fields' ],
        'menu_icon'    => 'dashicons-format-quote',
        'show_in_rest' => true,
    ] );
}
add_action( 'init', 'estatein_register_cpts' );

// ===================================
// TAXONOMIES
// ===================================
function estatein_register_taxonomies() {
    register_taxonomy( 'property_type', 'property', [
        'labels'       => [ 'name' => __( 'Property Types', 'estatein' ), 'singular_name' => __( 'Property Type', 'estatein' ) ],
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'property-type' ],
    ] );

    register_taxonomy( 'property_location', 'property', [
        'labels'       => [ 'name' => __( 'Locations', 'estatein' ), 'singular_name' => __( 'Location', 'estatein' ) ],
        'hierarchical' => false,
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'location' ],
    ] );
}
add_action( 'init', 'estatein_register_taxonomies' );

// ===================================
// ACF FIELD GROUPS
// ===================================
function estatein_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

    // Property Fields
    acf_add_local_field_group( [
        'key'    => 'group_property',
        'title'  => 'Property Details',
        'fields' => [
            [
                'key'          => 'field_price',
                'label'        => 'Price',
                'name'         => 'property_price',
                'type'         => 'text',
                'instructions' => 'e.g. $1,280,000',
            ],
            [
                'key'   => 'field_location',
                'label' => 'Location',
                'name'  => 'property_location_text',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_bedrooms',
                'label' => 'Bedrooms',
                'name'  => 'property_bedrooms',
                'type'  => 'number',
            ],
            [
                'key'   => 'field_bathrooms',
                'label' => 'Bathrooms',
                'name'  => 'property_bathrooms',
                'type'  => 'number',
            ],
            [
                'key'   => 'field_area',
                'label' => 'Area (Sq Ft)',
                'name'  => 'property_area',
                'type'  => 'text',
            ],
            [
                'key'          => 'field_badge',
                'label'        => 'Badge',
                'name'         => 'property_badge',
                'type'         => 'text',
                'instructions' => 'e.g. Villa, Apartment',
            ],
            [
                'key'   => 'field_featured',
                'label' => 'Featured Property',
                'name'  => 'property_featured',
                'type'  => 'true_false',
                'ui'    => 1,
            ],
            [
                'key'          => 'field_gallery_1',
                'label'        => 'Gallery Image 1',
                'name'         => 'property_gallery_1',
                'type'         => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'instructions' => 'Main gallery image',
            ],
            [
                'key'           => 'field_gallery_2',
                'label'         => 'Gallery Image 2',
                'name'          => 'property_gallery_2',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
            ],
            [
                'key'           => 'field_gallery_3',
                'label'         => 'Gallery Image 3',
                'name'          => 'property_gallery_3',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
            ],
            [
                'key'           => 'field_gallery_4',
                'label'         => 'Gallery Image 4',
                'name'          => 'property_gallery_4',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
            ],
            [
                'key'          => 'field_key_features',
                'label'        => 'Key Features',
                'name'         => 'property_key_features',
                'type'         => 'textarea',
                'instructions' => 'One feature per line',
            ],
            [
                'key'   => 'field_hoa',
                'label' => 'HOA Fees',
                'name'  => 'property_hoa',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_prop_tax',
                'label' => 'Annual Property Tax',
                'name'  => 'property_tax',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_monthly_maint',
                'label' => 'Monthly Maintenance',
                'name'  => 'property_maintenance',
                'type'  => 'text',
            ],
        ],
        'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'property' ] ] ],
    ] );

    // Team Member Fields
    acf_add_local_field_group( [
        'key'    => 'group_team',
        'title'  => 'Team Member Details',
        'fields' => [
            [
                'key'   => 'field_team_role',
                'label' => 'Job Title',
                'name'  => 'team_role',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_team_email',
                'label' => 'Email Address',
                'name'  => 'team_email',
                'type'  => 'email',
            ],
            [
                'key'   => 'field_team_linkedin',
                'label' => 'LinkedIn URL',
                'name'  => 'team_linkedin',
                'type'  => 'url',
            ],
        ],
        'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'team_member' ] ] ],
    ] );

    // Testimonial Fields
    acf_add_local_field_group( [
        'key'    => 'group_testimonial',
        'title'  => 'Testimonial Details',
        'fields' => [
            [
                'key'   => 'field_t_author',
                'label' => 'Author Name',
                'name'  => 'testimonial_author',
                'type'  => 'text',
            ],
            [
                'key'   => 'field_t_location',
                'label' => 'Author Location',
                'name'  => 'testimonial_location',
                'type'  => 'text',
            ],
            [
                'key'           => 'field_t_rating',
                'label'         => 'Rating (1-5)',
                'name'          => 'testimonial_rating',
                'type'          => 'number',
                'min'           => 1,
                'max'           => 5,
                'default_value' => 5,
            ],
            [
                'key'           => 'field_t_avatar',
                'label'         => 'Author Photo',
                'name'          => 'testimonial_avatar',
                'type'          => 'image',
                'return_format' => 'url',
            ],
        ],
        'location' => [ [ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'testimonial' ] ] ],
    ] );
}
add_action( 'acf/init', 'estatein_acf_fields' );

// ===================================
// HELPER FUNCTIONS
// ===================================

/**
 * Get post meta – works with ACF or native meta.
 */
function estatein_meta( $key, $post_id = null ) {
    $post_id = $post_id ?: get_the_ID();
    if ( function_exists( 'get_field' ) ) {
        $v = get_field( $key, $post_id );
        if ( $v !== false && $v !== null && $v !== '' ) return $v;
    }
    return get_post_meta( $post_id, $key, true );
}

/**
 * Render star rating HTML.
 */
function estatein_stars( $rating = 5 ) {
    $html = '<div class="testimonial-stars">';
    for ( $i = 1; $i <= 5; $i++ ) {
        $html .= '<span class="star' . ( $i <= $rating ? ' filled' : '' ) . '">★</span>';
    }
    return $html . '</div>';
}

/**
 * Logo SVG markup.
 */
function estatein_logo_svg() {
    return '<img src="' . esc_url( content_url( 'uploads/2026/04/Logo.png' ) ) . '" alt="Estatein Logo" style="height:36px;width:auto;">';
}

/**
 * Property card meta icons.
 */
function estatein_icon( $name ) {
    $icons = [
        'bed'      => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 9V19H22V9"/><path d="M2 9V5A2 2 0 014 3H20A2 2 0 0122 5V9"/><path d="M2 14H22"/><path d="M6 14V9"/></svg>',
        'bath'     => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 6L9 3.5A2.5 2.5 0 014 3.5V6"/><path d="M2 14V20A2 2 0 004 22H20A2 2 0 0022 20V14"/><path d="M2 14H22"/><path d="M4 14V11A2 2 0 016 9H22"/></svg>',
        'area'     => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3V21"/><path d="M3 9H21"/></svg>',
        'location' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>',
        'phone'    => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .84h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>',
        'email'    => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
        'social'   => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>',
        'home'     => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
        'chart'    => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>',
        'settings' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 010 14.14M4.93 4.93a10 10 0 000 14.14"/><path d="M12 2v2M12 20v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M2 12h2M20 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>',
        'invest'   => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
        'arrow-r'  => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',
        'arrow-l'  => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>',
        'check'    => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>',
        'trust'    => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        'star'     => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
        'users'    => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>',
        'heart'    => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>',
        'compass'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/></svg>',
        'brain'    => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>',
        'dna'      => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 15c6.667-6 13.333 0 20-6"/><path d="M9 22c1.798-1.998 2.518-3.995 2.807-5.993"/><path d="M15 2c-1.798 1.998-2.518 3.995-2.807 5.993"/><path d="M2 9c6.667 6 13.333 0 20 6"/></svg>',
        'search'   => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>',
        'twitter'  => '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>',
        'linkedin' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>',
        'facebook' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>',
        'youtube'  => '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 00-1.95 1.96A29 29 0 001 11.75a29 29 0 00.46 5.33A2.78 2.78 0 003.41 19.1C5.12 19.56 12 19.56 12 19.56s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.95 29 29 0 00.46-5.25 29 29 0 00-.46-5.48z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="white"/></svg>',
        'send'     => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>',
        'map'      => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/></svg>',
        'clock'    => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        'globe'    => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>',
    ];
    return $icons[ $name ] ?? '';
}

// ===================================
// FLUSH REWRITE ON SWITCH
// ===================================
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
