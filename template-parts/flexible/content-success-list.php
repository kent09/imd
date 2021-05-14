<section class="content-success-list">
    <div class="container">
        <div class="row">
            <?php if (have_rows('success_list')) : ?>
                <?php while (have_rows('success_list')) : the_row();  ?>
                    <div class="col-lg-4 col-md-6">
                        <?php
                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                        $desc = get_sub_field('description');
                        $link = get_sub_field('more_info');
                        $logo = get_sub_field('logo');
                        $green = get_sub_field('green_card');
                        $img_url = wp_get_attachment_image_src($image, 'full');
                        ?>
                        <div class="content-wrapper position-relative <?php echo $green ? "text-white" : ""; ?> " <?php echo $green ? 'style="background-image:url(' . $img_url[0] . ');"' : "" ?>>
                            <?php if ($green) : ?>
                                <div class="green-overlay position-absolute"></div>
                            <?php endif; ?>
                            <?php if ($logo) : ?>
                                <div class="logo position-absolute d-flex justify-content-center align-items-center">
                                    <?php echo wp_get_attachment_image($logo, 'full'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($image && !$green) : ?>
                                <div class="image-wrapper">
                                    <?php echo wp_get_attachment_image($image, 'full'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($title) : ?>
                                <div class="title"><?php echo $title; ?></div>
                            <?php endif; ?>
                            <?php if ($desc) : ?>
                                <div class="description font-family-mont"><?php echo $desc; ?></div>
                            <?php endif; ?>
                            <?php if ($link) : ?>
                                <div class="more-holder d-flex">
                                    <a href="<?php echo $link['url']; ?>" class="green-line" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>