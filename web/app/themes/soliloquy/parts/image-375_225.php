<?php
if (has_post_thumbnail()) {
    the_post_thumbnail('nimbus_375_225', array('class' => 'nimbus_375_225 img-responsive'));
} else {
    if ((soliloquy_get_option('example-toggle') == 'on') || (soliloquy_get_option('example-toggle') == NULL)) {
    ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/preview/nimbus_375_225_<?php echo rand(1,3); ?>.jpg" class="img-responsive nimbus_375_225" alt="<?php the_title(); ?>" />
    <?php
    } else{
    ?>
        <div class="clear10"></div>
    <?php
    }
}
?>