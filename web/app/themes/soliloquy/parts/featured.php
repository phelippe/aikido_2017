<?php
// set variables if front-page
$soliloquy_left_featured = soliloquy_get_option('soliloquy_left_featured');
$soliloquy_center_featured = soliloquy_get_option('soliloquy_center_featured');
$soliloquy_right_featured = soliloquy_get_option('soliloquy_right_featured');
$toggle = soliloquy_get_option('soliloquy_toggle_featured');
if ((is_front_page() && !is_paged())) {
    $soliloquy_featured = array(
        'soliloquy_left_featured'              =>  $soliloquy_left_featured,
        'soliloquy_center_featured'            =>  $soliloquy_center_featured,
        'soliloquy_right_featured'             =>  $soliloquy_right_featured,
    );
    if (($toggle == 1) || ($toggle == NULL)) {
    ?>
        <div class="container frontpage_featured">
            <div class="row">
                <?php
                foreach ($soliloquy_featured as $key => $featured) {
                ?>
                    <div id="<?php echo $key; ?>" class="col-sm-4 featured">
                        <?php
                        if (empty($featured)) {
                            $featured = soliloquy_random_page();
                        }
                        $original_query = $wp_query;
                        $wp_query = null;
                        $wp_query = new WP_Query(array('page_id' => $featured, 'posts_per_page' => 1, 'post__not_in' => get_option( 'sticky_posts' )));
                        if (have_posts()) :
                            while (have_posts()) :
                                the_post();
                                get_template_part( 'parts/content', 'frontpage_featured');
                            endwhile;
                            else:
                                get_template_part( 'parts/error', 'no_results');
                        endif;
                        $wp_query = null;
                        $wp_query = $original_query;
                        wp_reset_postdata();
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }
}
?>