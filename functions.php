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

/**
*
* Modify post excerpt length
*
**/
function modify_post_excerpt_length($length){
    if(get_post_type() == 'post' && is_front_page()){
        return 20;
    }else{
        return $length;
    }
}
add_filter('excerpt_length', 'modify_post_excerpt_length');


/**
*
* Modify event excerpt length
*
**/
function modify_event_excerpt_length($length){
    if(is_front_page() && get_post_type() == 'event'){
        return 20;
    }else{
        return $length;
    }
}
add_filter('excerpt_length', 'modify_event_excerpt_length');


/**
*
* Events post type
*
**/
function custom_post_types(){
    $labels_event = array(
        'name' => __('Events','textdomain'),
        'singular_name' => __('Event','textdomain'),
        'menu_name' => __('Events','textdomain'),
        'all_items' => __('All Events','textdomain'),
        'add_new' => __('Add new','textdomain'),
        'add_new_item' => __('Add new event','textdomain'),
        'edit_item' => __('Edit event','textdomain'),
        'view_item' => __('View Event','textdomain'),
        'search_items' => __('Search Events','textdomain'),
        'not_found' => __('Events not found','textdomain'),
        'not_found_in_trash' => __('Events not found','textdomain')
    );

    $supports_event = array(
        'title', 
        'editor',
        'thumbnail'
    );
    $rewrite_event = array(
        'slug' => 'events'
    );

    register_post_type('event',
        array(
            'labels' => $labels_event,
            'public' => true,
            'show_in_rest' => true,
            'has_archive' => true,
            'menu_position'=> 4,
            'supports' => $supports_event,
            'rewrite' => $rewrite_event
        )
    );

    
    // Subject post type
    $labels_subject = array(
        'name' => __('Subjects','textdomain'),
        'singular_name' => __('Subject','textdomain'),
        'menu_name' => __('Subjects','textdomain'),
        'all_items' => __('All Subjects','textdomain'),
        'add_new' => __('Add new','textdomain'),
        'add_new_item' => __('Add new subject','textdomain'),
        'edit_item' => __('Edit Subject','textdomain'),
        'view_item' => __('View Subject','textdomain'),
        'search_items' => __('Search Subjects','textdomain'),
        'not_found' => __('Subjects not found','textdomain'),
        'not_found_in_trash' => __('Subjects not found','textdomain')
    );
    $supports_subject = array(
        'title', 
        'editor',
        'thumbnail'
    );
    $rewrite_subject = array(
        'slug' => 'subjects'
    );
    register_post_type('subject',
        array(
            'labels' => $labels_subject,
            'public' => true,
            'show_in_rest' => true,
            'has_archive' => true,
            'menu_position'=> 4,
            'supports' => $supports_subject,
            'rewrite' => $rewrite_subject
        )
    );
}
add_action('init', 'custom_post_types');

/**
*
* Adjust custom query
*
**/
function education_adjust_query($query){
    if(!is_admin() && is_post_type_archive('subject') && is_main_query()){
        $query -> set('orderby', 'title');
        $query -> set('order', 'ASC');
        $query -> set('posts_per_page', -1);
    }
}
add_action('pre_get_posts', 'education_adjust_query');
