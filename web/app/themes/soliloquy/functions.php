<?php

/* **************************************************************************************************** */
// Setup Theme
/* **************************************************************************************************** */

add_action('after_setup_theme', 'soliloquy_setup');

if (!function_exists('soliloquy_setup')){
    function soliloquy_setup() {

       // Localization
        
        $lang_local = get_template_directory() . '/lang';
        load_theme_textdomain('soliloquy', $lang_local);

        // Register Thumbnail Sizes

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1170, 9999, true);
        add_image_size('nimbus_1170_640', 1170, 640, true);
        add_image_size('nimbus_375_225', 375, 225, true);
 

        // Load feed links	

        add_theme_support('automatic-feed-links');
        
        // Support Custom Background
        
        $soliloquy_custom_background_defaults = array(
            'default-color' => 'f9f9f9'
        );
        add_theme_support( 'custom-background', $soliloquy_custom_background_defaults );    

        // Set Content Width

        global $content_width;
        if ( ! isset( $content_width ) ) {
            $content_width = 770;
        }      

        // Register Menus

        register_nav_menu('primary', __('Primary Menu', 'soliloquy'));
        
        // Support title
        
        add_theme_support( "title-tag" );

    }
}

/* **************************************************************************************************** */
// Load Admin Panel
/* **************************************************************************************************** */

require_once(get_template_directory() . '/inc/kirki/kirki.php' );
require_once(get_template_directory() . '/inc/options.php' );

// Duplicate and import any theme options from <= 1.1.2
// Transition from legacy Nimbus Framework to Kirki

add_action( 'wp_loaded', 'soliloquy_update_migration' );

function soliloquy_update_migration() {
    $oldmod=get_option( 'soliloquy_options' );
    if ($oldmod) {
        add_option( 'soliloquy_options_backup', $oldmod, '', 'yes');
        $newmod = array();
        foreach ($oldmod as $key => $value) {
                // build array for kirki typography option
        		if (isset($value['face'])){
        			$value['font-family'] = $value['face'];
        		}
        		if (isset($value['line'])){
        			$value['line-height'] = $value['line'];
        		}
        		if (isset($value['color'])){
        			$value['color'] = $value['color'];
        		}
        		if (isset($value['style'])){
        			if ($value['style'] == "400") {
        			    $value['style'] = "regular";
        			}
        			$value['variant'] = $value['style'];
        		}
        		if (isset($value['fonttrans'])){
        			$value['text-transform'] = $value['fonttrans'];
        		}
        		if (isset($value['size'])){
        			$value['font-size'] = $value['size'];
        		}
        		if (isset($value['face'])){
        			$value['letter-spacing'] = '0';
        		}
        		if (isset($value['face'])){
        			$value['text-align'] = 'left';
        		}
        		// fix keys when needed
        		if (preg_match("/nimbus_/", $key)) {
        		    $newmod[str_replace("nimbus_", "soliloquy_", $key)] = $value;
        		} else {
        		    $newmod[$key] = $value;
                }
        }
        // turn off any example stuff for existing users
        $newmod_example_off = array();
        $newmod_example_off['example-toggle'] = 'off';
        $newmod = array_merge($newmod, $newmod_example_off);
        // update mod and remove old options
        update_option( 'theme_mods_soliloquy', $newmod, '', 'yes');
        delete_option( 'soliloquy_options' );
    }
}

// Get Options
    
function soliloquy_get_option($optionID, $default_data = false) {
    if (get_theme_mod( $optionID )) {
        return get_theme_mod( $optionID );   
    } else {
        return NULL;
    }
}


/* **************************************************************************************************** */
// Widgets
/* **************************************************************************************************** */

require_once( get_template_directory() . '/inc/widgets.php');


/* **************************************************************************************************** */
// NavWalker
/* **************************************************************************************************** */

require_once( get_template_directory() . '/inc/navwalker.php');


/* **************************************************************************************************** */
// Meta Boxes
/* **************************************************************************************************** */

require_once( get_template_directory() . '/inc/meta_boxes.php');


/* **************************************************************************************************** */
// Clear Helper/s
/* **************************************************************************************************** */

function soliloquy_clear($ht = "0") {
echo "<div class='clear' style='height:" . $ht . "px;'></div>";
}


/* **************************************************************************************************** */
// Modify Search Form
/* **************************************************************************************************** */

if (!function_exists('soliloquy_modify_search_form')){
    function soliloquy_modify_search_form($form) {
        $form = '<form method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '/" >';
        if (is_search()) {
            $form .='<input type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />';
        } else {
        $form .='<input type="text" value="'.__('Search','soliloquy').'" name="s" id="s"  onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;"/>';
        }
        $form .= '<input type="image" id="searchsubmit" src="' . get_stylesheet_directory_uri() . '/images/search_icon.png" />
                </form>';
        return $form;
    }
}
add_filter('get_search_form', 'soliloquy_modify_search_form');


/* **************************************************************************************************** */
// Override gallery style
/* **************************************************************************************************** */

add_filter( 'use_default_gallery_style', '__return_false' );
       

/* **************************************************************************************************** */
// More Tag
/* **************************************************************************************************** */

