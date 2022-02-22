<?php
function wporg_add_custom_box() {
        add_meta_box(
            'private_buddyboss_tab',                 // Unique ID
            'Private',      // Box title
            'checkBox',  // Content callback, must be of type callable
            'buddyboss_tabs'                            // Post type
        );
    
}
function checkBox($post){
    $checked = false;
    $post_id = $post->ID;
    $isPrivate = get_post_meta( $post_id, 'private', true );
    if($isPrivate=='yes')
    {
        $checked=true;
    }
    else
    {
        $checked=false;
    }
    ?>
    <input type="checkbox" name="privateTab" id="privateTab" checked="<?=$checked?>">
    <label for="privateTab">Is Tab Private</label>
    <?php
}
add_action( 'add_meta_boxes', 'wporg_add_custom_box' );

function savePostPrivate($post_id)
{
    if ( array_key_exists( 'privateTab', $_POST ) ) {
        update_post_meta(
            $post_id,
            'private',
            'yes'
        );
    }
    else
    {
        update_post_meta(
            $post_id,
            'private',
            'no'
        );
    }
}

add_action( 'save_post_buddyboss_tabs', 'savePostPrivate');