<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imd
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site overflow-hidden">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'imd'); ?></a>

		<header id="masthead" class="site-header d-flex align-items-center">

			<div class="logo">
				<?php $logo = get_field('header_logo', 'option'); ?>
				<a href="<?php echo get_home_url(); ?>"><?php echo wp_get_attachment_image($logo, 'full'); ?></a>
			</div>

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle hamburger hamburger--squeeze js-hamburger" aria-controls="primary-menu" aria-expanded="false">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</button>
				<div class="nav-wrapper w-full align-items-center">
					<button class="menu-toggle hamburger hamburger--squeeze js-hamburger is-active" aria-controls="primary-menu" aria-expanded="false">
						<div class="hamburger-box">
							<div class="hamburger-inner"></div>
						</div>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
					<?php
					$in = get_field('linkedin', 'option');
					$contact = get_field('contact_us', 'option');
					?>
					<?php if ($in || $contact) : ?>
						<ul class="ml-auto pl-0 top-info">
							<?php if ($in) : ?>
								<li><a href="<?php echo $in; ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/linkedin.svg" /></a></li>
							<?php endif; ?>
							<?php if ($contact) : ?>
								<li><a href="<?php echo $contact['url']; ?>" target="<?php echo $contact['target']; ?>"><?php echo $contact['title']; ?></a></li>
							<?php endif; ?>
						</ul>
					<?php endif; ?>
				</div>
			</nav><!-- #site-navigation -->

		</header><!-- #masthead -->