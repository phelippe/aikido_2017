<div class="row single_post_nav">
    <div class="col-md-6">
        <?php 
        if (is_attachment()) {
            previous_image_link();
        } else {
            previous_post_link('%link', __( '&laquo; Previous post link', 'soliloquy') . ' %title'); 
        }                                
        ?>
    </div>
    <div class="col-md-6 text-right">
        <?php 
        if (is_attachment()) {
            next_image_link();
        } else {
            next_post_link('%link', '%title ' . __( '&raquo; Next post link', 'soliloquy'));
        }                                
        ?>                  
    </div>
</div>