if (!function_exists('soliloquy_wrap_more_tag')){
    function soliloquy_wrap_more_tag($link){
    return "<p class='more_tag_wrap'>$link</p>";
    }
}
add_filter('the_content_more_link', 'soliloquy_wrap_more_tag');


/* **************************************************************************************************** */
// Excerpt Modifications
/* **************************************************************************************************** */

// Excerpt Length

add_filter('excerpt_length', 'soliloquy_excerpt_length');

if (!function_exists('soliloquy_excerpt_length')){
    function soliloquy_excerpt_length($length) {
        return 30;
    }
}

// Excerpt More

add_filter('excerpt_more', 'soliloquy_excerpt_more');
    
if (!function_exists('soliloquy_excerpt_more')){
    function soliloquy_excerpt_more($more) {
        return '';
    }
}

// Add to pages

add_action('init', 'soliloquy_add_excerpts_to_pages');

if (!function_exists('soliloquy_add_excerpts_to_pages')){
    function soliloquy_add_excerpts_to_pages() {
        add_post_type_support('page', 'excerpt');
    }
}

/* **************************************************************************************************** */
// Enable Threaded Comments
/* **************************************************************************************************** */

add_action('wp_enqueue_scripts', 'soliloquy_threaded_comments');

if (!function_exists('soliloquy_threaded_comments')){
    function soliloquy_threaded_comments() {
        if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

/* **************************************************************************************************** */
// Modify Comments Output
/* **************************************************************************************************** */

if (!function_exists('soliloquy_comment')){
    function soliloquy_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
            <article>
                <div class="comment-avatar pull-left">
                    <?php echo get_avatar( $comment, 75 ); ?>
                </div>
                <div class="comment-content media-body">
                    <p class="text-right right"><?php comment_reply_link(array_merge($args, array('reply_text' => __('Leave a Reply', 'soliloquy'), 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
                    <p class="text-left left"><strong><?php comment_author_link(); ?></strong><br />
                    <?php echo(get_comment_date()) ?> <?php edit_comment_link(__('(Edit)', 'soliloquy'), '  ', '') ?></p>
                    <div class="clear"></div>
                    <?php 
                    if ($comment->comment_approved == '0') {
                    ?>
                        <em><?php _e('Your comment is awaiting moderation.', 'soliloquy') ?></em>
                    <?php 
                    } 
                    comment_text(); 
                    ?>
                </div> 
            </article>
    <?php
    }
}    

/* **************************************************************************************************** */
// Modify Ping Output
/* **************************************************************************************************** */

if (!function_exists('soliloquy_ping')){
    function soliloquy_ping($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>
        <li id="comment_<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?> 
    <?php
    }
}    
    
/* **************************************************************************************************** */
// Modify Avatar Classes
/* **************************************************************************************************** */
    
add_filter('get_avatar','soliloquy_avatar_class');

if (!function_exists('soliloquy_avatar_class')){
    function soliloquy_avatar_class($class) {
        $class = str_replace("class='avatar", "class='avatar img-responsive", $class) ;
        return $class;
    }
}

/* **************************************************************************************************** */
// Add Image Classes ##Look for way to apply to exsisting
/* **************************************************************************************************** */

if (!function_exists('soliloquy_add_image_class')){
    function soliloquy_add_image_class($class){
        $class .= ' img-responsive';
        return $class;
    }
}
add_filter('get_image_tag_class','soliloquy_add_image_class');
 

/* **************************************************************************************************** */
// Load Public Scripts
/* **************************************************************************************************** */

add_action('wp_enqueue_scripts', 'soliloquy_public_scripts');

if (!function_exists('soliloquy_public_scripts')){
    function soliloquy_public_scripts() {
        if (!is_admin()) {
            wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.0.0');
            wp_enqueue_script('html5shiv',get_template_directory_uri() . '/assets/js/html5shiv.js','','1.0.0',false);
            wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
            wp_enqueue_script('respondjs',get_template_directory_uri() . '/assets/js/respond.min.js','','1.0.0',false);
            wp_script_add_data( 'respondjs', 'conditional', 'lt IE 9' );
        }
    }
}


/* **************************************************************************************************** */
// Load Public CSS
/* **************************************************************************************************** */


add_action('wp_enqueue_scripts', 'soliloquy_public_styles');

if (!function_exists('soliloquy_public_styles')){
    function soliloquy_public_styles() {
        if (!is_admin()) {
            wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0', 'all');
            wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0', 'all');
            wp_enqueue_style( 'soliloquy-style', get_stylesheet_uri(), false, get_bloginfo('version') );
        }
    }
}


/* **************************************************************************************************** */
// Scripts to footer
/* **************************************************************************************************** */

add_action('wp_footer', 'soliloquy_wp_footer');

if (!function_exists('soliloquy_wp_footer')){
    function soliloquy_wp_footer() {
    ?>
    <script>
    jQuery(window).load(function() {
        jQuery('button, input[type="button"], input[type="reset"], input[type="submit"]').addClass('btn <?php echo esc_html(soliloquy_get_option('soliloquy_button_color'));?>');
        jQuery('a.btn').addClass('<?php echo esc_html(soliloquy_get_option('soliloquy_button_color'));?>');
    });
    </script>
    <?php
    }
}