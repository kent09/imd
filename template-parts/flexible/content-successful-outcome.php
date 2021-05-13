<?php
$title = get_sub_field('title');
$desc = get_sub_field('description');
$size = 'full';
?>

<section class="content-successful-outcome pb-100 pt-114">
    <div class="container">
        <?php if ($title) : ?>
            <div class="title text-center font-size-13 text-green font-family-mont fw-bold text-uppercase pb-30"><?php echo $title; ?></div>
        <?php endif; ?>
        <?php if ($desc) : ?>
            <div class="description text-center font-size-30 ml-auto mr-auto text-black pb-100"><?php echo $desc; ?></div>
        <?php endif; ?>
        <?php if (have_rows('cards')) : ?>
            <div class="card-slider">
                <div class="owl-carousel owl-theme">
                    <?php while (have_rows('cards')) : the_row();  ?>
                        <?php $icon = get_sub_field('icon'); ?>
                        <?php $title = get_sub_field('title'); ?>
                        <?php $desc = get_sub_field('description'); ?>
                        <?php $link = get_sub_field('link'); ?>
                        <?php $hover_title = get_sub_field('hover_title'); ?>
                        <?php $hover_desc = get_sub_field('hover_description'); ?>

                        <div class="item position-relative text-center">
                            <div class="content-wrapper">
                                <?php if ($icon) : ?>
                                    <div class="icon-holder">
                                        <?php echo wp_get_attachment_image($icon, $size); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($title) : ?>
                                    <div class="title font-size-20 text-black pb-20"><?php echo $title; ?></div>
                                <?php endif; ?>
                                <?php if ($desc) : ?>
                                    <div class="description font-size-16 pb-40 font-family-mont"><?php echo $desc; ?></div>
                                <?php endif; ?>
                                <?php if ($link) : ?>
                                    <div class="link">
                                        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="text-green fw-bold">
                                            <?php echo $link['title']; ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="hover-show bg-dark-green text-white position-absolute">
                                <?php if ($hover_title) : ?>
                                    <div class="title font-size-20 pb-20"><?php echo $hover_title; ?></div>
                                <?php endif; ?>
                                <?php if ($hover_desc) : ?>
                                    <div class="description font-size-16 font-family-mont"><?php echo $hover_desc; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>