<?php

/**
*
* Important files
*
**/
function education_files(){
    // Stylesheets
    wp_enqueue_style('main-style', get_template_directory_uri().'/build/index.css', array(), '1.0', 'all');
    wp_enqueue_style('secondary-style', get_template_directory_uri().'/build/style-index.css', array(), '1.0', 'all');

    // Javascript
    wp_enqueue_script('main-js', get_template_directory_uri().'/build/index.js', array(), '1.0', true);

    // CDN files
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'education_files');



/**
*
* Theme Support
*
**/
function education_theme_support(){
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'education_theme_support');


/**
*
* Navigation Register
*
**/
function education_register_nav_menus(){
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu'),
        'secondary-menu' => __('Secondary Menu')
    ));
}
add_action('init', 'education_register_nav_menus');