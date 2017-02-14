<?php
if (get_post_meta($post->ID, 'hide_image_on_page', true) != "true" ) {
    if (has_post_thumbnail()) {
        the_post_thumbnail('nimbus_1170_640', array('class' => 'nimbus_1170_640'));
    } else {
        if ((soliloquy_get_option('example-toggle') == 'on') || (soliloquy_get_option('example-toggle') == NULL)) {
        ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/preview/nimbus_1170_640_<?php echo rand(1,3); ?>.jpg" class="nimbus_1170_640" alt="<?php the_title(); ?>" />
        <?php 
        }
    }
}
?>