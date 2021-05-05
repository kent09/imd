<?php
$label = get_field('section_label');
?>

<section class="slider position-relative">
	<?php if (have_rows('slider')) : ?>
		<div class="owl-carousel owl-theme">
			<?php while (have_rows('slider')) : the_row(); ?>
				<div class="item h-min">
					<?php
					$img = get_sub_field('image') ?? bloginfo('template_url') . "/assets/images/slider.jpg";
					$title = get_sub_field('title');
					$description = get_sub_field('description');
					?>
					<div class="overlay position-absolute">
						<div class="img h-100" style="background-image: url(<?php echo $img; ?>);"></div>
					</div>
					<?php if ($title) : ?>
						<h2 class="title"><?php echo $title; ?></h2>
					<?php endif; ?>
					<?php if ($description) : ?>
						<p class="description"><?php echo $description; ?></p>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

	<?php if ($label) : ?>
		<div class="label-holder">
			<?php echo $label; ?>
		</div>
	<?php endif; ?>
	<div class="green-box position-absolute"></div>
</section>