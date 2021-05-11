<?php
$image = get_sub_field('hero_banner');
$title = get_sub_field('title');
$desc = get_sub_field('description');
?>
<section class="hero-banner d-flex position-relative">
    <div class="overlay position-absolute"></div>
    <?php if ($image) : ?>
        <div class="img h-100 bg-position-size position-absolute" style="background-image: url(<?php echo $image; ?>);"></div>
    <?php endif; ?>
    <div class="container mt-auto">
        <div class="hero__content position-relative">
            <?php if ($title) : ?>
                <h2 class="title font-size-62 text-white pb-5 mb-0"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($desc) : ?>
                <p class="description font-size-20 text-white"><?php echo $desc; ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>