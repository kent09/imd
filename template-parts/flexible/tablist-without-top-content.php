<?php
$tablist_title = get_sub_field('tablist_title');

$right_image = get_sub_field('right_image');
$right_side_content = get_sub_field('right_content');
$right_contact = get_sub_field('contact_us');
$with_green_box = get_sub_field('with_green_box');
$size = 'full';
?>
<section class="content-tab-list border-top position-relative <?php echo $with_green_box ? 'show-green-box' : ''; ?>">
    <div class="container">
        <?php if ($tablist_title) : ?>
            <div class="font-size-13 text-green font-family-mont fw-bold text-uppercase pb-50">
                <?php echo $tablist_title; ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php if (have_rows('tablist')) : ?>
                <div class="col">
                    <ul class="list">
                        <?php while (have_rows('tablist')) : the_row();  ?>
                            <?php $title = get_sub_field('title'); ?>
                            <?php $content = get_sub_field('content'); ?>
                            <?php $show_contact = get_sub_field('show_contact'); ?>
                            <?php $contact = get_sub_field('contact'); ?>

                            <li>
                                <div class="tab_title text-black">
                                    <?php echo $title; ?>
                                </div>
                                <div class="tab_description">
                                    <?php if ($content) : ?>
                                        <div class="content_wrapper font-family-mont">
                                            <?php echo $content; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($show_contact) : ?>
                                        <?php $avatar = $contact['avatar']; ?>
                                        <?php $name = $contact['name']; ?>
                                        <?php $prof = $contact['profession']; ?>
                                        <?php $contact_btn = $contact['contact']; ?>
                                        <div class="contact-with d-flex align-items-center position-relative">
                                            <?php if ($avatar) : ?>
                                                <div class="avatar">
                                                    <?php echo wp_get_attachment_image($avatar, $size); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="name text-black">
                                                <?php if ($name) : ?>
                                                    <div><?php echo $name; ?></div>
                                                <?php endif; ?>
                                                <?php if ($prof) : ?>
                                                    <div><?php echo $prof; ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <?php if ($contact_btn) : ?>
                                                <a href="<?php echo $contact_btn['url']; ?>" class="contact-with-btn d-flex align-items-center" target="<?php echo $contact_btn['target']; ?>">
                                                    <?php echo $contact_btn['title']; ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="col-lg-4 offset-lg-1">
                <div class="right-content">
                    <?php if ($right_image) : ?>
                        <div class="img_wrapper">
                            <?php echo wp_get_attachment_image($right_image, $size); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($right_side_content) : ?>
                        <p><?php echo $right_side_content; ?></p>
                    <?php endif; ?>
                    <?php if ($right_contact) : ?>
                        <a href="<?php echo $right_contact['url']; ?>" class="contact-us-btn" target="<?php echo $right_contact['target']; ?>">
                            <?php echo $right_contact['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>