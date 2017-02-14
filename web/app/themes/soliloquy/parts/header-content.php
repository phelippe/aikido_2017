<div class="col-sm-4 header_widget_left">
    <?php if (is_active_sidebar( 'header_left' )) {  dynamic_sidebar( 'header_left' ); } ?>
</div>
<div class="col-sm-4">
    <h1 class="text_logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo( 'name' ); ?></a></h1>
</div>
<div class="col-sm-4 header_widget_right">
    <?php if (is_active_sidebar( 'header_right' )) { dynamic_sidebar( 'header_right' ); } ?>
</div>
<div class="clear"></div>

