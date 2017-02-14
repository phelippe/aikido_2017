<?php

add_action('widgets_init', 'soliloquy_register_sidebars');

if (!function_exists('soliloquy_register_sidebars')){
    function soliloquy_register_sidebars() {

        register_sidebar(array(
            'name' => __('Default Page Sidebar', 'soliloquy'),
            'id' => 'sidebar_pages',
            'description' => __('Widgets in this area will be displayed in the sidebar on the pages.', 'soliloquy'),
            'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>'
        ));
        
        register_sidebar(array(
            'name' => __('Default Blog Sidebar', 'soliloquy'),
            'id' => 'sidebar_blog',
            'description' => __('Widgets in this area will be displayed in the sidebar on the blog and posts.', 'soliloquy'),
            'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>'
        ));

        register_sidebar(array(
            'name' => __('Header Left', 'soliloquy'),
            'id' => 'header_left',
            'description' => __('Widgets in this area will be displayed in the widget area on the left side of the header.', 'soliloquy'),
            'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>'
        ));
        
        register_sidebar(array(
            'name' => __('Header Right', 'soliloquy'),
            'id' => 'header_right',
            'description' => __('Widgets in this area will be displayed in the widget area on the right side of the header.', 'soliloquy'),
            'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>'
        ));
       

        register_sidebar(array(
            'name' => __('Footer Left', 'soliloquy'),
            'id' => 'footer-left',
            'description' => __('Widgets in this area will be shown in the left footer column.', 'soliloquy'),
            'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>'
        ));
        
        register_sidebar(array(
            'name' => __('Footer Center Left', 'soliloquy'),
            'id' => 'footer-center-left',
            'description' => __('Widgets in this area will be shown in the center left footer column.', 'soliloquy'),
            'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>'
        ));

        register_sidebar(array(
            'name' => __('Footer Center Right', 'soliloquy'),
            'id' => 'footer-center-right',
            'description' => __('Widgets in this area will be shown in the center right footer column.', 'soliloquy'),
            'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget_title">',
            'after_title' => '</h2>'
        ));

        register_sidebar(array(
            'name' => __('Footer Right', 'soliloquy'),
            'id' => 'footer-right',
            'description' => __('Widgets in this area will be shown in the right footer column.', 'soliloquy'),
            'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget_title">',
            'after_title' => '</h2>'
        ));
        
        // create 50 alternate sidebar widget areas for use on post and pages 
        $i = 1;
        while ($i <= 50) {
            register_sidebar(array(
                'name' => __('Alternate Sidebar #', 'soliloquy') . $i,
                'id' => 'sidebar_' . $i,
                'description' => __('Widgets in this area will be displayed in the sidebar for any posts, pages or portfolio items that are taged with sidebar', 'soliloquy') . $i . '.',
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget_title">',
                'after_title' => '</h3>'
            ));
            $i++;
        }    
    }
}