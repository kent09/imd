<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imd
 */

?>

<footer id="colophon" class="site-footer bg-dark-green">
	<?php if (is_front_page()) : ?>
		<?php get_template_part('template-parts/content/content-home', 'footer'); ?>
	<?php else : ?>
		<?php get_template_part('template-parts/content/content-default', 'footer'); ?>
	<?php endif; ?>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>