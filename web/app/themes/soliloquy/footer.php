   
        <footer class="container">
            <?php
            if (is_single()) {
                get_template_part( 'parts/single_post_nav');
            } else if (is_page()) {
                // no nav
            } else {
                get_template_part( 'parts/blog', 'pagination');
            }
            
            ?>
            <div class="content_constrain">
                <div class="row footer_widgets">
                    <div id="footer_widget_left" class="col-md-3">
                        <?php if (is_active_sidebar( 'Footer Left' )) { 
                            dynamic_sidebar( 'Footer Left' ); 
                        } else { 
                            if ((soliloquy_get_option('example-toggle') == 'on') || (soliloquy_get_option('example-toggle') == NULL)) {
                                the_widget( 'WP_Widget_Recent_Posts', array() ,array('before_title' => '<h3 class="widget_title">','after_title' => '</h3>','before_widget' => '<div class="widget widget sidebar_editable">','after_widget' => '</div>') );
                            }
                        } ?>
                    </div>			
                    <div id="footer_widget_center_left" class="col-md-3">
                        <?php if (is_active_sidebar( 'Footer Center Left' )) { 
                            dynamic_sidebar( 'Footer Center Left' ); 
                        } else { 
                            if ((soliloquy_get_option('example-toggle') == 'on') || (soliloquy_get_option('example-toggle') == NULL)) {
                                the_widget( 'WP_Widget_Recent_Comments', array() ,array('before_title' => '<h3 class="widget_title">','after_title' => '</h3>','before_widget' => '<div class="widget widget sidebar_editable">','after_widget' => '</div>') );
                            }
                        } ?>
                    </div>			
                    <div id="footer_widget_center_right" class="col-md-3">
                        <?php if (is_active_sidebar( 'Footer Center Right' )) { 
                            dynamic_sidebar( 'Footer Center Right' ); 
                        } else { 
                            if ((soliloquy_get_option('example-toggle') == 'on') || (soliloquy_get_option('example-toggle') == NULL)) {
                                the_widget( 'WP_Widget_Tag_Cloud', array() ,array('before_title' => '<h3 class="widget_title">','after_title' => '</h3>','before_widget' => '<div class="widget widget sidebar_editable">','after_widget' => '</div>') );
                            }
                        } ?>
                    </div>
                    <div id="footer_widget_right" class="col-md-3">
                        <?php if (is_active_sidebar( 'Footer Right' )) { 
                            dynamic_sidebar( 'Footer Right' ); 
                        } else { 
                            if ((soliloquy_get_option('example-toggle') == 'on') || (soliloquy_get_option('example-toggle') == NULL)) {
                                the_widget( 'WP_Widget_Archives', array() ,array('before_title' => '<h3 class="widget_title">','after_title' => '</h3>','before_widget' => '<div class="widget widget sidebar_editable">','after_widget' => '</div>') );
                            }
                        } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <p id="copyright"><?php echo esc_html(soliloquy_get_option('copyright')) ?></p>
                    </div>					
                    <div class="col-md-5 col-md-offset-2">
                        <p id="credit">Soliloquy from <a href="https://nimbusthemes.com/">nimbusthemes.com</a></p>
                    </div>       
                </div> 
            </div>
        </footer>
<?php wp_footer(); ?>		
</body>
</html>