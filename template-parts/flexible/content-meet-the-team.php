<?php
$title = get_sub_field('title');
$desc = get_sub_field('description');
?>

<section class="content-meet-the-team bg-light-blue pt-130 pb-90 position-relative">
    <div class="container">
        <?php if ($title) : ?>
            <div class="title text-center font-size-13 text-green font-family-mont fw-bold text-uppercase pb-30"><?php echo $title; ?></div>
        <?php endif; ?>
        <?php if ($desc) : ?>
            <div class="description text-center font-size-30 ml-auto mr-auto text-black pb-114"><?php echo $desc; ?></div>
        <?php endif; ?>
        <?php if (have_rows('team')) : ?>
            <div class="row">
                <?php while (have_rows('team')) : the_row();  ?>
                    <?php $linkedin = get_sub_field('linkedin'); ?>
                    <?php $image = get_sub_field('image'); ?>
                    <?php $name = get_sub_field('name'); ?>
                    <?php $prof = get_sub_field('profession'); ?>
                    <?php $email = get_sub_field('email'); ?>
                    <div class="col-md-3 col-sm-6">
                        <?php if ($image) : ?>
                            <div class="img-wrapper position-relative pb-20">
                                <?php echo wp_get_attachment_image($image, 'full'); ?>
                                <?php if ($linkedin) : ?>
                                    <a href="<?php echo $linkedin ?>">
                                        <div class="linkedin"></div>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($name) : ?>
                            <div class="name font-size-24 text-black"><?php echo $name; ?></div>
                        <?php endif; ?>
                        <?php if ($prof) : ?>
                            <div class="prof text-gray"><?php echo $prof; ?></div>
                        <?php endif; ?>
                        <?php if ($email) : ?>
                            <div class="email">
                                <a href="<?php echo $email['url']; ?>" class="font-weight-bold text-green decoration-none" target="<?php echo $email['target']; ?>">
                                    <?php echo $email['title']; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>