<?php if (has_category() || has_tag()) { ?>
    <div class="row tax_tags">
        <div class="col-xs-6 tax">
            <?php if (has_category()) {
                    _e('Posted in: ', 'soliloquy'); 
                    the_category(', ');
            } ?>
        </div>
        <div class="col-xs-6 tags">
            <?php if (has_tag()) { 
                    the_tags('Tags: ', ', ', '');
            } ?>
        </div>
    </div>
<?php } ?>