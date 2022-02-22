<?php

function buddyboss_tab_post_type() {
 
 // Set UI labels for Custom Post Type
     $labels = array(
         'name'                => _x( 'Buddyboss Tabs', 'Post Type General Name', 'twentytwenty' ),
         'singular_name'       => _x( 'Buddyboss Tab', 'Post Type Singular Name', 'twentytwenty' ),
         'menu_name'           => __( 'Buddyboss Tabs', 'twentytwenty' ),
         'parent_item_colon'   => __( 'Parent Tab', 'twentytwenty' ),
         'all_items'           => __( 'Tabs', 'twentytwenty' ),
         'view_item'           => __( 'View Tab', 'twentytwenty' ),
         'add_new_item'        => __( 'Add New Tab', 'twentytwenty' ),
         'add_new'             => __( 'Add New', 'twentytwenty' ),
         'edit_item'           => __( 'Edit Tab', 'twentytwenty' ),
         'update_item'         => __( 'Update Tab', 'twentytwenty' ),
         'search_items'        => __( 'Search Tab', 'twentytwenty' ),
         'not_found'           => __( 'Not Found', 'twentytwenty' ),
         'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwenty' ),
     );
      
 // Set other options for Custom Post Type
      
     $args = array(
         'label'               => __( 'tabs', 'twentytwenty' ),
         'description'         => __( 'Movie news and reviews', 'twentytwenty' ),
         'labels'              => $labels,
         // Features this CPT supports in Post Editor
         'supports'            => array( 'title', 'editor', 'custom-fields', ),
         /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */ 
         'hierarchical'        => false,
         'public'              => true,
         'show_ui'             => true,
         'show_in_menu'        => true,
         'show_in_nav_menus'   => true,
         'show_in_admin_bar'   => true,
         'menu_position'       => 5,
         'menu_icon'           => 'dashicons-excerpt-view',
         'can_export'          => true,
         'has_archive'         => true,
         'exclude_from_search' => false,
         'publicly_queryable'  => true,
         'capability_type'     => 'post',
         'show_in_rest' => true,
  
     );
      
     // Registering your Custom Post Type
     register_post_type( 'buddyboss_tabs', $args );
  
 }