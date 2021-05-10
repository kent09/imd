<?php
$label = get_field('section_label');
?>

<section class="slider position-relative">
	<?php if (have_rows('slider')) : ?>
		<div class="owl-carousel owl-theme">
			<?php while (have_rows('slider')) : the_row(); ?>
				<div class="item h-min d-flex pb-130">
					<?php
					$img = get_sub_field('image') ?? bloginfo('template_url') . "/assets/images/slider.jpg";
					$title = get_sub_field('title');
					$description = get_sub_field('description');
					?>
					<div class="overlay position-absolute">
						<div class="img h-100" style="background-image: url(<?php echo $img; ?>);"></div>
					</div>
					<div class="container mt-auto">
						<div class="slider__content position-relative z-index-5">
							<?php if ($title) : ?>
								<h2 class="title font-size-62 text-white pb-5 mb-0"><?php echo $title; ?></h2>
							<?php endif; ?>
							<?php if ($description) : ?>
								<p class="description font-size-20 text-white"><?php echo $description; ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

	<?php if ($label) : ?>
		<div class="label-holder d-flex align-items-center justify-content-center parallelogram skew-right position-absolute">
			<div class="position-absolute skew-left d-flex align-items-center text-dark-green">
				<?php echo $label; ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="green-box parallelogram skew-left position-absolute"></div>
</section>