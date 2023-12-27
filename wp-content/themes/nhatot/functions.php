<?php 

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

add_theme_support( 'post-thumbnails' );

function buy_house_register_name(){
    // ==============
    $gen_cpt_labels = function ($single, $plural, $menu_name) {
        return array(
            "name"                => _x($plural, "Post Type General Name", "nhatot"),
            "singular_name"       => _x($single, "Post Type Singular Name", "nhatot"),
            "menu_name"           => __($menu_name, "nhatot"),
            "parent_item_colon"   => __("Parent $single", "nhatot"),
            "all_items"           => __("All $plural", "nhatot"),
            "view_item"           => __("View $single", "nhatot"),
            "add_new_item"        => __("Add New $single", "nhatot"),
            "add_new"             => __("Add New", "nhatot"),
            "edit_item"           => __("Edit $single", "nhatot"),
            "update_item"         => __("Update $single", "nhatot"),
            "search_items"        => __("Search $single", "nhatot"),
            "not_found"           => __("Not Found", "nhatot"),
            "not_found_in_trash"  => __("Not found in Trash", "nhatot"),
        );
    };
    $cpt_common_args = array(
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    $project_args = array(
        'label'               => __('Buy Houses', 'nhatot'),
        'description'         => __('Buy Houses', 'nhatot'),
        'labels'              => $gen_cpt_labels('Buy Houses', 'Buy Houses', 'Buy Houses'),
        'supports'            => array('title', 'editor', 'thumbnail', 'elementor'),
        'menu_icon'           => 'dashicons-images-alt2'
    );
    register_post_type('buy_house', array_merge($cpt_common_args, $project_args));

    //  Taxonomy
    $gen_tax_labels = function ($single, $plural, $menu_name) {
        return array(
            "name"                       => _x("$plural", "$single General Name", "nhatot"),
            "singular_name"              => _x("$single", "$single Singular Name", "nhatot"),
            "menu_name"                  => __($menu_name, "nhatot"),
            "all_items"                  => __("All $plural", "nhatot"),
            "parent_item"                => __("Parent $single", "nhatot"),
            "parent_item_colon"          => __("Parent $single:", "nhatot"),
            "new_item_name"              => __("New $single Name", "nhatot"),
            "add_new_item"               => __("Add New $single", "nhatot"),
            "edit_item"                  => __("Edit $single", "nhatot"),
            "update_item"                => __("Update $single", "nhatot"),
            "view_item"                  => __("View $single", "nhatot"),
            "separate_items_with_commas" => __("Separate $plural with commas", "nhatot"),
            "add_or_remove_items"        => __("Add or remove $plural", "nhatot"),
            "choose_from_most_used"      => __("Most used $plural", "nhatot"),
            "popular_items"              => __("Popular $plural", "nhatot"),
            "search_items"               => __("Search $plural", "nhatot"),
            "not_found"                  => __("Not Found", "nhatot"),
            "no_terms"                   => __("No $single", "nhatot"),
            "items_list"                 => __("$plural list", "nhatot"),
            "items_list_navigation"      => __("$plural list navigation", "nhatot"),
        );
    };
    $tax_common_args = array(
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true
    );

    // Price
    $taxonomy_type_ages = array(
        'labels' => $gen_tax_labels('Price', 'Prices', 'Prices'),
    );
    register_taxonomy('price_house', array('buy_house'), array_merge($tax_common_args, $taxonomy_type_ages));

    // Acreage
    $taxonomy_type_ages = array(
        'labels' => $gen_tax_labels('Acreage', 'Acreages', 'Acreages'),
    );
    register_taxonomy('acreage_house', array('buy_house'), array_merge($tax_common_args, $taxonomy_type_ages));

    // Address
    $taxonomy_type_ages = array(
        'labels' => $gen_tax_labels('Address', 'Address', 'Address'),
    );
    register_taxonomy('address_house', array('buy_house'), array_merge($tax_common_args, $taxonomy_type_ages));
    
}
add_action('init', 'buy_house_register_name');


// ==================




