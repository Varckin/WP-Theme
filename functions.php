<?php
function theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'your-theme'),
    ));
}
add_action('after_setup_theme', 'theme_setup');

function create_portfolio_post_type() {
    register_post_type('portfolio',
        array(
            'labels' => array(
                'name' => __('Portfolios'),
                'singular_name' => __('Portfolio')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array('category'),
            'rewrite' => array('slug' => 'portfolio'),
        )
    );
}
add_action('init', 'create_portfolio_post_type');

function create_portfolio_taxonomies() {
    register_taxonomy(
        'portfolio_category',
        'portfolio',
        array(
            'label' => __('Categories'),
            'rewrite' => array('slug' => 'portfolio-category'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'create_portfolio_taxonomies');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => __('Theme Options'),
        'menu_title' => __('Theme Options'),
        'menu_slug'  => 'theme-options',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ));
}
?>
