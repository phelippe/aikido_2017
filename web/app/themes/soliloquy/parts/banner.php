<?php 
global $post;

    $banner_option = soliloquy_get_option('soliloquy_banner_option');
    $soliloquy_content_width_banner = soliloquy_get_option('soliloquy_content_width_banner');

// Do frontpage banner options
if ((is_front_page() && !is_paged())) {
    // Content width banner
    if ($banner_option != 'none') {
    ?>
        <div>
            <?php
            if (!empty($soliloquy_content_width_banner)) {
            ?>
            <img id="frontpage_banner" src="<?php echo esc_url($soliloquy_content_width_banner); ?>" alt="Frontpage Banner" />
            <?php
            } else {
                if ((soliloquy_get_option('example-toggle') == 'on') || (soliloquy_get_option('example-toggle') == NULL)) {
                ?>
                    <img id="frontpage_banner" src="<?php echo get_template_directory_uri(); ?>/assets/images/preview/nimbus_1170_385_<?php echo rand(1,3); ?>.jpg" alt="Frontpage Banner" />
                <?php
                }
            }
            ?>
        </div>
    <?php 
    } 
} else {
// Not on frontpage
}     
?>