<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imd
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php get_template_part('template-parts/content/content', 'flexible'); ?>


</article><!-- #post-<?php the_ID(); ?> -->