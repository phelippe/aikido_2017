<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>        
    </head>
    <body <?php body_class(); ?>>
        <header class="container">
            <?php get_template_part( 'parts/header', 'content'); ?>
            <?php get_template_part( 'parts/header', 'menu'); ?>
            <?php get_template_part( 'parts/banner'); ?>
        </header>
        <?php get_template_part( 'parts/featured'); ?>
        <?php if (is_author()) { get_template_part( 'parts/bio'); } ?>