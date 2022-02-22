<?php


function userTab()
{
    $query = new WP_Query(array(
        'post_type' => 'buddyboss_tabs',
        'post_status' => 'publish',
        'posts_per_page' => -1
    ));
    
    
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $postBuddy = get_post($post_id);
        $content = apply_filters( 'the_content', $postBuddy->post_content );
        $privateTab = get_post_meta( $post_id, 'private', true );

        $buddybossTab = new BuddybossTabTemplate(get_the_title($post_id),$content,$postBuddy->post_name,$privateTab);
        $buddybossTab->buddyboss_custom_user_tab();

    }
    
    wp_reset_query();
}

  add_action( 'bp_setup_nav', 'userTab' );