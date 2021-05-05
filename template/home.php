<?php
/*
Template Name: Home Page
*/

get_header(); ?>

<?php get_template_part('template-parts/components/home', 'slider'); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php get_template_part('template-parts/content/content', 'flexible'); ?>
</div>

<?php get_footer(); ?>