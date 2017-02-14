<?php

/* **************************************************************************************************** */
// Register Sidebar Select Box
/* **************************************************************************************************** */

add_action("admin_init", "soliloquy_sidebar_meta_box");

function soliloquy_sidebar_meta_box() {
    add_meta_box("sidebar_meta_box", __('Nimbus Sidebar Options', 'soliloquy'), "soliloquy_call_sidebar_meta_box", "page", "side", "high");
    add_meta_box("sidebar_meta_box", __('Nimbus Sidebar Options', 'soliloquy'), "soliloquy_call_sidebar_meta_box", "post", "side", "high");
}

function soliloquy_call_sidebar_meta_box() {

    global $post;

    $custom = get_post_custom($post->ID);
    if (isset($custom["alt_sidebar_select"])) {
        $alt_sidebar_select = $custom["alt_sidebar_select"][0];
    } else {
        $alt_sidebar_select = "";
    }
    if (isset($_POST['sidebar_select'])) {
        $sidebar_select = $custom["sidebar_select"][0];
    }
    
    echo '<input type="hidden" name="meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    ?>  
    <p><?php _e('Sidebar Display Options:', 'soliloquy') ?></p>
    <input class="" type="radio" name="sidebar_select" id="sidebar_select-left" value="left" <?php if (get_post_meta($post->ID, 'sidebar_select', true) == "left") { ?> checked <?php } ?>><label for="sidebar_select-left">Left</label><br />
    <input class="" type="radio" name="sidebar_select" id="sidebar_select-right" value="right" <?php if (get_post_meta($post->ID, 'sidebar_select', true) == "right") { ?> checked <?php } ?>><label for="sidebar_select-right">Right</label><br />
    <input class="" type="radio" name="sidebar_select" id="sidebar_select-none" value="none" <?php if (get_post_meta($post->ID, 'sidebar_select', true) == "none") { ?> checked <?php } ?>><label for="sidebar_select-none">No Sidebar</label><br />
    <p><?php _e('Enter the number of the alternate sidebar you would like to apply. Leave blank to use default.', 'soliloquy') ?></p>
    <table>
        <tr><td><label><?php _e('Sidebar #', 'soliloquy') ?></label></td><td><input type="text" name="alt_sidebar_select" style="width:35px;" value="<?php echo esc_attr($alt_sidebar_select); ?>" size="20" maxlength="2" /></td></tr> 
    </table>
    <?php
}

/* **************************************************************************************************** */
// Save Sidebar Select Box
/* **************************************************************************************************** */

add_action('save_post', 'soliloquy_save_sidebar_meta_box');

function soliloquy_save_sidebar_meta_box($post_id) {

    global $post;

    // verify nonce

    if (isset($_POST['meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['meta_box_nonce'], basename(__FILE__))) {
            return $post_id;
        }
    }

    // check autosave

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if (isset($_POST['post_type'])) {
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    }

    if (isset($_POST['alt_sidebar_select'])) {
        update_post_meta($post_id, 'alt_sidebar_select', $_POST['alt_sidebar_select']);
    }
    if (isset($_POST['sidebar_select'])) {
        update_post_meta($post_id, 'sidebar_select', $_POST['sidebar_select']);
    } else {
        update_post_meta($post_id, 'sidebar_select', 'none');
    }
}    



/* **************************************************************************************************** */
// Register Featured Image Options Box
/* **************************************************************************************************** */

add_action("admin_init", "soliloquy_featured_image_options_meta_box");

function soliloquy_featured_image_options_meta_box() {
    add_meta_box("featured_image_options_meta_box", __('Nimbus Featured Image Options', 'soliloquy'), "soliloquy_call_featured_image_options_meta_box", "page", "side", "high");
    add_meta_box("featured_image_options_meta_box", __('Nimbus Featured Image Options', 'soliloquy'), "soliloquy_call_featured_image_options_meta_box", "post", "side", "high");
}
function soliloquy_call_featured_image_options_meta_box() {
    global $post, $wp_query;
    $custom = get_post_custom($post->ID);
    if (isset($custom["on_page_checked"])) {
        $on_page_checked = $custom["on_page_checked"][0];
    } 
    echo '<input type="hidden" name="meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    if (( get_option('page_on_front') ==  $post->ID )) { 
    ?>
        <p><?php _e('There are no image options because this page is set as the Front Page', 'soliloquy') ?></p>
    <?php 
    } else {
    ?>        
        <p><?php _e('Remember you need to attach a Featured Image for these setting to take effect.', 'soliloquy') ?></p>
        <table>
                <tr><td><label><input type="checkbox" name="on_page_checked" value="true" <?php if (get_post_meta($post->ID, 'hide_image_on_page', true) == "true" ) { ?> checked <?php } ?> /></label></td><td>Don't Show Image at the Top of the Page</td></tr>          
        </table>
    <?php 
    } 
}

/* **************************************************************************************************** */
// Save Featured Image Options Box
/* **************************************************************************************************** */


add_action('save_post', 'soliloquy_save_featured_image_options_meta_box');

function soliloquy_save_featured_image_options_meta_box($post_id) {

    global $post;

    // verify nonce

    if (isset($_POST['meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['meta_box_nonce'], basename(__FILE__))) {
            return $post_id;
        }
    }

    // check autosave

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if (isset($_POST['post_type'])) {

        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    }

    if (isset($_POST['on_page_checked'])) {
        update_post_meta($post_id, 'hide_image_on_page', $_POST['on_page_checked']);
    } else {
        delete_post_meta($post_id, 'hide_image_on_page');
    }
}