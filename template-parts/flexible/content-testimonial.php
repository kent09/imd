<section class="content-testimonial bg-dark-green position-relative">
    <?php if (have_rows('testimonials')) : ?>
        <div class="owl-carousel owl-theme">
            <?php while (have_rows('testimonials')) : the_row();  ?>
                <?php $testimonial = get_sub_field('comment'); ?>
                <?php $name = get_sub_field('name'); ?>
                <div class="item">
                    <div class="content-wrapper text-white">
                        <?php if ($testimonial) : ?>
                            <div class="pb-90 text-center"><?php echo $testimonial; ?></div>
                        <?php endif; ?>
                        <?php if ($name) : ?>
                            <div class="name text-center"><?php echo $name; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>