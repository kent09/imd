<?php

?>
<?php if (have_rows('content')) : ?>
    <section class="content-our-success">
        <div class="container">
            <div class="row">
                <?php while (have_rows('content')) : the_row();  ?>
                    <div class="col-md-6">
                        <?php $image = get_sub_field('image'); ?>
                        <?php $title = get_sub_field('title'); ?>
                        <?php $des = get_sub_field('description'); ?>
                        <?php $link = get_sub_field('link'); ?>
                        <div class="content-wrapper text-center">
                            <?php if ($image) : ?>
                                <div class="img-wrapper">
                                    <?php echo wp_get_attachment_image($image, 'full'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($title) : ?>
                                <div class="title font-size-30"><?php echo $title; ?></div>
                            <?php endif; ?>
                            <?php if ($des) : ?>
                                <div class="description font-family-mont"><?php echo $des; ?></div>
                            <?php endif; ?>
                            <?php if ($link) : ?>
                                <div class="more-holder d-flex justify-content-center pt-20">
                                    <a href="<?php echo $link['url']; ?>" class="green-line" target="<?php echo $link['target']; ?>">
                                        <?php echo $link['title']; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>